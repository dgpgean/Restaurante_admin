<?php

namespace App\Http\Controllers\Product;

use App\DTO\ProductCreateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAndUpdateProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected Product $product)
    {
    }

    public function index(Request $request)
    {

        $products = $this->product->getAll($request->filter);

        return view('products.index', compact('products'));
    }

    public function new()
    {
        return view('products.new');
    }

    public function store(StoreAndUpdateProduct $request)
    {

        $this->product->createProduct(ProductCreateDTO::makeFromRequest($request), $request);

        return redirect()->route('products.index')->with('success', 'Produto cadastrado com sucesso.');;
    }
}
