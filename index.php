<!DOCTYPE html>
<html lang="en-US">

    <head>

        <title>FYDP</title>
        <link rel="shortcut icon" href="img/shortcut.ico">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/styles.css">

        <script type="text/javascript">

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
    
    <body onload="update_page('<?php echo htmlspecialchars($issue) ?>')">

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div id="masthead" style="color:white;" class="container-fluid">
                    <a id="logo" class="brand" href="http://pericles.tcnj.edu">First Year Democracy Project</a>
                    <div class="select_box">
                        <form>
                            <h5 id="cel_select_text">Select a CEL Issue:</h5>
                            <div id="cel_list">
                            </div>
                        </form>
                    </div>
                    <div style="margin-left:1px;">Trenton News Feed via PolicyOptions.org</div>
                    <div id="policy_options_rss">
                    </div>
                    <div id="profile" class="nav pull-right">
                      <?php if(empty($_SESSION['status'])){ echo '
                        <form id="login_form" action="scripts/login.php" method="post">
                            <a id="login" href="#" onclick=$("#login_form").submit(); return false;">
                                <h5 style="color:white;"><i class="icon-user icon-white"></i>Log in</h5>
                            </a>
                        </form>';}else{echo '
                        <div class="dropdown">
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

        <div id="main_content" class="container-fluid">
            <div class="row-fluid">
                <div class="span4">
                     <div class="row">
                        <div class="box">
                            <div class="box_title"><i class="icon-flag icon-white"></i><u>DEMOCRACY 101!</u></div>
                            <div class="box_text">
                                <div class="update">
                                    <?php if(!empty($_SESSION['status']) && $_SESSION['status'] == 'super') echo '
                                    <a href=# title="Edit" class="toggle">
                                        <img id="dem101_icon" class="edit_icon" src="img/edit.png">
                                    </a>
                                    <span id="dem101_hide" class="read_more">
                                        <a class="submit" href=# title="Update" onclick="change_dem101()">
                                            <img class="submit_icon" src="img/submit.png">
                                        </a>
                                        <form action="" method="post">
                                            <textarea id="dem101_area" name="new_dem101"></textarea>
                                        </form>
                                    </span>';?>
                                    <div id="dem101">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="box">
                            <div class="box_title"><i class="icon-pencil icon-white"></i><u>VOTE!</u></div>
                            <div class="box_text">
                                <div id="voting">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="box">
                            <div class="box_title"><i class="icon-comment icon-white"></i><u>INSPIRE ME!</u></div>
                            <div class="box_text">
                                <div class="update">
                                    <?php if(!empty($_SESSION['status']) && $_SESSION['status'] == 'super') echo '
                                    <a href=# title="Edit" class="toggle">
                                        <img id="inspire_icon" class="edit_icon" src="img/edit.png">
                                    </a>
                                    <span id="inspire_hide" class="read_more">
                                        <a class="submit" href=# title="Update" onclick="change_inspire()">
                                            <img class="submit_icon" src="img/submit.png">
                                        </a>
                                        <form action="" method="post">
                                            <textarea id="inspire_area" name="new_inspire"></textarea>
                                        </form>
                                    </span>';?>
                                    <div id="inspire">
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="box">
                            <div class="box_title"><i class="icon-list-alt icon-white"></i><u>FACULTY CORNER!</u></div>
                            <div class="box_text">
                                <div class="update">
                                    <?php if(!empty($_SESSION['status']) && $_SESSION['status'] == 'super') echo '
                                    <a href=# title="Edit" class="toggle">
                                        <img id="corner_icon" class="edit_icon" src="img/edit.png">
                                    </a>
                                    <span id="corner_hide" class="read_more">
                                        <a class="submit" href=# title="Update" onclick="change_corner()">
                                            <img class="submit_icon" src="img/submit.png">
                                        </a>
                                        <form action="" method="post">
                                            <textarea id="corner_area" name="new_corner"></textarea>
                                        </form>
                                    </span>';?>
                                    <div id="corner">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span4" align="center">
                    <div class="row">
                        <div id="cel_title" class="box">
                            <div class="box_title"><u>ISSUE NAME</u>
                                  <?php 
                                  if(!empty($_SESSION['status']) && $_SESSION['status'] === 'super' && $issue !== "--None--") echo '
                                    <a href=# title="Delete" onclick="if(confirmation()) delete_cel()">
                                        <img class="top_delete_button" src="img/delete.png">
                                    </a>
                                    <a href=# title="Edit name" class="toggle">
                                        <img class="top_edit_icon" src="img/edit.png">
                                    </a>';
                                 if(!empty($_SESSION['status']) && $_SESSION['status'] === 'super')  echo '
                                    <a href=# title="Add a CEL issue" id="add">
                                        <img id="top_add_icon" src="img/add.png">
                                    </a>
                                     <div style="display:none;" class="overlay"></div>
                                     <div style="display:none;" id="add_box">
                                         <form id="add_form">
                                             <span id="add_cel_writing_area">
                                                 <h4 style="color:black;">New Issue:</h4>
                                                 <input style="margin:20px;"class="update_field" id="new_issue" type="text" name="issue" placeholder="Name of cel issue">
                                                 <button class="add_button" type="button" onclick="add_cel()">Add</button>
                                             </span>
                                         </form>
                                     </div>';
                                ?>
                            </div>
                            <div class="box_text">
                                 <div class="content">
                                    <h3><div id="cel_name"></div></h3>
                                 </div>
                                 <?php if(!empty($_SESSION['status']) && $_SESSION['status'] === 'super') echo'
                                 <div style="display:none;" class="overlay"></div>
                                 <div style="display:none;" class="add_box">
                                    <form id="add_form">
                                        <span id="add_cel_writing_area">
                                            <h4>New Issue:</h4>
                                            <input style="margin:20px;"class="update_field" id="new_issue" type="text" name="issue" placeholder="Name of cel issue">
                                            <button class="add_button" type="button" onclick="add_cel()">Add</button>
                                        </span>
                                    </form>
                                </div>'; ?>
                                <?php if(!empty($_SESSION['status']) && $_SESSION['status'] === 'super') echo '
                                <form id="change_form">
                                    <span id="change_cel_writing_area" class="read_more">
                                        <input style="margin-top:20px;" id="new_issue_name" type="text" name="issue">
                                        <button style="margin-top:10px;"  type="button" onclick="change_cel_name()">Update</button>
                                    </span>
                                </form>'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="post_box">
                            <div class="box_title"><i class="icon-book icon-white"></i><u>BLOG</u></div>
                            <div class="box_text">
                               <div id="posts">
                               </div>
                               <?php
                                if(!empty($_SESSION['status'])){                
                                echo '
                                <div id="post_entry" class="update">
                                    <a href=# class="toggle">Write a post</a>
                                    <span id="post_writing_area" class="read_more">
                                        <form>
                                            <textarea id="new_post" class="post"></textarea> <br>
                                            <button id="post_button" type="button" onclick="post_message()">Post</button>
                                        </form>
                                    </span>
                                </div>';}
                               ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="row">
                        <div class="box">
                            <div class="box_title"><i class="icon-leaf icon-white"></i><u>LEARN!</u></div>
                            <div class="box_text">
                                <div class="update">
                                    <?php if(!empty($_SESSION['status']) && $_SESSION['status'] == 'super') echo '
                                    <a href=# title="Edit" class="toggle">
                                        <img id="problem_icon" class="edit_icon" src="img/edit.png">
                                    </a>
                                    <span id="problem_hide" class="read_more">
                                        <a class="submit" href=# title="Update" onclick="change_problem_statement()">
                                            <img class="submit_icon" src="img/submit.png">
                                        </a>
                                        <form action="" method="post">
                                            <textarea id="problem_statement_area" name="new_statement"></textarea>
                                        </form>
                                    </span>';?>
                                    <div id="problem_statement">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="box">
                            <div class="box_title"><i class="icon-heart icon-white"></i><u>SERVE!</u></div>
                            <div class="box_text">
                                <div class="update">
                                    <?php if(!empty($_SESSION['status']) && $_SESSION['status'] == 'super') echo '
                                     <a href=# title="Edit" class="toggle">
                                        <img id="volunteer_icon" class="edit_icon" src="img/edit.png">
                                    </a>
                                    <span id="volunteer_hide" class="read_more">
                                        <a class="submit" href=# title="Update" onclick="change_volunteering()">
                                            <img class="submit_icon" src="img/submit.png">
                                        </a>
                                        <form action="" method="post">
                                            <textarea id="volunteering_opportunities_area" rows="5" cols="60" name="new_volunteering"></textarea>
                                        </form>
                                    </span>'; ?>
                                    <div id="volunteering_opportunities">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <span id="comment" title="">
                        <div class="box">
                            <div class="box_title"><i class="icon-bullhorn icon-white"></i><u>SHOUT!</u></div>
                            <div class="box_text">
                                <div class="update">
                                    <?php if(!empty($_SESSION['status']) && $_SESSION['status'] === 'super') echo '
                                    <a href=# title="Edit" class="toggle">
                                        <img id="bill_icon" class="edit_icon" src="img/edit.png">
                                    </a>'; ?>
                                    <?php
                                    if(!empty($_SESSION['status']) && $_SESSION['status'] === 'super') echo '
                                    <div id="edit_bill_area">
                                        <span id="existing_bills" class="read_more">
                                           <div id="featured_bills">
                                           </div>
                                           <input id="new_bill" type="text" name="new_bill" placeholder="Enter a bill number here.">
                                           <input id="new_bill_button" style="margin-top:-10px;" type="submit" value="Add" onclick="add_bill();"/>
                                        </span>
                                    </div>';                              
                                    ?>
                                    <div id="bill">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </span>
                    </div>
                    <div class="row">
                        <div class="box">
                            <div class="box_title"><i class="icon-globe icon-white"></i><u>ORGANIZE!</u></div>
                            <div class="box_text">
                                <div class="update">
                                <?php if(!empty($_SESSION['status']) && $_SESSION['status'] === 'super') echo '
                                     <a href=# title="Edit" class="toggle">
                                        <img id="petition_icon" class="edit_icon" src="img/edit.png">
                                    </a>
                                    <span id="petition_hidden" class="read_more">
                                        <a class="submit"  href=# title="Update" onclick="change_petition()">
                                            <img class="submit_icon" src="img/submit.png">
                                        </a>
                                        <textarea id="petition_area" rows="5" cols="60" name="new_petition"></textarea>
                                    </span>'; ?>
                                    <div id="petition">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="row">
                        <div class="watch_box">
                            <div class="box_title"><i class="icon-facetime-video icon-white"></i><u>WATCH!</u></div>
                            <div class="box_text">
                                <?php if($_SESSION['status'] === 'super') echo '
                                <a href=# title="Edit" class="toggle">
                                    <img id="video_icon" class="edit_icon" src="img/edit.png">
                                </a>'; ?>
                                <div id="video_link">
                                </div>
                                <?php if($_SESSION['status'] === 'super') echo '
                                <div class="update">
                                    <span id="link_hidden" class="read_more">
                                        <a class="submit"  href=# title="Update" onclick="change_video_link()">
                                            <img class="submit_icon" src="img/submit.png">
                                        </a>
                                        <input id="video_link_area" type="text" name="new_video" placeholder="Put a youtube link here.">
                                    </span>
                                </div>'; 
                                ?>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <div id="footer" class="navbar navbar-fixed-bottom">
            <div id="left_footer" class="span2">
                Learn more about Bonner at <a href="http://bonner.pages.tcnj.edu/">http://bonner.pages.tcnj.edu/</a>
            </div>
            <div id="center_footer" class="span8">
                About the First Year Democracy Project:<br>
                This site is a community portal for first year students at TCNJ to learn more about their CEL issue, the NJ legislature, and Trenton news.
            </div>
            <div id="right_footer" class="span2">
                Site created using Twitter Bootstrap.
            </div>
        </div> 
        <script language='javascript' src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src ="bootstrap/js/bootstrap.js"></script>
        <script src="scripts/scripts.js"></script>

        <!-- Google Analytics -->
        <script>    

            //tracks user events
            <?php if($_SESSION['status']) echo '
            $(document).on("click", ".analytics", function(){
                var cel = $("#cel_list").find(":selected").text();
                _gaq.push(["_trackEvent", "Link", "Click", $(this).attr("id")]);
                console.log($(this).attr("id"));
            });'; ?>

            <?php if($_SESSION['status']) echo'
            $(document).on("click", "#post_button", function(){
                var cel = $("#cel_list").find(":selected").text();
                var user_cel =' . $_SESSION['issue'] . ';
                if(cel != user_cel){
                    _gaq.push(["_trackEvent", "Post", "Submit", "Post outside of given CEL"]);
                }
            });' ?>

        </script>

    </body>

</html>
        
        
