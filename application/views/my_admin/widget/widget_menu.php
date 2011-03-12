<ul>
<?php
//buat sidebar menu
foreach($menu as $x => $value)
{
    $x = 0;
    if($value['child'])
    {
         echo "<li><h3><a href=\"#\" class=\"house\">".$value['menu_title']."</a></h3><ul>";
         $total = count($value['child']);
    }
    else
    {
        echo "<li><h3><a href=\"".base_url().$value['menu_link']."\" class=\"house\">".$value['menu_title']."</a></h3></li>";
        //echo "<tr><th><a class='userLink' href='".$value['menu_link']."'><img src='". $this->config->item("themes_url")."/admin/images/info.gif' border='0'></a></th><td colspan='2'><a class='userLink' href='".base_url().$value['menu_link']."'>".$value['menu_title']."</a></td></tr>";
    }
    foreach($value['child'] as $key => $child)
    {
      echo " <li><a href=\"".base_url().$child['menu_link']."\" class=\"manage_page\">".$child['menu_title']."</a></li>";
        //echo "<tr><th>&nbsp;</th><td width='20'><a class='subLink' href='".$child['menu_link']."'><img src='".$this->config->item("themes_url")."/admin/images/right.gif' border='0'></a></td><td><a class='subLink' href='".base_url().$child['menu_link']."'>".$child['menu_title']."</a></td></tr>";
      $x++;
      if($total == $x) echo "</ul>";
    }
}
?>
</ul>