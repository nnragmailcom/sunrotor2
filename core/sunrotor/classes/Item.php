<?
namespace sunrotor\classes;
class Item
{
    public function GetByFilter($handler, $arData)
    {
        $obReader = new Reader($arData);
        return $data = $handler->query($obReader)->fetchAll();
    }
    public function Add($handler, $arData)
    {
        $obWriter = new Writer($arData);
        return $data = $handler->query($obWriter);
    }
    public function Update($handler,$arData)
    {
        $obUpdater = new Writer($arData,'update');
        return $data = $handler->query($obUpdater);
    }
    public function Delete($handler,$arData)
    {
        $obDeleter = new Writer($arData,'delete');
        return $data = $handler->query($obDeleter);
    }
}
?>
