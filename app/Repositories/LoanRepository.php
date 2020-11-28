<?php 

namespace App\Repositories;

use App\Models\Loan;

class LoanRepository extends Repository {

	public function __construct(Loan $loan)
	{
		$this->model = $loan;
	}

	public function getData() : Object
	{
		return $this->select(['id', 'name', 'total', 'status', 'stuff_id'], 'stuff');
	}

}

 ?>