<?
//classes
spl_autoload_register(
    function($className)
    {
        $prefix = 'core\\sunrotor\\classes\\';

        $baseDir = $_SERVER["DOCUMENT_ROOT"] . "/core/sunrotor/classes/";
        $len = strlen($prefix);
		if ( strncmp($prefix,$className,$len) !== 0 )
        {
            return;
        }
        $relativeClass = substr($className,$len);
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . ".php";
        if ( file_exists($file) )
        {
            require_once $file;
        }
    }
);

//interfaces
spl_autoload_register(
    function($interfaceName)
    {
        $prefix = 'core\\sunrotor\\interfaces\\';

        $baseDir = $_SERVER["DOCUMENT_ROOT"] . "/core/sunrotor/interfaces/";
        $len = strlen($prefix);

        if ( strncmp($prefix,$interfaceName,$len) !== 0 )
        {
			return;
        }
        $relativeClass = substr($interfaceName,$len);
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . ".php";
        if ( file_exists($file) )
        {
            require_once $file;
        }
    }
);
?>
