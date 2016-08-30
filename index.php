<?

echo 'hello!';

require_once ('config/db.php');
//Временно, в будущем будет заменено автозагрузкой
require_once ('core/interfaces/Data.php');

require_once ('core/classes/Database.php');
require_once ('core/classes/DataPreparer.php');
require_once ('core/classes/Writer.php');
require_once ('core/classes/Reader.php');
require_once ('core/classes/Item.php');

$testH = new Database;

$testConn = $testH->connect($dbConfig);
$testGetData = $testConn->query('SELECT * FROM records WHERE ID=1');
$testPreparer = new Reader(
    [
        'filter'=>
        [
            'id'=>'3',
            'name'=>'test',
        ]
    ]
);

echo "<pre>";
var_dump($testPreparer);
echo "</pre>";

echo "==================== <br />";
$item = new Item();
$data = $item->GetByFilter
(
    [
        'filter'=>
        [
            //'id' => '1',
            'translit_code' => 'supertest_code',
        ]
    ]
);
echo "<pre>";
var_dump($data);
echo "</pre>";
