<?php 

namespace App\Repositories;

use App\Models\Stuff;

class StuffRepository extends Repository {

	public function __construct(Stuff $stuff)
	{
		$this->model = $stuff;
	}

	public function addStock(object $stuff, int $total) : Object
	{
		$stuff->increment('total', $total);

		return $stuff;
	}

	public function removeStock(object $stuff, int $total) : Object
	{
		$stuff->decrement('total', $total);

		return $stuff;
	}

	public function findOne(int $id) : Object
	{
		return $this->find($id, 'category');
	}

	public function getData() : Object
	{
		return $this->select(['id', 'name', 'condition', 'total']);
	}

}

 ?>