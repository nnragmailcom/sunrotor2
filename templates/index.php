<div class="items-container">
	<?foreach ( $arData as $key=>$arItem ):?>
		<div class="item">
			<a data-id=<?=$arItem['ID']?> href="/detail/<?=$arItem['ID']?>/"><?=$arItem['NAME']?></a>
		</div>
	<?endforeach;?>
</div>
<a href="/inside/add/">Inside</a>
