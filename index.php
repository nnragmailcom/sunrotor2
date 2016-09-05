<?include 'templates/header.php'?>
<script>
$(function()
{
	$.ajax
	(
		{
			'url' : '/api/get/',
			'type' : 'post',
			'data' :
			{
				'is_ajax' : 'Y',
				'page' : 'index',
			},
			'dataType' : 'html',
			'success' : function (data)
			{
				$('div.items').html(data);

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
