<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

define('_DIR_', str_replace('\\', '/', dirname(__FILE__)) . '/');
require_once _DIR_ . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-solid-blue.css" type="text/css" />
<span class="alert alert-success"><?php echo FINISH_MESSAGE; ?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-solid-blue.css" type="text/css" />
<script type="text/javascript" src="<?php echo dirname($form_path); ?>/jquery.min.js"></script>
<form class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Registrar Votante</h2></div>
	<div class="element-select<?php frmd_add_class("select4"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="large"><span><select name="select4" required="required">

		<option value="Lider1">Lider1</option>
		<option value="Lider2">Lider2</option>
		<option value="Lider3">Lider3</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-input<?php frmd_add_class("input"); ?>" title="Solo Puede ser la cédula"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="input" required="required" placeholder="N° Documento"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input1"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input1" placeholder="Nombre"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input2"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input2" placeholder="Apellido"/><span class="icon-place"></span></div></div>
	<div class="element-select<?php frmd_add_class("select"); ?>"><label class="title"></label><div class="item-cont"><div class="large"><span><select name="select" >

		<option value="Masculino">Masculino</option>
		<option value="Femenino">Femenino</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-select<?php frmd_add_class("select1"); ?>"><label class="title"></label><div class="item-cont"><div class="large"><span><select name="select1" >

		<option value="Caldas">Caldas</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-select<?php frmd_add_class("select2"); ?>"><label class="title"></label><div class="item-cont"><div class="large"><span><select name="select2" >

		<option value="Pensilvania">Pensilvania</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-input<?php frmd_add_class("input3"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input3" placeholder="Dirección"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input4"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input4" placeholder="Tel Fijo"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input5"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="input5" required="required" placeholder="Celular"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input6"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input6" placeholder="Email"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input7"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input7" placeholder="Ubicación"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input8"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input8" placeholder="Tipo de Ubicación"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input9"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input9" placeholder="Ocupación"/><span class="icon-place"></span></div></div>
	<div class="element-select<?php frmd_add_class("select3"); ?>"><label class="title"></label><div class="item-cont"><div class="large"><span><select name="select3" >

		<option value="option 1">option 1</option>
		<option value="option 2">option 2</option>
		<option value="option 3">option 3</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-input<?php frmd_add_class("input10"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input10" placeholder="Rango de Edad"/><span class="icon-place"></span></div></div>
<div class="submit"><input type="submit" value="Registrar"/></div></form><script type="text/javascript" src="<?php echo dirname($form_path); ?>/formoid-solid-blue.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>