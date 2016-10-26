<?
include $_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php';

$db = new core\sunrotor\classes\Database();
$connection = $db->connect($dbConfig);
$item = new core\sunrotor\classes\Item();
$file = new core\sunrotor\classes\File();

if ( isset($_POST['action']) && $_POST['action'] == 'add_article' )
{
	echo "<pre>";
	var_dump($_POST);
	echo "files:";
	var_dump($_FILES);
	//die();
	echo "</pre>";
	$arFiles = $_FILES;
	$arPreparedFiles = $file->prepareUploadedFiles($arFiles);
	foreach ( $arPreparedFiles as $fieldName=>$arFile )
	{
		$file->placeUploadedFile($arFile["tmp_name"], $arFile["full_name"]);
	}

	$name = $_POST['article_name'];
	$previewTxt = $_POST['article_preview_txt'];
	$detailTxt = $_POST['article_detail_txt'];
	$translitCode = 'temporary_dump_' . $name;
	$previewPic = $file::uploadPath . $arPreparedFiles["article_preview_pic"]["full_name"];
	$detailPic = $file::uploadPath . $arPreparedFiles["article_detail_pic"]["full_name"];

	$arAddFields =
	[
		"fields"=>
		[
			"name" => $name,
			"translit_code" => $translitCode,
			"preview_text" => $previewTxt,
			"detail_text" => $detailTxt,
			"preview_pic_link" => $previewPic,
			"detail_pic_link" => $detailPic,
		]
	];
}

$isAdd = $item->Add($connection, $arAddFields);
redirect("/");
?>
