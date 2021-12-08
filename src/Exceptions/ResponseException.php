<?php
declare(strict_types=1);

namespace Fyre\Response\Exceptions;

use
    RunTimeException;

/**
 * ResponseException
 */
class ResponseException extends RunTimeException
{

    public static function forInvalidStatusCode(int $code)
    {
        return new static('Invalid Status Code: '.$code);
    }

}
