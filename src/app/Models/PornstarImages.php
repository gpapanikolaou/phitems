<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
readonly class PornstarImages
{
    use HasFactory;

    public function __construct(public ?string $height = null, public ?string $width = null, public ?string $url = null)
    {
    }

    public function saveImage()
    {
        $url = urldecode($this->url);
        $parts = parse_url($this->url);
        $path = $parts['path'];
        $filename = basename($path);
        $directory = storage_path('app/public/images');

    
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $filePath = $directory . '/' . $filename;

        file_put_contents($filePath, file_get_contents($url));
    }
}
