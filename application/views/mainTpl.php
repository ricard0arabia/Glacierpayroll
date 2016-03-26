<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Glacier Payroll System</title>

 
     <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url()?>css/blueprint/bootstrap/css/bootstrap.min.css">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url()?>css/blueprint/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

      <!-- Timeline CSS -->
    <link href="<?php echo base_url()?>css/blueprint/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>css/blueprint/dist/css/sb-admin-2.css" rel="stylesheet">
  

<!-- ============================== Adapted resources ====================================== -->

   
   
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()?>css/blueprint/dist/css/AdminLTE.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()?>css/blueprint/dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="<?php echo base_url()?>css/blueprint/plugins/iCheck/flat/blue.css">

    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url()?>css/blueprint/plugins/morris/morris.css">

    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url()?>css/blueprint/plugins/jvectormap/jquery-jvectormap-1.2.2.css">

    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url()?>css/blueprint/plugins/datepicker/datepicker3.css">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url()?>css/blueprint/plugins/daterangepicker/daterangepicker-bs3.css">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url()?>css/blueprint/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <link href='<?php echo base_url()?>css/blueprint/x_full_calendar/fullcalendar.css' rel='stylesheet' /> 

    <link href='<?php echo base_url()?>css/blueprint/x_full_calendar/fullcalendar.print.css' rel='stylesheet' media='print' /> 

    <link rel="stylesheet" href="https://rawgit.com/seankenny/fullcalendar/v2/dist/fullcalendar.css" />

    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.print.css' rel='stylesheet' media='print' />

      <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet" />

        <link href="<?php echo base_url()?>css/blueprint/jquery-fullcalendar-crud-master/css/bootstrap-colorpicker.min.css" rel="stylesheet" />

        <link href="<?php echo base_url()?>css/blueprint/jquery-fullcalendar-crud-master/css/bootstrap-timepicker.min.css" rel="stylesheet" />
 <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/blueprint/materialize/css/materialize.min.css">

<!-- ============================== Adapted resources ====================================== -->

  

  
 
    <link rel="stylesheet" href="https://d2o3ajm80ylaik.cloudfront.net/assets/css/ui-kit.css?v=cd153e139e896a7409cc5ecb9d85c346" type="text/css" />




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body  class="hold-transition skin-blue layout-top-nav">
<style>
        
            .fc-day-grid-event>.fc-content {
                padding: 4px;
            }
            .error {
                color: #ac2925;
                margin-bottom: 15px;
            }
            .event-tooltip {
                width:150px;
                background: rgba(0, 0, 0, 0.85);
                color:#FFF;
                padding:5px;
                position:absolute;
                z-index:10001;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 11px;
            }

            #main{


              margin-left: 250px;
            }
            nav .brand-logo{

                margin-left: 20px;

            }
            .nav-wrapper{

              background-color: #082467;
            }
            .footer-copyright{
              background-color: #082467;

            }

            #nav-profile{
              background-color: grey;

            }

             #topbar{

              background-color: white;
              margin-top: 20px;
            }

    .pagination li.active{

      background-color: #082467;
    }
    .pagination>.active>a{
        border-color: #082467;
        background-color: #082467;
    }
      ul li{

        font-size: 15px;

      }
      .btn, .btn-large{

       background-color: #1EA3C3;
      }

      a:hover, a:active, a:focus{

          color: white;
      }
</style>


    <header class="main-header">
        <nav>
          <div class="nav-wrapper">
           
         <?php if($_SESSION['userLevel'] == 1) { ?>

              <a href = "<?php echo site_url()."dashboard"; ?>"class="brand-logo left"><b>Admin Portal</b></a><?php } else { ?>

               <a href = "<?php echo site_url()."dashboard"; ?>"class="brand-logo left"><b>Employee Portal</b></a>
               <?php } ?>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
         

             
              <ul  id = "main" class="left hide-on-med-and-down">

                <?php if($this->uri->segment(1) == "userprofile" || $this->uri->segment(1) == "settings") { ?> <li  class = "active" > <?php }else { ?>
                 <li> <?php } ?> <a  class="waves-effect waves-default btn-small"  href="<?php echo site_url()."userprofile"; ?>"> <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Profile</a></li>

                  <?php if($_SESSION['userLevel'] == 1) { ?>

                   <?php if($this->uri->segment(1) == "employees") { ?> <li  class = "active" > <?php }else { ?>
                 <li> <?php } ?> <a  class="waves-effect waves-default btn-small"  href="<?php echo site_url()."employees"; ?>"> <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Employee Masterfile</a></li>
                  <?php } ?>

                   <?php if($this->uri->segment(1) == "overtime" || $this->uri->segment(1) == "absences") { ?> <li  class = "active" > <?php }else { ?>
                  <li> <?php } ?> <a  class="waves-effect waves-default btn-small"  href="<?php echo site_url()."overtime"; ?>"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Time</a></li>


                  <?php if($this->uri->segment(1) == "sss" || $this->uri->segment(1) == 'mandatory' ) { ?> <li  class = "active" > <?php }else { ?>
                <li> <?php } ?> <a  class="waves-effect waves-default btn-small"  href="<?php echo site_url() ?>sss"><span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;Benefits</a></li>

                  <?php if($this->uri->segment(1) == "payslip" || $this->uri->segment(1) == 'payperiod' || $this->uri->segment(1) == "yearperiod" || $this->uri->segment(1) == 'thirteenmonth' ) { ?> <li  class = "active" > <?php }else { ?>
                <li> <?php } ?><a  class="waves-effect waves-default btn-small"  href="<?php echo site_url() ?>payperiod"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;Compensation</a></li>


               
                   
              </ul>
      

      <ul class="right hide-on-med-and-down">
         <li id = "clockDisplay" ></li>

                <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Options<i class="material-icons right">more_vert</i></a></li>

      </ul>


            
            
          </div>
        </nav>


                   <ul  id="dropdown1" class="dropdown-content">
                      <!-- The user image in the menu -->
                      <!-- Menu Footer-->
                      <li ><a style = "color: white; background-color: teal " href="<?php echo site_url()."settings"; ?>" class="btn btn-default btn-flat">Settings</a></li>
                      <li><a style = "color: white; background-color: teal " href="<?php echo site_url()."userprofile"; ?>" class="btn btn-default btn-flat">Profile</a>
                      <li><a style = "color: white; background-color:teal " href="<?php echo site_url().$this->uri->segment(1)."/logout";?>" class="btn btn-default btn-flat">Sign out</a></li>         
                    </ul>


      </header>


    
          
       <div class = "row" style = "padding: 70px;">
         
                                 <?php echo $mainCont; ?>
                          
             
          </div>


           
          

            
   


  <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
          </div>
          <strong>
            Copyright &copy; 2015-2016 <a href="#" onclick="promotion();">Bored Student Developer Studios</a>.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>


    <!-- jQuery -->
     <script src="<?php echo base_url()?>css/blueprint/plugins/jQuery/jQuery-2.1.4.min.js"></script>
     <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
 

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>css/blueprint/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url()?>css/blueprint/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url()?>css/blueprint/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>css/blueprint/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url()?>css/blueprint/plugins/morris/morris.min.js"></script>


    <!-- ======================================= Adapted resources =============================== -->





    <script>
    function renderTime() {
        var currentTime = new Date();
        var diem = "AM";
        var h = currentTime.getHours();
        var m = currentTime.getMinutes();
        var s = currentTime.getSeconds();
        setTimeout('renderTime()',1000);
        if (h == 0) {
            h = 12;
        } else if (h > 12) { 
            h = h - 12;
            diem="PM";
        }
        if (h < 10) {
            h = "0" + h;
        }
        if (m < 10) {
            m = "0" + m;
        }
        if (s < 10) {
            s = "0" + s;
        }
        var myClock = document.getElementById('clockDisplay');
        myClock.textContent = h + ":" + m + ":" + s + " " + diem;
        myClock.innerText = h + ":" + m + ":" + s + " " + diem;
    }
    renderTime();
    </script>


    <!-- Sparkline -->
    <script src="<?php echo base_url()?>css/blueprint/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- jvectormap -->
    <script src="<?php echo base_url()?>css/blueprint/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

    <script src="<?php echo base_url()?>css/blueprint/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url()?>css/blueprint/plugins/knob/jquery.knob.js"></script>

    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>

    <script src="<?php echo base_url()?>css/blueprint/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- datepicker -->
    <script src="<?php echo base_url()?>css/blueprint/plugins/datepicker/bootstrap-datepicker.js"></script>

    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url()?>css/blueprint/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

    <!-- Slimscroll -->
    <!-- SlimScroll -->

    <script src="<?php echo base_url()?>css/blueprint/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->

    <script src="<?php echo base_url()?>css/blueprint/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()?>css/blueprint/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url()?>css/blueprint/dist/js/demo.js"></script>
        

    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script src="https://rawgit.com/seankenny/fullcalendar/v2/dist/fullcalendar.js"></script>

    <script src='<?php echo base_url()?>css/blueprint/jquery-fullcalendar-crud-master/js/bootstrap-colorpicker.min.js'></script>

    <script src='<?php echo base_url()?>css/blueprint/jquery-fullcalendar-crud-master/js/bootstrap-timepicker.min.js'></script>
    <?php $session = $_SESSION['userLevel']; ?>
    <script type = "text/javascript">
    
     var session = "<?= $session ?>";

    </script>
    <script type = "text/javascript"src='<?php echo base_url()?>css/blueprint/jquery-fullcalendar-crud-master/js/main.js'></script>

       <script type='text/javascript' src="<?php echo base_url(); ?>css/blueprint/materialize/js/materialize.min.js"></script>



    <!-- ======================================= Adapted resources =============================== -->

</body>

</html>
