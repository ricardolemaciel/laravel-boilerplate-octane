<?php
declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(User $user) {}

    public function all(): Collection
    {
        return User::all();
    }

    public function find(): null|User
    {
        return User::find(1);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(array $data): bool
    {
        return User::find(1)->update($data);
    }

    public function delete(): bool
    {
        return User::find(1)->delete();
    }
}
