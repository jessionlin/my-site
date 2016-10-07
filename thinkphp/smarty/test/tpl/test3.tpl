{*条件句式*}
{if $score gt 90}
优秀
{elseif $score gt 60}
及格
{else}
不及格
{/if}

{*循环句式*}
{section name=article loop=$articlelist max=1}
	{$articlelist[article].title}
	{$articlelist[article].author}
	{$articlelist[article].content}
<br />
{/section}

{foreach item=article from=$articlelist}
	{$article.title}
	{$article.author}
	{$article.content}
<br />
{foreachelse}
当前没有文章
{/foreach}
<br />
{foreach $articlelist as $article}
	{$article.title}
	{$article.author}
	{$article.content}
<br />
{foreachelse}
当前没有文章
{/foreach}