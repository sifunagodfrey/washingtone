<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

// -------------------
// JSON Success Response
// -------------------

if (!function_exists('response_success')) {

    function response_success(
        string $message = 'Success',
        $data = [],
        int $status = 200
    ): JsonResponse {

        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ], $status);

    }

}


// -------------------
// JSON Error Response
// -------------------

if (!function_exists('response_error')) {

    function response_error(
        string $message = 'Error',
        $errors = [],
        int $status = 400
    ): JsonResponse {

        return response()->json([
            'status' => false,
            'message' => $message,
            'errors' => $errors
        ], $status);

    }

}


// -------------------
// Redirect Success
// -------------------

if (!function_exists('redirect_success')) {

    function redirect_success(
        string $route,
        string $message = 'Operation completed successfully'
    ): RedirectResponse {

        return redirect()
            ->route($route)
            ->with('success', $message);

    }

}


// -------------------
// Redirect Error
// -------------------

if (!function_exists('redirect_error')) {

    function redirect_error(
        string $route,
        string $message = 'Something went wrong'
    ): RedirectResponse {

        return redirect()
            ->route($route)
            ->with('error', $message);

    }

}