<?php

namespace App\Http\Controllers\Categories;

use App\DTO\CategoryCreateDTO;
use App\DTO\CategoryUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAndUpdateCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(protected Category $category)
    {
    }

    public function index(Request $request)
    {
        $categories = $this->category->getAll($request->filter);

        return view('categories.index', compact('categories'));
    }

    public function store(StoreAndUpdateCategory $request)
    {

        $return =  $this->category->createCategory(CategoryCreateDTO::makeFromRequest($request), $request);

        return $return;
    }

    public function remove(int $id)
    {
        $result = $this->category->deleteCategory($id);

        return $result;
    }

    public function update(StoreAndUpdateCategory $request)
    {
        $result = $this->category->editCategory(CategoryUpdateDTO::makeFromRequest($request));
        return $result;
    }
}
