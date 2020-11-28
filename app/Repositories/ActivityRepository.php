<?php 

namespace App\Repositories;

use App\Models\Activity;

class ActivityRepository extends Repository {

	public function __construct(Activity $activity)
	{
		$this->model = $activity;
	}

	public function getMasuk() : Object
	{
		return $this->paginateWhere('type', 'masuk', 5, 'stuff', 'supplier');
	}

	public function getKeluar() : Object
	{
		return $this->paginateWhere('type', 'keluar', 5, 'stuff', 'supplier');
	}

	public function getReport($start = null, $end = null, string $type = null) : Object
	{
		$activity = $this->model->whereType($type)
								->whereBetween('created_at', [$start, $end])
								->with(['stuff', 'supplier'])
								->get();
		return $activity;
	}

	public function getReportPaginate($start = null, $end = null, string $type = null) : Object
	{
		$activity = $this->model->whereType($type)
								->whereBetween('created_at', [$start, $end])
								->with(['stuff', 'supplier'])
								->paginate(8);
		return $activity;
	}

}

 ?>