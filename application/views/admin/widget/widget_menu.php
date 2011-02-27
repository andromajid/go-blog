<?php
//buat sidebar menu
foreach($menu as $x => $value)
{
    if($value['child'])
    {
         echo "<tr><th><img src=\"". $this->config->item("themes_url")."/admin/images/info.gif\" border=\"0\"></th><td colspan=\"2\">".$value['menu_title']."</td></tr>";
    }
    else
    {
        echo "<tr><th><a class='userLink' href='".$value['menu_link']."'><img src='". $this->config->item("themes_url")."/admin/images/info.gif' border='0'></a></th><td colspan='2'><a class='userLink' href='".base_url().$value['menu_link']."'>".$value['menu_title']."</a></td></tr>";
    }
    foreach($value['child'] as $key => $child)
    {
        echo "<tr><th>&nbsp;</th><td width='20'><a class='subLink' href='".$child['menu_link']."'><img src='".$this->config->item("themes_url")."/admin/images/right.gif' border='0'></a></td><td><a class='subLink' href='".base_url().$child['menu_link']."'>".$child['menu_title']."</a></td></tr>";
    }
}
?>
