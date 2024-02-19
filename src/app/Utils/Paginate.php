<?php

namespace App\Utils;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class Paginate
{
    public static function paginate($items, $perPage = 5)
    {
        $total = count($items);
    
        $currentPage = Paginator::resolveCurrentPage() ?: 1;
    
        $offset = ($currentPage * $perPage) - $perPage;
    
        $itemsToShow = array_slice($items, $offset, $perPage);
    
        return new LengthAwarePaginator($itemsToShow, $total, $perPage);
    }
}
