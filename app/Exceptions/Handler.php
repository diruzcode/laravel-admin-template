<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Foundation\Testing\HttpException;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */

     /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->route('login.form');
    }

    public function render($request, Exception $exception)
    {

      if ($request->wantsJson()) {

          if($exception instanceof \Illuminate\Auth\AuthenticationException ){
            return response()->json(['error' => 'Unauthorized.'], 401);
          }

          if($exception instanceof \Laravel\Passport\Exceptions\MissingScopeException ){
            return response()->json(['error' => 'AccessDenied.'], 403);
          }

          if ($exception instanceof \League\OAuth2\Server\Exception\OAuthServerException && $exception->getCode() == 9) {
            return response()->json(['error' => 'Unauthorized.'], 401);
          }

      }

      if($exception instanceof \Illuminate\Auth\AuthenticationException ){
        return redirect()->route('login.form');
      }

      return parent::render($request, $exception);
    }
}
