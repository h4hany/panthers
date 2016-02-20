<?php 
   include "include/header-functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome To Cafeteria</title>    <link rel="stylesheet" href="Assets/css/bootstrap.css">
    <script src="Assets/js/jquery-1.11.2.js"></script>
    <link rel="stylesheet" href="Assets/css/style.css">
    <script src="Assets/js/bootstrap.js"></script>
    <script src="Assets/js/validate.js"></script>
    <link rel="stylesheet" href="Assets/font-awesome-4.5.0/css/font-awesome.css">


    <link rel="alternate" type="application/rss+xml" title="Latest snippets from Bootsnipp.com" href="http://bootsnipp.com/feed.rss">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://bootsnipp.com/dist/bootsnipp.min.css?ver=7d23ff901039aef6293954d33d23c066">

</head>
<body>
<!-- ---------------------------------------------------------------------------- -->
<div class="container ">
<br />
<br />
    <style type="text/css">


        .form-signin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .form-signin .form-control {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

    </style>
<!-- ------------------------------------------------------------------------------------- -->
<div class="form-horizontal">
 <?php
  $flag=1;
 if(isset($_POST['login'])){
    $email=strip_tags(trim($_POST['email']));
    $pass=md5($_POST['password']);
    $res=$shared->checkExsitUser($email); 
      $user_id=$res[0]['user_id'];
      $user_name=$res[0]['name'];
      $usertype=$res[0]['user_type'];
      $userpass=$res[0]['password'];
    if(!empty($usertype)&&!empty($user_id)){   
      if($userpass==$pass){
        $_SESSION['user_id']=$user_id;
        $_SESSION['name']=$user_name;
        $_SESSION['usertype']=$usertype;
        if(!empty($_POST['remember'])){
         if($_POST['remember']=='on'){
            setcookie("user_id", $_SESSION['user_id'], time()+3600);
          }
        }
        //echo $_SESSION['user_id'];
        //echo $_SESSION['name'];
        header('location:index.php'); 
      }else{
        echo"<p class='error red'>password not validate  try again</p>";
        $flag=0; 
      }
    }else{
      echo"<p class='error red'>email not exsits  try again</p>";
      $flag=0; 
    }
  }elseif($flag==1&&empty($_SESSION['user_id'])){
  ?>

    <nav class="navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target="#my-navbar">
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">
                    <a href="">Cafeteria</a>
                </div>
            </div>

        </div>
    </nav>
    <div class="container">
        <div class="row" style="margin-top:60px;">
            <div class="col-md-4 col-md-offset-4">
                <form method="POST" action="" role="form" id="loginform" class="form-signin">
                    <fieldset>
                        <h3 class="sign-up-title" style="color:dimgray; text-align: center">Welcome to Cafeteria <br>Please sign in</h3>

                        <hr class="colorgraph">
                        <input class="form-control email-title" placeholder="Email" name="email" type="text" id="email">
                        <input class="form-control" placeholder="Password" name="password" value="" type="password" id="mypass">

                        <div class="checkbox" style="width:140px;">
                            <label><input name="myCheck" value="Remember Me" type="checkbox"> Remember Me</label>
                        </div>
                        <input name="login"class="btn btn-lg btn-success btn-block" value="Login" type="submit">


                        <br>
                        <p class="text-center"></p>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>



</div>
</div>
<?php }else{        header('location:index.php'); } ?>
<!----------------------------------------------------------------------------------------- -->
</body>
</html>