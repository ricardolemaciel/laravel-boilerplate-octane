<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function __construct(User $user);

    public function all(): Collection;
    public function find(): null|User;
    public function create(array $data): User;
    public function update(array $data): bool;
    public function delete(): bool;
}
