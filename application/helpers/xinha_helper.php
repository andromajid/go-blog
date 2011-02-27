<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of xinha_helper
 *
 * @author andro
 */
function xinha($textarea = array() , $jenis = "")
{
     $obj =& get_instance();
     $base = $obj->config->item('base_url');
     ob_start();
?>

<script type="text/javascript">
 _editor_url  = "<?php echo $base?>web/addons/xinha/"  // (preferably absolute) URL (including trailing slash) where Xinha is installed
 _editor_lang = "en";   // And the language we need to use in the editor.
 _editor_skin = "blue-look";
</script>

<script type="text/javascript" src="<?=$base?>web/addons/xinha/htmlarea.js"></script>

<script type="text/javascript">
  xinha_editors = null;
  xinha_init = null;
  xinha_config  = null;
  xinha_plugins = null;
  // This contains the names of textareas we will make into Xinha editors
  xinha_init = xinha_init ? xinha_init : function()
  {
 xinha_plugins = xinha_plugins ? xinha_plugins :
 [
 <?php
 if($jenis == "small")
 {
     echo '\'DoubleClick\',
           \'CharCounter\'';
 }
 else
 {
 ?>
  'CharacterMap',
  'ContextMenu',
  'ListType',
  'ImageManager',
  'TableOperations'
<?php
 }
?>
 ];
   // THIS BIT OF JAVASCRIPT LOADS THE PLUGINS, NO TOUCHING  :)
   if(!HTMLArea.loadPlugins(xinha_plugins, xinha_init)) return;
 /** STEP 2 ***************************************************************
  * Now, what are the names of the textareas you will be turning into
  * editors?
  ************************************************************************/
 xinha_editors = xinha_editors ? xinha_editors :
 [

 <?php
   $area='';
   foreach ($textarea as $item)
   {
    $area.= "'$item',";
   }
   $area=substr($area,0,-1);
   echo $area;
 ?>
 ];

   xinha_config = xinha_config ? xinha_config() : new HTMLArea.Config();
    <?php
 if($jenis == "small")
 {
 ?>
     xinha_config.toolbar =
	  [
	      ["createlink","bold","italic","underline","strikethrough","undo","redo"]
	  ];
      xinha_config.formatblock =
      {
          "&mdash; format &mdash;"  : "",
          "Normal"   : "p"
      };
      xinha_config.height = 200;
      xinha_config.width = 400;
      xinha_config.CharCounter =
      {
        'showChar': true,
        'maxHTML' : 250
      };
<?php
 }
else
{
?>
    xinha_config.toolbar =
 [
   ["popupeditor"],
   ["formatblock","fontname","fontsize","bold","italic","underline","strikethrough","linebreak","justifyleft","justifycenter","justifyright","justifyfull","forecolor","hilitecolor"],
   ["subscript","superscript"],
   ["insertorderedlist","insertunorderedlist","outdent","indent"],
   ["inserthorizontalrule","createlink","insertimage","inserttable"],
   ["linebreak","undo","redo","selectall","print"], (Xinha.is_gecko ? [] : ["cut","copy","paste","overwrite","saveas"]),
   ["killword","clearfonts","removeformat","toggleborders","splitblock","lefttoright", "righttoleft"],
   ["htmlmode","showhelp","about"]
 ];
<?php
}
 ?>
    xinha_config.flowToolbars = true;
    xinha_editors   = HTMLArea.makeEditors(xinha_editors, xinha_config, xinha_plugins);

 HTMLArea.startEditors(xinha_editors);
  }
  window.onload = xinha_init;
 </script>
<?php
 $r = ob_get_contents();
 ob_end_clean();
 return $r;
}
?>
