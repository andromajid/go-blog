<?php
$no = 1;
?>
<div id="box">
		<h3>Add page</h3>
    <form action="" method="post">
      <input type="submit" name="form_add" value="Add" />
      <input type="submit" name="delete" value="Delete" />
      <input type="submit" name="publish" value="Publish" />
      <input type="submit" name="unpublish" value="Unpublish" />
      <br /><br />
      <table width="100%" border="0" cellspacing="1" cellpadding="2" id="product-table">
        <thead>
          <tr>
            <th width="30"><input class="checkbox" type="checkbox" name="item" id="item" onclick="check_all('list', 'item', <?php echo $no;?>)" /></th>
            <th width="30">#</th>
            <th>Judul</th>
            <th width="80">Publish</th>
            <th width="80">Ubah</th>
          </tr>
        </thead>
<?php
if($page)
{
    foreach($page as $row)
    {
        //ambil icon buat ditampilin
        $active = $this->template->get_image('stat-active.png');
        $in_active = $this->template->get_image('stat-inactive.png');
        $edit = $this->template->get_image("info2.gif");
        $is_active = ($row->page_is_active == '1') ? $active : $in_active;
?>
          <tr class="eventList">
            <td align="center"><input type="checkbox" name="item[<?php echo $no; ?>]" id="item[<?php echo $no; ?>]" value="<?php echo $row->page_id; ?>"></td>
            <td align="right"><?php echo $this->uri->segment(4)+$no; ?>.</td>
            <td><?php echo $row->page_title; ?></td>
            <td align="center"><?php echo $is_active;?></td>
            <td align="center"><a href="<?php echo base_url();?>admin/page/edit/<?php echo $this->uri->segment(3)."/".$row->page_id; ?>"><?php echo $edit;?></a></td>
          </tr>
<?php
           $no++;
    }
}
?>
      </table>
    </form>
<?php
if($paging)
{
      echo '<div class="paging-bottom">';
      echo $paging;
      echo '</div>';
}
?>
</div>