<style>
.tempat{
width: 100%;
background-color:grey;
}
.left{
    float: left;
    height: 50px;
    background-color: red;
}
.middle{
    float: left;
    height: 50px;
    background-color: yellow;
}
.right{
    float: left;
    height: 50px;
    background-color: green;
}
</style>
<style type="text/css">
	.connect { width: 170px; float: left; padding-bottom: 100px; }
	.portlet { margin: 0 1em 1em 0; }
	.portlet-header { margin: 0.3em; padding-bottom: 4px; padding-left: 0.2em; }
	.portlet-header .ui-icon { float: right; }
	.portlet-content { padding: 0.4em; }
	.ui-sortable-placeholder { border: 1px dotted black; visibility: visible !important; height: 50px !important; }
	.ui-sortable-placeholder * { visibility: hidden; }
	</style>
<?php
if($widget)
{
?>
<div class="tempat">
    <div>
        <div class="left connect" tempat="left">
        <?php
        foreach($widget as $left)
        {
            if($left['widget_location'] == "left" && $left['widget_is_active'] == '1')
            {
                echo "<div class=\"portlet\" name=\"{$left['widget_name']}\" primary=\"{$left['widget_id']}\">";
                echo "<div class=\"portlet-header\">{$left['widget_title']}</div>";
                echo "<div class=\"portlet-content\" name=\"{$left['widget_name']}\" primary=\"{$left['widget_id']}\">{$left['widget_description']}</div>";
                echo "</div>";
            }
        }
        ?>
        </div>
    </div>
    <div>
        <div class="middle connect" tempat="middle">
        <?php
        foreach($widget as $middle)
        {
            if($middle['widget_is_active'] == '0')
            {
                echo "<div class=\"portlet\" name=\"{$middle['widget_name']}\" primary=\"{$middle['widget_id']}\">";
                echo "<div class=\"portlet-header\">{$middle['widget_title']}</div>";
                echo "<div class=\"portlet-content\" name=\"{$middle['widget_name']}\"  primary=\"{$middle['widget_id']}\">{$middle['widget_description']}</div>";
                echo "</div>";
            }
        }
        ?>
        </div>
    </div>
    <div>
        <div class="right connect" tempat="right">
        <?php
        foreach($widget as $right)
        {
            if($right['widget_location'] == "right" && $right['widget_is_active'] == '1')
            {
                echo "<div class=\"portlet\"  name=\"{$right['widget_name']}\" primary=\"{$right['widget_id']}\">";
                echo "<div class=\"portlet-header\">{$right['widget_title']}</div>";
                echo "<div class=\"portlet-content\">{$right['widget_description']}</div>";
                echo "</div>";
            }
        }
        ?>
        </div>
    </div>
</div>
<?php
}
?>
<div id="tulis"></div>