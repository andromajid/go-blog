<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 ?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
		<title><?php echo isset($title)?$title:$this->config->item("project");?></title>
		<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
		<meta name="ProgId" content="FrontPage.Editor.Document">
		<meta name="Microsoft Theme" content="none, default">
		<meta name="Microsoft Border" content="none, default">
                <script type="text/javascript" src="<?php echo base_url();?>web/addons/js/checkbox.js"></script>
		<link href="<?php echo $this->config->item("themes_url")."/";?>admin/paging.css" rel="stylesheet" type="text/css">
		<link href="<?php echo $this->config->item("themes_url")."/";?>admin/event.css" rel="stylesheet" type="text/css">
		<link href="<?php echo $this->config->item("themes_url")."/";?>admin/standard.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			.menu_top:a:link { text-decoration: none; }
			.menu_top:a:hover { color: #FFFFFF; text-decoration: none; }
			.menu_top:a:visited { text-decoration: none; }
			.menu_top2:a:link { text-decoration: none; }
			.menu_top2:a:hover { color: #000033; text-decoration: none;	}
			.menu_top2:a:visited { text-decoration: none; }
			.site_map:a:link { text-decoration: none; }
			.site_map:a:hover { color: #FFFFFF; text-decoration: none; }
			.site_map:a:visited { text-decoration: none; }
			.body:a:link { color: #666666; text-decoration: none; font-weight: bold; }
			.body:a:hover { color: #999999; text-decoration: none; font-weight: bold; }
			.body:a:visited { text-decoration: none; color: #464646; font-weight: bold; }
			.box:a:link { color: #333333; text-decoration: none; font-weight: bold; }
			.box:a:hover { color: #999999; text-decoration: none; font-weight: bold; }
			.box:a:visited { text-decoration: none; color: #FFFFFF; font-weight: bold; }
			.body_header:a:link { text-decoration: none; }
			.body_header:a:hover { color: #3C74A2; text-decoration: none; }
			.body_header:a:visited { text-decoration: none; }
			.sitemap { font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; color: #FFFFFF; font-style: italic; }
			.index { font-family: Arial, Helvetica, sans-serif; font-size: 9px; color: #FFFFFF; }
			.judul { font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; color: #FFFFFF; left: 20px; }
			.judul:a:link { text-decoration: none; }
			.judul:a:hover { color: #CCCCCC; text-decoration: none; }
			.judul:a:visited { text-decoration: none; }
			.links { font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #194775; }
			.links:a:link { text-decoration: none; }
			.links:a:hover { color: #990000; text-decoration: none; }
			.links:a:visited { text-decoration: none; }
			.links2 { font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #194775; font-weight: bold; }
			.links2:a:link { text-decoration: none; }
			.links2:a:hover { color: #990000; text-decoration: none; }
			.links2:a:visited { text-decoration: none; }
			.bold { font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold; }
			.head { font-family: Arial, Helvetica, sans-serif; font-size: 25px; font-weight: bolder; color: #CCCCCC; }
			.head2 { font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bolder; font-style:italic; color: #f1f1f1; }
			.judulbig { font-family: Arial, Helvetica, sans-serif; font-size: 15px; font-weight: bold; color: #FFFFFF; left: 20px; }
			.judulthin { font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #FFFFFF; left: 20px; font-weight: normal; }
			.menu { font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: lighter; }
			.menu2 { font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-weight: lighter; }
			.text { font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #000000; }
			.textgray { font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #666666; }
			.fontGreen { color: #0a880a; }
			.fontRed { color: #A42A27; }
			.footerCell { padding:5px 0; }
			.footercell a { color:#fff; }
			.footercell a:hover { color:#ddd; }
			.msgError { margin:0 0 10px 0; padding:15px 10px; border:1px dotted #A42A27; background:#feecec; color:#A42A27; font-size:9pt; }
			.msgSuccess { margin:0 0 10px 0; padding:15px 10px; border:1px dotted #0a880a; background:#f5fbf5; color:#0a880a; font-size:9pt; }
		</style>
		<style type="text/css">@import url(include/date/calendar-win2k-1.css);</style>
		<script type="text/javascript" src="include/date/calendar.js"></script>
		<script type="text/javascript" src="include/date/lang/calendar-en.js"></script>
		<script type="text/javascript" src="include/date/calendar-setup.js"></script>
<?php
$extra = "";
$extra = empty($extra_head_content)?"":$extra_head_content;
echo $extra;
?>
	</head>
	<body>
		<div align="center">
			<center>
				<table width=100% border=0 cellpadding=0 cellspacing=0 style="border-collapse: collapse" bordercolor="#111111">
					<tr>
						<td width="20%" bgcolor="#153F79" class="headerLeft"></td>
						<td width="80%" height="75" bgcolor="#153F79" class="headerLeft"><br><span class="head2">buat admin</span><hr noshade size="1" color="#e1e1e1"></td>
					</tr>
					<tr>
						<td colspan="2" bgcolor="#CCCCCC" class="headerBottom"><i><?php //buat message ?></i></td>
					</tr>
				</table>
			</center>
		</div>

		<div align="center">
			<center>
				<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
					<tr>
						<td width="210" class="noName01" valign="top">
							<div id=leftSide>
                                                            <style type="text/css">
                                                                .userMenu th
                                                                {
                                                                        padding-left:10px;
                                                                        background-color: #EEEEEE;
                                                                        color:#A42A27;
                                                                        border-bottom: 1px solid #E0E0E0;
                                                                        height:25px;
                                                                        vertical-align:middle;
                                                                        font-size:13px;
                                                                        font-weight:600px;
                                                                }

                                                                .userMenu td
                                                                {
                                                                        padding-left:5px;
                                                                        background-color: #EEEEEE;
                                                                        color:#A42A27;
                                                                        border-bottom: 1px solid #E0E0E0;
                                                                        height:25px;
                                                                        vertical-align:middle;
                                                                        font-family: Trebuchet MS, Arial, Helvetica;
                                                                        font-size:13px;
                                                                        font-weight:600px;
                                                                }

                                                                a.userMenu { color:#13B6EC; font-weight:bold; }
                                                                a.userMenu:hover{ color: #003366; text-decoration:underline; }
                                                                a.userLink { color:#A42A27; font-weight:600px; }
                                                                a.userLink:hover { color: #003366; text-decoration:underline; }
                                                                a.subLink { color:#A42A27; font-size:11px; font-weight:600px; }
                                                                a.subLink:hover { color: #003366; text-decoration:underline; }
                                                                </style>
                                                                <table border="0" width="99%" class="userMenu">
                                                                <tr>
                                                                        <th width="20"><a class="userLink" href="index.php?do=home_admin.main"><img src="<?php echo $this->config->item("themes_url")."/";?>admin/images/info.gif" border="0"></a></th>
                                                                        <td colspan="2"><a class="userLink" href="index.php?do=home_admin.main">Home</a></td>
                                                                </tr>
<?php widget::run("widget_menu");?>
                                                                <tr><td colspan="3">&nbsp;</td></tr>
                                                                <tr>
                                                                        <th><a href="<?php echo base_url()?>system/logout"><img src="<?php echo $this->config->item("themes_url")."/";?>admin/images/logout.gif" border="0"></a></th>
                                                                        <td colspan="2"><a href="<?php echo base_url()?>system/logout"><font color="#A42A27">[ Logout ]</font></a></td>
                                                                </tr>
                                                        </table>
							</div>
						</td>
						<td class="noName02" valign="top" bgcolor="#e9e9e9">
						<!-- Awal Content -->
							<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
								<tbody>
									<tr>
										<td background="<?php echo $this->config->item("themes_url")."/";?>admin/images/layout_r4_c4.gif" valign="top"><img src="<?php echo $this->config->item("themes_url")."/";?>admin/images/main_kiri_atas.gif" height="11" width="7"></td>
										<td bgcolor="#ffffff" valign="top" width="100%">
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tbody>
													<tr><td background="<?php echo $this->config->item("themes_url")."/";?>admin/images/main_tengah_atas.gif"><img src="<?php echo $this->config->item("themes_url")."/";?>admin/images/spacer.gif" alt="" border="0" height="11" width="1"></td></tr>
													<tr><td><div id=mainPage>
                                                                                                        <?php
                                                                                                        echo $this->session->flashdata('pesan')?$this->session->flashdata('pesan'):"";
                                                                                                        $error = $error == ""?"":"<div class=\"msgErrror\">".$error."</div>";
                                                                                                        $pesan = $pesan==""?"":"<div class=\"msgSucsess\">".$pesan."</div>";
                                                                                                        echo $error; echo $pesan;
                                                                                                        ?>
                                                                                                        <br /><?php $this->load->view($view);?></div></td></tr>
													<tr><td>&nbsp;</td></tr>
												</tbody>
											</table>
										</td>
										<td background="<?php echo $this->config->item("themes_url")."/";?>admin/images/layout_r4_c6.gif" valign="top"><img src="<?php echo $this->config->item("themes_url")."/";?>admin/images/main_kanan_atas.gif" height="11" width="14"></td>
									</tr>
									<tr>
										<td valign="top"><img src="<?php echo $this->config->item("themes_url")."/";?>admin/images/layout_r5_c4.gif" alt="" border="0" height="13" width="7"></td>
										<td background="images/layout_r5_c5.gif" width="100%"><img src="<?php echo $this->config->item("themes_url")."/";?>admin/images/spacer.gif" alt="" border="0" height="13" width="1"></td>
										<td valign="top"><img src="<?php echo $this->config->item("themes_url")."/";?>admin/images/layout_r5_c6.gif" alt="" border="0" height="13" width="14"></td>
									</tr>
								</tbody>
							</table>
						<!-- Akhir Content -->
						</td>
					</tr>
				</table>
			</center>
		</div>

		<div align="center">
			<center>
				<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
					<tr>
						<td width="100%" valign="middle" bgcolor="#153F79" class="footerCell"><?php //emboh ra ngerti ?></td>
					</tr>
				</table>
			</center>
		</div>
	</body>
</html>