<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Show the product listing with optional filters.
    public function index(Request $request)
    {
        // $param = $request->only(['id', 'product_title', 'from_date_start', 'to_date_start']);

        $param['id']              = $request->id;
        $param['product_title']   = $request->product_title;
        $param['from_date_start'] = $request->from_date_start;
        $param['to_date_start']   = $request->to_date_start;

        $query = DB::table('products');
        if ($param['id']) {
            $query->orWhere('id', '=', $param['id']);
        }

        if ($param['product_title']) {
            $query->where(function ($subQuery) use ($param) {
                $subQuery->where('product_title', 'like', '%' . $param['product_title'] . '%')
                    ->orWhere('product_subtitle', 'like', '%' . $param['product_title'] . '%');
            });
        }

        if ($param['from_date_start'] && $param['to_date_start']) {
            $query->whereBetween('start_date_bid', [$param['from_date_start'], $param['to_date_start']]);
        }

        $products = $query->paginate(10);
        return view('backend.product.index', compact('products', 'param'));
    }



    // Show add product form.
    public function add(Request $request)
    {
        $categories = DB::table('category')->select('category_name', 'id')->get();

        return view('backend.product.add', ['categories' => $categories]);
    }


    // Store new product
    public function create(Request $request)
    {
        $request->validate([
            'product_title' => 'required|string|max:255',
            'retail_price' => 'required|numeric',
            'amount_per_bid' => 'required|numeric',
            'credit_per_bid' => 'required|numeric',
            'start_date_bid' => 'required|date',
            'start_hour_bid' => 'required|integer',
            'start_minute_bid' => 'required|integer',
            'start_hour_auction' => 'required|integer',
            'start_minute_auction' => 'required|integer',
            'start_seconds_auction' => 'required|integer',
            'category_id' => 'required|exists:category,id',
            'image' => 'required|image',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $new_startDate = date('Y-m-d H:i:s', strtotime(
            '+' . $request->input('start_hour_bid') . ' hour +' .
                $request->input('start_minute_bid') . ' minutes',
            strtotime($request->input('start_date_bid'))
        ));

        $end_date = date('Y-m-d H:i:s', strtotime(
            '+' . $request->input('start_hour_auction') . ' hour +' .
                $request->input('start_minute_auction') . ' minutes +' .
                $request->input('start_seconds_auction') . ' seconds',
            strtotime($new_startDate)
        ));

        Product::create([
            'product_title' => $request->input('product_title'),
            'product_subtitle' => $request->input('product_subtitle'),
            'retail_price' => $request->input('retail_price'),
            'amount_per_bid' => $request->input('amount_per_bid'),
            'amount_per_bid_add' => $request->input('amount_per_bid'),
            'credit_per_bid' => $request->input('credit_per_bid'),
            'reset_time_bid' => $request->input('reset_time_bid'),
            'start_date_bid' => $request->input('start_date_bid'),
            'start_hour_bid' => $request->input('start_hour_bid'),
            'start_minute_bid' => $request->input('start_minute_bid'),
            'start_hour_auction' => $request->input('start_hour_auction'),
            'start_minute_auction' => $request->input('start_minute_auction'),
            'start_seconds_auction' => $request->input('start_seconds_auction'),
            'start_date' => $new_startDate,
            'end_date' => $end_date,
            'last_bid_date' => $end_date,
            'delivery_information' => $request->input('delivery_information'),
            'shipping_charge' => $request->input('shipping_charge'),
            'category_id' => $request->input('category_id'),
            'is_buynow' => $request->has('is_buynow') ? 1 : 0,
            'description' => $request->input('description'),
            'image' => $imageName,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->route('product.index')->with('success', 'Product Added Successfully!');
    }



    // Show edit form
    public function edit(Request $request, $productId)
    {
        $product = Product::find($productId);
        $categories = DB::table('category')->select('category_name', 'id')->get();
        return view('backend.product.edit', compact('product', 'categories'));
    }


    // Update product
    public function update(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found.'
            ], 404);
        }

        // Image logic
        if ($request->hasFile('image')) {
            $randomName = Str::random(20);
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = $randomName . '.' . $extension;
            $request->file('image')->move(public_path('images'), $imageName);
        } else {
            $imageName = $product->image;
        }

        // Recalculate auction timing
        $new_startDate = date('Y-m-d H:i:s', strtotime(
            '+' . $request->input('start_hour_bid') . ' hour +' .
                $request->input('start_minute_bid') . ' minutes',
            strtotime($request->input('start_date_bid'))
        ));

        $end_date = date('Y-m-d H:i:s', strtotime(
            '+' . $request->input('start_hour_auction') . ' hour +' .
                $request->input('start_minute_auction') . ' minutes +' .
                $request->input('start_seconds_auction') . ' seconds',
            strtotime($new_startDate)
        ));

        $product->update([
            'product_title' => $request->input('product_title'),
            'product_subtitle' => $request->input('product_subtitle'),
            'retail_price' => $request->input('retail_price'),
            'amount_per_bid' => $request->input('amount_per_bid'),
            'amount_per_bid_add' => $request->input('amount_per_bid'),
            'credit_per_bid' => $request->input('credit_per_bid'),
            'reset_time_bid' => $request->input('reset_time_bid'),
            'start_date_bid' => $request->input('start_date_bid'),
            'start_hour_bid' => $request->input('start_hour_bid'),
            'start_minute_bid' => $request->input('start_minute_bid'),
            'start_hour_auction' => $request->input('start_hour_auction'),
            'start_minute_auction' => $request->input('start_minute_auction'),
            'start_seconds_auction' => $request->input('start_seconds_auction'),
            'start_date' => $new_startDate,
            'end_date' => $end_date,
            'last_bid_date' => $end_date,
            'delivery_information' => $request->input('delivery_information'),
            'shipping_charge' => $request->input('shipping_charge'),
            'category_id' => $request->input('category_id'),
            'is_buynow' => $request->has('is_buynow') ? 1 : 0,
            'description' => $request->input('description'),
            'image' => $imageName,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->route('product.index')->with('success', 'Product Updated Successfully!');
    }



    public function clone(Request $request, $productId)
    {

        $product = DB::table('products')->where('id', $productId)->first();

        // Handle image
        if ($request->hasFile('image')) {
            $randomName = Str::random(20);
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = $randomName . '.' . $extension;
            $request->file('image')->move(public_path('images'), $imageName);
        } else {
            $imageName = $product->image;
        }

        $imagePath = $product->image;

        $cloneProduct = Product::create([
            'product_title' => $product->product_title,
            'product_subtitle' => $product->product_subtitle,
            'retail_price' => $product->retail_price,
            'amount_per_bid' => $product->amount_per_bid,
            'credit_per_bid' => $product->credit_per_bid,
            'reset_time_bid' => $product->reset_time_bid,
            'start_date_bid' => $product->start_date_bid,
            'start_hour_bid' => $product->start_hour_bid,
            'start_minute_bid' => $product->start_minute_bid,
            'start_hour_auction' => $product->start_hour_auction,
            'start_minute_auction' => $product->start_minute_auction,
            'start_seconds_auction' => $product->start_seconds_auction,
            'delivery_information' => $product->delivery_information,
            'shipping_charge' => $product->shipping_charge,
            'category_id' => $product->category_id,
            'is_buynow' => $product->is_buynow,
            'description' => $product->description,
            'image' => $imagePath,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('product.edit', $cloneProduct->id)->with('success', 'Product Cloned Successfully!');
    }

    public function delete(Request $request, $id)
    {

        DB::table('products')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
