<?php 

namespace App\Services;

use App\Repositories\UserRepository;

use Yajra\Datatables\Datatables;

use Auth;

class UserService {

	protected $user;

	public function __construct(UserRepository $user)
	{
		$this->user = $user;
	}

	public function storeData(object $data) : Object
	{
		$photo = $this->uploadFile($data->file);
		$data->merge([
			'photo' => $photo
		]);

		return $this->user->create($data->all());
	}

	public function updateData(int $id, object $data) : Object
	{
		if ($data->hasFile('file')) {
			$photo = $this->uploadFile($data->file);
			$data->merge([
				'photo' => $photo
			]);
		}

		return $this->user->update($id, $data->all());
	}

	public function deleteData(int $id) : Int
	{
		return $this->user->delete($id);
	}

	public function uploadFile(object $file) : String
	{
		$fileName = $file->getClientOriginalName().'_'.time().'.'.$file->extension();
		$file->storeAs('public/images', $fileName);

		return $fileName;
	}

	public function changePassword(string $password) : Object
	{
		$user = Auth::user();
		$user->password = $password;
		$user->save();

		return $user;
	}

	public function getOne(int $id) : Object
	{
		return $this->user->find($id);
	}

	public function getDatatables() : Object
	{
		$datatables = Datatables::of($this->user->getData())
						->addIndexColumn()
						->addColumn('action', function ($user)
						{
							return '
								<a href="'.route('user.edit', $user->id).'" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
								<a href="'.route('user.show', $user->id).'" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
								<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
							';
						})
						->make(true);

		return $datatables;
	}

}

 ?>