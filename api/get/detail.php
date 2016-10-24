<?
include $_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php';
if ( !$_REQUEST['is_ajax'] )
{
	redirect('/404.php', '404');
}
else
{ 
    $curUrl = Router::getUrl('ref');
    $id = Router::getUrlPart($curUrl,  4);

    $db = new Database();
    $connection = $db->connect($dbConfig);
    $item = new Item();

    $data = $item->GetByFilter
    (
        $connection,
        [
            'filter'=>
            [
                'id'=>$id,
            ]
        ]
    );


    $queryPage = $_REQUEST['page'];

    $className = ucfirst($queryPage) . 'Page';
    if ( !class_exists($className) )
    {
        redirect('/404.php', '404');
    }
    $obView = new $className();
    $page = new Page($obView);
    $page->generate($data);


}
