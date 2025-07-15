<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Bids_pack;

class BidsPackController extends Controller
{
    // Display a listing of all bids packages.
    public function index()
    {
        // Fetch all packages from database
        $bids_pack = Bids_pack::all();

        // Return the view with the data
        return view('backend.bids_pack.index', ['bids_packs' => $bids_pack]);
    }

    // Handle package creation (AJAX or API).
    public function create(Request $request)
    {
        $request->validate([
            'packageName' => 'required|string|max:255',
            'totalCredit' => 'required|integer',
            'cost' => 'required|numeric',

        ]);

        // Handle image upload and save its path
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/packs', 'public');
            // 'packages' is the directory where the image will be stored, change it as per your requirement
            // 'public' is the disk name defined in config/filesystems.php
            // Make sure you have created the 'packages' directory in your 'public/storage' folder
        } else {
            $imagePath = null;
        }

        $package = new Bids_pack();
        $package->package_name = $request->input('packageName');
        $package->total_credit = $request->input('totalCredit');
        $package->cost = $request->input('cost');
        $package->image_path = $imagePath;
        $package->save();

        // return json response with status
        return response()->json([
            'status' => 'success',
            'message' => 'Package created successfully',
            'data' => $package
        ], 200);
    }

    public function edit($id)
    {
        // get package by id
        $package = Bids_pack::find($id);
        // return as json data
        return response()->json([
            'status' => 'success',
            'data' => $package
        ], 200);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'packageName' => 'required|string|max:255',
            'totalCredit' => 'required|integer',
            'cost' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        // Find the package by ID
        $package = Bids_pack::find($id);

        if (!$package) {
            return response()->json(['message' => 'Package not found'], 404);
        }

        // Update the text fields
        $package->package_name = $request->input('packageName');
        $package->total_credit = $request->input('totalCredit');
        $package->cost = $request->input('cost');

        // Handle the image if provided
        if ($request->hasFile('image')) {
            // Remove the old image (if any)
            // Assuming you have a function to delete the old image in your Bids_pack model
            //    $package->deleteOldImage(); // Make sure to implement this method in your model

            // Upload the new image and store the file path
            $imagePath = $request->file('image')->store('uploads/packs', 'public');

            $package->image_path = $imagePath;
        }

        // Save the changes to the database
        $package->save();



        // return json response with status
        return response()->json([
            'status' => 'success',
            'message' => 'Package updated successfully',
            'data' => $package
        ], 200);
    }
    public function delete($id)
    {
        // get package by id
        $package = Bids_pack::find($id);

        if ($package) {
            $package->delete();
        }  // redirect to     Route::get('/', [BidsPackController::class, 'index'])->name('bids_packs.index');
        return redirect()->route('bids_packs.index')->with('success', 'Package deleted successfully');
    }
}
