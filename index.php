<?include 'templates/header.php'?>
<script>
$(function()
{
    console.log('!');
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
