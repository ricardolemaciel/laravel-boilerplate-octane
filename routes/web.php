<?php

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Route;

Route::get('/', function (UserRepositoryInterface $userRepository) {
    User::find(1);
});
