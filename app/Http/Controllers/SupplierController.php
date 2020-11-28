<?php

namespace App\Http\Controllers;

use App\Services\SupplierService;
use App\Http\Requests\Supplier\CreateSupplierRequest;
use App\Http\Requests\Supplier\UpdateSupplierRequest;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use PDF;

class SupplierController extends Controller
{

    protected $supplier;

    public function __construct(SupplierService $supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        return view('supplier.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSupplierRequest $request) : RedirectResponse
    {
        $this->supplier->storeData($request->all());

        return redirect('supplier')->with('success', 'Sukses Menambahkan Supplier');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierRequest $request, int $id) : JsonResponse
    {
        $this->supplier->updateData($id, $request->all());

        return response()->json(['success' => 'Sukses Mengedit Data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id) : JsonResponse
    {
        $this->supplier->deleteData($id);

        return response()->json(['success' => 'Sukses Menghapus Data']);
    }

    // Print
    public function print() : Response
    {
        $suppliers = $this->supplier->getData();
        $pdf = PDF::loadView('supplier.print', compact('suppliers'));
        return $pdf->download('supplier.pdf');
    }

    // Get Datatables
    public function datatables() : Object
    {
        return $this->supplier->getDatatables();
    }
}
