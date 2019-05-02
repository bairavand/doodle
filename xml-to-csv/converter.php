<?php
	$inputFilePath = "/home/bairu/Music/";
	$outputFileName = "test.csv";
	$outputFilePath = "/home/bairu/Music/".$outputFileName;
	class XmlToCsv {
		public static function convertFile($xmlInputFile, $csvOutputFile) {
			if (file_exists($xmlInputFile)) {
				$xml = simplexml_load_file($xmlInputFile);
				
				$outputFile = fopen($csvOutputFile, 'w');
				
				$header = false;
				
				foreach($xml as $key => $value){
					if(!$header) {
						fputcsv($outputFile, array_keys(get_object_vars($value)));
						$header = true;
					}
					fputcsv($outputFile, get_object_vars($value));
				}
				
				fclose($outputFile);
				return true;
			} else
				echo 'File issue found';
		}
	}

	if (isset($_POST['convertIt'])) {
		$file_name = $_FILES['xml']['name'];
		$file_tmp =$_FILES['xml']['tmp_name'];
		$file_ext=strtolower(end(explode('.',$_FILES['xml']['name'])));
		move_uploaded_file($file_tmp, $inputFilePath.$file_name);
		$status = XmlToCsv::convertFile($inputFilePath.$file_name, $outputFilePath);
		if ($status) {
			header("Content-type: text/csv");
			header("Content-disposition: attachment; filename = ".$outputFileName);
			readfile($outputFilePath);
		}
	} else 
		echo 'Request failed';
?>