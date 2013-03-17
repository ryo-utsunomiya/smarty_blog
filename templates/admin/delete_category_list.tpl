{* Smarty *}
{block name="css"}
    h2 { display: inline; }
{/block}
{block name="body"}
    <h1>削除するカテゴリーを選んで下さい</h1>
    <form action="delete_category_process.php" method="post">

        {section name=cat loop=$categories}
            <input type="checkbox" name="category_id[]" value="{$categories[cat]['category_id']}" id="{$categories[cat]['category_id']}" />
            <label for="{$categories[cat]['category_id']}">{$categories[cat]['category_name']}</label>
            <br>
        {/section}
        <input type="submit" value="選択したカテゴリーを削除"/>

    </form>
{/block}