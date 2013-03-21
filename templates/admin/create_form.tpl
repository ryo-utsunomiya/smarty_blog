{* Smarty *}
{block name="body"}
    <form action="create_process.php" method="post">
        <p>
            タイトル:
            <input type="text" name="post_title" value="">
        </p>
        <p>
            記事本文：
            <textarea name="post_content" cols="30" rows="10"></textarea>
        </p>
        <p>
            カテゴリー：
            <select name="category_id" id="">
                    <option value="0" selected>カテゴリー未設定</option>
                {section name=cut loop=$categories}
                    <option value="{$categories[cut]['category_id']}">{$categories[cut]['category_name']}</option>
                {/section}
            </select>
        </p>
        <input type="submit" value="投稿">
    </form>
{/block}