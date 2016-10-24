<?
namespace sunrotor\classes;
class DataPreparer implements Data
{
    public function prepare($obCrud)
    {
        return $obCrud->prepare();
    }
}
?>
