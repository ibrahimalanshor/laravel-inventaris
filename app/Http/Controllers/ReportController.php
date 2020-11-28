<?php

namespace App\Http\Controllers;

use App\Services\ActivityService;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use PDF;

class ReportController extends Controller
{

	protected $activity;

	public function __construct(ActivityService $activity)
	{
		$this->activity = $activity;
	}

	public function index() : View
	{
		return view('report.index');
	}

	public function show(Request $request) : View
	{
		$reports = $this->activity->getReportPaginate($request);

		$data = [
			'reports' => $reports,
			'start_date' => $request->start_date,
			'end_date' => $request->end_date,
			'type' => $request->type
		];
		
		return view('report.show', $data);
	}

	public function print(Request $request) : Response
	{
		$reports = $this->activity->getReport($request);

		$data = [
			'reports' => $reports,
			'start_date' => $request->start_date,
			'end_date' => $request->end_date,
			'type' => $request->type
		];

		$pdf = PDF::loadView('report.print', $data);
		return $pdf->download('report.pdf');
	}

}
