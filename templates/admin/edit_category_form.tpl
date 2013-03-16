{* Smarty *}
{block name="body"}
<form action="edit_category_process.php" method="post">
<input type="hidden" name="category_id" value="{$category['category_id']}" />
<p>
タイトル:
<input type="text" name="category_name" value="{$category['category_name']}">
</p>
<input type="submit" value="完了">
</form>
{/block}