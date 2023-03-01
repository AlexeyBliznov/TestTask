<?php

declare(strict_types=1);

namespace App\UseCase\RegistrationAjax;

class Handler
{
    public function handle(Command $command): void
    {
        $users = ['bliznov96@gmail.com' => [
            'id' => 1,
            'name' => 'Alex'
        ]];
        file_put_contents('../var/users.txt', $command->name . ' = ' . $command->email, FILE_APPEND);
        if (array_key_exists($command->email, $users)) {
            throw new \DomainException('User is already exist');
        }
        $users = [$command->email => [
            'id' => 2,
            'name' => 'Alex'
        ]];

    }
}
