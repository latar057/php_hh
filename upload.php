<?php
// Задача №2

// Скрипт проверяющий формат загруженного файла
$allowedExts = array('csv');
$extension = end(explode(".", $_FILES['csv']['name']));
if (!in_array(strtolower($extension), $allowedExts)){
	die('File type error');
}
else{
	if (isset($_FILES['csv'])) {
		$file_name_up = $_FILES['csv']['name'];
		// Чтение CVS файла
		$res = [];
		if (($handle = fopen($file_name_up, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
				$res[] = $data;
			}
			fclose($handle);
		}
		mkdir("upload/");
		// Создание файлов и перемещение в папку upload/
		foreach ($res as $line) {
			$filename = $line[0];
			$filetext = $line[1];
			$f_create = fopen($filename, 'w');
			fwrite($f_create, $filetext);
			fclose($f_create);
			rename($filename, "upload/$filename");
		}
		}
	}
?>
<body>

	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="csv" />
		<input type="submit" />
	</form>

</body>