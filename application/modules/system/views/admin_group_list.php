<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$no = 1;
?>
<div id="contentContainer">
  <div id="content">
    <h1>Daftar Grup Administrator</h1>
       <form action="" method="post" name="list">
            <input type="submit" name="form_add" value="Tambah" class="button" />&nbsp;
            <input type="submit" name="suspend" value="Non Aktifkan" class="button" />&nbsp;
            <input type="submit" name="activate" value="Aktifkan" class="button" />&nbsp;
            <input type="submit" name="delete" value="Delete" class="button" />
            <br /><br />
            <table width="100%" border="0" cellspacing="1" cellpadding="2">
                <tr class="eventHeader">
                  <th class="eventHeader" width="30"><input class="checkbox" type="checkbox" name="item" id="item" onclick="check_all('list', 'item', <?php $no; ?>)" /></th>
                  <th width="30">#</th>
                  <th>Nama</th>
                  <th width="80">Aktif</th>
                  <th width="80">Ubah</th>
                </tr>
<?php
$no = 1;
foreach($group_list as $row)
{
$is_active = $row->admin_group_is_active=="1"?'stat-active.png' : 'stat-inactive.png';
?>
                <tr class="eventList">
                    <td align="center"><input type="checkbox" name="item[<?php echo $no; ?>]" id="item[<?php echo $no; ?>]" value="<?php echo $row->admin_group_id; ?>"></td>
                    <td align="right"><?php echo $no; ?>.</td>
                    <td><?php echo $row->admin_group_title; ?></td>
                    <td align="center"><img src="<?php echo $this->config->item("themes_url")."/";?>admin/images/<?php echo $is_active; ?>" alt="<?php echo $is_active; ?>" /></td>
                    <td align="center"><a href="<?php echo base_url();?>admin/system/edit_group/<?php echo $row->admin_group_id; ?>"><img src="<?php echo $this->config->item("themes_url")."/";?>admin/images/edit.png" alt="Ubah" border="0" /></a></td>
                </tr>
<?php
$no++;
}
?>
            </table>
       </form>
  </div>
</div>