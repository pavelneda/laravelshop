<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->putFile('images', $data['preview_image']);

        $tags_ids = $data['tags'];
        $colors_ids = $data['colors'];
        $preview_images = $data['preview_images'];
        unset($data['tags'], $data['colors'], $data['preview_images']);


        $product = Product::firstOrCreate([
            'title' => $data['title'],
        ], $data);

        foreach ($tags_ids as $tag_id) {
            ProductTag::firstOrCreate([
               'product_id' => $product->id,
               'tag_id' => $tag_id,
            ]);
        }

        foreach ($colors_ids as $color_id) {
            ProductColor::firstOrCreate([
               'product_id' => $product->id,
               'color_id' => $color_id,
            ]);
        }

        foreach ($preview_images as $preview_image) {
            $currentImagesCount = ProductImage::where('product_id', $product->id)->count();
            if ($currentImagesCount > 3) continue;

            $path = Storage::disk('public')->putFile('images', $preview_image);
            ProductImage::create([
                'product_id' => $product->id,
                'file_path' => $path,
            ]);
        }

        return redirect()->route('product.index');
    }
}
