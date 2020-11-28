<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{

    protected $user;

    public function __construct(UserService $user)
    {
        $this->middleware('can:isAdmin');
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request) : RedirectResponse
    {
        $this->user->storeData($request);

        return redirect('/user')->with('success', 'Sukses Menambahkan Pengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id) : View
    {
        $user = $this->user->getOne($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id) : View
    {
        $user = $this->user->getOne($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, int $id) : RedirectResponse
    {
        $this->user->updateData($id, $request);

        return redirect('/user')->with('success', 'Sukses Mengedit Pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id) : JsonResponse
    {
        $this->user->deleteData($id);

        return response()->json(['success' => 'Sukses Mengedit Pengguna']);
    }

    // Get Datatables
    public function datatables() : Object
    {
        return $this->user->getDatatables();
    }
}
