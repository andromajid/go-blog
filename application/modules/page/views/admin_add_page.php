<div id="contentContainer">
  <div id="content">
    <h1>Tambah halaman <?php echo $this->uri->segment(4); ?></h1>
    <form action="" method="post" name="admin_form" enctype="multipart/form-data">
      <table class="eventAdd" width="100%" cellpadding="3" cellspacing="0" border="0">
        <tr>
          <th width="100">Judul</th>
          <td><input type="text" name="page_title" value="" size="60" /><?php echo form_error("page_title");?></td>
        </tr>
        <tr>
          <th>Isi Halaman</th>
          <td>
              <div id="xinha">
                  <textarea name="page_content" id="page_content"></textarea>
            </div>
          </td>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <td><input type="submit" name="add" value="Simpan" class="button"></td>
        </tr>
      </table>
    </form>
  </div>
</div>