<?php
declare(strict_types=1);

namespace Fyre\Http\Exceptions;

use RuntimeException;

/**
 * ResponseException
 */
class ResponseException extends RuntimeException
{
    public static function forInvalidStatusCode(int $code): static
    {
        return new static('Status code must be between 100 and 599: '.$code);
    }
}
