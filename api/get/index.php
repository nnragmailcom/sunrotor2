<?
include $_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php';
if ( !$_POST['is_ajax'] )
{
	redirect301('/404.php');
}
?>
