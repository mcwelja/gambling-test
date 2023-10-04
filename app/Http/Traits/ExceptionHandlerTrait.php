<?php

namespace App\Http\Traits;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

trait ExceptionHandlerTrait
{
    private static int $minimalValidCode = 100;
    private static int $maximalValidCode = 599;

    public function getResponse(Exception $ex): JsonResponse
    {
        $statusCode = $this->isValidStatusCode(
            $ex->getStatusCode()) ?
            $ex->getStatusCode() : JsonResponse::HTTP_INTERNAL_SERVER_ERROR;

        return new JsonResponse($ex->getMessage(), $statusCode);
    }

    public function isValidStatusCode($statusCode): bool
    {
        return $statusCode >= self::$minimalValidCode && $statusCode <= self::$maximalValidCode;
    }
}
