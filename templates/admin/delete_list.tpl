{* Smarty *}
{block name="css"}
    h2 { display: inline; }
{/block}
{block name="body"}
    <h1>削除する記事を選んで下さい</h1>
    <form action="delete_process.php" method="post">

    {section name=post loop=$posts}
        <input type="checkbox" name="post_id[]" value="{$posts[post]['id']}" id="{$posts[post]['id']}" />
        <label for="{$posts[post]['id']}">{$posts[post]['post_title']}</label>
        <br>
    {/section}
        <input type="submit" value="選択した記事を削除"/>

    </form>
{/block}