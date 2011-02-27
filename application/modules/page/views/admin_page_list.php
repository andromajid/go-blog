<?php
$no = 1;
?>
<div id="contentContainer">
    <div id="content">
    <div id="page-heading">
		<h1>Add page</h1>
	</div>
     <!--  start actions-box ............................................... -->
        <div id="actions-box" style="margin-right: 10px;">
            <a href="" class="action-slider"></a>
            <div id="actions-box-slider">
                <a href="" class="action-edit">Edit</a>
                <a href="" class="action-delete">Delete</a>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end actions-box........... -->
      <input type="submit" name="delete" value="Delete" class="form-submit" />
      <br /><br />
      <table width="100%" border="0" cellspacing="1" cellpadding="2" id="product-table">>
        <tr>
          <th class="table-header-check" width="30"><input class="checkbox" type="checkbox" name="item" id="item" onclick="check_all('list', 'item', <?php echo $no;?>)" /></th>
          <th class="table-header-repeat line-left" width="30"><a href="">#</a></th>
          <th class="table-header-repeat line-left"><a href="">Judul</a></th>
          <th class="table-header-repeat line-left" width="80"><a href="">Publish</a></th>
          <th class="table-header-repeat line-left" width="80"><a href="">Ubah</a></th>
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
