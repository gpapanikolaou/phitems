<?php

namespace App\Http\Controllers;

use App\Models\Pornstar;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function saveImage(Pornstar $pornstar)
    {
        if ($pornstar->thumbnails) {
            $url = urldecode($pornstar->thumbnails[0]->url);
            $directory = storage_path('app/public/images/pornstars');

            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            $filePath = $directory . '/' . $pornstar->id . '.jpg';

            file_put_contents($filePath, file_get_contents($url));
        }
    }
}
