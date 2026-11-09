<?php

namespace App\Controllers;

use Error;

class Importing extends BaseController
{
	public function index(): string
	{
		$open = fopen("/home/wearwqlf/Downloads/CompanyList.csv", "r");
		
		if ($open == null) throw new Error("No file Called that");

		$array = [];
		while (($data = fgetcsv($open, 1000, ",")) !== false)
		{
			$array[] = $data;
		}

		fclose($open);

		var_dump($array);
		echo "This is a test message\n";
		return view('import_csv');
	}
}
