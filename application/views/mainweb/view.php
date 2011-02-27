<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title><?php echo isset($title)?$title:$this->config->item("project");?></title>
	<link rel="shortcut icon" type="image/gif" href="<?php echo $this->config->item("themes_url")."/";?>view/images/ss-favicon.png">
	<link href="<?php echo $this->config->item("themes_url")."/";?>view/css/ss-standard.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->config->item("themes_url")."/";?>view/css/ss-layout.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->config->item("themes_url")."/";?>view/css/ss-sidebar.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->config->item("themes_url")."/";?>view/css/ss-testimonial.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo $this->config->item("themes_url")."/";?>view/js/marquee.js"></script>
<!-- STYLE FOR REG-TABLE BEGIN-->
	<style>
			.referal { padding:0 30px 2px 0; text-align:right; }
			.referal-mid { color:#A76A00; font-weight:bold; }
			.referal-nama { color:#800000; font-weight:bold; }
			.referal-nohp { color:#000080; font-weight:bold; }

			.titleError { margin:5px 0 0 0; padding:5px 10px; border:1px solid #f6dbdb; border-bottom:none; background:#f6dbdb; color:#dd0000; }
			.msgError { margin:0 0 10px 0; padding:5px 5px; border:1px solid #f6dbdb; background:#fcf7f7; color:#dd0000; font-size:9pt; }

			.titleSuccess { margin:5px 0 0 0; padding:5px 10px; border:1px solid #e3f5e3; border-bottom:none; background:#daefda; color:#248724; }
			.msgSuccess { margin:0 0 10px 0; padding:5px 5px; border:1px solid #daefda; background:#f9fdf9; color:#248724; font-size:9pt; }

			.titleInfo { margin:0 0 0 0; padding:5px 10px; border:1px solid #dae1ef; border-bottom:none; background:#dae1ef; color:#4b6fb8; }
			.msgInfo { margin:0 0 10px 0; padding:5px 5px; border:1px solid #dae1ef; background:#f2f5fc; color:#4b6fb8; font-size:9pt; }
	</style>
<!-- STYLE FOR REG-TABLE END-->
<?php
$extra = "";
$extra = empty($extra_head_content)?"":$extra_head_content;
echo $extra;
?>
</head>
<body>
	<div class="container">
	<!-- HEADER -->
		<div class="header">
		<!-- LOGO -->
			<div class="logo">
				<div class="logo-left"></div>
				<div class="logo-right">
					<div class="logo-ss">
						<object width="565" height="90" align="middle">
							<param name="movie" value="<?php echo $this->config->item("themes_url")."/";?>view/images/animasi/ss-animasi-tagline.swf">
							<param name="quality" value="high" /><param name="scale" value="noborder" />
							<param name="wmode" value="transparent" /><param name="bgcolor" value="#ffffff" />
							<embed src="<?php echo $this->config->item("themes_url")."/";?>view/images/animasi/ss-animasi-tagline.swf" scale="noborder" wmode="transparent" bgcolor="#fff" width="565" height="90" align="middle" type="application/x-shockwave-flash"  />
							</embed>
						</object>
					</div>
					<div class="logo-animasi">
						<object width="565" height="80" align="middle">
							<param name="movie" value="<?php echo $this->config->item("themes_url")."/";?>view/images/animasi/ss-animasi.swf">
							<param name="quality" value="high" /><param name="scale" value="noborder" />
							<param name="wmode" value="transparent" /><param name="bgcolor" value="#ffffff" />
							<embed src="<?php echo $this->config->item("themes_url")."/";?>view/images/animasi/ss-animasi.swf" scale="noborder" wmode="transparent" bgcolor="#fff" width="565" height="80" align="middle" type="application/x-shockwave-flash"  />
							</embed>
						</object>
					</div>
				</div>
			</div>
		<!-- MENU -->
			<div class="menu">
				<table cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="235px" height="45px"><img src="<?php echo $this->config->item("themes_url")."/";?>view/images/menu-left.png" alt="" /></td>
						<td>
							<div class="link">
								<ul>
									<li><a href="<?php echo base_url();?>index.php" id="current" title="home">Home</a></li>
									<li><a href="<?php echo base_url();?>registrasi" title="register">Register</a></li>
									<li><a href="<?php echo base_url();?>profile" title="company profile">Company Profile</a></li>
									<li><a href="<?php echo base_url();?>marketing-plan" title="testimonial">Marketing Plan</a></li>
									<li><a href="<?php echo base_url();?>gallery" title="gallery">Gallery</a></li>
									<li><a href="<?php echo base_url();?>contact-us" title="contact us">Contact Us</a></li>
								</ul>
							</div>
						</td>
						<td width="30px" height="45px"><img src="<?php echo $this->config->item("themes_url")."/";?>view/images/menu-right.png" alt="" /></td>
					</tr>
				</table>
			</div>
		</div>
	<!-- MAIN-BOX -->
		<div class="main-box">
			<div class="main-box-top"></div>
		<!-- CONTENT -->
			<div class="content">
			<div class="content-bg">
				<div class="top-content"></div>
				<div class="left-content">
			<!-- SIDEBAR-LEFT -->
					<div class="sidebar-left">
                                                <?php widget::run("widget_menu");?>
					<!-- MEMBER LOGIN -->
						<?php widget::run("widget_login");?>
					<!-- ============= -->
                                                <?php
                                                if($widget_left)
                                                {
                                                    foreach($widget_left as $row_widget_left)
                                                    {
                                                        widget::run($row_widget_left['widget_name']);
                                                    }
                                                }
                                                ?>
					</div>
				</div>
				<div class="right-content">
			<!-- MAIN-CONTENT -->
					<div class="main-content">
					<?php
                                           echo $this->session->flashdata('pesan')==""?"":"<div class=\"msgSucsess\">".$this->session->flashdata('pesan')."</div>";
                                           echo $pesan == ""?"":"<div class=\"msgSucsess\">".$pesan."</div>";
                                           echo $error == ""?"":"<div class=\"msgError\">".$error."</div>";
                                        ?>
                                        <?php echo $this->load->view($view);?>
					</div>
			<!-- SIDEBAR-RIGHT -->
					<div class="sidebar-right">
					<!-- CONTACT -->
						<div class="contact">
							<div class="contact-top"></div>
							<div class="contact-info">
                                                            <!--<img src="<?php echo $this->config->item("themes_url")."/";?>view/images/logo.png" width="150">-->
                                                            <h1>PT. CAHAYA MAKMUR BERSAMA</h1>
                                                            <p>Jl. Insp. Marzuki Lr. Bakti No. 2035 Palembang</p>
							</div>
							<div class="contact-bottom"></div>
						</div>
                                                <?php
                                                        if($widget_right)
                                                        {
                                                            foreach($widget_right as $row_widget_right)
                                                            {
                                                                widget::run($row_widget_right['widget_name']);
                                                            }
                                                        }
                                                 ?>
					</div>
				</div>
				<div class="clear"></div>
				<div class="bottom-content"></div>
			</div> <!-- end of content-bg" -->
			</div> <!-- end of content -->
		</div>
	<!-- FOOTER -->
		<div class="footer">
			<div class="footer-column">
				<div class="fc-left">
			<!-- TESTIMONIAL -->
                                        <?php widget::run("widget_testimonial");?>
			<!-- TOP-MEMBER -->
					<div class="top-member">
						<div class="stat-member-top">Top Member</div>
						<ul>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
						</ul>
					</div>
				</div>
				<div class="fc-right">
			<!-- TOP-SPONSOR -->
					<div class="top-sponsor">
						<div class="stat-member-top">Top Sponsor</div>
						<ul>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
							<li>[nama]</li>
						</ul>
					</div>
			<!-- STATISTIK -->
                                        <?php widget::run("widget_statistik");?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="credit">
				<ul>
					<li><a href="<?php echo base_url();?>index.php" id="current" title="home">home</a></li>
					<li><a href="<?php echo base_url();?>profile" title="company profile">company profile</a></li>
					<li><a href="<?php echo base_url();?>marketing-plan" title="marketing plan">marketing plan</a></li>
					<li><a href="<?php echo base_url();?>registrasi" title="register">register</a></li>
					<li><a href="<?php echo base_url();?>FAQ" title="faq">faq</a></li>
					<li><a href="<?php echo base_url();?>TOS" title="term of services">term of services</a></li>
					<li><a href="<?php echo base_url();?>contact-us" id="menu-last" title="contact us">contact</a></li>
				</ul>
				<p><br>Copyright © 2010. <a href="http://sejahterabersama.com/">sejahterabersama.com</a>. All rights reserved.</p>
			</div>
		</div>
	</div>
</body>
</html>