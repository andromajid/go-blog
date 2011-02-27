<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<div id="contentContainer">
  <div id="content">
    <h1>Ubah Password User Administrator</h1>
    <form action="" method="post" name="admin_form" enctype="multipart/form-data">
      <table class="eventAdd" width="100%" cellpadding="3" cellspacing="0" border="0">
        <tr>
          <th colspan="2" style="text-align:left;"><br /><strong>DATA USER ADMINISTRATOR</strong></th>
        </tr>
        <tr>
          <th width="120">Username</th>
          <td><strong><?php echo $user_admin->admin_username; ?></strong></td>
        </tr>
        <tr>
          <th>Grup</th>
          <td><strong><?php echo $user_admin->admin_group_title; ?></strong></td>
        </tr>
        <tr>
          <th colspan="2" style="text-align:left;"><br /><strong>UBAH PASSWORD</strong></th>
        </tr>
        <tr>
          <th width="120">Password Baru</th>
          <td><input type="text" name="admin_password" value="" size="60" /><br /><?php echo form_error('admin_password');?><small>(password minimal 5 karakter)</small></td>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <td><input type="submit" name="edit" value="Simpan" class="button"></td>
        </tr>
      </table>
    </form>
  </div>
</div>