<div class="items-container">
	<?foreach ( $arData as $key=>$arItem ):?>
		<div class="item">
			<a data-id=<?=$arItem['ID']?> href="/detail/<?=$arItem['ID']?>/">
				<img height="200" src="<?=$arItem["PREVIEW_PIC_LINK"]?>" alt="" />
				<?=$arItem['NAME']?>
			</a>
		</div>
	<?endforeach;?>
</div>
<a href="/inside/add/">Inside</a>
