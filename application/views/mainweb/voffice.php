<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo isset($title)?$title:$this->config->item("project");?></title>
<meta name="description" content="Website Description" />
<meta name="keywords" content="Website keyword" />
<link href="<?php echo $this->config->item("themes_url")."/";?>voffice/css/std.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->config->item("themes_url")."/";?>voffice/css/l.css" rel="stylesheet" type="text/css" />
<?php
$extra = "";
$extra = empty($extra_head_content)?"":$extra_head_content;
echo $extra;
$session = $this->session->userdata('member');
?>
</head>
<body>
<div class="body">
	<div class="top"></div>
	<div class="wrap">
		<div class="header">
			<div class="logo"><a href="<?php echo base_url()?>voffice"><img src="<?php echo $this->config->item("themes_url")."/";?>voffice/images/logo.jpg" alt="logo" /></a></div>
			<div class="hmiddle"></div>
			<div class="hright">
				<div class="hrighttop"></div>
				<div class="hrighthome"><a href="<?php echo base_url()?>voffice"><img src="<?php echo $this->config->item("themes_url")."/";?>voffice/images/home.jpg" alt="Home" /></a><a href="<?php echo base_url();?>voffice/logout"><img src="<?php echo $this->config->item("themes_url")."/";?>voffice/images/logout.jpg" alt="logout" /></a></div>
				<div class="hrightbtm"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="spacer"></div>
		<div class="sdbar">
			<div class="sdbar-item">
				<h3>Welcome Message</h3>
				<div class="content">Selamat Datang, <?php echo $session['member_name']?></div>
				<div class="btm"></div>
			</div>
			<div class="sidebarmenu">
				<div class="sidebarmenu-item">
					<h3><a href="javascript:void(0);" onclick="toogleSubMenu('menu1')">Menu Utama</a></h3>
					<div class="content" id="menu1">
						<div class="submenu" id="tandaterima"><a href="<?php echo base_url()?>/voffice">Tanda Terima</a></div>
						<div class="submenu" id="profile"><a href="<?php echo base_url()."voffice/profile"?>">Profile</a></div>
						<div class="submenu" id="ubahpassword"><a href="<?php echo base_url()."voffice/profile/password"?>">Ubah Password</a></div>
						<div class="submenu" id="testimonial"><a href="<?php echo base_url()."voffice/testimonial"?>">Testimonial</a></div>
						<div class="clear"></div>
					</div>
					<div class="btm" id="menu1btm"></div>
				</div>
				<div class="sidebarmenu-item">
					<h3><a href="javascript:void(0);" onclick="toogleSubMenu('menu3')">JARINGAN</a></h3>
					<div class="content" id="menu3">
						<div class="submenu" id="geneologyjaringan"><a href="<?php echo base_url()."voffice/geneology/network/"?>">Geneology Jaringan</a></div>
                                                <div class="submenu" id="reportjaringan"><a href="<?php echo base_url()."voffice/report/sponsor/"?>">Sponsorisasi</a></div>
                                                <div class="submenu" id="reportjaringan"><a href="<?php echo base_url()."voffice/report/network/"?>">report Jaringan</a></div>
								<div class="submenu" id="reportjaringan"><a href="<?php echo base_url()."voffice/report_pulsa"?>">Transaksi Pulsa</a></div>		
				<div class="clear"></div>
					</div>
					<div class="btm" id="menu3btm"></div>
				</div>
                                <div class="sidebarmenu-item">
					<h3><a href="javascript:void(0);" onclick="toogleSubMenu('menu3')">Surat</a></h3>
					<div class="content" id="menu3">
						<div class="submenu" id="iklan"><a href="<?php echo base_url()."voffice/message"?>">Surat</a></div>
                                                <div class="submenu" id="iklan"><a href="<?php echo base_url()."voffice/message/add"?>">Kirim Surat</a></div>
						<div class="clear"></div>
					</div>
					<div class="btm" id="menu3btm"></div>
				</div>
				<div class="sidebarmenu-item">
					<h3><a href="javascript:void(0);" onclick="toogleSubMenu('menu4')">KOMISI</a></h3>
					<div class="content" id="menu4">
						<div class="submenu" id="statuskomisi"><a href="<?php echo base_url()."voffice/bonus"?>">total bonus</a></div>
                                                <div class="submenu" id="statemenkomisi"><a href="<?php echo base_url()."voffice/history_komisi"?>">statement komisi</a></div>
						<div class="clear"></div>
					</div>
					<div class="btm" id="menu4btm"></div>
				</div>
                            <div class="sidebarmenu-item">
					<h3><a href="javascript:void(0);" onclick="toogleSubMenu('menu3')">Reward</a></h3>
					<div class="content" id="menu3">
						<div class="submenu" id="list_reward"><a href="<?php echo base_url()."voffice/reward"?>">reward</a></div>
                                                <div class="submenu" id="history_reward"><a href="<?php echo base_url()."voffice/reward/history"?>">history reward</a></div>
						<div class="clear"></div>
					</div>
					<div class="btm" id="menu3btm"></div>
                            </div>
			</div>
		</div>
		<div class="main">
			<div class="main-content">
                        <?php
                        $error = empty($error)?"":"<div class=\"msgErrror\">".$error."</div>";
                        $pesan = empty($pesan)?"":"<div class=\"msgSucsess\">".$pesan."</div>";
                        echo $error; echo $pesan;
                        ?>
			<?php $this->load->view($view);?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="mainbtm"></div>
	<div class="footer">Copyright &copy;2010. All rights reserved by mds555.com </div>
</div>

<script type="text/javascript" src="js/function.js"></script>
<script type="text/javascript">hideall(7); toogleSubMenu('menu1');</script>
</body>
</html>