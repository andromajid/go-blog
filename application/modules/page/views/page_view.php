<div class="maincontent">
<div class="left-mainhead"></div>
<div class="right-mainhead"><h1><span><?php echo $title;?></span></h1></div>
<div class="content-maincontent">
<?php
if($page) echo $page->page_content;
else echo "halaman tidak ditemukan";
?>
</div>
<?php
if($this->uri->rsegment(3) == 1)
{
    widget::run('widget_news_front');
}
?>
</div>