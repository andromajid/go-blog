<div id="box">
    <h3>Tambah Kategori Galeri</h3>
    <form action="" method="post" name="admin_form">
      <table class="eventAdd" width="100%" cellpadding="3" cellspacing="0" border="0">
        <tr>
          <th width="100">Judul</th>
          <td><input type="text" name="gallery_category_title" value="" size="60" /><?php echo form_error('gallery_category_title');?></td>
        </tr>
        <tr>
          <th>Deskripsi</th>
          <td><textarea name="gallery_category_description" cols="57" rows="5"></textarea></td>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <td><input type="submit" name="add" value="Simpan" class="button" /></td>
        </tr>
      </table>
    </form>
</div>