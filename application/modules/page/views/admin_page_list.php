<?php
$no = 1;
?>
<div id="contentContainer">
    <div id="content">
     <form action="" method="post" name="list">
      <input type="submit" name="form_add" value="Tambah" class="button" />&nbsp;
      <input type="submit" name="publish" value="Publish" class="button" />&nbsp;
      <input type="submit" name="unpublish" value="Unpublish" class="button" />&nbsp;
      <input type="submit" name="delete" value="Delete" class="button" />
      <br /><br />
      <table width="100%" border="0" cellspacing="1" cellpadding="2">
        <tr class="eventHeader">
          <th class="eventHeader" width="30"><input class="checkbox" type="checkbox" name="item" id="item" onclick="check_all('list', 'item', <?php echo $no;?>)" /></th>
          <th width="30">#</th>
          <th>Judul</th>
          <th width="80">Publish</th>
          <th width="80">Ubah</th>
        </tr>
<?php
if($page)
{
    foreach($page as $row)
    {
         $is_active = ($row->page_is_active == '1') ? 'stat-active.png' : 'stat-inactive.png';
?>
          <tr class="eventList">
            <td align="center"><input type="checkbox" name="item[<?php echo $no; ?>]" id="item[<?php echo $no; ?>]" value="<?php echo $row->page_id; ?>"></td>
            <td align="right"><?php echo $this->uri->segment(4)+$no; ?>.</td>
            <td><?php echo $row->page_title; ?></td>
            <td align="center"><img src="<?php echo $this->config->item('themes_url');?>/admin/images/<?php echo $is_active; ?>" alt="<?php echo $is_active; ?>" /></td>
            <td align="center"><a href="<?php echo base_url();?>admin/page/edit/<?php echo $this->uri->segment(3)."/".$row->page_id; ?>"><img src="images/edit.png" alt="Ubah" border="0" /></a></td>
          </tr>
<?php
           $no++;
    }
}
?>
      </table>
    </form>
    </div>
</div>
<?php
if($paging)
{
      echo '<div class="paging-bottom">';
      echo $paging;
      echo '</div>';
}
?>
