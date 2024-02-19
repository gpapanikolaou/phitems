<?php

namespace App\Exceptions;

use Exception;

final class NotAbleToGetDataException extends Exception
{
    public static function create(string $errorMessage) : self
    {
        return new self(sprintf('There was an error while fetching the data! With message: %s',$errorMessage));
    }
}