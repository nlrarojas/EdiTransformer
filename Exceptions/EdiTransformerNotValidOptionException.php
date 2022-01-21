<?php

namespace App\EdiTransformer\Exceptions;

use Exception;
use Throwable;

class EdiTransformerNotValidOptionException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report(): ?bool
    {
        return true;
    }
}
