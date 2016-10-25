<?include 'templates/header.php'?>
<?include $_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php';?>
<script>
$(function()
{
    $.ajax
	(
		{
			'url' : '/api/get/',
			'type' : 'get',
			'data' :
			{
				'is_ajax' : 'Y',
				'page' : 'index',
			},
			'dataType' : 'html',
			'success' : function (data)
			{
				$('div.container').html(data);

			},
			'error' : function()
			{
				console.log('ajax error');
			}
		}
	);
})

</script>
<?include 'templates/footer.php'?>
