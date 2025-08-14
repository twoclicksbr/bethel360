<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        if (($request->expectsJson() || $request->is('api/*')) && $e instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'error' => 'Método não permitido para essa rota. Use POST.'
            ], 405);
        }

        if (($request->expectsJson() || $request->is('api/*')) && $e instanceof NotFoundHttpException) {
            return response()->json([
                'error' => 'Rota não encontrada.'
            ], 404);
        }

        return parent::render($request, $e);
    }

    public function register(): void
    {
        $this->renderable(function (\Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => 'Método não permitido para essa rota. Use POST.'
                ], 405);
            }
        });

        $this->renderable(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => 'Rota não encontrada.'
                ], 404);
            }
        });
    }
}
