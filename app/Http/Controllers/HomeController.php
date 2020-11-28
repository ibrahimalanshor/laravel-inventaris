<?php

namespace App\Http\Controllers;

use App\Services\StuffService;
use App\Services\SupplierService;
use App\Services\LoanService;
use App\Services\UserService;
use App\Http\Requests\ChangePasswordRequest;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{

	public function index(StuffService $stuff, SupplierService $supplier, LoanService $loan) : View
	{
		$stuff = $stuff->countTotal();
		$supplier = $supplier->countTotal();
		$loan = $loan->countTotal();

		return view('home', compact('stuff', 'supplier', 'loan'));
	}

	public function changePassword(ChangePasswordRequest $request, UserService $user) : RedirectResponse
	{
		$user->changePassword($request->password);

		return back()->with('success', 'Sukses Mengganti Password');
	}

}
