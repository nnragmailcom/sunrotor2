<?include 'templates/header.php'?>
<?echo "<pre>";
var_dump($_SERVER);
echo "</pre>"; die()?>

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
