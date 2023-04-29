<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Brand::orderBy('created_at', 'desc')->paginate($request->perPage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        if ($image = $request->file('logo')) {
            $destinationPath = 'assets/images/brands/';
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $imageName);
        }

        $brand = new Brand;

        $brand->name = $request->name;
        $brand->logo = URL::asset($destinationPath . $imageName);
        $brand->status = $request->status;

        $brand->save();

        return response()->json(['success' => 'Created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Brand::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        $brand = Brand::findOrFail($id);
        $file = public_path('assets/images/brands/' . basename($brand->logo));

        if (file_exists($file)) {
            unlink($file);
        }

        if ($image = $request->file('logo')) {
            $destinationPath = 'assets/images/brands/';
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $imageName);
        }


        $brand->name = $request->name;
        $brand->logo = URL::asset($destinationPath . $imageName);
        $brand->status = $request->status;

        $brand->save();

        return response()->json($brand);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $id;
        // foreach ($request->ids as $id) {
        //     $brand = Brand::findOrFail($id);
        //     $file = public_path('assets/images/brands/' . basename($brand->logo));

        //     if (file_exists($file)) {
        //         unlink($file);
        //     }

        //     $brand->delete();
        // }

        // return response()->json(['success', 'Deleted successfully']);
    }

    public function deleteMany(Request $request)
    {
        foreach (json_decode($request->ids) as $id) {
            $brand = Brand::findOrFail($id);
            $file = public_path('assets/images/brands/' . basename($brand->logo));

            if (file_exists($file)) {
                unlink($file);
            }

            $brand->delete();
        }

        return $request->ids;

        return response()->json(['success', 'Deleted successfully']);
    }
}
