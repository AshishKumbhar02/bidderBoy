<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Coupon;

class CouponController extends Controller
{
    public function index()
    {
        // get all bids pack and pass it to view
        $coupons = Coupon::all();
        return view('backend.coupons.index', ['coupons' => $coupons]);
    }

    public function create(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'code' => 'required|unique:coupons',
        ]);

        $coupon = new Coupon();
        $coupon->code = $request->input('code');
        $coupon->description = $request->input('description');
        $coupon->discount = $request->input('discount');
        $coupon->discount_type = $request->input('discount_type');
        $coupon->valid_from = $request->input('valid_from');
        $coupon->valid_until = $request->input('valid_until');
        $coupon->max_usage = $request->input('max_usage');
        $coupon->is_enabled = $request->input('is_enabled');
        $coupon->save();

        // return json response with status
        return response()->json([
            'status' => 'success',
            'message' => 'Coupon created successfully',
            'data' => $coupon
        ], 200);
    }

    public function edit($id)
    {
        //get package by id
        $coupon = Coupon::find($id);

        //return as json data
        return response()->json([
            'status' => 'success',
            'data' => $coupon
        ], 200);
    }

    public function update(Request $request, $id)
    {
        //Validate the incoming request data
        $request->validate([
            'editCode' => 'required|unique:coupons,code,' . $id,
            'editDescription' => 'nullable',
            'editDiscount' => 'required|numeric',
            'editDiscountType' => 'required|in:percentage,fixed',
            'editValidFrom' => 'required|date',
            'editValidUntil' => 'required|date',
            'editMaxUsage' => 'nullable|integer',
            'editIsEnabled' => 'required|boolean',
        ]);

        // Find the coupon by ID
        $coupon = Coupon::find($id);

        if (!$coupon) {
            return response()->json(['message' => 'Coupon not found'], 404);
        }

        // Update the fields
        $coupon->code = $request->input('editCode');
        $coupon->description = $request->input('editDescription');
        $coupon->discount = $request->input('editDiscount');
        $coupon->discount_type = $request->input('editDiscountType');
        $coupon->valid_from = $request->input('editValidFrom');
        $coupon->valid_until = $request->input('editValidUntil');
        $coupon->max_usage = $request->input('editMaxUsage');
        $coupon->is_enabled = $request->input('editIsEnabled');

        // Save the changes to the database
        $coupon->save();

        // Return a JSON response with status and data
        return response()->json([
            'status' => 'success',
            'message' => 'Coupon updated successfully',
            'data' => $coupon
        ], 200);
    }

    public function delete($id)
    {
        // get package by id
        $coupon = Coupon::find($id);

        if ($coupon) {
            $coupon->delete();
        }
        return redirect()->route('coupon.index')->with('success', 'Coupon deleted successfully');
    }
}
