var helpwind_style = 'scrollbars=1,width=415,height=200';
var fcanvas;
function openHelp()
{
	helpWind=window.open($('#baseURL').val() + "dashboard/help",'',helpwind_style);
	var left = parseInt((screen.availWidth/2) - 200);
	var top = parseInt((screen.availHeight/2) - 250);
	helpWind.moveTo(left, top);
	helpWind.focus();
}
function download()
{
	document.uploadform.action = $('#baseURL').val() + "dashboard/download";
	document.uploadform.submit();
}

function upload()
{
	if($('#img').val() == '') {
		alert('Please choose the file to upload.');
		return false;
	}else {
		document.uploadform.action = $('#baseURL').val() + "dashboard/upload";
		document.uploadform.submit();
	}	
}
$(function(){
	Roflbot.init();
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
});
var Roflbot = {
	init: function(){
		$('#customfontsize').val(Roflbot.getFontSize);
		Roflbot.refreshtoolbar('load');
	},
	refreshtoolbar: function(execommand){
		switch(execommand)
		{
			case 'load':
			  $('#lnkdownload').attr('style','color:#ccc');
			  $('#lnkdeltext').attr('style','color:#ccc');
			  $('#lnkaddtext').attr('style','color:#ccc');
			  $('#lnksaveimage').attr('style','color:#ccc');				  
			  break;
			case 'showimage':
			  $('#lnkdownload').attr('style','color:#ccc');
			  $('#lnkdeltext').attr('style','color:#ccc');
			  $('#lnkaddtext').attr('style','color:#025A8D');
			  $('#lnksaveimage').attr('style','color:#025A8D');			  
			  break;
			case 'save':
			  $('#lnkdownload').attr('style','color:#025A8D');
			  break;
		}
	},
	getFontSize: function(){
		var fontSize = 0;
		switch($('#fontSize').val().toLowerCase())
		{
			case 'tiny':
			  fontSize = 10;
			  break;
			case 'small':
			  fontSize = 15;
			  break;
			case 'medium':
			  fontSize = 20;
			  break;
			case 'large':
			  fontSize = 25;
			  break;
			case 'custom':
			  fontSize = parseInt($( '#customfontsize' ).val());
			  break;
			default:
			  fontSize = 10;
		}
		return fontSize;
	},
	ImageFuncs: {
		initworkspace: function(){
			fcanvas = new fabric.Canvas('workarea');
			fabric.Image.fromURL($('#filepath').val(), function(oImg) {					  
				  oImg.selectable = false;
				  if (oImg.width > 960)
				  {
					  oImg.setWidth(960);
				  }
				  if (oImg.height > 720)
				  {
					  oImg.setHeight(720);
				  }
				  oImg.left = oImg.width / 2;
				  oImg.top = oImg.height / 2;
				  fcanvas.setWidth(oImg.width);
				  fcanvas.setHeight(oImg.height);
				  fcanvas.add(oImg);
				  Roflbot.refreshtoolbar('showimage');
			});
			Roflbot.ImageFuncs.addEventListener();
		},
		lockObjects: function(){
			fcanvas.discardActiveObject();					
			var items = fcanvas.getObjects();
			$.each( items, function( index, item ) {
				item.lockRotation = false;
				item.lockUniScaling = false;
				item.selectable = false;
			});
			fcanvas.renderAll();
		},
		addEventListener: function() {
			//-----add handler for event of canvas------
			fcanvas.observe( 'object:selected', function( e ) {					
				if( e.target.type == "text" ) {
					$( '#overtext' ).val( e.target.text );						
					$( '#overtext' ).focus();
					$('#lnkdeltext').attr('style','color:#025A8D');					
				}
			});
			fcanvas.observe( 'selection:cleared', function( e ) {					
				$('#lnkdeltext').attr('style','color:#ccc');
			});
			fcanvas.observe( 'mouse:down', function( e ) {
				try {
					if( e.target.type == "text" ) {
						$( '#overtext' ).show();
					}else {
						$( '#overtext' ).val('');
					}
				} catch( e ) {
					$( '#overtext' ).val('');
				}
			});
			//-----add handler for changing text with fontFamily,size, color, size.
			$('#overtext').bind('keypress', function(event){
				var key = event.which || event.keyCode;
				if(key === 13) {
					var selText = fcanvas.getActiveObject();
					if( selText != null && selText.type == "text" ) {
					   selText.setText( $('#overtext').val() );
					   fcanvas.renderAll();
					}
				}
		    });			
			$('#customfontsize').change(function(event) {
				if( parseInt($('#customfontsize').val()) > 100) {
					alert('Maximum Size is 100px');
					event.preventDefault(); return;
				}
				var selText = fcanvas.getActiveObject();
				if( selText != null && selText.type == "text" ) {
				   selText.set( 'fontSize',Roflbot.getFontSize );
				   fcanvas.renderAll();
				}
			});
			$('#fontSelector').change(function(event) {
				var selText = fcanvas.getActiveObject();
				if( selText != null && selText.type == "text" ) {
				   selText.set( 'fontFamily',$( '#fontSelector' ).val() );
				   fcanvas.renderAll();
				}
			});
			$('#fontSize').change(function(event) {
				var selText = fcanvas.getActiveObject();
				if($( '#fontSize' ).val().toLowerCase() == 'custom') {
					$( '#customfontsize' ).show();
				}else {
					$( '#customfontsize' ).hide();
					$( '#customfontsize' ).val(Roflbot.getFontSize);
				}
				if( selText != null && selText.type == "text" ) {
				   selText.set( 'fontSize',Roflbot.getFontSize );
				   fcanvas.renderAll();
				}
			});
			var checkFunc = function(element){
				if (element.css('color') == 'rgb(204, 204, 204)')
				{
					return false;
				}
				return true;
			};
			//----add handler for event in toolbar-------
			$('#lnkaddtext').click(function(event) {
				if(!checkFunc($('#lnkaddtext'))) { event.preventDefault(); return; }
				if($('#overtext').val() == '') {
					alert('Please input the text to embed over image');
					event.preventDefault(); return;
				}
				var textobj = new fabric.Text( $( '#overtext' ).val(), {
					 fontFamily: $( '#fontSelector' ).val(),
					 fill: $('#fontColor div').css('backgroundColor'),
					 fontSize: Roflbot.getFontSize,
					 left: fcanvas.width / 2,
					 top: fcanvas.height / 3
				} );
				fcanvas.add(textobj);
				fcanvas.setActiveObject(textobj);				
				Roflbot.refreshtoolbar('add');
			});
			$('#lnkdeltext').click(function(event) {
				if(!checkFunc($('#lnkdeltext'))) { event.preventDefault(); return; }
				var selText = fcanvas.getActiveObject();
				if( selText != null && selText.type == "text" ) {
					fcanvas.remove(selText);
					$('#overtext').val('');
					Roflbot.refreshtoolbar('delete');
				}
			});
			$('#lnksaveimage').click(function(event) {
				if(!checkFunc($('#lnksaveimage'))) { event.preventDefault(); return; }
				Roflbot.ImageFuncs.lockObjects();
				var canvas = document.querySelector('#workarea');					
				var data = canvas.toDataURL('image/png');
				$.ajax({
					type : 'POST',
					url  : 'ajaxsave',
					data : { imagedata : data, 
							 filename : $('#filename').val()},
					success : function(result){
						if(result == 'failure') {								
							alert("Failed to save image.");
						}else {								
							alert("Saved image successfully!");							
							$('#savedfilename').val(result);
							Roflbot.refreshtoolbar('save');
						}
					}});
			});
			$('#lnkdownload').click(function(event) {				
				if(!checkFunc($('#lnkdownload'))) { event.preventDefault(); return; }
				download();
				Roflbot.refreshtoolbar('download');		
			});
			$('#lnkclear').click(function(event) {	
				fcanvas.clear();				
			});
		},
	},
}