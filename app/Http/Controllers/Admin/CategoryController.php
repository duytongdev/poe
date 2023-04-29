<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Category::orderBy('created_at', 'desc')->paginate($request->perPage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category;

        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->description;
        $category->status = $request->status;
        $category->parent_id = $request->parent_id;

        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/categories/';
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path($destinationPath), $imageName);

            $category->image = URL::asset($destinationPath . $imageName);
        }

        $category->save();

        return response()->json('success', 'Updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->description;
        $category->status = $request->status;
        $category->parent_id = $request->parent_id;

        $destinationPath = 'assets/images/categories/';
        $file = public_path($destinationPath . basename($category->image));

        if (file_exists($file)) {
            unlink($file);
        }

        if ($image = $request->file('image')) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $imageName);
        }

        $category->image = URL::asset($destinationPath . $imageName);
        $category->save();

        return response()->json('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Category::findOrFail($id)->delete();
    }
}
