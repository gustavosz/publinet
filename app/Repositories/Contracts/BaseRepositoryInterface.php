<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface BaseRepositoryInterface
{
    /**
     * Get the model for the Repository
     *
     * @return Model
     */
    public function getModel(): Model;

    /**
     * @param  array $attributes
     *
     * @return Model
     */
    public function create(array $attributes);

    /**
     * @param  array $filters
     *
     * @return mixed
     */
    public function list(array $filters = []);

    /**
     * @param  mixed $key
     *
     * @return null|Model
     */
    public function find($key);

    /**
     * @param  mixed $key
     *
     * @return Model
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail($key);

    /**
     * @param  mixed $key
     * @param  array $data
     *
     * @return bool
     */
    public function update($key, array $data): bool;

    /**
     * @param  mixed $key
     * @return bool
     *
     * @throws \Exception
     */
    public function delete($key): bool;
}
