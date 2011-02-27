<?php
$path = realpath( FCPATH.'upload/images/gallery/');
$old_image = ($row['gallery_image'] != '' && file_exists($path.$row['gallery_image'])) ? '<a href="'.base_url().'upload/images/gallery/'.$row['gallery_image'].'" target="_blank">'.$row['gallery_image'].'</a><br /><br />' : '';
?>
<div id="contentContainer">
  <div id="content">
    <h1>Ubah Galeri</h1>
    <form action="" method="post" name="admin_form" id="admin_form" enctype="multipart/form-data">
      <input type="hidden" name="image_old" value="<?php echo $row['gallery_image']; ?>" />
      <table class="eventAdd" width="100%" cellpadding="3" cellspacing="0" border="0">
        <tr>
          <th width="100">Judul</th>
          <td><input type="text" name="gallery_title" value="<?php echo $row['gallery_title']; ?>" size="60" /></td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>
              <select name="gallery_category_id">
                  <?php
                  if($kategori)
                  {
                      foreach($kategori as $row_kategori)
                      {
                          echo "<option value=\"{$row_kategori->gallery_category_id}\">{$row_kategori->gallery_category_title}</option>";
                      }
                  }
                  ?>
              </select>
            </td>
         </tr>
         <tr>
          <th>Gambar</th>
          <td><?php echo $old_image; ?><input type="file" name="image" size="50" /><br><small><i>(ukuran terbaik 500px x 500px)</i></small></td>
        </tr>
        <tr>
          <th>Deskripsi</th>
          <td><textarea name="gallery_description" cols="57" rows="5"><?php echo $row['gallery_description']; ?></textarea></td>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <td><input type="submit" name="edit" value="Simpan" class="button"></td>
        </tr>
      </table>
    </form>
  </div>
</div>