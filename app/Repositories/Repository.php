<?php 

namespace App\Repositories;

class Repository {

	public $model;

	public function __construct($model)
	{
		$this->model = $model;
	}

	public function select(array $columns = [], ...$relationship) : Object
	{
		return $this->model->with($relationship)->select($columns)->get();
	}

	public function create(array $data) : Object
	{
		return $this->model->create($data);
	}

	public function update(int $id, array $data) : Object
	{
		$model = $this->model->findOrFail($id);
		$model->update($data);

		return $model;
	}

	public function delete(int $id) : Int
	{
		return $this->model->destroy($id);
	}

	public function find(int $id, ...$relationship) : Object
	{
		return $this->model->with($relationship)->where('id', $id)->firstOrFail();
	}

	public function get() : Object
	{
		return $this->model->get();
	}

	public function getWhere(string $columns, $value, ...$relationship) : Object
	{
		return $this->model->with($relationship)->where($columns, $value)->get();
	}

	public function paginateWhere(string $columns, $value, int $total, ...$relationship) : Object
	{
		return $this->model->with($relationship)->where($columns, $value)->paginate($total);
	}

	public function count() : Int
	{
		return $this->model->count();
	}

}

 ?>