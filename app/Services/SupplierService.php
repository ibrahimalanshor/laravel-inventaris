<?php 

namespace App\Services;

use App\Repositories\SupplierRepository;

use Yajra\Datatables\Datatables;

class SupplierService {

	protected $supplier;

	public function __construct(SupplierRepository $supplier)
	{
		$this->supplier = $supplier;
	}

	public function storeData(array $data) : Object
	{
		return $this->supplier->create($data);
	}

	public function updateData(int $id, array $data) : Object
	{
		return $this->supplier->update($id, $data);
	}

	public function deleteData(int $id) : Int
	{
		return $this->supplier->delete($id);
	}

	public function countTotal() : Int
	{
		return $this->supplier->count();
	}

	public function getByName() : Object
	{
		return $this->supplier->select(['id', 'name']);
	}

	public function getData() : Object
	{
		return $this->supplier->get();
	}

	public function getDatatables() : Object
	{
		$datatables = Datatables::of($this->supplier->get())
						->addIndexColumn()
						->addColumn('action', '
							<button class="btn btn-success btn-sm" data-action="edit"><i class="fa fa-edit"></i></button>
							<button class="btn btn-danger btn-sm" data-action="delete"><i class="fa fa-trash"></i></button>
						')
						->make();

		return $datatables;
	}

}

 ?>