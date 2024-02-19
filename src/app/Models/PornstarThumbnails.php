<?php

namespace App\Models;


readonly class PornstarThumbnails
{
    public function __construct(
        public string $height,
        public string $width,
        public string $type,
        public string $url,
    ) {}
}