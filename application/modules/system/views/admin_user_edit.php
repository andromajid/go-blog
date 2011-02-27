<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<div id="contentContainer">
  <div id="content">
    <h1>Ubah User Administrator</h1>
    <form action="" method="post" name="admin_form" enctype="multipart/form-data">
        <table class="eventAdd" width="100%" cellpadding="3" cellspacing="0" border="0">
            <tr>
              <th width="100">Username</th>
              <td><input type="text" name="admin_username" value="<?php echo $user_admin->admin_username; ?>" size="60" /></td>
            </tr>
              <tr>
          <th>Grup</th>
          <td>
            <select name="admin_group_id">
              <?php
              foreach($row_group as $group)
              {
                $selected = ($user_admin->admin_group_id == $group->admin_group_id) ? 'selected="selected"' : '';
                echo '<option value="'.$group->admin_group_id.'" '.$selected.'>'.$group->admin_group_title.'</option>';
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <td><input type="submit" name="edit" value="Simpan" class="button"></td>
        </tr>
        </table>
    </form>
  </div>
</div>