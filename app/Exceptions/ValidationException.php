<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

// TODO PASSAR ISSO AQUI PARA O APP HANDLER
class ValidationException extends Exception
{
    public function __construct(protected \Illuminate\Contracts\Validation\Validator $request)
    {
        parent::__construct("");
    }

    /**
     * Report the exception.
     */
    public function report(): void
    {
        Log::info("Informações inválidas.");
    }

    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'message' => "Informações inválidas.",
            'error' => true,
            'infos' => $this->request->errors()
        ], 422);
    }
}
