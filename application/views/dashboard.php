<script type="text/javascript" SRC="<?= asset_url(); ?>js/user.js"></script>    
<?php $common = new gCMSCommon();?>
<div>
    <input type="hidden" id="baseURL" name="baseURL" value="<?php echo site_url('')?>" />
    <div class="toolbar-up">&nbsp;</div>
    <div id="divToolbar">
        <div id="toolbar-box">
            <div class="m">
                <div class="toolbar-list" id="toolbar">
                    <ul>
                        <li class="button" id="toolbar-refresh">
                            <a id="lnkaddtext" class="toolbar">
                                <span class="icon-32-new"></span>
                                Add Text
                            </a>
                        </li>
						<li class="button" id="toolbar-refresh">
                            <a id="lnkdeltext" class="toolbar">
                                <span class="icon-32-remove"></span>
                                Delete Text
                            </a>
                        </li>
						<li class="button" id="toolbar-refresh">
                            <a id="lnksaveimage" class="toolbar">
                                <span class="icon-32-save"></span>
                                Save Image
                            </a>
                        </li>
						<li class="button" id="toolbar-refresh">
                            <a id="lnkdownload" class="toolbar">
                                <span class="icon-32-export"></span>
                                Download
                            </a>
                        </li>
						<li class="button" id="toolbar-refresh">
                            <a id="lnkclear" class="toolbar">
                                <span class="icon-32-delete"></span>
                                Clear
                            </a>
                        </li>
                        <li class="button" id="toolbar-help">
                            <a href="#" class="toolbar" onclick="openHelp()">
                                <span class="icon-32-help"></span>
                                HELP
                            </a>
                        </li>
                    </ul>
                    <div class="clr"></div>
                </div>
                <div class="pagetitle icon-48-task">
                    <h2>Toolbox</h2>
                </div>
            </div>
        </div>
    </div>    
    <div class="divSection">		
        <div class="workspace">
			<div id="toolspanel" class="m" >
				<div class="toollist">
					<span style="font-size: 14px;">Font &nbsp;</span>
						<select id="fontSelector">
							<option value="arial">Arial</option>
							<option value="helvetica" selected="">Helvetica</option>
							<option value="myriad pro">Myriad Pro</option>
							<option value="delicious">Delicious</option>
							<option value="verdana">Verdana</option>
							<option value="georgia">Georgia</option>
							<option value="courier">Courier</option>
							<option value="comic sans ms">Comic Sans MS</option>
							<option value="impact">Impact</option>
							<option value="monaco">Monaco</option>
							<option value="optima">Optima</option>
							<option value="hoefler text">Hoefler Text</option>
							<option value="plaster">Plaster</option>
							<option value="engagement">Engagement</option></select>
					<span style="font-size: 14px;">Size &nbsp;</span><select id="fontSize"><option value="TINY">Tiny</option><option value="SMALL">Small</option><option selected="selected" value="MEDIUM">Medium</option><option value="LARGE">Large</option><option value="CUSTOM">Custom</option></select>
					<span style="font-size: 14px;">&nbsp;</span><input id="customfontsize" type="text" style="display:none;text-align:center;width: 30px; height: 20px;" value="">
				</div>
				<div class="toollist">
					<div id="fontColor"><div style="background-color: #0000ff"></div></div>
				</div>
				<div class="toollist">
					<span style="font-size: 14px;">&nbsp;&nbsp;&nbsp;</span><input id="overtext" type="text" style="width: 200px; height: 20px;" value="">
				</div>
			</div>
			<div class="toolbar-up">&nbsp;</div>
			<?php if(isset($filename)) { ?>				
				<input type="hidden" id="filepath" value="<?php echo site_url('') . $common->getLabel('LBL_USER_UPLOAD', "en") . $filename;?>" />			
				<input type="hidden" id="filename" value="<?php echo $filename;?>" />
				<canvas id="workarea" class="workspace imgcanvas"></canvas>							
				<script type="text/javascript"> Roflbot.ImageFuncs.initworkspace();</script>
			<?php } ?>
		</div>
		<div class="toolbar-down" style="clear:both;">&nbsp;</div>
        <div class="pagehead" style="margin-left: 15px;">			
			<?=form_open_multipart('dashboard/upload', array("id" => "uploadform", "name"=>"uploadform"))?>
				<?php echo form_error('img', '<div class="val-error">', '</div>'); ?>
				<input type="file" id="img" name="img">				
				<input type="hidden" id="savedfilename" name="savedfilename" />				
				<div class="btn-cont">
					<input type="button" class="btn btn-light-gray big" value="Upload" onclick="upload()"  />					
				</div>
			<?=form_close();?>
        </div>
    </div>
</div>
<script type="text/javascript">
(function($){
	var initLayout = function() {	
		$('#fontColor').ColorPicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#fontColor div').css('backgroundColor', '#' + hex);
				var selText = fcanvas.getActiveObject();
				if( selText != null && selText.type == "text" ) {				   
				   selText.set('fill','#' + hex );
				   fcanvas.renderAll();
				}
			}
		});
	};		
	EYE.register(initLayout, 'init');
})(jQuery)
</script>