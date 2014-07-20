<?php

    include 'scripts/get_user.php';
    
    session_start();

    $user_info = get_user_info($_GET['user']);

    $name = $user_info[0];
    $picture = $user_info[1];
    if($user_info[2] === NULL){
        $issue = "None";
    }
    else{
        $issue = $user_info[2];
    }
    if($user_info[3] === NULL){
        $course = "None";
    }
    else{
        $course = $user_info[3];
    }

    if($name === NULL){
        header('location: filenotfound.php');
    }
 
?>
<!DOCTYPE HTML>
<html>

    <head>
        <title>FYDP</title>
        <link rel="shortcut icon" href="img/shortcut.ico">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a style="margin-top:0.5%; margin-right:50px;" class="brand" href="http://pericles.tcnj.edu">First Year Democracy Project</a>
                    <div id="profile" class="nav pull-right">
                      <?php if(!$_SESSION['status']){ echo '<a href="login.php"><h5 style="color:white;"><i class="icon-user icon-white"></i>Log in</h5></a>';}else{
                          echo '<div class="dropdown">
                                    <a style="color:white;" href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img class="top_image" src="' . $_SESSION['picture'] . '">' . $_SESSION['username'] . '
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="profile.php?user=' . $_SESSION['user_id'] . '">My Profile</a></li>
                                        <li><a href="/scripts/logout.php">Logout</a></li>
                                    </ul>
                                </div>' ;} ?>
                      </div>
                </div>
            </div>
        </div>

        <div style="margin-top:5%" class="container-fluid"> 
            <div class="row" style="text-align:center;"> 
                <div class="update">
                 <?php if($_SESSION['user_id'] === $_GET['user']){ echo
                 '<form action="scripts/upload_file.php" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="user" value="' . $name . '">
                      <a title="Change picture" href="#" class="toggle_picture"><img class="profile_image" src="' . $picture . '"></a><style>img.profile_image:hover{opacity:0.6; filter:alpha(opacity=60);}</style>
                      <input type="file" id="file" name="file" onchange="form.submit()"  style="display:none;">
                 </form>';} 
                 else{ echo '
                 <img class="profile_image" src="' . $picture . '">';}?>
            </div>
            <div class="row" style="text-align:center">
                <h3 style="color:white;"><?php echo $name; ?></h3>
            </div>
            <div class="row" stye="text-align:center">
                <h3 style="color:white;"><?php if($_SESSION['user_id'] === $_GET['user']){ echo 'My FSP course: ' . $course;}else{ echo 'FSP course: ' . $course;} ?></h3>
                <h3 style="color:white;"><?php if($_SESSION['user_id'] === $_GET['user']){ echo 'My CEL issue: ' .  $issue;}else{ echo 'CEL issue: ' . $issue;} ?></h3>
            </div>
        </div>
            
        <script language='javascript' src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="bootstrap/js/jquery.js"></script>
        <script src ="bootstrap/js/bootstrap.js"></script>
        <script src="scripts/scripts.js"></script>
        <script src='bootstrap/js/bootstrap-dropdown.js'></script>
        <script src='bootstrap/js/bootstrap-collapse.js'></script>
    </body>

</html>
