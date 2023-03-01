<?php

declare(strict_types=1);

namespace App\Services;

class Logger
{
    private string $logFilePath;

    public function __construct(string $logFilePath)
    {
        $this->logFilePath = $logFilePath;
    }

    public function log(string $name,string $email): void
    {
        $date = new \DateTimeImmutable();
        file_put_contents($this->logFilePath,
            $date->format('Y-m-d H:i:s') . "- user " . $name . " successfully registered with email " . $email . PHP_EOL,
            FILE_APPEND);
    }
}
