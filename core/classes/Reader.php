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

		if ( !isset($arWetData['sort']) )
		{
			$arWetData['sort'] =
			[
				'by' => 'time',
				'direction' => 'desc',
			];
		}
		$arPlaceholders = [];
        if ( !isset($arWetData['filter']) )
        {
            file_put_contents( $_SERVER['DOCUMENT_ROOT'] . '/errors.log','Неверно задан фильтр - отсутствует ключ \'filter\'' . "\n",FILE_APPEND );
            return false;
        }

		if ( !isset($arWetData['filter']['logic']) )
		{
			$arWetData['filter']['logic'] = 'AND';
		}
		else
		{
			if ( !in_array($arWetData['filter']['logic'],['and','or']) )
			{
				file_put_contents( $_SERVER['DOCUMENT_ROOT'] . '/errors.log','Неверно задана логика фильтра' . "\n",FILE_APPEND );
				return false;
			}
		}

		$logic = strtoupper($arWetData['filter']['logic']);
        foreach ( $arWetData['filter'] as $filterKey=>$filterVal )
        {
			if ( $filterKey == 'logic' )
			{
				continue;
			}
			$arPreparedPlaceholders[':' . md5($filterVal)] =  $filterVal;
            $arValues[] = strtoupper($filterKey) . '=' . ':' . md5($filterVal);
        }

		if ( is_array($arValues) && !empty($arValues) )
		{
			$filterString = 'WHERE ' . implode(' ' . $logic . ' ',$arValues);
		}
		else
		{
			$filterString = '';
		}

        $sSql = 'SELECT * FROM records ' . $filterString . ' ORDER BY ' . strtoupper($arWetData['sort']['by']) . ' ' . strtoupper($arWetData['sort']['direction']);
		echo $sSql;
		$arPrepared =
        [
            'sql' => $sSql,
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
