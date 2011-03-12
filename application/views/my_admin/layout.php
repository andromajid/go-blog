<?php
$theme_url = $this->template->get_template_full_url();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Users - Admin Template</title>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>css/theme.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>css/style.css" />
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>css/ie-sucks.css" />
<![endif]-->
<?php
$extra = "";
$extra = empty($extra_head_content)?"":$extra_head_content;
echo $extra;
?>
<script type="text/javascript">
function check_all(form_name, input_name, start)
{
  master = document.getElementById(input_name);
  form_obj = document.getElementById(form_name);

  i = start;
  input_element = input_name + "["+ i +"]";
  input_obj = document.getElementById(input_element);
  while(input_obj != null)
  {
    input_obj = document.getElementById(input_element);
    input_obj.checked = master.checked;

    i = i + 1;
    input_element = input_name + "["+ i +"]";
    input_obj = document.getElementById(input_element);
  }
}
</script>
</head>

<body>
	<div id="container">
    	<div id="header">
        	<h2>My eCommerce Admin area</h2>
      </div>

        <div id="wrapper">
            <div id="content">
              <!-- content go-blog-->
              <?php $this->load->view($view);?>
            </div>
            <div id="sidebar">
  				<?php widget::run('widget_menu');?>
          </div>
      </div>
        <div id="footer">
        <div id="credits">
   		Template by <a href="http://www.bloganje.com">Bloganje</a>
        </div>
        <div id="styleswitcher">
            <ul>
                <li><a href="javascript: document.cookie='theme='; window.location.reload();" title="Default" id="defswitch">d</a></li>
                <li><a href="javascript: document.cookie='theme=1'; window.location.reload();" title="Blue" id="blueswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=2'; window.location.reload();" title="Green" id="greenswitch">g</a></li>
                <li><a href="javascript: document.cookie='theme=3'; window.location.reload();" title="Brown" id="brownswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=4'; window.location.reload();" title="Mix" id="mixswitch">m</a></li>
            </ul>
        </div><br />

        </div>
</div>
</body>
</html>


