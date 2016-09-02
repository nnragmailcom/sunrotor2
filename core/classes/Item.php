<?
class Item
{
    public function GetByFilter($handler, $arData)
    {
        /*$dBase = new Database();
        $h = $dBase->connect([
            'type' => 'mysql',
            'name' => 'sunrotor',
            'host' => '127.0.0.1',
            'user' => 'root',
            'password' => ''
        ]);*/
        $obReader = new Reader($arData);
        return $data = $handler->query($obReader)->fetchAll();
    }
    public function Add($handler, $arData)
    {
        /*$dBase = new Database();
        $h = $dBase->connect([
            'type' => 'mysql',
            'name' => 'sunrotor',
            'host' => '127.0.0.1',
            'user' => 'root',
            'password' => ''
        ]);*/
        $obWriter = new Writer($arData);
        return $data = $handler->query($obWriter);
    }
}
?>
