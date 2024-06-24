<?php

namespace Src\BoundedContext\Backend\Infrastructure\Traits;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

trait JsonExceptionHandler
{
    public function onJsonException($request, Throwable $exception): JsonResponse
    {
        $errors = [];
        $message = $exception->getMessage();
        $status = Response::HTTP_INTERNAL_SERVER_ERROR; //500;

        if ($exception instanceof ModelNotFoundException) {
            $status = Response::HTTP_NOT_FOUND; // 404;
            $message = "The webpage you're trying to reach can't be found";
        }

        if ($exception instanceof NotFoundHttpException) {
            $status = Response::HTTP_NOT_FOUND; // 404;
            $message = "The webpage you're trying to reach can't be found";
        }

        if ($exception instanceof QueryException) {
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
            $message = "Something has gone wrong on the website's server";
        }

        if ($exception instanceof AuthenticationException) {
            $status = Response::HTTP_UNAUTHORIZED; // 401;
            $message = "The request has not been completed you need valid authentication credentials";
        }

        if ($exception instanceof ValidationException) {
            $errors = $exception->errors();
            $status = $exception->status;
        }

        if ($exception instanceof HttpException) {
            $status = $exception->getStatusCode();
            if ($status === Response::HTTP_NOT_FOUND) $message = "The webpage you're trying to reach can't be found";
        }

        if (empty($errors)){
            $errors['status'] = $status;
            if ($status >= Response::HTTP_CONTINUE) {
                $errors['title'] = Response::$statusTexts[$status];
            }
            if (!empty($message)) {
                $errors['detail'] = $message;
            }
        }
        return response()->json([
            'message' => $message,
            'errors'  => [$errors],
            'links'   => ['self' => config('setting.api_url'), 'doc' => config('setting.docs_url')],
            'jsonapi' => ['version' => config('setting.api_version')],
            'meta' => ['title' => config('setting.app_name')],
        ], $status);
    }
}
