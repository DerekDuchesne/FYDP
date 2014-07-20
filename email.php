<?php
    
    session_start();

    if(!isset($_POST['sponsor_name'])){
        header('location: filenotfound.php');
    }

    $cel = $_POST['cel'];

    $user_email = $_SESSION['email'];

    $sponsor = $_POST['sponsor_name'];

    $sponsor_email = $_POST['address'];
 
?>
<!DOCTYPE HTML>
<html>

    <head>
        <title>FYDP</title>
        <link rel="shortcut icon" href="img/shortcut.ico">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/styles.css">

        <script>
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-43237440-1']);
            _gaq.push(['_trackPageview']);
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>
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

        <div style="text-align:center; margin-top:5%; margin-left:20%; margin-right:20%;" class="container-fluid">
            <div class="row"> 
                <div style="height:20%;" class="post_box">
                    <div class="box_title">
                       <u>Email to <?php echo $sponsor; ?></u>
                    </div>
                    <div style="margin-top:10px; margin-bottom:10px;" class="box_text">
                        <input id="cel" type="hidden" value="<?php echo $cel; ?>">
                        <input id="sponsor_email" type="hidden" name="address" value="<?php echo $sponsor_email; ?>">
                        <input id="subject" type="text" name="subject" placeholder="Enter the subject of your email here." style="width:80%;">
                        <textarea id="body" name="body" placeholder="Start typing your email here." style="width:80%; max-width:90%;"></textarea><br>
                        <button id="send_button">Send email</button>
                    </div>
                </div>
            </div> 
        </div>
            
        <script language='javascript' src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="bootstrap/js/jquery.js"></script>
        <script src ="bootstrap/js/bootstrap.js"></script>
        <script src="scripts/scripts.js"></script>
        <script src='bootstrap/js/bootstrap-dropdown.js'></script>
        <script src='bootstrap/js/bootstrap-collapse.js'></script>
        <script>
        $(document).on("click", "#send_button", function(){
            _gaq.push(["_trackEvent", "Email", "Submit", "Email"]);
        });
        </script>
    </body>

</html>

