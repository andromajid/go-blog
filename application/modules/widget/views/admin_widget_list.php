<style type="text/css">
	.connect { width: 170px; float: left; padding-bottom: 100px; }
	.portlet { margin: 0 1em 1em 0; }
	.portlet-header { margin: 0.3em; padding-bottom: 4px; padding-left: 0.2em; }
	.portlet-header .ui-icon { float: right; }
	.portlet-content { padding: 0.4em; }
	.ui-sortable-placeholder { border: 1px dotted black; visibility: visible !important; height: 50px !important; }
	.ui-sortable-placeholder * { visibility: hidden; }
</style>
<table border="0" cellspacing="1" cellpadding="2">
    <tr>
        <th class="eventHeader">Sidebar Kiri</th>
        <th class="eventHeader">Widget Yang tidak aktif</th>
        <th class="eventHeader">Sidebar Kanan</th>
    </tr>
<?php
if($widget)
{
    $kiri = "";
    $tengah = "";
    $kanan = "";
    foreach($widget as $row)
    {
        if($row['widget_location'] == "left" && $row['widget_is_active'] == '1')
        {
            $kiri .= "<div class=\"portlet\" name=\"{$row['widget_name']}\" primary=\"{$row['widget_id']}\">
                      <div class=\"portlet-header\">{$row['widget_title']}</div>
                      <div class=\"portlet-content\" name=\"{$row['widget_name']}\" primary=\"{$row['widget_id']}\">{$row['widget_description']}<button class=\"click\" isi=\"{$row['widget_id']}\" title=\"{$row['widget_title']}\">edit</button></div>
                       </div>";
        }
        elseif($row['widget_is_active'] == '0')
        {
            $tengah .= "<div class=\"portlet\" name=\"{$row['widget_name']}\" primary=\"{$row['widget_id']}\">
                      <div class=\"portlet-header\">{$row['widget_title']}</div>
                      <div class=\"portlet-content\" name=\"{$row['widget_name']}\" primary=\"{$row['widget_id']}\">{$row['widget_description']}<button class=\"click\" isi=\"{$row['widget_id']}\" title=\"{$row['widget_title']}\">edit</button></div>
                       </div>";
        }
        elseif($row['widget_location'] == "right" && $row['widget_is_active'] == '1')
        {
            $kanan .= "<div class=\"portlet\" name=\"{$row['widget_name']}\" primary=\"{$row['widget_id']}\">
                      <div class=\"portlet-header\">{$row['widget_title']}</div>
                      <div class=\"portlet-content\" name=\"{$row['widget_name']}\" primary=\"{$row['widget_id']}\">{$row['widget_description']}<button class=\"click\" isi=\"{$row['widget_id']}\" title=\"{$row['widget_title']}\">edit</button></div>
                       </div>";
        }
    }
?>
    <tr class="eventList">
        <td class="kiri"><div class="connect" tempat="left"><?php echo $kiri;?></div></td>
        <td class="tengah"><div class="connect" tempat="middle"><?php echo $tengah;?></div></td>
        <td class="kanan"><div class="connect" tempat="right"><?php echo $kanan;?></div></td>
    </tr>
<?php
}
?>
</table>
<div id="tulis"></div>
<div id="dialog" title="Basic dialog">
</div>