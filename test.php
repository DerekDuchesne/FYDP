<?php
	session_start();

	//this php code makes sure that the user can't put an issue that doesn't exist as their issue parameter.
    	include 'scripts/check_cel.php';

	if($_GET['issue']){
        	$issue = verify_issue();
    	}
    	else{
        	if($_SESSION['issue']){
            		$issue = $_SESSION['issue'];
        	}
       	 	else{
            		$issue = "--None--";
        	}
    	}

?>

<!doctype html>
<html lang="en-us">
	<head>
		<title>FYDP</title>
    		<link rel="shortcut icon" href="img/shortcut.ico">
    		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    		<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
    		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body style="color:black; background-image:none;" onload="update_page('<?php echo htmlspecialchars($issue) ?>')">
		<h4>CEL List</h4>
		<form>
			<div id="cel_list"></div>
		</form>
		<br>
		<br>

		<h4>CEL Name</h4>
		 <div id="cel_title">
                              <?php if(!empty($_SESSION['status']) && $_SESSION['status'] === 'super') echo '
                             <a href=# title="Add a CEL issue" id="add"><img id="top_add_icon" src="img/add.png"></a>
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
                              if(!empty($_SESSION['status']) && $_SESSION['status'] === 'super' && $issue !== "--None--") echo '<a href=# title="Edit name" class="toggle"><img class="top_edit_icon" src="img/edit.png"></a><a href=# title="Delete" onclick="if(confirmation()) delete_cel()"><img class="top_delete_button" src="img/delete.png"></a>';
                        ?>
                             <div class="content">
                                 <div id="cel_name"></div>
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
                            </div>';
                        ?>
                    <?php if(!empty($_SESSION['status']) && $_SESSION['status'] === 'super') echo '
                         <form id="change_form">
                                <span id="change_cel_writing_area" class="read_more">
                                    <input style="margin-top:20px;" id="new_issue_name" type="text" name="issue">
                                    <button style="margin-top:10px;"  type="button" onclick="change_cel_name()">Update</button>
                                </span>
                            </form>'; ?>
		</div>
 
		<h4>Profile Icon</h4>
                <div id="profile">
                <?php if(empty($_SESSION['status'])){ echo '<form id="login_form" action="scripts/login.php" method="post"><a id="login" href="#" onclick=$("#login_form").submit(); return false;">Log in</a></form>';}
		else{
                	echo '<div class="dropdown">
                        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               		<img class="top_image" src="' . $_SESSION['picture'] . '">' . $_SESSION['username'] . '
                                </a>
                                <ul class="dropdown-menu">
                                	<li><a href="profile.php?user=' . $_SESSION['user_id'] . '">My Profile</a></li>
                                	<li><a href="/scripts/logout.php">Logout</a></li>
                                </ul>
                            </div>' ;} ?>
                </div>

                <h4>Trenton News RSS Feed</h4>
		<div id="policy_options_rss"></div>

                <h4>Problem Statement</h4>
		<div class="update">
                                <?php if(!empty($_SESSION['status']) && $_SESSION['status'] == 'super') echo '
                                <a href=# title="Edit" class="toggle"><img id="problem_icon" class="edit_icon" src="img/edit.png"></a>
                                <span id="problem_hide" class="read_more">
                                    <a class="submit" href=# title="Update" onclick="change_problem_statement()"><img class="submit_icon" src="img/submit.png"></a>
                                    <form action="" method="post">
                                        <textarea id="problem_statement_area" name="new_statement"></textarea>
                                    </form>
                                </span>';?>
                                <div id="problem_statement">
                                </div>
                </div>

		<h4>Volunteering Opportunities</h4>
		 <div class="update">
                                <?php if(!empty($_SESSION['status']) && $_SESSION['status'] == 'super') echo '
                                 <a href=# title="Edit" class="toggle"><img id="volunteer_icon" class="edit_icon" src="img/edit.png"></a>
                                <span id="volunteer_hide" class="read_more">
                                    <a class="submit" href=# title="Update" onclick="change_volunteering()"><img class="submit_icon" src="img/submit.png"></a>
                                    <form action="" method="post">
                                        <textarea id="volunteering_opportunities_area" rows="5" cols="60" name="new_volunteering"></textarea>
                                    </form>
                                </span>'; ?>
                                <div id="volunteering_opportunities">
                                </div>
                 </div>

                <h4>Featured Bills:</h4>
                 <div class="update">
                                <?php if(!empty($_SESSION['status']) && $_SESSION['status'] === 'super') echo '
                         <a href=# title="Edit" class="toggle"><img id="bill_icon" class="edit_icon" src="img/edit.png"></a>'; ?>
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

		<h4>Organize</h4>
		<div class="update">
                        <?php if(!empty($_SESSION['status']) && $_SESSION['status'] === 'super') echo '
                             <a href=# title="Edit" class="toggle"><img id="petition_icon" class="edit_icon" src="img/edit.png"></a>
                            <span id="petition_hidden" class="read_more">
                                <a class="submit"  href=# title="Update" onclick="change_petition()"><img class="submit_icon" src="img/submit.png"></a>
				<form action="" method="post">
                                	<textarea id="petition_area" name="new_petition"></textarea>
				</form>
                            </span>'; ?>
                            <div id="petition">
                            </div>
                </div>

		<h4>Democracy 101</h4>
		<div class="update">
                	<?php if(!empty($_SESSION['status']) && $_SESSION['status'] == 'super') echo '
                       	<a href=# title="Edit" class="toggle"><img id="dem101_icon" class="edit_icon" src="img/edit.png"></a>
                        <span id="dem101_hide" class="read_more">
                                <a class="submit" href=# title="Update" onclick="change_dem101()"><img class="submit_icon" src="img/submit.png"></a>
                                <form action="" method="post">
                                	<textarea id="dem101_area" name="new_dem101"></textarea>
                        	</form>
                        </span>';?>
                        <div id="dem101">
                	</div>
                </div>

		<h4>Vote</h4>
		<div id="voting"></div>

		<h4>Inspire Me</h4>
		<div class="update">
                                <?php if(!empty($_SESSION['status']) && $_SESSION['status'] == 'super') echo '
                                <a href=# title="Edit" class="toggle"><img id="inspire_icon" class="edit_icon" src="img/edit.png"></a>
                                <span id="inspire_hide" class="read_more">
                                    <a class="submit" href=# title="Update" onclick="change_inspire()"><img class="submit_icon" src="img/submit.png"></a>
                                    <form action="" method="post">
                                        <textarea id="inspire_area" name="new_inspire"></textarea>
                                    </form>
                                </span>';?>
                                <div id="inspire">
                                </div>
                </div>

		<h4>Faculty Corner</h4>
		 <div class="update">
                                <?php if(!empty($_SESSION['status']) && $_SESSION['status'] == 'super') echo '
                                <a href=# title="Edit" class="toggle"><img id="corner_icon" class="edit_icon" src="img/edit.png"></a>
                                <span id="corner_hide" class="read_more">
                                    <a class="submit" href=# title="Update" onclick="change_corner()"><img class="submit_icon" src="img/submit.png"></a>
                                    <form action="" method="post">
                                        <textarea id="corner_area" name="new_corner"></textarea>
                                    </form>
                                </span>';?>

                                <div id="corner">
                                </div>
                </div>


		<h4>Blog</h4>
		<div id="posts"></div>
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


                <script language='javascript' src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src ="bootstrap/js/bootstrap.js"></script>
		<script src="scripts/scripts.js"></script>
	</body>
</html>
