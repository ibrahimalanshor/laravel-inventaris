<?php

namespace App\Http\Controllers;

use App\Services\SiteService;
use App\Http\Requests\UpdateSettingRequest;

use Illuminate\Http\RedirectResponse;

class SettingController extends Controller
{

	public function update(UpdateSettingRequest $request, SiteService $site) : RedirectResponse
	{
		$site->update($request->name);

		return back()->with('success', 'Sukses Mengedit Pengaturan');
	}

}
