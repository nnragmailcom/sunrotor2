<?

echo 'hello!';

require_once ('config/db.php');
//Временно, в будущем будет заменено автозагрузкой
require_once ('core/classes/Database.php');

$testH = new Database;

$testConn = $testH->connect($dbConfig);
$testGetData = $testConn->query('SELECT * FROM records WHERE ID=1');


/*echo "<pre>";
var_dump($testGetData->fetchAll());
echo "</pre>";*/
