<?php

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements EloquentRepositoryInterface
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function findOrFail($id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function findWithTrashed($id): ?Model
    {
        return $this->model->withTrashed()->find($id);
    }

    public function update($id, array $attributes): ?Model
    {
        $model = $this->model->findOrFail($id);
        $model->update($attributes);
        return $model;
    }

    public function delete($id): ?Model
    {
        $model = $this->findOrFail($id);
        $model->delete();
        return $model;
    }

    public function all(): ?Collection
    {
        return $this->model->all();
    }

    public function allWithTrashed(): ?Collection
    {
        return $this->model->withTrashed()->get();
    }

    public function restore($id): ?Model
    {
        $model = $this->findWithTrashed($id);
        $model->restore();
        return $model;
    }

}
