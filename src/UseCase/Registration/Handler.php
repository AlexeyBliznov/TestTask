<?php

declare(strict_types=1);

namespace App\UseCase\Registration;

use App\Services\Logger;

class Handler
{
    private Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function handle(Command $command): void
    {
        $users = ['test@gmail.com' => [
            'id' => '4561',
            'name' => 'Alex'
            ],
            'test@test.com' =>[
                'id' => '1437',
                'name' => 'John'
            ]];

        if (array_key_exists($command->email, $users)) {
            throw new \DomainException('User is already exist');
        }

        $this->logger->log($command->firstName, $command->email);

        $users = [$command->email => [
            'id' => uniqid(),
            'name' => $command->firstName
        ]];
    }
}
