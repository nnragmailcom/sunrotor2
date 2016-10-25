<?
namespace core\sunrotor\classes;
class DataPreparer implements \core\sunrotor\interfaces\Data
{
    public function prepare($obCrud)
    {
        return $obCrud->prepare();
    }
}
?>
