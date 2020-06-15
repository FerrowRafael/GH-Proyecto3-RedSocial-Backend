<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // GET CATEGORIES ALL
    public function getAll()
    {
        try {
            $categories = Category::select(['id', 'name'])->get();
            return $categories;
        } catch (\Exception $e) {
            return response([
                'error' => $e
            ], 500);
        }
    }
    
    // INSERT CATEGORY
    public function insert(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:categories|string'
            ]);
            $body = $request->all();
            $category = Category::create($body);
            return response($category, 201);
        } catch (\Exception $e) {
            return response([
                'error' => $e->getMessage(),
                'message' => 'There was a problem trying to update the category',
            ], 500);
        }
    }

    // UPDATE CATEGORY
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|unique:categories|string'
            ]);
            $body = $request->all();
            $category = Category::find($id);
            $category->update($body);
            return response([
                'category' => $category,
                'message' => 'Category succesfully updated',
            ]);
        } catch (\Exception $e) {
            return response([
                'error' => $e->getMessage(),
                'message' => 'There was a problem trying to update the category',
            ], 500);
        }
    }

    // DELETE CATEGORY
    public function destroy(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            // $category->products()->detach();
            $category->delete();
            return response([
                'category' => $category,
                'message' => 'Category succesfully deleted',
            ]);
        } catch (\Exception $e) {
            return response([
                'error' => $e->getMessage(),
                'message' => 'There was a problem trying to delete the category',
            ], 500);
        }
    }
}