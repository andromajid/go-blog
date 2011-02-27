<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
?>
<div id="contentContainer">
  <div id="content">
    <h1>Tambah User Administrator</h1>
    <form action="" method="post" name="admin_form" enctype="multipart/form-data">
        <table class="eventAdd" width="100%" cellpadding="3" cellspacing="0" border="0">
            <tr>
              <th width="100">Username</th>
              <td><input type="text" name="admin_username" value="" size="60" /> <?php echo form_error('admin_username'); ?></td>
            </tr>
            <tr>
              <th>Grup</th>
              <td>
                <select name="admin_group_id">
                  <?php

                  foreach($row_group as $group)
                  {
                    echo '<option value="'.$group->admin_group_id.'">'.$group->admin_group_title.'</option>';
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <th>Password</th>
              <td><input type="password" name="admin_password" value="" size="60" /><br /><small>(password minimal 5 karakter)</small> <?php echo form_error('admin_password'); ?></td>
            </tr>
            <tr>
              <th>Ulangi Password</th>
              <td><input type="password" name="admin_password2" value="" size="60" /> <?php echo form_error('admin_password2'); ?></td>
            </tr>
            <tr>
              <th>&nbsp;</th>
              <td><input type="submit" name="add" value="Simpan" class="button"></td>
            </tr>
        </table>
    </form>
  </div>
</div>