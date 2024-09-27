<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
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


    /**
     * Write code on Method
     *
     * @return response()
     * @throws Throwable
     */
    public function render($request, Exception|Throwable $e): Response
    {
        if ($e instanceof ModelNotFoundException) {
            return response()->json(null, 404);
        }

        return parent::render($request, $e);
    }

    /**
     * Convert an authentication exception into a response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  AuthenticationException  $exception
     * @return Response
     */
    protected function unauthenticated($request, AuthenticationException $exception): Response
    {
        return $request->expectsJson()
            ? response()->json(['status' => 0, 'errors' => ['Не авторизованное действие!']], 401)
            : redirect()->guest($exception->redirectTo() ?? route('login'));
    }

}
