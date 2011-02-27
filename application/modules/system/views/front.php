<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$session = $this->session->userdata('auth_admin');
?>
<div id="contentContainer">
  <div id="content">
    <h1>Selamat datang di Halaman Administrator</h1><br />
    <p>Login terakhir anda: <?php echo $session['admin_last_login']; ?></p>
  </div>
</div>