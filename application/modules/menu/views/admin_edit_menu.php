<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 ?>
<div id="contentContainer">
  <div id="content">
    <?php echo validation_errors(); ?>
    <h1>Edit Menu <?php echo $data_menu->menu_title; ?> </h1>
    <form action="" method="post" name="admin_form" enctype="multipart/form-data">
      <table class="eventAdd" width="100%" cellpadding="3" cellspacing="0" border="0">
        <tr>
          <th width="100">Judul</th>
          <td><input type="text" name="menu_title" value="<?php echo $data_menu->menu_title; ?>" size="60" /></td>
        </tr>
        <tr>
          <th>Deskripsi</th>
          <td><textarea name="menu_description" cols="57" rows="5"><?php echo $data_menu->menu_description?></textarea></td>
        </tr>
        <tr>
          <th>Link</th>
          <td><input type="text" name="menu_link" value="<?php echo $data_menu->menu_link; ?>" size="60" /></td>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <td><input type="submit" name="edit" value="Edit" class="button"></td>
        </tr>
      </table>
    </form>
  </div>
</div>