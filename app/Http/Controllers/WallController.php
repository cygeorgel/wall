<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Image;

class WallController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function show()
    {
        $screen_v = env('SCREEN_V');

        $screen_h = env('SCREEN_H');

        $pictures = Storage::disk('public')->files();

        foreach ($pictures as $key => $value) {

            if (substr($value, 0, 1) == '.') {

                unset ($pictures[$key]);
            }
        }

        $key = array_rand($pictures);

        $picture = $pictures[$key];

        $picture = Storage::disk('public')->get($picture);

        $image = Image::make($picture);

        $image->resize($screen_v / rand(2, 4), null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $image->save(public_path('images/show.jpg'));

        $height = $image->height();

        $width = $image->width();

        $positions = [];

        $positions['left'] = rand(10, $screen_v / 3 * 2);

        $positions['top'] = rand(10, $screen_h / 3);

        $positions['width'] = rand($screen_v / 3, $screen_v);

        if ($positions['left'] + $width > $screen_v) {

            $positions['left'] = $screen_v - $width;

        }

        if ($positions['top'] + $height > $screen_h) {

            $positions['top'] = $screen_h - $height;

        }

        return view('wall', compact('positions'));

    }
}
