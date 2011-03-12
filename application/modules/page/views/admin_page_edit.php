<div id="box">
    <h3>Edit page</h3>
<?php
if($page)
{
?>
    <form action="" method="post" name="admin_form" enctype="multipart/form-data">
      <table class="eventAdd" width="100%" cellpadding="3" cellspacing="0" border="0">
        <tr>
          <th width="100">Judul</th>
          <td><input type="text" name="page_title" value="<?php echo $page->page_title; ?>" size="60" /><?php echo form_error("page_title");?></td>
        </tr>
        <tr>
          <th>Isi Halaman</th>
          <td>
              <div id="xinha">
                  <textarea name="page_content" id="page_content"><?php echo $page->page_content; ?></textarea><?php echo form_error('page_content');?>
              </div>
          </td>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <td><input type="submit" name="edit" value="Simpan" class="button"></td>
        </tr>
      </table>
    </form>
<?php
}
?>
</div>