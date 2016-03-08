<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $pageTitle?></title>
 <link rel="icon" href="<?php echo base_url(); ?>css/blueprint/assets/favico.ico"> 
 <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <!-- Import Google Font -->
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/blueprint/materialize/css/materialize.min.css">

  <style>
      *{
        font-family: 'Roboto', sans-serif;
      }
      input:not([type]):focus:not([readonly]), input[type=text]:focus:not([readonly]), input[type=password]:focus:not([readonly]), input[type=email]:focus:not([readonly]), input[type=url]:focus:not([readonly]), input[type=time]:focus:not([readonly]), input[type=date]:focus:not([readonly]), input[type=datetime-local]:focus:not([readonly]), input[type=tel]:focus:not([readonly]), input[type=number]:focus:not([readonly]), input[type=search]:focus:not([readonly]), textarea.materialize-textarea:focus:not([readonly]){
              border-bottom: 1px solid #0d47a1;
              box-shadow: 0 1px 0 0 #0d47a1;
      }
      input:not([type]):focus:not([readonly])+label, input[type=text]:focus:not([readonly])+label, input[type=password]:focus:not([readonly])+label, input[type=email]:focus:not([readonly])+label, input[type=url]:focus:not([readonly])+label, input[type=time]:focus:not([readonly])+label, input[type=date]:focus:not([readonly])+label, input[type=datetime-local]:focus:not([readonly])+label, input[type=tel]:focus:not([readonly])+label, input[type=number]:focus:not([readonly])+label, input[type=search]:focus:not([readonly])+label, textarea.materialize-textarea:focus:not([readonly])+label {
          color: #0d47a1;
      }
      .input-field .prefix.active {
            color: #0d47a1
      }
      #login-page{
        width: 330px;
        height: 577px;

      

      }
      .row p{
        text-align: center;
      }
      .toast p{
        font-size: 13px;
      }
      .row img:hover{
        cursor: pointer;
      }
    
      .row .btn:hover{
        color: #004d40;
      }
      .toast {
        font-size: 13px;
        color: #ffc107;
      }
      .blink_me {
          -webkit-animation-name: blinker;
          -webkit-animation-duration: 1s;
          -webkit-animation-timing-function: linear;
          -webkit-animation-iteration-count: 1;

          -moz-animation-name: blinker;
          -moz-animation-duration: 1s;
          -moz-animation-timing-function: linear;
          -moz-animation-iteration-count: 1;

          animation-name: blinker;
          animation-duration: 1s;
          animation-timing-function: linear;
          animation-iteration-count: 1;
      }

      @-moz-keyframes blinker {  
          0% { opacity: 1.0; }
          50% { opacity: 0.0; }
          100% { opacity: 1.0; }
      }

      @-webkit-keyframes blinker {  
          0% { opacity: 1.0; }
          50% { opacity: 0.0; }
          100% { opacity: 1.0; }
      }

      @keyframes blinker {  
          0% { opacity: 1.0; }
          50% { opacity: 0.0; }
          100% { opacity: 1.0; }
      }
      .select-wrapper span.caret {
          color: #0d47a1;
      }
      .dropdown-content li > a, .dropdown-content li > span {
          color: #0d47a1;
      }
    </style>

</head>

<body class="blue darken-4">
    
    <div id="login-page" class="row">
    <!-- <div class = "container" style = "width:auto; margin-top: 80px;">  -->
    <div class="col s12 z-depth-4 card-panel">




      <form class="login-form" method="POST" action="">
        <div class="row">
          <div class="input-field col s12 center">
           <img class="img-responsive blink_me" src="<?php echo base_url(); ?>css/blueprint/assets/logo.png" />
          </div>
        </div>
       
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input type="text" name="employeeid" placeholder="Employee Id">
            <label for="employeeid" class="center-align" name="employeeid" required>Employee Id</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
             <input type="password" name="userpass" placeholder="Password">
            <label for="userpass" name="userpass" required>Employee Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">

            <button type="submit" name="login" class="btn blue darken-4 waves-effect waves-blue col s12" value="Login">Login</button>
          </div>
        </div>
      </form>
    </div>
<!-- </div>  -->
   </div>         


    

 


    <script>
      function error(){
            Materialize.toast('Warning: Details entered are invalid!', 3000, 'rounded');
      }

      <?php
       if($error == 1){
         echo "error();";
        }
      ?>

        $(document).ready(function() {
           $('select').material_select();
         });
    </script>



    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>css/blueprint/materialize/js/materialize.min.js"></script>

  </body>


</html>
