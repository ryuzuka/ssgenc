<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseRepository implements RepositoryInterface
{
    /** @var Model $model */
    protected $model;
    protected $id_nm;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->id_nm = null;
    }

    public function setIdName($id_nm)
    {
        $this->id_nm = $id_nm;
    }

    /**
     * @return Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param $id
     * @return Model
     */
    public function find($id)
    {
        if (isset($id_nm))
        {
            return $this->model->where($id_nm, $id)->get();
        }

        return $this->model->find($id);
    }

    /**
     * @param array $data
     * @return $this|Model
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data)
    {
        if (isset($id_nm))
        {
            return $this->model->where($id_nm, $id)->update($data);
        }

        return $this->model->find($id)->update($data);
    }

    /**
     * @param $id
     * @return bool|null
     */
    public function delete($id)
    {
        if (isset($id_nm))
        {
            return $this->model->where($id_nm, $id)->delete();
        }

        return $this->model->find($id)->delete();
    }

    public function paginate($perPage = 10)
    {
        return $this->model->paginate($perPage);
    }
} 