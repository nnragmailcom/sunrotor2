<?
function redirect($url, $status = '301')
{
	header ('Location: ' . $url, $status);
}
?>
