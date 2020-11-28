<?php 

namespace App\Services;

use App\Repositories\LoanRepository;

use Yajra\Datatables\Datatables;

class LoanService {

	protected $loan, $stuff;

	public function __construct(LoanRepository $loan, StuffService $stuff)
	{
		$this->loan = $loan;
		$this->stuff = $stuff;
	}

	public function storeData(array $data) : Object
	{
		$this->stuff->removeStock($data);

		return $this->loan->create($data);
	}

	public function updateData(int $id, array $data) : Object
	{
		if ($data['status']) {
			$this->stuff->addStock($data);
		}

		return $this->loan->update($id, $data);
	}

	public function deleteData(int $id, array $data) : Int
	{
		$this->stuff->addStock($data);
		
		return $this->loan->delete($id);
	}

	public function findOne(int $id) : Object
	{
		return $this->loan->find($id, 'stuff');
	}

	public function countTotal() : Int
	{
		return $this->loan->count();
	}

	public function getDatatables() : Object
	{
		$datatables = Datatables::of($this->loan->getData())
						->addIndexColumn()
						->addColumn('action', function ($loan)
						{
							return '
								<a href="'.route('loan.edit', $loan->id).'" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
								<a href="'.route('loan.show', $loan->id).'" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
								<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
							';
						})
						->make(true);

		return $datatables;
	}

}

 ?>