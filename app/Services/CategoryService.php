<?php 

namespace App\Services;

use App\Repositories\CategoryRepository;

use Yajra\Datatables\Datatables;

class CategoryService {

	protected $category;

	public function __construct(CategoryRepository $category)
	{
		$this->category = $category;
	}

	public function storeData(array $data) : Object
	{
		return $this->category->create($data);
	}

	public function updateData(int $id, array $data) : Object
	{
		return $this->category->update($id, $data);
	}

	public function deleteData(int $id) : Int
	{
		return $this->category->delete($id);
	}

	public function getByName() : Object
	{
		return $this->category->get(['id', 'name']);
	}

	public function getDatatables() : Object
	{
		$datatables = Datatables::of($this->category->get())
						->addIndexColumn()
						->addColumn('action', '
							<button class="btn btn-success btn-sm" data-action="edit"><i class="fa fa-edit"></i></button>
							<button class="btn btn-danger btn-sm" data-action="delete"><i class="fa fa-trash"></i></button>
						')
						->make();

		return $datatables;
	}

}

 ?>