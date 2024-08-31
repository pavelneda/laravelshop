<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Resources\Product\IndexProductResource;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();

        $sort = $data['sort'] ?? '';
        $page = $data['page'];
        unset($data['sort'], $data['page']);

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        $filteredProducts = Product::filter($filter);
        if ($sort == 'low to high'){
            $filteredProducts = $filteredProducts->orderBy('price', 'asc');
        }else if($sort == 'high to low'){
            $filteredProducts = $filteredProducts->orderBy('price', 'desc');
        }

        $products = $filteredProducts->paginate(3 , ['*'], 'page', $page);
        return IndexProductResource::collection($products);
    }
}
