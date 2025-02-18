<?php

namespace App\Http\Controllers\User;

use App\Dtos\User\CreateUserDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Services\User\CreateUser;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/user",
     *     summary="Teste",
     *     tags={"user"},
     *     @OA\Response(response=200, description="Sucesso"),
     *     @OA\Response(response=401, description="Não autorizado")
     * )
     */
    public function index()
    {
        return "Hello World";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request, CreateUser $createUser)
    {
        $createUser->execute(
            new CreateUserDto(
                (object) $request->all()
            )
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
