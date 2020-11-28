<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{

    protected $category;

    public function __construct(CategoryService $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        return view('category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request) : RedirectResponse
    {
        $this->category->storeData($request->all());

        return redirect('category')->with('success', 'Success Menambahkan Kategori');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id) : JsonResponse
    {
        $this->category->updateData($id, $request->all());

        return response()->json(['success' => 'Success Edit Data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) : JsonResponse
    {
        $this->category->deleteData($id);

        return response()->json(['success' => 'Success Hapus Data']);
    }

    // Get Datatables
    public function datatables() : Object
    {
        return $this->category->getDatatables();
    }
}
