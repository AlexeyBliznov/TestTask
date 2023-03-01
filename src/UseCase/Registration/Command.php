<?php

declare(strict_types=1);

namespace App\UseCase\Registration;

use Symfony\Component\Validator\Constraints as Assert;

class Command
{
    #[Assert\NotBlank]
    public string $firstName;
    public string $lastName;
    #[Assert\Email]
    public string $email;
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 6,
        max: 50,
        minMessage: 'Your password must be at least 6 characters long',
        maxMessage: 'Your password cannot be longer than 50 characters',
    )]
    public string $password;
}
