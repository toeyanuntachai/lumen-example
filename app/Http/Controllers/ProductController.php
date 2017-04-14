<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Transformers\ProductTransformer;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Manager as Fractal;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index(Request $request, Fractal $fractal)
    {
        $products = $this->product->all();

        $collection = new Collection($products, new ProductTransformer());

        $data = $fractal->createData($collection)->toArray();

        return response($data);
    }
}
