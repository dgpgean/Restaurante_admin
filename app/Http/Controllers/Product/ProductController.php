<?php

namespace App\Http\Controllers\Product;

use App\DTO\ProductCreateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAndUpdateProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected Product $product)
    {
    }

    public function index(Request $request, Category $categories)
    {
        $categories = $categories->getAll();
        $products = $this->product->getAll($request->filter);

        return view('products.index', compact(['products', 'categories']));
    }

    public function new(Category $categories)
    {
        $categories = $categories->getAll();
        return view('products.new', compact('categories'));
    }

    public function store(StoreAndUpdateProduct $request)
    {
        $this->product->createProduct(ProductCreateDTO::makeFromRequest($request), $request);

        return redirect()->route('products.index')->with('success', 'Produto cadastrado com sucesso.');;
    }
}
