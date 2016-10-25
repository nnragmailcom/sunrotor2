<?
//Временно, будем выносить в autoload
/*require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/db.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/core/interfaces/Data.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/core/interfaces/View.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/core/classes/Database.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/core/classes/DataPreparer.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/core/classes/Writer.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/core/classes/Reader.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/core/classes/Item.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/core/classes/Page.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/core/classes/IndexPage.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/core/classes/Router.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/core/classes/DetailPage.php');*/
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/db.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/local/functions/functions.php');

spl_autoload_register(
    function($className)
    {
        $prefix = 'core\\sunrotor\\classes\\';

        $baseDir = $_SERVER["DOCUMENT_ROOT"] . "/core/sunrotor/classes/";
        $len = strlen($prefix);

        //die ($className);
        if ( strncmp($prefix,$className,$len) !== 0 )
        {
            return;
        }
        $relativeClass = substr($className,$len);
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . ".php";
        //die($file);

        if ( file_exists($file) )
        {
            require_once $file;
        }
    }
);
spl_autoload_register(
    function($className)
    {
        $prefix = 'core\\sunrotor\\interfaces\\';

        $baseDir = $_SERVER["DOCUMENT_ROOT"] . "/core/sunrotor/interfaces/";
        $len = strlen($prefix);

        //die ($className);
        if ( strncmp($prefix,$className,$len) !== 0 )
        {
            return;
        }
        $relativeClass = substr($className,$len);
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . ".php";
        //die($file);

        if ( file_exists($file) )
        {
            require_once $file;
        }
    }
);

?>
