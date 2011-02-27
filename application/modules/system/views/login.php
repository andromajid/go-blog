<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>[Administrator]</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="shortcut icon" type="image/png" href="<?php echo $this->config->item("themes_url");?>/admin/images/favicon.png" />
		<style type="text/css">
			body				{ margin:0; padding:0; color:#333; background-color:#e9e9e9; font-size:11px; font-family:Arial, Helvetica; }
			form				{ margin:0; }
			.inputText	{ border:1px solid #b2b2b2; font-family:Arial, Helvetica; color:#666; }
			a						{ color:#666; text-decoration:none; }
			a:hover			{ color:#666; text-decoration:underline; }
			.button				{ padding:1px 7px 3px 7px; font-size:10px; background-color:#ccc; color:#555; border:1px solid #aaa; cursor:pointer; }
			/*.button:hover	{ color:#034ea2; border:1px solid #034ea2; }*/
			.button:hover	{ color:#a42a27; border:1px solid #a42a27; }
		</style>
		<script language="javascript" type="text/javascript">
			function setFocus()
			{
				document.loginForm.admin_username.select();
				document.loginForm.admin_username.focus();
			}
		</script>
	</head>
	<body onload="setFocus();">
    <div align="center">
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td height="41" bgcolor="#a42a27" align="left" style="padding-left:30px;"><font color="#f1f1f1">Control Panel</font><br /></td>
        </tr>
        <tr>
          <td height="20" bgcolor="#cccccc" align="center">
            <?php 
            $error = $this->session->flashdata('error')==""?"":$this->session->flashdata('error');
            echo $error;
            ?>
          </td>
        </tr>
      </table>
      <!-- Awal Content -->
      <table align="center" border="0" cellpadding="0" cellspacing="0" width="35%">
        <tbody>
          <tr>
            <td background="<?php echo $this->config->item("themes_url");?>/admin/images/layout_r4_c4.gif" valign="top"><img src="<?php echo $this->config->item("themes_url");?>/admin/images/main_kiri_atas.gif" height="11" width="7" /></td>
            <td bgcolor="#ffffff" valign="top" width="100%">
              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                  <tr><td background="<?php echo $this->config->item("themes_url");?>/admin/images/main_tengah_atas.gif"><img src="<?php echo $this->config->item("themes_url");?>/admin/images/spacer.gif" alt="" border="0" height="11" width="1" /></td></tr>
                  <tr>
                    <td height="475" valign="middle">
                      <center>LOGIN ADMINISTRATOR</center>
                      <!-- Begin of main block -->
                      <table align="center" border="0" cellpadding="0" cellspacing="0" width="75%">
                        <tbody>
                          <tr>
                            <td><img src="<?php echo $this->config->item("themes_url");?>/admin/images/spacer.gif" alt="" border="0" height="1" width="9" /></td>
                            <td width="100%"><img src="<?php echo $this->config->item("themes_url");?>/admin/images/spacer.gif" alt="" border="0" height="1" width="1" /></td>
                            <td><img src="<?php echo $this->config->item("themes_url");?>/admin/images/spacer.gif" alt="" border="0" height="1" width="10" /></td>
                            <td><img src="<?php echo $this->config->item("themes_url");?>/admin/images/spacer.gif" alt="" border="0" height="1" width="1" /></td>
                          </tr>
                          <tr>
                            <td><img src="<?php echo $this->config->item("themes_url");?>/admin/images/rounded_box_r1_c1.gif" alt="" border="0" height="11" width="9" /></td>
                            <td background="<?php echo $this->config->item("themes_url");?>/admin/images/rounded_box_r1_c2.gif" width="100%"><img src="<?php echo $this->config->item("themes_url");?>/admin/images/spacer.gif" alt="" border="0" height="10" width="1" /></td>
                            <td><img src="<?php echo $this->config->item("themes_url");?>/admin/images/rounded_box_r1_c3.gif" alt="" border="0" height="11" width="10" /></td>
                            <td><img src="<?php echo $this->config->item("themes_url");?>/admin/images/spacer.gif" alt="" border="0" height="11" width="1" /></td>
                          </tr>
                          <tr>
                            <td background="<?php echo $this->config->item("themes_url");?>/admin/images/rounded_box_r2_c1.gif"><img src="<?php echo $this->config->item("themes_url");?>/admin/images/spacer.gif" alt="" border="0" height="1" width="1" /></td>
                            <td bgcolor="#ffffff" width="100%">
                              <!-- Awal Isi -->
                              <br />
                              <form action="<?php echo base_url();?>system/login" method="post" name="loginForm" id="loginForm">
                                <table border="0" align="center" cellpadding="2" cellspacing="2">
                                  <tr><td>Username</td><td><input class="inputText" name="admin_username" size="20" type="text" autocomplete="off" /></td></tr>
                                  <tr><td>Password</td><td><input class="inputText" name="admin_password" size="20" type="password" autocomplete="off" /></td></tr>
                                  <tr><td colspan="2" align="right"><br /><input name="submit" class="button" value="Login" type="submit" /></td></tr>
                                </table>
                                <br />
                              </form>
                              <!-- Akhir Isi -->
                            </td>
                            <td background="<?php echo $this->config->item("themes_url");?>/admin/images/rounded_box_r2_c3.gif"><img src="<?php echo $this->config->item("themes_url");?>/admin/images/spacer.gif" alt="" border="0" height="1" width="1" /></td>
                            <td><img src="<?php echo $this->config->item("themes_url");?>/admin/images/spacer.gif" alt="" border="0" height="1" width="1" /></td>
                          </tr>
                          <tr>
                            <td><img src="<?php echo $this->config->item("themes_url");?>/admin/images/rounded_box_r3_c1.gif" alt="" border="0" height="10" width="9" /></td>
                            <td background="<?php echo $this->config->item("themes_url");?>/admin/images/rounded_box_r3_c2.gif" width="100%"><img src="<?php echo $this->config->item("themes_url");?>/admin/images/spacer.gif" alt="" border="0" height="10" width="1" /></td>
                            <td><img src="<?php echo $this->config->item("themes_url");?>/admin/images/rounded_box_r3_c3.gif" alt="" border="0" height="10" width="10" /></td>
                            <td><img src="<?php echo $this->config->item("themes_url");?>/admin/images/spacer.gif" alt="" border="0" height="10" width="1" /></td>
                          </tr>
                        </tbody>
                      </table>
                      <!-- End of main block-->
                      <center><a href="./">Back to Main Page</a></center>
                    </td>
                  </tr>
                  <tr><td>&nbsp;</td></tr>
                </tbody>
              </table>
            </td>
            <td background="<?php echo $this->config->item("themes_url");?>/admin/images/layout_r4_c6.gif" valign="top"><img src="<?php echo $this->config->item("themes_url");?>/admin/images/main_kanan_atas.gif" height="11" width="14"></td>
          </tr>
          <tr>
            <td valign="top"><img src="<?php echo $this->config->item("themes_url");?>/admin/images/layout_r5_c4.gif" alt="" border="0" height="13" width="7"></td>
            <td background="<?php echo $this->config->item("themes_url");?>/admin/images/layout_r5_c5.gif" width="100%"><img src="<?php echo $this->config->item("themes_url");?>/admin/images/spacer.gif" alt="" border="0" height="13" width="1"></td>
            <td valign="top"><img src="<?php echo $this->config->item("themes_url");?>/admin/images/layout_r5_c6.gif" alt="" border="0" height="13" width="14"></td>
          </tr>
        </tbody>
      </table>
      <!-- Akhir Content -->
    </div>
	</body>
</html>