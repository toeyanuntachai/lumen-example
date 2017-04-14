<?php

namespace App\Transformers;

use App\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{

  public function transform(Product $product)
  {
    return [
    'code' => $product->productCode,
    'name' => $product->productName,
    'line' => $product->productLine,
    'vendor' => $product->productVendor,
    'description' => $product->productDescription,
    'stock' => $product->productQuantity,
    'price' => $product->buyPrice
    ];
  }

}