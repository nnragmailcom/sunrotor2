<?
class Item
{
    public function GetByFilter($arData)
    {
        $dBase = new Database();
        $h = $dBase->connect([
            'type' => 'mysql',
            'name' => 'sunrotor',
            'host' => '127.0.0.1',
            'user' => 'root',
            'password' => ''
        ]);
        $obReader = new Reader($arData);
        return $data = $h->query($obReader)->fetchAll();
    }
}
?>
