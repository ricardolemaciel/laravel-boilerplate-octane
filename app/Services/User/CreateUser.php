<?php

namespace App\Services\User;

use App\Dtos\User\CreateUserDto;
use App\Repositories\Interfaces\UserRepositoryInterface;

class CreateUser
{
    public function __construct(
        protected UserRepositoryInterface $userRepository //Property Promotion
    ) {}

    public function execute(CreateUserDto $dto) 
    {
        $this->userRepository->create($dto->toArray());
    }
}
