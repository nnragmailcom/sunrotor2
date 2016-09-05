<?
include 'core/includes/header.php';

$testH = new Database;
$testConn = $testH->connect($dbConfig);
$item = new Item();

//тестируем получение
$data = $item->GetByFilter
(
    $testConn,
    [
        'filter'=>
        [
			'logic' => 'and',
            /*'translit_code' => 'sozdano skriptom',*/
        ],
		'sort'=>
		[
			'by' => 'id',
			'direction' => 'asc',
		]
    ]
);
echo "<pre>";
var_dump($data);
echo "</pre>";
//тестируем добавление
$addData =
[
    $testConn,
    'fields'=>
    [
        'id' => 0,
        'name' => 'newnewnew2423423423423',
        'translit_code' => 'sozdano skriptom',
        'preview_text' => 'hello',
        'detail_text' => 'hello hello hello hello hello hello',
        'preview_pic_link' => '/images/hello1.jpg',
        'detail_pic_link' => '/images/hello2.jpg',
        'time' => null
    ]
];
//$item->Add($testConn,$addData);

//тестируем обновление
$updateData =
[
    $testConn,
    'fields'=>
    [
        'id' => 6,
        'name' => '!!!!!uaffaaaauuurreeekkkkerrtttaa!! by script',
        'translit_code' => 'sozdano skriptom',
        'preview_text' => 'hello',
        'detail_text' => 'hello hello hello hello hello hello',
        'preview_pic_link' => '/images/hello1.jpg',
        'detail_pic_link' => '/images/hello2.jpg',
        'time' => null
    ]
];

//$item->Update($testConn,$updateData);

//тестируем удаление
$delData =
[
    $testConn,
    'fields'=>
    [
        'id'=>4,
    ]
];

//$item->Delete($testConn,$delData);
