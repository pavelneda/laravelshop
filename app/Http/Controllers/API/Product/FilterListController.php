<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;

class FilterListController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $colors = Color::all();
        $minPrice = Product::min('price');
        $maxPrice = Product::max('price');

        return [
            'categories' => $categories,
            'tags' => $tags,
            'colors' => $colors,
            'price' => [
                'min' => $minPrice,
                'max' => $maxPrice
            ]
        ];
    }
}
