<?php

define('EMAIL_FOR_REPORTS', 'wolexzo07@gmail.com');
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
<form enctype="multipart/form-data" enctype="multipart/form-data" enctype="multipart/form-data" enctype="multipart/form-data" enctype="multipart/form-data" class="formoid-solid-orange" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Files Uploader</h2></div>
	<div class="element-file<?frmd_add_class("file")?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><label class="large" ><div class="button">Choose File</div><input type="file" class="file_input" name="file" required="required"/><div class="file_text">No file selected</div><span class="icon-place"></span></label></div></div>
	<div class="element-file<?frmd_add_class("file1")?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><label class="large" ><div class="button">Choose File</div><input type="file" class="file_input" name="file1" required="required"/><div class="file_text">No file selected</div><span class="icon-place"></span></label></div></div>
	<div class="element-file<?frmd_add_class("file2")?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><label class="large" ><div class="button">Choose File</div><input type="file" class="file_input" name="file2" required="required"/><div class="file_text">No file selected</div><span class="icon-place"></span></label></div></div>
	<div class="element-file<?frmd_add_class("file3")?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><label class="large" ><div class="button">Choose File</div><input type="file" class="file_input" name="file3" required="required"/><div class="file_text">No file selected</div><span class="icon-place"></span></label></div></div>
	<div class="element-file<?frmd_add_class("file4")?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><label class="large" ><div class="button">Choose File</div><input type="file" class="file_input" name="file4" required="required"/><div class="file_text">No file selected</div><span class="icon-place"></span></label></div></div>
<div class="submit"><input type="submit" value="Upload Files"/></div></form><script type="text/javascript" src="<?=dirname($form_path)?>/formoid-solid-orange.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>