<?php

namespace App\Models\Factories;

use App\Models\PornstarThumbnails;
use Illuminate\Database\Eloquent\Model;
use App\Models\Thumbnail;

final class ThumbnailFactory
{
    public static function fromResponse(array $response) : PornstarThumbnails
    {
        return new PornstarThumbnails(
            $response['height'],
            $response['width'],
            $response['type'],
            $response['urls'][0],
        );
    }

    /**
     * list<Thumbnail>
     */
    public static function fromResponseArray(array $thumbnails) : array 
    {
        $thumbnailsResult=[];
        foreach($thumbnails as $thumbnail){
            $thumbnailsResult[]=self::fromResponse($thumbnail);
        }
        
        return $thumbnailsResult;
    }

}