<?php
if($category)
{
?>
<div id="contentContainer">
  <div id="content">
    <h1>Ubah Kategori Galeri</h1>
    <form action="" method="post" name="admin_form" enctype="multipart/form-data">
      <table class="eventAdd" width="100%" cellpadding="3" cellspacing="0" border="0">
        <tr>
          <th width="100">Judul</th>
          <td><input type="text" name="gallery_category_title" value="<?php echo $category->gallery_category_title; ?>" size="60" /><?php echo form_error("gallery_category_title");?></td>
        </tr>
        <tr>
          <th>Deskripsi</th>
          <td><textarea name="gallery_category_description" cols="57" rows="5"><?php echo $category->gallery_category_description; ?></textarea></td>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <td><input type="submit" name="ubah" value="Simpan" class="button" /></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php
}
?>