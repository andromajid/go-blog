<div id="contentContainer">
  <div id="content">
    <h1>Tambah Galeri</h1>
    
    <form action="" method="post" name="admin_form" enctype="multipart/form-data">
      <table class="eventAdd" width="100%" cellpadding="3" cellspacing="0" border="0">
        <tr>
          <th width="100">Judul</th>
          <td><input type="text" name="gallery_title" value="" size="60" /> <?php echo form_error('gallery_title');?></td>
        </tr>
        <tr>
          <th>Kategori</th>
          <td>
            <select name="gallery_category_id">
<?php
if($category)
{
    foreach($category as $row)
    {
        echo "<option value=\"{$row->gallery_category_id}\">{$row->gallery_category_title}</option>";
    }
}
?>
            </select>
          </td>
        </tr>
        <tr>
          <th>File Gambar</th>
          <td><input type="file" name="image" size="50" /><br><small><i>(ukuran terbaik 500px x 500px)</i></small></td>
        </tr>
        <tr>
          <th>Deskripsi</th>
          <td><textarea name="gallery_description" cols="57" rows="5"></textarea></td>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <td><input type="submit" name="add" value="Simpan" class="button"></td>
        </tr>
      </table>
    </form>
  </div>
</div>