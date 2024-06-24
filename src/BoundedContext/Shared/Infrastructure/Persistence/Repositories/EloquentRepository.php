<?php

namespace Src\BoundedContext\Shared\Infrastructure\Persistence\Repositories;

use Src\BoundedContext\Shared\Domain\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Src\BoundedContext\Shared\Infrastructure\Exceptions\ModelNotDefinedException;

abstract class EloquentRepository implements RepositoryInterface
{
    protected Model $model;
    protected string $routeKeyName = 'id';
    public function __construct()
    {
        $this->model = $this->getModelClass();
    }

    protected function getModelClass()
    {
        if (!method_exists($this, 'setModel')) {
            throw new ModelNotDefinedException;
        }
        return app()->make($this->setModel());
    }

    /**
     * Set the FQN of the Model class, example: User::class
     * @return string $model
     */
    abstract public function setModel(): string;

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function find(int|string $id)
    {
        // TODO: Implement find() method.
    }

    public function findWithParams(int|string $id)
    {
        // TODO: Implement findWithParams() method.
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update(int|string $id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(int|string $id)
    {
        // TODO: Implement delete() method.
    }
}
