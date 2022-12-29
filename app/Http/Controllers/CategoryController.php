<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Traits\ImageUploading;


class CategoryController extends Controller
{
    use ImageUploading;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories = Category::withCount('products')->get();
        return view('admin.categories.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('category_id')->pluck('name', 'id');
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        if ($request->input('photo', false)) {
            $category->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('categories.index')->with([
            'message' => 'Success Created !',
            'type' => 'success'
        ]);
    }

    /**s
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::whereNull('category_id')->pluck('name', 'id');

        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        if ($request->input('photo', false)) {
            if (!$category->photo || $request->input('photo') !== $category->photo->file_name) {
                isset($category->photo) ? $category->photo->delete() : null;
                $category->addMedia(storage_path('tmp/uploads/') . $request->input('photo'))->toMediaCollection('photo');
            }
        } else if ($category->photo) {
            $category->photo->delete();
        }

        return redirect()->route('categories.index')->with([
            'message' => 'Success Updated !',
            'type' => 'info'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'type' => 'danger'
        ]);
    }
}
