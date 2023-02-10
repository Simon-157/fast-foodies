<?php

class ErrorHandler
{
    public static function handleException(Throwable $exception): void
    {
        http_response_code(500);
        echo json_encode([
            "code" => $exception->getCode(),
            "file" => $exception->getFile(),
            "line" => $exception->getLine(),
            "message" => $exception->getMessage(),

        ]);
    }

    public static function handleError(int $errorno, string $errorstr, string $errorfile, int $errorline): bool
    {
        throw new ErrorException(
            $errorstr,
            0,
            $errorno,
            $errorfile,
            $errorline
        );
    }
}
