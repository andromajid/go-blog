<div class="jumplist"><form name="jump" id="jump">
<label>Pilih Album:
<select name="gallert" onchange="MM_jumpMenu('parent',this,0)">
<option>silahkan pilih album....</option>
<?php
$jarum = array(' ',',');
foreach($category as $row)
{
	 echo "<option value=\"".base_url()."gallery/category/".$row->gallery_category_id."/".str_replace($jarum,'-',$row->gallery_category_title)."\">".$row->gallery_category_title."</option>";
}
?>
 </select>
</label>
</form></div>
<div class="maincontent">
<div class="left-mainhead"></div>
<div class="right-mainhead"><h1><span>Gallery <?php echo $this->uri->segment(4,"");?></span></h1></div>
<div id="vlightbox">
<?php
if($picture)
{
    foreach($picture as $row)
    {
        echo "<a class=\"vlightbox\" href=\"".base_url()."upload/images/gallery/".$row['gallery_image']."\" title=\"".$row['gallery_title']."\"><img src=\"".base_url()."upload/images/gallery/thumb_".$row['gallery_image']."\" alt=\"".$row['gallery_title']."\"/></a>";
    }
    echo '<script src="'.$this->config->item("themes_url").'/view/engine/js/visuallightbox.js" type="text/javascript"></script>';
}
?>
</div>
</div>