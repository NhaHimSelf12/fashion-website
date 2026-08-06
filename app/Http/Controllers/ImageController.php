<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ImageController extends Controller
{
    /**
     * Decode a base64 string and return an image response
     */
    private function serveBase64Image($base64String)
    {
        if (empty($base64String) || !str_starts_with($base64String, 'data:image')) {
            return abort(404);
        }

        // Format: data:image/jpeg;base64,.....
        @list($type, $file_data) = explode(';', $base64String);
        @list(, $extension) = explode('/', $type);
        @list(, $file_data) = explode(',', $file_data);

        $image_data = base64_decode($file_data);
        
        if ($image_data === false) {
            return abort(404);
        }

        // Provide standard mime types
        $mime = 'image/jpeg';
        if ($extension === 'png') $mime = 'image/png';
        elseif ($extension === 'gif') $mime = 'image/gif';
        elseif ($extension === 'webp') $mime = 'image/webp';

        return Response::make($image_data, 200, [
            'Content-Type' => $mime,
            'Cache-Control' => 'public, max-age=31536000, immutable',
        ]);
    }

    public function product($id)
    {
        $product = Product::findOrFail($id);
        return $this->serveBase64Image($product->image);
    }

    public function category($id)
    {
        $category = Category::findOrFail($id);
        return $this->serveBase64Image($category->image);
    }
}
