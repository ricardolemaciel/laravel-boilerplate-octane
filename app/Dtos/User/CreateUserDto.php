<?php
declare(strict_types=1);

namespace App\Dtos\User;

use App\Dtos\Dto;

class CreateUserDto extends Dto
{
    public readonly string $name;
    public readonly string $email;
    public readonly string $password;

    public function __construct(object $user) 
    {
        $this->name = strtoupper($user->name);
        $this->email = $user->email;
        $this->password = $user->password;
    }
}
