<?php 

namespace App\Repositories;

use App\Models\Supplier;

class SupplierRepository extends Repository {

	public function __construct(Supplier $supplier)
	{
		$this->model = $supplier;
	}

}

 ?>