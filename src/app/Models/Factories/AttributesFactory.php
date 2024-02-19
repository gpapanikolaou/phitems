<?php

namespace App\Models\Factories;

use App\Models\PornstarAttributes;
use Illuminate\Database\Eloquent\Model;

final class AttributesFactory
{

    public static function fromResponse($attributes){
        
        return new PornstarAttributes(
            $attributes['hairColor']??null,
            $attributes['ethnicity']??null,
            $attributes['tattoos']??null,
            $attributes['piercings']??null,
            $attributes['breastSize']??null,
            $attributes['breastType']??null,
            $attributes['gender']??null,
            $attributes['orientation']??null,
            $attributes['age']??null
        );
    }
}

