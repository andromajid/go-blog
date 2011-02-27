<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$no = 1;
?>
<div id="contentContainer">
  <div id="content">
    <h1>Tambah Grup Administrator</h1>
    <form action="" method="post" name="admin_form" enctype="multipart/form-data">
        <table class="eventAdd" width="100%" cellpadding="3" cellspacing="0" border="0">
            <tr>
              <th width="100">Nama</th>
              <td colspan="3"><input type="text" name="admin_group_title" value="" size="60" /></td>
            </tr>
            <tr>
              <th rowspan="<?php echo ($rowspan+1); ?>">Hak Akses Menu</th>
              <td><input class="checkbox" type="checkbox" name="item" id="item" onclick="check_all('admin_form', 'item', <?php echo $no; ?>)" /></td>
              <td colspan="2"><strong>CENTANG SEMUA</strong></td>
            </tr>
<?php
foreach($group_menu as $x => $hasil)
{
    echo '<tr><td width="10"><input type="checkbox" name="item['.$no.']" id="item['.$no.']" value="'.$hasil['menu_id'].'"></td><td colspan="2" title="'.$hasil['menu_description'].'"><strong>'.$hasil['menu_title'].'</strong></td></tr>';
    $no++;
    foreach($hasil['child'] as $sub)
    {
        echo '<tr><td>&nbsp;</td><td width="10"><input type="checkbox" name="item['.$no.']" id="item['.$no.']" value="'.$sub['menu_id'].'"></td><td>'.$sub['menu_title'].'</td></tr>';
        $no++;
    }
}
?>
            <tr>
              <th>&nbsp;</th>
              <td colspan="3"><input type="submit" name="add" value="Simpan" class="button"></td>
            </tr>
        </table>
    </form>
  </div>
</div>
