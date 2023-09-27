<?php

namespace App\Services;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\UserServiceInterface;

class UserService implements UserServiceInterface
{
    public function __construct(private UserRepositoryInterface $repository)
    {
    }

    public function get()
    {
        return response()->json($this->repository->get());
    }

    public function find($id, $request = null)
    {
        $response = $this->repository->select('id')->find($id);
        return response()->json($response);
    }

    public function store($request)
    {
        $payload = $this->repository->store($request->validated());
        return !empty($payload) ? response()->noContent(201) : response()->json(array('message' => 'Algo salio mal.'), 400);
    }

    public function update($id, $request)
    {
        $payload = $request->validated();
        return $this->repository->update($id, $payload);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
