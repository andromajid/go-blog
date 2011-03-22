<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');
$x = 1;
?>
<div id="box">
        <h3>Menu <?php echo $this->uri->segment(4);?></h3>
         <form action="" method="post" name="list">
             <input type="submit" name="form_add" value="Tambah" class="button" />&nbsp;
             <input type="submit" name="publish" value="Publish" class="button" />&nbsp;
             <input type="submit" name="unpublish" value="Unpublish" class="button" />&nbsp;
             <input type="submit" name="delete" value="Delete" class="button" />
             <br /><br />
             <table width="100%" border="0" cellspacing="1" cellpadding="2">
                 <tr class="eventHeader">
                      <th class="eventHeader" width="30"><input class="checkbox" type="checkbox" name="item" id="item" onclick="check_all('list', 'item', <?php echo $x; ?>)" /></th>
                      <th width="30">#</th>
                      <th width="80">Order By</th>
                      <th>Judul</th>
                      <th width="80">Publish</th>
                      <?php if(! $this->uri->segment(5)) echo '<th width="80">Sub Menu</th>'; ?>
                      <th width="80">Ubah</th>
                </tr>
                <?php
                if($list_menu)
                {
                    $data_count = count($list_menu);
                    foreach ($list_menu as $row)
                    {
                        if($x == 1) $order_by = "<input type=\"image\" name=\"order[".$row->menu_id."]\" value=\"down\" src=\"".$this->config->item("themes_url")."/admin/images/order-down.png\">";
                        elseif($x == $data_count) $order_by = "<input type=\"image\" name=\"order[".$row->menu_id."]\" value=\"up\" src=\"".$this->config->item("themes_url")."/admin/images/order-up.png\">";
                        else $order_by = "<input type=\"image\" name=\"order[".$row->menu_id."]\" value=\"up\" src=\"".$this->config->item("themes_url")."/admin/images/order-up.png\">&nbsp;<input type=\"image\" name=\"order[".$row->menu_id."]\" value=\"down\" src=\"".$this->config->item("themes_url")."/admin/images/order-down.png\">";
                        $is_active = ($row->menu_is_active == '1') ? 'stat-active.png' : 'stat-inactive.png';
                        ?>
                        <tr class="eventList">
                            <td align="center"><input type="checkbox" name="item[<?php echo $x; ?>]" id="item[<?php echo $x; ?>]" value="<?php echo $row->menu_id; ?>"></td>
                            <td align="right"><?php echo $x; ?>.</td>
                            <td align="center"><?php echo $order_by; ?></td>
                            <td><?php echo $row->menu_title; ?></td>
                            <td align="center"><img src="<?php echo $this->config->item("themes_url")."/";?>admin/images/<?php echo $is_active; ?>" alt="<?php echo $is_active; ?>" /></td>
                            <?php if(! $this->uri->segment(5)) echo '<td align="center"><a href="'.base_url().'admin/menu/list_menu/'.$this->uri->segment(4)."/".$row->menu_id.'"><img src="'.$this->config->item("themes_url").'/admin/images/add-sub.png" alt="Sub Menu" border="0" /></a></td>'; ?>
                            <td align="center"><a href="<?php echo base_url()."admin/menu/edit/".$row->menu_id; ?>"><img src="<?php echo $this->config->item("themes_url")."/";?>admin/images/edit.png" alt="Ubah" border="0" /></a></td>
                        </tr>
                        <?php
                        $x++;
                    }
                }
                ?>
             </table>
         </form>
</div>