<?php 

namespace App\Services;

use App\Models\Site;

class SiteService {

	public function update(string $name) : Object
	{
		$site = Site::first();
		$site->name = $name;
		$site->save();

		return $site;
	}

}

 ?>