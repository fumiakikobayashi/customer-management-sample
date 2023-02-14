<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;

class Handler extends ExceptionHandler
{
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
     * @param           $request
     * @param Throwable $e
     * @return Response|JsonResponse
     */
    public function render($request, Throwable $e): Response|JsonResponse
    {
        // 通常のユースケースで発生しうるエラー
        if ($e instanceof HttpException) {
            return response()->json([
                'message' => $e->getMessage()
            ], $e->getCode());
        }
        if ($e instanceof UseCaseException) {
            return response()->json([
                'message' => $e->getMessage()
            ], $e->getCode());
        }
        if ($e instanceof DomainException) {
            return response()->json([
                'message' => $e->getMessage()
            ], $e->getCode());
        }

        // 想定外のエラー
        logger()->error('EXECUTE FAILED!');
        logger()->error('Cause by: Unexpected error.', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
        return response()->json([
            'message' => $e->getMessage()
        ], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
    }
}
