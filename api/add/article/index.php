<?
include $_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php';

$db = new core\sunrotor\classes\Database();
$connection = $db->connect($dbConfig);
$item = new core\sunrotor\classes\Item();

if ( isset($_POST['action']) && $_POST['action'] == 'add_article' )
{
	$name = $_POST['article_name'];
	$previewTxt = $_POST['article_preview_txt'];
	$detailTxt = $_POST['article_detail_txt'];
	$translitCode = 'temporary_dump_' . $name;
	$previewPic = 'temporary_dump_' . $name . "_ppic";
	$detailPic = 'temporary_dump_' . $name . "_dpic";

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
