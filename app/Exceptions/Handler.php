<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
    {
    if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
        return response()->view('errors.404', [], 404);
    } elseif ($exception instanceof \Illuminate\Auth\Access\AuthorizationException) {
        return response()->view('errors.403', [], 403);
    } elseif ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
        return response()->view('errors.404', [], 404);
    } elseif ($exception instanceof \Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException) {
        return response()->view('errors.400', [], 400);
    } elseif ($exception instanceof \Illuminate\Database\QueryException) {
        return response()->view('errors.500', ['exception' => $exception], 500);
    } else {
        return parent::render($request, $exception);
    }
    }
}
