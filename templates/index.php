<?require_once dirname(__DIR__) . '/core/includes/header.php'?>
<?$user = new core\sunrotor\classes\User($dbConfig);?>
<?session_start();?>
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
<?if ( $user->isAuthorized() ):?>
	<a href="/logout/">logout</a>
<?endif?>
