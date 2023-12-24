<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

  /**
     * Display all products
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $products = Product::latest()->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show form for creating product
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('products.create');
    }

    /**
     * Store a newly created product
     * 
     * @param Product $product
     * @param StoreProductRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product, StoreProductRequest $request) 
    {
        $product->create($request->validated());

        return redirect()->route('products.index')
            ->withSuccess(__('Product created successfully.'));
    }

    /**
     * Show product data
     * 
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(int $id) 
    {
        $product = Product::find($id);
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Edit product data
     * 
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id) 
    {
        $product = Product::find($id);
        return view('products.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update product data
     * 
     * @param int $id
     * @param UpdateProductRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, UpdateProductRequest $request) 
    {
        $product = Product::find($id);
        $product->update($request->validated());

        return redirect()->route('products.index')
            ->withSuccess(__('Product updated successfully.'));
    }

    /**
     * Delete product data
     * 
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id) 
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index')
            ->withSuccess(__('Product deleted successfully.'));
    }
}
