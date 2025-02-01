<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserException
{
    public static function userAlreadyExists(): Exception
    {
        throw new BadRequestHttpException("User already exists. Teste novamente blabalakbalabalabalabalqabal nosso server deu pau aqui nos ajude");
    }

    public static function userNotFound(): Exception
    {
        throw new NotFoundHttpException("User not found.");
    }

    public static function userNotCreated(): Exception
    {
        throw new BadRequestHttpException("User not created.");
    }
}
