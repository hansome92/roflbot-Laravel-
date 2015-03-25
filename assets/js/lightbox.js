/****************************************
    Barebones Lightbox Template
    by Kyle Schaeffer
    http://www.kyleschaeffer.com
    * requires jQuery
****************************************/

// display the lightbox
var myVar;
function lightbox(insertContent, ajaxContentUrl){
    
    // jQuery wrapper (optional, for compatibility only)
    (function($) {
        
        // add lightbox/shadow <div/>'s if not previously added
        if($('#lightbox').size() == 0){
            
            var theLightbox = $('<div id="lightbox"/>');
            var theShadow = $('<div id="lightbox-shadow"/>');
            $(theShadow).click(function(e){
                closeLightbox();
            });
            $('body').append(theShadow);
            $('body').append(theLightbox);
            
        }
        
        // remove any previously added content
        $('#lightbox').empty();
        
        // insert HTML content
        if(insertContent != null){
            $('#lightbox').append(insertContent);
            
        }
        
        // insert AJAX content
        if(ajaxContentUrl != null){
            // temporarily add a "Loading..." message in the lightbox
            $('#lightbox').append('<div id="loading" />');
            
            // request AJAX content
            $.ajax({
                type: 'GET',
                url: ajaxContentUrl,
                success:function(data){
                    // remove "Loading..." message and append AJAX content
                    $('#lightbox').empty();
                    $('#lightbox').append(data);
                    var theClosebtn = $('<div id="closebtn" title="close"/>');
                    $(theClosebtn).click(function(e){
                        closeLightbox();
                    });
                    $('#lightbox').append(theClosebtn);
                },
                error:function(){
                    alert('AJAX Failure!');
                }
            });
        }
        
        // move the lightbox to the current window top + 100px
        $('#lightbox').css('top', $(window).scrollTop() + 15 + '%');
        
        // display the lightbox
        $('#closebtn').show();
        $('#lightbox').show();
        $('#lightbox-shadow').show();
    
    })(jQuery); // end jQuery wrapper
    
}

// close the lightbox
function closeLightbox(){
    
    // jQuery wrapper (optional, for compatibility only)
    (function($) {
        
        // hide lightbox/shadow <div/>'s
        $('#lightbox').hide();
        $('#lightbox-shadow').hide();
        
        // remove contents of lightbox in case a video or other content is actively playing
        $('#lightbox').empty();
    
        clearInterval(myVar);
    
    })(jQuery); // end jQuery wrapper
    
}