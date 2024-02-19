<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

readonly class PornstarAttributes
{
    public function __construct(
        public ?string $hairColor,
        public ?string $ethnicity,
        public ?bool $tattoos,
        public ?bool $piercings,
        public ?int $breastSize,
        public ?string $breastType,
        public ?string $gender,
        public ?string $orientation,
        public ?int $age 
    ) {}
}