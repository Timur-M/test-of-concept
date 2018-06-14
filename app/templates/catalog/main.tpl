<h2>Catalog</h2>
<div>
    {foreach $rubrics as $r}
     <div><a href="/catalog/{$r.slug}">{$r.header}</a></div>
    {/foreach}
</div>