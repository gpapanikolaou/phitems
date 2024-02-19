<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

readonly class Pornstar
{
    public function __construct(
        public string $id,
        public string $name,
        public string $license,
        public string $wlStatus,
        public string $link,
        public ?PornstarAttributes $attributes,
        public ?PornstarStats $stats,
        public array $thumbnails,
        public array $aliases,
    ) {}

}
