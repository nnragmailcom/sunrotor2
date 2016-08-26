<?

echo 'hello!';

require_once ('config/db.php');
//Временно, в будущем будет заменено автозагрузкой
require_once ('core/classes/Database.php');

$testH = new Database;

$testConn = $testH->connect($dbConfig);
/*echo "<pre>";
var_dump($testConn);
echo "</pre>";*/
