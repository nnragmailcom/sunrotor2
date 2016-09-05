<?
$functions =
[
	'redirect',
];


foreach ( $functions as $functionName )
{
	require_once $functionName.'.php';
}
?>
