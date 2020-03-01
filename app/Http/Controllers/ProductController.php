<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Resources\ProductCollection as ProductCollection;
use App\Http\Resources\ProductResource as ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ProductCollection
     */
    public function index()
    {
      return new ProductCollection(Product::all());
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return ProductResource
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

}
