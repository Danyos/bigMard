<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Models\SliderImage;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;


class SliderImageController extends Controller
{
    public function index()
    {
        return view('Admin.page.slider_images.index', ['sliderImages' => SliderImage::all()]);
    }

    public function create()
    {
        return view('Admin.page.slider_images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|string', // Base64-ն գալիս է որպես string
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
        ]);

        // Base64 -> Ֆայլի վերածում
        $imageData = $request->input('image');
        $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
        $imageData = base64_decode($imageData);

        $filename = time() . '.jpg';
        $destinationPath = public_path('uploads/slider');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        // Պահպանում ենք կոմպրեսված ֆայլը
        file_put_contents($destinationPath . '/' . $filename, $imageData);

        // Պահպանում ենք տվյալները բազայում
        SliderImage::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'uploads/slider/' . $filename,
            'link' => $request->link,
        ]);

        return response()->json(['message' => 'Image uploaded successfully']);
    }
    public function edit(SliderImage $sliderImage)
    {
        return view('Admin.page.slider_images.edit', compact('sliderImage'));
    }

    public function update(Request $request, SliderImage $sliderImage)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            if (File::exists(public_path($sliderImage->image))) {
                File::delete(public_path($sliderImage->image));
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/slider');

            $resizedImage = ImageIntervention::make($image->getRealPath())
                ->resize(1920, 1060, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('jpg', 75);

            $resizedImage->save($destinationPath . '/' . $filename);

            $sliderImage->image = 'uploads/slider/' . $filename;
        }

        $sliderImage->title = $request->title ?? $sliderImage->title;
        $sliderImage->description = $request->description ?? $sliderImage->description;
        $sliderImage->link = $request->link ?? $sliderImage->link;
        $sliderImage->save();

        return redirect()->route('admin.slider-images.index')->with('success', 'Image updated successfully');
    }

    public function destroy(SliderImage $sliderImage)
    {
        if (File::exists(public_path($sliderImage->image))) {
            File::delete(public_path($sliderImage->image));
        }

        $sliderImage->delete();

        return redirect()->route('admin.slider-images.index')->with('success', 'Image deleted successfully');
    }
}
