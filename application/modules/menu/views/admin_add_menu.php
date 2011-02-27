<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 ?>
<div id="contentContainer">
  <div id="content">
    <?php echo validation_errors(); ?>
    <h1>Tambah Menu</h1>
    <form action="" method="post" name="admin_form" enctype="multipart/form-data">
      <table class="eventAdd" width="100%" cellpadding="3" cellspacing="0" border="0">
        <tr>
          <th width="100">Judul</th>
          <td><input type="text" name="menu_title" value="<?php echo set_value('menu_title'); ?>" size="60" /></td>
        </tr>
        <tr>
          <th>Deskripsi</th>
          <td><textarea name="menu_description" cols="57" rows="5"></textarea></td>
        </tr>
        <tr>
          <th>Link</th>
          <td><input type="text" name="menu_link" value="<?php echo set_value('menu_link'); ?>" size="60" /></td>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <td><input type="submit" name="create" value="Simpan" class="button"></td>
        </tr>
      </table>
    </form>
  </div>
</div>