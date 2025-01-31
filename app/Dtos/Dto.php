<?php
declare(strict_types=1);

namespace App\Dtos;

abstract class Dto
{
    public function toArray()
    {
        return get_object_vars($this);
    }
}
