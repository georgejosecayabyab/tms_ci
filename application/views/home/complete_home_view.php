<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CCS - CT Thesis Management System | Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    


  
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">
    
    <!-- Bootstrap CSS File -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
  
    <!-- Libraries CSS Files -->
    <link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Main <style type="text/css"></style>sheet File -->
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>css/customHome.css" rel="stylesheet">
    <!-- =======================================================
      Theme Name: Bell
      Theme URL: https://bootstrapmade.com/bell-free-bootstrap-4-template/
      Author: BootstrapMade.com
      Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>

  <body>
    <!-- Page Content
    ================================================== -->
    <!-- Hero -->

    <section class="hero">
      <div class="container text-center">
        <div class="row">
          
        </div>

        <div id="titleFace" class="col-md-12">
          <h1>
            CCS - CT Thesis <br> Management System
          </h1>

          <p id="tagline" class="tagline">
            Everything that you need for your defense <br>
            All in one website
          </p>
          <?php
            require ("vendor/autoload.php");
            //Step 1: Enter you google account credentials

            $g_client = new Google_Client();

            $g_client->setClientId("1067483480445-gengh3tq4anad9odhqs0fralk85veclh.apps.googleusercontent.com");
            $g_client->setClientSecret("lQMtpbYso3Hw0FD3G-H8srEq");
            $g_client->setRedirectUri("http://localhost/tms_ci/index.php/login");     
            $g_client->setScopes("https://www.googleapis.com/auth/plus.login profile email https://mail.google.com/ https://www.googleapis.com/auth/gmail.compose");
            //$g_client->setAccessType("offline");

            //Step 2 : Create the url
            $auth_url = $g_client->createAuthUrl();
            echo "<a href='$auth_url' class='btn btn-full'>Login Through Google </a>";

            //Step 3 : Get the authorization  code
            $code = isset($_GET['code']) ? $_GET['code'] : NULL;

            //Step 4: Get access token
            if(isset($code)) {

                try {

                    $token = $g_client->fetchAccessTokenWithAuthCode($code);
                    $g_client->setAccessToken($token);

                }catch (Exception $e){
                    echo $e->getMessage();
                }




                try {
                    $pay_load = $g_client->verifyIdToken();


                }catch (Exception $e) {
                    echo $e->getMessage();
                }

            } else{
                $pay_load = null;
            }


          ?>
          <!--<a id="loginButton" class="btn btn-full" href="<?php //echo site_url('login/index');?>">Login</a>-->
          <a id="startButton" class="btn btn-full" href="#announcements">Announcements</a>
        </div>
      </div>
      
    </section>
    <!-- /Hero -->
    
  <!-- Header -->
  <header id="header">
    <div class="container">
    
      <div id="logo" class="pull-left">
        <a href="index.html"><img src="<?php echo base_url();?>img/logo-nav.png" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
      </div>
        
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="#about">Schedule</a></li>
          <li><a href="#awards">Awards</a></li>
          <li><a href="#news">News</a></li>
          
        
        </ul>
      </nav><!-- #nav-menu-container -->
      
      <nav class="nav-menu pull-right">
         <li><a href="#">Login</a></li>
          <li><a href="index.html">Home</a></li>
        
      </nav>
    </div>
  </header><!-- #header -->
  
    <!-- About -->



    <section class="features" id="announcements">
      <div class="container">
        
        <div class="row">
          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block">
             
              <div>
                <h2>
                <i class="fa fa-calendar"></i> Announcement 1
                </h2>
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!

                    <br> </br>
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!

          
              </div>
            </div>
          </div>

          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block">
             
              <div>
                <h2>
                <i class="fa fa-trophy"></i> Announcement 2
                </h2>

                <div class="body">
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!

                  <br></br> 
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!

               </div>
          
              </div>
            </div>
          </div>

           <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block">
             
              <div>
                <h2>
                <i class="fa fa-newspaper-o"></i>  Announcement 3
                </h2>
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores! 

                 <br> </br>
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!




          
              </div>
            </div>
          </div>
        </div>

        
      </div>
    </section>

       <!-- /About -->
    <!-- Parallax -->

    <div class="block bg-primary block-pd-lg block-bg-overlay text-center dividers" data-bg-img="<?php echo base_url();?>img/parallax-bg.jpg" data-settings='{"stellar-background-ratio": 2.5}' data-toggle="parallax-bg">
  
      </div>
    <!-- /Parallax -->
    <!-- Features -->

    <section class="about" id="about">
      <div class="container ">

      <div>
   

     <div class="col-sm-12 my-4" id="schedule">
        <!-- <h2>
          <i class="fa fa-calendar"></i> 
          Schedule
        </h2> -->

      <div id="scheduleBody" class="card">
     
        <div class="card-body">
             <h2 class="card-title">  <i class="fa fa-calendar"></i>  Schedule</h2>
         
          <br>
            <strong> Regular Schedule Dates</strong> 
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>

          <strong> Redefense Schedule Dates</strong>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>

        </div>
        <div class="card-footer">
          
        </div>
      </div>
    </div>

      </div>

  
      </div>
    </section>
 

    
    <!-- /Features -->
    <!-- Call to Action -->



   <div class="block bg-primary block-pd-lg block-bg-overlay text-center dividers" data-bg-img="<?php echo base_url();?>img/parallax-bg.jpg" data-settings='{"stellar-background-ratio": 2.5}' data-toggle="parallax-bg">


      </div>
    <!-- /Parallax -->
    <!-- Features -->

    <section class="about" id="awards">
      <div class="container ">

      <div>
   

     <div class="col-sm-12 my-4" id="awardsWhole">
        <!-- <h2>
          <i class="fa fa-calendar"></i> 
          Schedule
        </h2> -->

      <div id="scheduleBody" class="card">
     
        <div class="card-body">
             <h2 class="card-title">  <i class="fa fa-calendar"></i>  Awards</h2>
         
          <br>
            <strong> Congratulations to Team SDDS   </strong> 
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem  quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>

          <strong> MOTA Candidates</strong>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>

        </div>
        <div class="card-footer">
          
        </div>
      </div>
    </div>

      </div>

  
      </div>
    </section>
 


       <div class="block bg-primary block-pd-lg block-bg-overlay text-center dividers" data-bg-img="<?php echo base_url();?>img/parallax-bg.jpg" data-settings='{"stellar-background-ratio": 2.5}' data-toggle="parallax-bg">
      

      </div>
    <!-- /Parallax -->
    <!-- Features -->

    <section class="about" id="news">
      <div class="container ">

      <div>
   

     <div class="col-sm-12 my-4" id="newsWhole">
        <!-- <h2>
          <i class="fa fa-calendar"></i> 
          Schedule
        </h2> -->

      <div id="scheduleBody" class="card">
     
        <div class="card-body">
             <h2 class="card-title">  <i class="fa fa-calendar"></i>  News</h2>
         
          <br>
            <strong> News Ipsunm Dolor</strong> 
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>

          <strong> Adipisci News Soluto</strong>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>

        </div>
        <div class="card-footer">
          
        </div>
      </div>
    </div>

      </div>

  
      </div>
    </section>
 



  
      </div>
 
    
      
    <footer class="site-footer">
      <div class="bottom">
        <div class="container">
          <div class="row">

            <div class="col-lg-6 col-xs-12 text-lg-left text-center">
              <p class="copyright-text">
                © Team GNM
              </p>
              <div class="credits">
                  <!-- 
                  All the links in the footer should remain intact. 
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Bell
                -->
                
              </div>
            </div>
            
            <div class="col-lg-6 col-xs-12 text-lg-right text-center">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a href="index.html">Home</a>
                </li>

                <li class="list-inline-item">
                  <a href="#about">Schedule</a>
                </li>


              
              </ul>
            </div>
            
          </div>
        </div>
      </div>
    </footer>
    <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a> <!-- JavaScript


    <!-- Required JavaScript Libraries -->
    <script src="<?php echo base_url();?>js/lib/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/lib/superfish/hoverIntent.js"></script>
    <script src="<?php echo base_url();?>js/lib/superfish/superfish.min.js"></script>
    <script src="<?php echo base_url();?>js/lib/tether/js/tether.min.js"></script>
    <script src="<?php echo base_url();?>js/lib/stellar/stellar.min.js"></script>
    <script src="<?php echo base_url();?>js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/lib/counterup/counterup.min.js"></script>
    <script src="<?php echo base_url();?>js/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo base_url();?>js/lib/easing/easing.js"></script>
    <script src="<?php echo base_url();?>js/lib/stickyjs/sticky.js"></script>
    <script src="<?php echo base_url();?>js/lib/parallax/parallax.js"></script>
   
    
    <!-- Template Specisifc Custom Javascript File -->
    <script src="<?php echo base_url();?>js/custom.js"></script>
    
   
  </body>
</html>