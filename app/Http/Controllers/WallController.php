<?php

namespace App\Http\Controllers;

class WallController extends Controller
{
    public function show()
    {
        $random = sprintf('%02d', rand(1, 7));

        $picture = 'picture' . $random . '.jpg';

        $screen_v = env('SCREEN_V');

        $screen_h = env('SCREEN_H');

        $positions = [];

        $positions['left'] = rand(10, $screen_v / 3 * 2);

        $positions['top'] = rand(10, $screen_h / 3 * 2);

        $positions['width'] = rand($screen_v / 1.5, $screen_v);

        if ($positions['width'] > $screen_v - $positions['width']) {

            $positions['width'] = $screen_v - $positions['width'];

        }

        return view('wall', compact('picture', 'positions'));

    }
}
