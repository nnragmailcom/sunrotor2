<?
namespace sunrotor\classes;
class Writer extends DataPreparer
{
    public function __construct($arData, $for = 'add')
    {
        $this->for = $for;
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
            if ( $this->for == 'add' )
            {
                foreach ( $arWetData['fields'] as $key => $fieldVal )
                {
                    $arSqlKeys[] = strtoupper($key);
                    $arPreparedPlaceholders[":" . md5($fieldVal)] = $fieldVal;
                }
                $sSql = 'INSERT INTO records( ' . implode(',',$arSqlKeys) . ') VALUES ( ' . implode(',',array_keys($arPreparedPlaceholders)) . ')';
            }
            elseif ($this->for == 'update')
            {
                if ( !isset($arWetData['fields']['id']) )
                {
                    file_put_contents( $_SERVER['DOCUMENT_ROOT'] . '/errors.log','Неверно заданы данные для Update - отсутствует ключ \'id\'' . "\n",FILE_APPEND );
                    return false;
                }
                foreach ( $arWetData['fields'] as $key => $fieldVal )
                {
                    $arUpdExprs[] = strtoupper($key) . '=' . ":" . md5($fieldVal);
                    $arPreparedPlaceholders[":" . md5($fieldVal)] = $fieldVal;

                }
                $sSql = 'UPDATE records SET ' . implode(',',$arUpdExprs) . ' WHERE ID=' . $arWetData['fields']['id'];
            }
            elseif ( $this->for == 'delete' )
            {
                $sSql = 'DELETE FROM records WHERE ID=' . $arWetData['fields']['id'];

            }

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
