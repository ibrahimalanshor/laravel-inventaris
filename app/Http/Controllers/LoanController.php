<?php

namespace App\Http\Controllers;

use App\Services\LoanService;
use App\Services\StuffService;
use App\Http\Requests\Loan\CreateLoanRequest;
use App\Http\Requests\Loan\UpdateLoanRequest;
use App\Http\Requests\Loan\DeleteLoanRequest;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoanController extends Controller
{

	protected $loan, $stuff;

	public function __construct(LoanService $loan, StuffService $stuff)
	{
		$this->loan = $loan;
		$this->stuff = $stuff;
	}

	public function index() : View
	{
		return view('loan.index');
	}

	public function create() : View
	{
		$stuffs = $this->stuff->getByName();

		return view('loan.create', compact('stuffs'));
	}

	public function store(CreateLoanRequest $request) : RedirectResponse
	{
		$this->loan->storeData($request->all());

		return redirect('/loan')->with('success', 'Sukses Meminjam');
	}

	public function update(UpdateLoanRequest $request, int $id) : RedirectResponse
	{
		$this->loan->updateData($id, $request->all());

		return redirect('/loan')->with('success', 'Sukses Edit Peminjaman');
	}

	public function destroy(DeleteLoanRequest $request, int $id) : JsonResponse
	{
		$this->loan->deleteData($id, $request->only('stuff_id', 'total'));

		return response()->json(['success' => 'Sukses Menghapus Peminjaman']);
	}

	public function show(int $id) : View
	{
		$loan = $this->loan->findOne($id);

		return view('loan.show', compact('loan'));
	}

	public function edit(int $id) : View
	{
		$stuffs = $this->stuff->getByName();
		$loan = $this->loan->findOne($id);

		return view('loan.edit', compact('loan', 'stuffs'));
	}

	public function datatables() : Object
	{
		return $this->loan->getDatatables();
	}

}
