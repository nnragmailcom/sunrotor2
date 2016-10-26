<?
include $_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php';

$curUrl = core\sunrotor\classes\Router::getUrl();
$page = core\sunrotor\classes\Router::getUrlPart($curUrl,  2);

echo "Hello, i'm a service section guard";
echo "<pre>";
var_dump($curUrl);
var_dump($page);
echo "</pre>";
?>
