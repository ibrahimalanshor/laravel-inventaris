<?php 

namespace App\Services;

use App\Repositories\StuffRepository;

use Yajra\Datatables\Datatables;

class StuffService {

	protected $stuff;

	public function __construct(StuffRepository $stuff)
	{
		$this->stuff = $stuff;
	}

	public function storeData(array $data) : Object
	{
		return $this->stuff->create($data);
	}

	public function updateData(int $id, array $data) : Object
	{
		return $this->stuff->update($id, $data);
	}

	public function deleteData(int $id) : Int
	{
		return $this->stuff->delete($id);
	}

	public function addStock(array $data) : Object
	{
		$stuff = $this->stuff->find($data['stuff_id']);
		$this->stuff->addStock($stuff, $data['total']);

		return $stuff;
	}

	public function removeStock(array $data) : Object
	{
		$stuff = $this->stuff->find($data['stuff_id']);
		$this->stuff->removeStock($stuff, $data['total']);

		return $stuff;
	}

	public function countTotal() : Int
	{
		return $this->stuff->count();
	}

	public function getOne(int $id) : Object
	{
		return $this->stuff->findOne($id);
	}

	public function getByName() : Object
	{
		return $this->stuff->select(['id', 'name']);
	}

	public function getStock(int $id)
	{
		return $this->stuff->find($id)->value('total');
	}

	public function getDatatables() : Object
	{
		$datatables = Datatables::of($this->stuff->getData())
						->addIndexColumn()
						->addColumn('action', function ($stuff)
						{
							return '
								<a href="'.route('stuff.edit', $stuff->id).'" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
								<a href="'.route('stuff.show', $stuff->id).'" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
								<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
							';
						})
						->make(true);

		return $datatables;
	}

}

 ?>