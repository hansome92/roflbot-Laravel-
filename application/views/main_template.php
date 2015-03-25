<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo$this->data['title']?></title>

        <!-- We need to emulate IE7 only when we are to use excanvas -->
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
        <![endif]-->

        <!-- Favicons -->     
        <link rel="shortcut icon" type="<?php echo asset_url(); ?>images/png" HREF="img/favicons/favicon.png"/>
        <link rel="icon" type="image/png" HREF="<?php echo asset_url(); ?>images/favicons/favicon.png"/>
        <link rel="apple-touch-icon" HREF="<?php echo asset_url(); ?>images/favicons/apple.png" />

        <!-- Main Stylesheet --> 
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/style.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/colorbox.css" type="text/css" />              
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/template.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/modal.css" type="text/css" />
        <link rel='stylesheet' href="<?php echo asset_url(); ?>css/basic.css" type='text/css'  media='screen' />
          
        <!--[if IE 7]>
        <link href="<?php echo asset_url(); ?>css/ie7.css" rel="stylesheet" type="text/css" />
        <![endif]-->

        <!--[if gte IE 8]>
        <link href="<?php echo asset_url(); ?>css/ie8.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <!-- Your Custom Stylesheet --> 
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/custom.css" type="text/css" />

        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/lightbox.css" media="screen,projection" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/colorpicker.css" />
		<link href="http://fonts.googleapis.com/css?family=Plaster" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Engagement" rel="stylesheet" type="text/css">
        <!-- jQuery with plugins -->
       <!--<script type="text/javascript" SRC="<?php echo asset_url(); ?>js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" SRC="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <script type="text/javascript" SRC="<?php echo asset_url(); ?>js/jquery.ui.core.min.js"></script>
        <script type="text/javascript" SRC="<?php echo asset_url(); ?>js/jquery.ui.widget.min.js"></script>
        <script type="text/javascript" SRC="<?php echo asset_url(); ?>js/jquery.ui.tabs.min.js"></script>

        <!-- jQuery tooltips -->
        <script type="text/javascript" SRC="<?php echo asset_url(); ?>js/jquery.tipTip.min.js"></script>

        <!-- Superfish navigation -->
        <script type="text/javascript" SRC="<?php echo asset_url(); ?>js/jquery.superfish.min.js"></script>
        <script type="text/javascript" SRC="<?php echo asset_url(); ?>js/jquery.supersubs.min.js"></script>

        <!-- jQuery form validation -->
        <script type="text/javascript" SRC="<?php echo asset_url(); ?>js/jquery.validate_pack.js"></script>

        <!-- jQuery date picker -->
        <script type="text/javascript" src="<?php echo asset_url(); ?>js/jquery.datepick.pack.js"></script>

        <!-- jQuery popup box -->
        <script type="text/javascript" SRC="<?php echo asset_url(); ?>js/jquery.colorbox-min.js"></script>
        <script type="text/javascript" SRC="<?php echo asset_url(); ?>js/jquery.nyroModal.pack.js"></script>

        <!-- jQuery graph plugins -->
        <script type="text/javascript" SRC="<?php echo asset_url(); ?>js/jquery.dataTables.min.js"></script>

        <script type="text/javascript" SRC="<?php echo asset_url(); ?>js/common.js"></script>
        <!--[if IE]><script type="text/javascript" src="<?php echo asset_url(); ?>js/flot/excanvas.min.js"></script><![endif]-->
        <script type="text/javascript" SRC="<?php echo asset_url(); ?>js/flot/jquery.flot.min.js"></script>

        <script type="text/javascript" src="<?php echo asset_url(); ?>js/lightbox.js"></script>
     
        <script type="text/javascript" src="<?php echo asset_url(); ?>js/jquery-ui-datepicker.js"></script>
        
        <script type='text/javascript' src="<?php echo asset_url(); ?>js/jquery.simplemodal.js"></script>
        <script type='text/javascript' src="<?php echo asset_url(); ?>js/basic.js"></script>
		<script type='text/javascript' src="<?php echo asset_url(); ?>js/fabric.min.js"></script>		
		<script type='text/javascript' src="<?php echo asset_url(); ?>js/fabric.min.js"></script>
		<script type="text/javascript" src="<?php echo asset_url(); ?>js/colorpicker.js"></script>
		<script type="text/javascript" src="<?php echo asset_url(); ?>js/eye.js"></script>
		<script type="text/javascript" src="<?php echo asset_url(); ?>js/utils.js"></script>

		<script type="text/javascript" src="<?php echo asset_url(); ?>js/tiny_mce.js"></script>       
    </head>
    <?
         $common = new gCMSCommon();
     ?>
    <body>
        <div class="bodywrap">
            <!-- Page Header -->
            <div class="header">
                <div class="container">
                    <div class="logo">
                        <a href="<?php echo site_url('')?>">
                            <img SRC="<?php echo asset_url(); ?>images/<?php echo$this->data['site_logo']?>" alt="<?php echo$this->data['site_name']?>" width="169" height="59" border="0" />
                        </a>
                    </div>                   
                    <div class="clear"></div>                
                </div>
            </div>             
            <!-- End of Page Header -->
        
            <!-- Page Body -->
            <div>
                <div class="container">
                    <!-- Page content -->
                    <div id="page">
                        <script>
                        $(document).ready(function(){
                                /* setup navigation, content boxes, etc... */
    
                        });
                        </script>    
                        <?php echo $template['body']; ?>  
                    </div>
                    <div class="clear"></div>
                    <!-- End of Page content -->
                </div>
            </div>
            <!-- End of Page Body --> 
            
            <!-- Page footer -->
            <div class="footer">
                <div class="container">
                    <div class="cols fcol-5">
                        <div class="copyright">
                            <p>Copyright &copy; 2013 Laurence<br />
                            All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Page footer -->
        </div>

        <!-- Scroll to top link -->
        <a href="#" id="totop">^ scroll to top</a>
 
        <!-- Admin template javascript load -->
        <script type="text/javascript" SRC="<?php echo asset_url(); ?>js/administry.js"></script>
    </body>
</html>


