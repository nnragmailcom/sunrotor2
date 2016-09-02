<?
class Writer extends DataPreparer
{
    public function __construct($arData)
    {
        $this->preparedData = $this->prepare($arData);
    }

    public function prepare($arWetData)
    {
        $arSqlKeys = [];
        if ( !isset($arWetData['fields']) )
        {
            file_put_contents( $_SERVER['DOCUMENT_ROOT'] . '/errors.log','Неверно задан фильтр - отсутствует ключ \'filter\'' . "\n",FILE_APPEND );
            return false;
        }
        else
        {
            foreach ( $arWetData['fields'] as $key => $fieldVal )
            {
                $arSqlKeys[] = strtoupper($key);
                $arPreparedPlaceholders[":" . md5($fieldVal)] = $fieldVal;
            }

            $sSql = 'INSERT INTO records( ' . implode(',',$arSqlKeys) . ') VALUES ( ' . implode(',',array_keys($arPreparedPlaceholders)) . ')';
            var_dump ($sSql);
            $arPrepared =
            [
                'sql' => $sSql,
                'pplaceholders' => $arPreparedPlaceholders,
            ] ;
            return $arPrepared;
        }
    }
}
?>
