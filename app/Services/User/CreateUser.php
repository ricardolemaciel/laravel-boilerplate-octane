<?php

namespace App\Services\User;

use App\Dtos\User\CreateUserDto;
use App\Exceptions\UserException;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CreateUser
{
    public function __construct(
        protected UserRepositoryInterface $userRepository //Property Promotion
    ) {}

    public function execute(CreateUserDto $dto) 
    {
        throw UserException::userNotCreated();
        $this->userRepository->create($dto->toArray());
    }
}
