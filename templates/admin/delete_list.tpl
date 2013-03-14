{* Smarty *}
{block name="body"}
    <h1>編集する記事を選んで下さい</h1>
    <p>
    {section name=post loop=$posts}
        <h2><a href="edit_form.php?id={$posts[post]['id']}">{$posts[post]['post_title']}</a></h2>
    {/section}
    </p>
{/block}