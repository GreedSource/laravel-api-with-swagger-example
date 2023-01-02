<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface ServiceInterface
{
    public function get();

    public function find(string $id, ?Request $request = null);

    public function store(Request $request);

    public function update(string $id, Request $request);

    public function delete(string $id);
}
