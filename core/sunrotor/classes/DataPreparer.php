<?
namespace core\sunrotor\classes;
use core\sunrotor\interfaces;
class DataPreparer implements core\sunrotor\interfaces\Data
{
    public function prepare($obCrud)
    {
        return $obCrud->prepare();
    }
}
?>
