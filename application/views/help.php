<?php $common = new gCMSCommon()?>

<meta charset="utf-8" />
<title>HELP</title>
<link rel="stylesheet" href="<?= asset_url(); ?>css/style.css" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" SRC="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

<input type="hidden" name="msg" id="msg" value="<?php if (isset($msg)) echo $msg?>">
<div style="clear: both;"></div>
<div class="help">
    <div class="help-header">
        <div style="float: left; margin-top: 2px; margin-left: 10px;">
            <img src="<?php echo site_url() . "assets/images/menu/icon-16-help.png"?>">
        </div>
        <div style="float: left; margin-top: 2px; margin-left: 20px;">
            <b><span style="color: gray;">Help Center</span></b>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="help-static">
        <p style="padding: 0 5px 0 5px;">
            The Roflbot introduces you to some special features to embed the text over the image and helps you mark image with the text.<br /><br />            
        </p>
		<p style="float:right;">Developed by Laurence.</p>
    </div>
 </div>