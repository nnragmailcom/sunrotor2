<?include '../templates/header.php'?>
<script>
$(function()
{
    $.ajax
	(
		{
			'url' : '/api/get/detail.php',
			'type' : 'get',
			'data' :
			{
				'is_ajax' : 'Y',
				'page' : 'detail',
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
<?include '../templates/footer.php'?>
