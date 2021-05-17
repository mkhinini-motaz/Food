<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Http\JsonResponse;

class BaseException extends Exception
{
    protected $message = '';

    /**
     * MediaIdsNotFoundException constructor.
     *
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = '', int $code = 422, Throwable $previous = null)
    {
        if ($message === '') {
            $message = $this->message;
        }

        parent::__construct($message, $code, $previous);
    }

    /**
     * @param  Request
     *
     * @return JsonResponse
     */
    public function render($request)
    {
        return response()->json([ 'message' => $this->message ], $this->code ?? 500);
    }
}
