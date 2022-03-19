<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base Repository Constructor
     *
     * @param  Model  $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get the model for the Repository
     *
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @param  array $attributes
     *
     * @return Model
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param  array $filters
     *
     * @return mixed
     */
    public function list(array $filters = [])
    {
        $query = $this->model->query();

        foreach ($filters as $f) {
            $query = $query->orWhere($f['field'], $f['operator'], $f['mask']);
        }

        return $query->get();
    }

    /**
     * @param  mixed $key
     *
     * @return null|Model
     */
    public function find($key)
    {
        return $this->model->find($key);
    }

    /**
     * @param  mixed $key
     *
     * @return Model
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail($key)
    {
        return $this->model->findOrFail($key);
    }

    /**
     * @param  mixed $key
     * @param  array $data
     *
     * @return bool
     */
    public function update($key, array $data): bool
    {
        return $this->findOrFail($key)->update($data);
    }

    /**
     * @param  mixed $key
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function delete($key): bool
    {
        return $this->findOrFail($key)->delete();
    }
}
