<?php
//buat sidebar menu
foreach($menu as $x => $value)
{
    $link = ($value['child'])?"#nogo":$value['menu_link'];
    echo '<ul class="select"><li><a href="'.$link.'"><b>'.$value['menu_title'].'</b><!--[if IE 7]><!--></a><div class="select_sub">
                <ul class="sub">';
    foreach($value['child'] as $key => $child)
    {
        echo '<li><a href="'.$child['menu_link'].'">'.$child['menu_title'].'</a></li>';
    }
    echo ' </ul>
            </div></li>
		</ul>
		<div class="nav-divider">&nbsp;</div>';
}
?>