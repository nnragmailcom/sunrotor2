<?
class Reader extends DataPreparer
{
    public function __construct($arData)
    {
        $this->preparedData = $this->prepare($arData);
        return $this;
    }
    public function prepare($arWetData)
    {
        $arPlaceholders = [];
        if ( !isset($arWetData['filter']) )
        {
            file_put_contents( $_SERVER['DOCUMENT_ROOT'] . '/errors.log','Неверно задан фильтр - отсутствует ключ \'filter\'' . "\n",FILE_APPEND );
            return false;
        }
        foreach ( $arWetData['filter'] as $filterKey=>$filterVal )
        {
            //$arPlaceholders[$filterKey]['clear'] = $filterVal;
            //$arPlaceholders['encrypted'][$filterKey] = ':' . md5($filterVal);
            $arPreparedPlaceholders[':' . md5($filterVal)] =  $filterVal;
            $arValues[] = strtoupper($filterKey) . '=' . ':' . md5($filterVal);
        }

        $sSql = 'SELECT * FROM records WHERE ' . implode(' AND ',$arValues);
        $arPrepared =
        [
            'sql' => $sSql,
            //'placeholders' => $arPlaceholders,
            'pplaceholders' => $arPreparedPlaceholders,
        ];

        return $arPrepared;

        /*
            ['filter'=>[
            'id'=>''
            ...
            ]]
        */
    }
}
?>
