<?require_once('../../templates/header.php')?>
<?include $_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php';?>
<script>
$(function()
{
    $.ajax
	(
		{
			'url' : '/api/pages/admin/add/',
			'type' : 'get',
			'data' :
			{
				'is_ajax' : 'Y',
				'page' : 'admin',
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
<?require_once('../../templates/footer.php')?>
