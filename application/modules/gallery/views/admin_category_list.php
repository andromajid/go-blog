<?php
$no = 1;
?>
<div id="box">
    <h3>Daftar Kategori Galeri</h3>
    <form action="" method="post" name="list">
      <input type="submit" name="form_add" value="Tambah" class="button" />&nbsp;
      <input type="submit" name="publish" value="Publish" class="button" />&nbsp;
      <input type="submit" name="unpublish" value="Unpublish" class="button" />&nbsp;
      <input type="submit" name="delete" value="Delete" class="button" />
      <br /><br />
      <table width="100%" border="0" cellspacing="1" cellpadding="2">
        <tr class="eventHeader">
          <th width="30"><input class="checkbox" type="checkbox" name="item" id="item" onclick="check_all('list', 'item', <?php echo $no;?>)" /></th>
          <th width="30">#</th>
          <th width="250">Judul</th>
          <th>Deskripsi</th>
          <th width="80">Publish</th>
          <th width="80">Ubah</th>
        </tr>
<?php
if($category)
{
    foreach($category as $row)
    {
        $is_active = ($row->gallery_category_is_active == '1') ? 'stat-active.png' : 'stat-inactive.png';
?>
        <tr class="eventList">
            <td align="center"><input type="checkbox" name="item[<?php echo $no; ?>]" id="item[<?php echo $no; ?>]" value="<?php echo $row->gallery_category_id; ?>"></td>
            <td align="right"><?php echo $no; ?>.</td>
            <td><?php echo $row->gallery_category_title; ?></td>
            <td><?php echo $row->gallery_category_description; ?></td>
            <td align="center"><img src="<?php echo $this->config->item('themes_url');?>/admin/images/<?php echo $is_active; ?>" alt="<?php echo $is_active; ?>" /></td>
            <td align="center"><a href="<?php echo base_url();?>admin/gallery/category/edit/<?php echo $row->gallery_category_id; ?>"><img src="<?php echo $this->config->item('themes_url');?>/admin/images/edit.png" alt="Ubah" border="0" /></a></td>
          </tr>
<?php
        $no++;
    }
}
?>
      </table>
    </form>
</div>
