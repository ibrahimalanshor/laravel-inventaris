<?php 

namespace App\Services;

use App\Repositories\ActivityRepository;

class ActivityService {

	protected $activity, $stuff;

	public function __construct(ActivityRepository $activity, StuffService $stuff)
	{
		$this->activity = $activity;
		$this->stuff = $stuff;
	}

	public function storeData(object $data) : Object
	{
		$stock = $data->only('stuff_id', 'total');
		
		if ($data->type === 'masuk') {
			$this->stuff->addStock($stock);
		} else {
			$this->stuff->removeStock($stock);
		}

		return $this->activity->create($data->all());
	}

	public function getDataMasuk() : Object
	{
		return $this->activity->getMasuk();
	}

	public function getDataKeluar() : Object
	{
		return $this->activity->getKeluar();
	}

	public function getReport(object $data) : Object
	{
		$stuff = $this->activity->getReport($data->start_date, $data->end_date, $data->type);

		return $stuff;
	}

	public function getReportPaginate(object $data) : Object
	{
		$stuff = $this->activity->getReportPaginate($data->start_date, $data->end_date, $data->type);

		return $stuff;
	}

}

 ?>