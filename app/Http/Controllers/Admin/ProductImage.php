<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product\ItemGalleriesModel;
use App\Models\Product\ItemOtherInformate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductImage extends Controller
{


    public function coverImage($id){
        $image=ItemOtherInformate::where('item_id', $id)->first();

        return view('Admin.page.product.image', [
            'id' => $id,
            'image' => $image,
        ]);
    }

    public function carousel($id){
       $images= ItemGalleriesModel::where('item_id', $id)->get();
        return view('Admin.page.product.carousel', [
            'id' => $id,
            'images' => $images,
        ]);
    }
//coverImages

    public function ImageUpload(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|string', // Base64-ն գալիս է որպես string
        ]);

        // Base64 -> Ֆայլի վերածում
        $imageData = preg_replace('/^data:image\/\w+;base64,/', '', $request->input('image'));
        $imageData = base64_decode($imageData);

        if (!$imageData) {
            return response()->json(['error' => 'Invalid image data'], 400);
        }

        $filename = time() . '.jpg';
        $destinationPath = public_path('product/uploads/cover');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        // Պահպանում ենք կոմպրեսված ֆայլը
        file_put_contents($destinationPath . '/' . $filename, $imageData);

        // Պահպանում ենք տվյալները բազայում
        ItemOtherInformate::where('item_id', $id)->update([
            'coverImages' => 'product/uploads/cover/' . $filename,
        ]);

        return response()->json(['message' => 'Image uploaded successfully']);
    }



    public function carouselImageUpload(Request $request, $id)
    {
        $request->validate([
            'images' => 'required|array', // Պահանջվում է զանգված
            'images.*' => 'required|string', // Յուրաքանչյուր նկար Base64 string է
        ]);

        $destinationPath = public_path('product/uploads/carousel');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        foreach ($request->images as $base64Image) {
            // Base64-ը վերածում ենք ֆայլի
            $imageData = preg_replace('/^data:image\/\w+;base64,/', '', $base64Image);
            $imageData = base64_decode($imageData);

            if (!$imageData) {
                return response()->json(['error' => 'Invalid image data'], 400);
            }

            // Ստեղծում ենք ֆայլի անունը (timestamp + random)
            $filename = time() . '_' . uniqid() . '.jpg';
            $filePath = 'product/uploads/carousel/' . $filename;

            // Պահպանում ենք ֆայլը
            file_put_contents(public_path($filePath), $imageData);

            // Յուրաքանչյուր նկարի համար առանձին ավելացում բազայում
            ItemGalleriesModel::create([
                'image_path' => $filePath,
                'item_id' => $id
            ]);
        }

        return response()->json(['message' => 'Images uploaded successfully']);
    }
    public function carouselImageTrash($id)
    {
        $image = ItemGalleriesModel::find($id);

        if ($image) {
            // Ջնջում ենք ֆայլը
            $filePath = public_path($image->image_path);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            // Ջնջում ենք բազայից
            $image->delete();

            return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Image not found'], 404);
    }



}
