<?php

namespace App\Http\Controllers;

use App\Http\Requests\Stuff\CreateStuffRequest;
use App\Http\Requests\Stuff\UpdateStuffRequest;
use App\Services\StuffService;
use App\Services\CategoryService;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class StuffController extends Controller
{

    protected $stuff;

    public function __construct(StuffService $stuff)
    {
        $this->stuff = $stuff;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        return view('stuff.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryService $category) : View
    {
        $categories = $category->getByName();

        return view('stuff.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStuffRequest $request) : RedirectResponse
    {
        $this->stuff->storeData($request->all());

        return redirect('/stuff')->with('success', 'Sukses Menambahkan Barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function show(int $id) : View
    {
        $stuff = $this->stuff->getOne($id);

        return view('stuff.show', compact('stuff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryService $category, int $id) : View
    {
        $categories = $category->getByName();
        $stuff = $this->stuff->getOne($id);

        return view('stuff.edit', compact('stuff', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStuffRequest $request, int $id) : RedirectResponse
    {
        $this->stuff->updateData($id, $request->all());

        return redirect('/stuff')->with('success', 'Sukses Mengeit Barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id) : JsonResponse
    {
        $this->stuff->deleteData($id);

        return response()->json(['success' => 'Sukses Menghapus Barang']);
    }

    // Get Datatables
    public function datatables() : Object
    {
        return $this->stuff->getDatatables();
    }
}
