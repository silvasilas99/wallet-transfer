<?php

namespace App\Core\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\App;

class Repository implements RepositoryInterface
{
    protected $model;
    protected $modelInterface;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->modelInterface = $this->mountAndReturnModelInterface();
    }

    /**
     * Get all data and return all data
     *
     * @return array
     */
    public function all()
    {
        return $this->modelInterface->all();
    }

    /**
     * Search by ID, then return item - if exists.
     *
     * @param string $id
     *
     * @return mixed
     */
    public function findById(string $id)
    {
        return $this->checkItemByIdAndReturnIfExists($id);
    }

    /**
     * Insert item in the database, then return the item
     *
     * @param array $data
     *
     * @return mixed $newItem
     */
    public function insert(array $data)
    {
        $this->beforeInsert($data);

        $newItem = $this->modelInterface->create($data);

        return $newItem;
    }

    /**
     * Update item on database, if exists. Then, return true if the item was updated or false if not.
     *
     * @param string $id
     * @param array $data
     *
     * @return bool
     */
    public function update(string $id, array $data)
    {
        $model = $this->checkItemByIdAndReturnIfExists($id);

        $this->beforeUpdate($data, $model);

        if ($model !== null) {
            $model->update($data);
            return true;
        }

        return false;
    }

    /**
     * Execute actions before insert item on database
     *
     * @param array $data
     *
     * @return boolean
     */
    protected function beforeInsert(array $data)
    {
        return true;
    }

    /**
     * Execute actions before update item on database
     *
     * @param array $data
     * @param Model $model
     *
     * @return boolean
     */
    protected function beforeUpdate(array $data, Model $model)
    {
        return true;
    }

    protected function mountAndReturnModelInterface()
    {
        $model = clone $this->model;
        return App::make($model::class);
    }

    /**
     * Search item by $id, then return the $item, or throw ModelNotFoundException
     *
     * @param string $id
     *
     * @return mixed $item
     */
    protected function checkItemByIdAndReturnIfExists(string $id)
    {
        $item = $this->modelInterface->find($id);
        if ($item === null) {
            throw new ModelNotFoundException("Item not found", 404);
        }
        return $item;
    }
}
