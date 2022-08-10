<?php

namespace App\Repositories;

use App\Contracts\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    private $fields = array('*');
    private $conditions = array();
    public function __construct(protected Model $model)
    {
    }

    public function select(...$fields)
    {
        $this->fields = $fields;
        return $this;
    }

    public function where(...$conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }

    public function find($id)
    {
        return $this->model->select($this->fields)->find($id);
    }

    public function all()
    {
        return $this->model->select($this->fields)->where($this->conditions)->get();
    }

    public function store($payload)
    {
        return $this->model->create($payload);
    }

    public function update($id, $attributes)
    {
        $payload = $this->model->find($id);
        if (!is_null($payload)) {
            return tap($payload)->update($attributes);
        }
        return array('message' => 'El id proporcionado no es válido.');
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
