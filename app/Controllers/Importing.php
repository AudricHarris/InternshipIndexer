<?php

namespace App\Controllers;

class Importing extends BaseController
{
	public function index(): string
	{
		$path = "/home/wearwqlf/Downloads/CompanyList.csv";
		if ( file_exists($path) == null || fopen($path, "r") === false)
		{
			echo "No file found";
			return "";
		}

		$file = file( $path, FILE_SKIP_EMPTY_LINES);

		$csv = array_map("str_getcsv", $file);
		$keys = array_shift($csv);


		foreach ($csv as $i=>$row) {
			$csv[$i] = array_combine($keys, $row);
		}
		
		var_dump($csv);

		echo "This is a test message\n";
		return view('import_csv');
	}
}
