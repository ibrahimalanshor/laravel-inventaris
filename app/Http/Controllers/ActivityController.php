<?php

namespace App\Http\Controllers;

use App\Services\StuffService;
use App\Services\SupplierService;
use App\Services\ActivityService;
use App\Http\Requests\Activity\CreateActivityRequest;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ActivityController extends Controller
{

	protected $activity, $stuff;

	public function __construct(ActivityService $activity, StuffService $stuff)
	{
		$this->activity = $activity;
		$this->stuff = $stuff;
	}

	public function add(SupplierService $supplier)
	{
		$stuffs = $this->stuff->getByName();
		$suppliers = $supplier->getByName();
		$activities = $this->activity->getDataMasuk();

		return view('activity.add', compact('stuffs', 'suppliers', 'activities'));
	}

	public function remove(SupplierService $supplier)
	{
		$stuffs = $this->stuff->getByName();
		$suppliers = $supplier->getByName();
		$activities = $this->activity->getDataKeluar();

		return view('activity.remove', compact('stuffs', 'suppliers', 'activities'));
	}

	public function store(CreateActivityRequest $request) : RedirectResponse
	{
		$activity = $this->activity->storeData($request);

		return back()->with('success', 'Sukses Mengedit Barang');
	}

}
