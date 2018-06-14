<h2>{$rubric.header}</h2>

<div>
    {foreach $items as $i}
     <div><a href="/item/{$i.slug}">{$i.header}</a></div>
    {/foreach}
</div>