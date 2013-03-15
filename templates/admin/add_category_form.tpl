{* Smarty *}
{block name="body"}
<form action="add_category_process.php" method="post">
<p>
カテゴリー名（50文字以内）
<input type="text" name="category_name" value="" maxlength="50">
</p>
<input type="submit" value="カテゴリー登録">
</form>
{/block}