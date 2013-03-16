{* Smarty *}
{block name="body"}
    <h1>編集するカテゴリーを選んで下さい</h1>
    <form action="edit_category_form.php" method="get">
        {section name=cat loop=$categories}
            <p>
                <input type="radio" name="category_id" value="{$categories[cat]['category_id']}"
                       id="{$categories[cat]['category_id']}"/>
                <label for="{$categories[cat]['category_id']}">{$categories[cat]['category_name']}</label>
            </p>
        {/section}
        <input type="submit" value="選択"/>
    </form>
{/block}