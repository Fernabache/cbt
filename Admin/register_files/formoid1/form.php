<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

require_once str_replace('\\', '/', __DIR__) . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?=dirname($form_path)?>/formoid-solid-orange.css" type="text/css" />
<span class="alert alert-success"><?=FINISH_MESSAGE;?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?=dirname($form_path)?>/formoid-solid-orange.css" type="text/css" />
<script type="text/javascript" src="<?=dirname($form_path)?>/jquery.min.js"></script>
<form enctype="multipart/form-data" class="formoid-solid-orange" style="background-color:#FFFFFF;font-size:12px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:40%;min-width:150px" method="post"><div class="title"><h2>Step 1</h2></div>
	<div class="element-file<?frmd_add_class("file")?>" title="Please Upload your picture "><label class="title"><span class="required">*</span></label><div class="item-cont"><label class="large" ><div class="button">Choose Photo</div><input type="file" class="file_input" name="file" required="required"/><div class="file_text">No file selected</div><span class="icon-place"></span></label></div></div>
	<div class="element-select<?frmd_add_class("select")?>" title="Please choose your title"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="large"><span><select name="select" required="required">

		<option value="Mr">Mr</option>
		<option value="Mrs">Mrs</option>
		<option value="Dr">Dr</option>
		<option value="Engr">Engr</option>
		<option value="Prof">Prof</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-select<?frmd_add_class("select1")?>" title="Please choose your administrative level"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="large"><span><select name="select1" required="required">

		<option value="Normal Administrator">Normal Administrator</option>
		<option value="Super Administrator">Super Administrator</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-input<?frmd_add_class("input")?>" title="Please enter your fullname"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="input" required="required" placeholder="Fullname"/><span class="icon-place"></span></div></div>
	<div class="element-input<?frmd_add_class("input1")?>" title="Please enter a username"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="input1" required="required" placeholder="Username"/><span class="icon-place"></span></div></div>
	<div class="element-email<?frmd_add_class("email")?>" title="Please provide a valid email"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="email" name="email" value="" required="required" placeholder="Email"/><span class="icon-place"></span></div></div>
	<div class="element-password<?frmd_add_class("password1")?>" title="Please enter a secured password"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="password" name="password1" value="" required="required" placeholder="Password"/><span class="icon-place"></span></div></div>
	<div class="element-password<?frmd_add_class("password")?>" title="Re-enter your password"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="password" name="password" value="" required="required" placeholder="Confirm password"/><span class="icon-place"></span></div></div>
	<div class="element-radio<?frmd_add_class("radio")?>" title="Please select your gender"><label class="title">Gender<span class="required">*</span></label>		<div class="column column1"><label><input type="radio" name="radio" value="Male" required="required"/><span>Male</span></label><label><input type="radio" name="radio" value="Female" required="required"/><span>Female</span></label></div><span class="clearfix"></span>
</div>
	<div class="element-textarea<?frmd_add_class("textarea")?>" title="Please tell us about you"><label class="title"><span class="required">*</span></label><div class="item-cont"><textarea class="medium" name="textarea" cols="20" rows="5" required="required" placeholder="About me"></textarea><span class="icon-place"></span></div></div>
<div class="submit"><input type="submit" value="Register"/></div></form><script type="text/javascript" src="<?=dirname($form_path)?>/formoid-solid-orange.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>