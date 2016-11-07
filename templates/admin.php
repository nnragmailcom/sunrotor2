<h1>Service Page</h1>
<form class="admin form" action="/api/add/article/" method="post" enctype="multipart/form-data">
	<label for="article_name">Article name</label> <br>
	<input type="text" name="article_name"/> <br>

	<label for="article_preview_txt">Article preview text</label> <br>
	<textarea name="article_preview_txt" rows="8" cols="40"></textarea> <br>

	<label for="article_detail_txt">Article detail text</label> <br>
	<textarea name="article_detail_txt" rows="8" cols="40"></textarea> <br>



	<label for="article_preview_pic">Article preview pic</label> <br>
	<input type="file" name="article_preview_pic"><br>

	<label for="article_detail_pic">Article detail pic</label> <br>
	<input type="file" name="article_detail_pic"><br>

	<input type="hidden" name="action" value="add_article">
	<input type="submit" value="Save article">
</form>

<?
?>
