<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query("per_page", 5);
        $page = $request->query("page", 0);
        $offset = $page * $perPage;

        $categories = Category::skip($offset)->take($perPage)->get();
        return $this->successResponse($categories);
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());
        return $this->successResponse($category, Response::HTTP_CREATED);
    }

    public function show(Category $category)
    {
        return $this->successResponse($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return $this->successResponse($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return $this->successResponse([], Response::HTTP_NO_CONTENT);
    }
}
