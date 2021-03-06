<?php

namespace App\Exceptions;

use App\Http\Controllers\SharedTraits\ApiBaseResponseTrait;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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

        $this->renderable(function (HttpException $e, $request){

            if($request->expectsJson()){
                return ApiBaseResponseTrait::sendError(
                    'HTTP request error!',
                    [
                        'error_code' => $e->getStatusCode(),
                        'message' => $e->getMessage()
                    ],
                    $e->getStatusCode());
            }
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return ApiBaseResponseTrait::sendError('Unauthorized', [], 401);
        }

        return redirect()->guest($exception->redirectTo() ?? route('login'));
    }


}
