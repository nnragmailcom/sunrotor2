<?
namespace core\sunrotor\classes;

class File
{
	public static $uploadPath = "/uploads/";

	public function generateRandomName($length)
	{
		$fName = '';
		$numbers = range(0,9);
		for ( $i = 0; $i < $length; $i ++ )
		{
			$rnd = rand( 0,count($numbers)-1 );
			$fName .= $numbers[$rnd];
		}

		return $fName;
	}
	public static function getExtensionByMime($mime)
	{
		$mimeTypes = ['image/jpeg','image/gif','image/png'];
		$fileExtensions = ['jpg','gif','png'];
		return str_replace($mimeTypes, $fileExtensions,$mime);
	}
	public static function getClearFileName($name)
	{
		$exploded = explode(".",$name);
		return $exploded['0'];
	}

	public function prepareUploadedFiles($arFiles)
	{
		//Смотрим тип файла
		foreach ( $arFiles as $inputName=>$arFile )
		{
			$fileSize = getimagesize($arFile['tmp_name']);
			$name = $this->generateRandomName(10);
			$ext = self::getExtensionByMime($fileSize['mime']);
			$arPreparedFiles[$inputName]["name"] = $name;
			$arPreparedFiles[$inputName]["tmp_name"] = $arFile["tmp_name"];
			$arPreparedFiles[$inputName]["extension"] = $ext;
			$arPreparedFiles[$inputName]["width"] = $fileSize['0'];
			$arPreparedFiles[$inputName]["height"] = $fileSize['1'];
			$arPreparedFiles[$inputName]["full_name"] = $name . "." . $ext;

		}

		return $arPreparedFiles;
	}

	public function placeUploadedFile($tmpName, $name, $to = "/uploads/" )
	{
		try
		{
			return move_uploaded_file($tmpName, $_SERVER["DOCUMENT_ROOT"] . $to . $name);
		}
		catch(\Exception $e)
		{
			file_put_contents( $_SERVER['DOCUMENT_ROOT'] . '/errors.log',$e->getMessage() . "\n",FILE_APPEND );
			return false;
		}
	}

	public function getUploadPath()
	{
		return self::$uploadPath;
	}



}
?>
