
//update cel list and select the current cel
function update_cel_list(cel){
    $("#cel_list").html("<img class='loading' src='img/preloader.gif'>");
    $.ajax({
        type: "GET",
        url: "scripts/get_cel_list.php",
        data: {
            cel: cel
        },
        success: function(data){
            $("#cel_list").html(data);
        }
    });
}

var itemNum = 0;
var maxItems = 5;

get_newest_rss();
window.setInterval(get_newest_rss, 12000);

//gets the policy options rss feed data
function get_newest_rss(){
    $("#policy_options_rss").html("<img class='loading' src='img/preloader.gif'>");
    $.ajax({
        type: "GET",
        url: "scripts/get_newsfeed.php",
        data: {
            itemNum: itemNum
        },
        success: function(data){
            $("#policy_options_rss").html(data);
        }
    });
    itemNum++;
    if(itemNum >= maxItems){
        itemNum = 0;
    }
    
}

//updates the democracy 101 box
function update_dem101(cel){
    $("#dem101").html("<img class='loading' src='img/preloader.gif'>");
    var url = "scripts/get_dem101.php";
    $.ajax({
        type: "GET",
        cache: false,
        url: url,
        data: {
            cel: cel
        },
        success: function(data){
            $("#dem101").html(formatDisplayText(data));
            $("#dem101_area").val(formatEditText($("#dem101").find("p").html()));
        }
    });
}

//updates the inspire me box
function update_inspire(cel){
     $("#inspire").html("<img class='loading' src='img/preloader.gif'>");
    $.ajax({
        type: "GET",
        cache: false,
        url: "scripts/get_inspire.php",
        data: {
            cel: cel
        },
        success: function(data){
            $("#inspire").html(formatDisplayText(data));
            $("#inspire_area").val(formatEditText($("#inspire").find("p").html()));
        }
    });
}

//updates the faculty corner box
function update_corner(cel){
     $("#corner").html("<img class='loading' src='img/preloader.gif'>");
    $.ajax({
        type: "GET",
        cache: false,
        url: "scripts/get_faculty_corner.php",
        data: {
            cel: cel
        },
        success: function(data){
            $("#corner").html(formatDisplayText(data));
            $("#corner_area").val(formatEditText($("#corner").find("p").html()));
        }
    });
}

//updates posts
function update_posts(cel){
     $("#posts").html("<img class='loading' src='img/preloader.gif'>");
    $.ajax({
        type: "GET",
        url: "scripts/get_posts.php",
        data: {
            cel: cel
        },
        success: function(data){
            if($("#posts").html(data) != ""){
                $("#posts").html(formatDisplayText(data));
            }
            else{
                $("#posts").html(data);
            }
        }
    });
}

//updates problem statement
function update_problem_statement(cel){
    $("#problem_statement").html("<img class='loading' src='img/preloader.gif'>");
    $.ajax({
        type: "GET",
        cache: false,
        url: "scripts/get_problem_statement.php",
        data: {
            cel: cel
        },
        success: function(data){
            $("#problem_statement").html(formatDisplayText(data));
            $("#problem_statement_area").val(formatEditText($("#problem_statement").find("p").html()));
        }
    });
}

//updates the volunteering information
function update_volunteering(cel){
    $("#volunteering_opportunities").html("<img class='loading' src='img/preloader.gif'>");
    $.ajax({
        type: "GET",
        cache: false,
        url: "scripts/get_volunteering_opportunities.php",
        data: {
           cel: cel
        },
        success: function(data){
            $("#volunteering_opportunities").html(formatDisplayText(data));
            $("#volunteering_opportunities_area").val(formatEditText($("#volunteering_opportunities").find("p").html()));
        }
    });
} 

//updates bill
function update_bill(cel, num){
    $("#bill").html("<img class='loading' src='img/preloader.gif'>");
    $.ajax({
        type: "GET",
        cache: false,
        url: "scripts/get_bill.php",
        data: {
            cel: cel,
            bill_num: num
        },
        success: function(data){
            $("#bill").html(data);
            $("#bill_icon").attr("src", "img/edit.png");
        }
    });
    $("#bill_icon").attr("src", "img/edit.png");
}

//updates the list of bills in the bill edit area
function update_featured_bills(cel){
    $.ajax({
        type: "GET",
        cache: false,
        url: "scripts/get_featured_bills.php",
        data: {
            cel: cel
        },
        success: function(data){
            $("#featured_bills").html(data);
        }
    });
}

//updates the petition
function update_petition(cel){
     $("#petition").html("<img class='loading' src='img/preloader.gif'>");
    $.ajax({
        type: "GET",
        cache: false,
        url: "scripts/get_petition.php",
        data: {
            cel: cel
        },
        success: function(data){
            $("#petition").html(formatDisplayText(data));
            $("#petition_area").val(formatEditText($("#petition").find("p").html()));
        }
    });
}

//update the video
function update_video(cel){
     $("#video_link").html("<img class='loading' src='img/preloader.gif'>");
    $.ajax({
        type: "GET",
        url: "scripts/get_video_link.php",
        data: {
            cel: cel
        },
        success: function(data){
            $("#video_link").html(data);
        }
    });
}

function update_page(cel){
    
    update_cel_list(cel);

    //puts the current cel issue as the default value for the change cel name selection field
    $("#new_issue_name").val(cel);
    
    if(cel != "--None--"){
        $(".toggle").show();
        $("#edit_box").show();
        $("#cel_name").append(cel);
        $("#post_entry").show();
        update_dem101(cel);
        update_inspire(cel);
        update_corner(cel);
        update_posts(cel);
        update_problem_statement(cel);
        update_volunteering(cel);
        update_bill(cel, 0);
        update_featured_bills(cel);
        update_petition(cel);
        //update voting
        $("#voting").html('<p><a id="Check Registration Link" class="analytics" href=https://voter.njsvrs.com/PublicAccess/servlet/com.saber.publicaccess.control.PublicAccessNavigationServlet?USERPROCESS=PublicSearch#">Check if you are registered to vote.</a></p><p><a id="NJ Registration Link" class="analytics" href="http://www.state.nj.us/state/elections/form_pdf/voter-regis-forms/statewide-voter-reg-form-062212.pdf">NJ registration form</a></p><p><a id="Out of State Registration Link" class="analytics" href="https://register.rockthevote.com/registrants/new">Out of state registration form</a></p><p>*Note*: Even if you are already registered to vote, you can change your registration address to Ewing by checking the Address Change box on the NJ registration form and entering Ewing as your address.</p><p><a id="Absentee Ballot Link" class="analytics" href="http://www.longdistancevoter.org/files/voter_forms/NewJersey_absentee_english.pdf">Absentee ballot form</a></p>');

        //update_video(cel);
    }
    else{
        $("#demo101").html("");
        $("#inspire").html("");
        $("#corner").html("");
        $("#problem_statement").html("");
        $("#volunteering_opportunities").html("");
        $("#comment").attr({title: ""});
        $("#bill").html("");
        $("#petition").html("");
        $("#voting").html("");
        $("#video_link").html("");
        $(".toggle").hide();
        $("#add_button").show();
        $("#edit_box").hide();
        $("#cel_title").find(".content").html('Please select a CEL issue');
        $("#post_entry").hide();
        $("#posts").html("");
    }
}

//activates when a new cel is selected in the dropdown menu
function switch_cel(){
    var cel = $("#cel_list").find(":selected").text();
    $.ajax({
        type: "POST",
        url: "scripts/switch_cel.php",
        data: {
            cel: cel
        },
        success: update_page(cel)});
}

//activates when a user adds a cel issue
function add_cel(){
    var cel = $("#new_issue").val();
    $.ajax({
        type: "POST",
        url: "scripts/add_cel.php",
        data: {
            cel: cel
        },
        success: function(){
            $("#add_form").submit();
        }});
}

function change_cel_name(){
    var old_cel = $("#cel_list").find(":selected").text();
    var new_cel = $("#new_issue_name").val();
    $.ajax({
        type: "POST",
        url: "scripts/change_cel_name.php",
        data: {
            old_cel: old_cel,
            new_cel: new_cel
        },
        success: function(){
            $("#change_form").submit();
        }});
}

function delete_cel(){
    var cel = $("#cel_list").find(":selected").text();
    $.ajax({
        type: "POST",
        url: "scripts/delete_cel.php",
        data: {
            cel: cel
        },
        success: function(){
            window.location.href='http://pericles.tcnj.edu?issue=--None--';
        }});
}

//activates when the user updates the democracy 101 information
function change_dem101(){
    var cel = $("#switched_cel").find(":selected").text();
    var new_dem101 = $("#dem101_area").val();
    $.ajax({
        type: "POST",
        url: "scripts/change_dem101.php",
        data: {
            cel: cel,
            new_dem101: new_dem101
        },
        success: function(){
            $("#dem101_hide").toggle();
            update_dem101(cel);
        }
    });
    $("#dem101_icon").attr("src", "img/edit.png");
    $("#dem101_icon").parents(".box").css("max-height", "130px");
}

//activates when the user updates the inspire me information
function change_inspire(){
    var cel = $("#switched_cel").find(":selected").text();
    var new_inspire = $("#inspire_area").val();
    $.ajax({
        type: "POST",
        url: "scripts/change_inspire.php",
        data: {
            cel: cel,
            new_inspire: new_inspire
        },
        success: function(){
            $("#inspire_hide").toggle();
            update_inspire(cel);
        }
    });
    $("#inspire_icon").attr("src", "img/edit.png");
    $("#inspire_icon").parents(".box").css("max-height", "130px"); 
}

//activates when the user updates the faculty corner information
function change_corner(){
    var cel = $("#switched_cel").find(":selected").text();
    var new_corner = $("#corner_area").val();
    $.ajax({
        type: "POST",
        url: "scripts/change_faculty_corner.php",
        data: {
            cel: cel,
            new_corner: new_corner
        },
        success: function(){
            $("#corner_hide").toggle();
            update_corner(cel);
        }
    });
    $("#corner_icon").attr("src", "img/edit.png");
    $("#corner_icon").parents(".box").css("max-height", "130px");
}

//activates when the user posts a message
function post_message(){
    var cel = $("#switched_cel").find(":selected").text();
    var message = $("#new_post").val();
    $.ajax({
        type: "POST",
        url: "scripts/post_message.php",
        data: {
            cel: cel,
            message: message
        },
        success: function(){
            $("#new_post").val('');
            $("#post_writing_area").toggle();
            update_posts(cel);
        }
    });
    _gaq.push(["_trackEvent", "Post", "Submit", "Post"]);

}

//activates when you delete a post
function delete_post(post_id){
    var cel = $("#switched_cel").find(":selected").text();
    console.log(post_id);
    $.ajax({
        type: "POST",
        url: "scripts/delete_post.php",
        data: {
            post_id: post_id
        },
        success: function(){
            update_posts(cel);
        }
    }); 
}

//activates when a user changes the problem statement
function change_problem_statement(){
    var cel = $("#switched_cel").find(":selected").text();
    var new_statement = $("#problem_statement_area").val();
    $.ajax({
        type: "POST",
        url: "scripts/change_problem_statement.php",
        data: {
            cel: cel,
            new_statement: new_statement
        },
        success: function(){
            $("#problem_hide").toggle();
            update_problem_statement(cel);
        }
    });
    $("#problem_icon").attr("src", "img/edit.png");
    $("#problem_icon").parents(".box").css("max-height", "130px");
}       

//activates when the user changes the volunteering information
function change_volunteering(){
    var cel = $("#switched_cel").find(":selected").text();
    var new_volunteering = $("#volunteering_opportunities_area").val();
    $.ajax({
        type: "POST",
        url: "scripts/change_volunteering.php",
        data: {
            cel: cel,
            new_volunteering: new_volunteering
        },
        success: function(){
            $("#volunteer_hide").toggle();
            update_volunteering(cel);
        }
    });
    $("#volunteer_icon").attr("src", "img/edit.png");
    $("#volunteer_icon").parents(".box").css("max-height", "130px");
}

//activates when the user adds a bill
function add_bill(){
    var cel = $("#switched_cel").find(":selected").text();
    var new_bill = $("#new_bill").val();
    $.ajax({
        type: "POST",
        url: "scripts/add_bill.php",
        data: {
            cel: cel,
            new_bill: new_bill
        },
        success: function(data){
            if(data == "Does not exist error"){
                alert("The bill you entered does not exist in our database.");
            }
            else{
                    if(data == "Duplicate error"){
                        alert("The bill you entered is already in the list.");
                    }
                    else{
                        $("#new_bill").val("");
                        $("#bill_icon").css("display", "inline");
                        update_featured_bills(cel);
                    }
            }
        }
    });
}

//activates when the user clicks the delete button on a bill
function delete_bill(bill_id){
    var cel = $("#switched_cel").find(":selected").text();
    $.ajax({
        type: "POST",
        url: "scripts/delete_bill.php",
        data: {
            cel: cel,
            bill: bill_id
        },
        success: function(data){
            if(data === "Error"){
                alert("The bill you entered does not exist in our database.");
            }
            else{
                update_featured_bills(cel);
            }
        }
    });
}

//activates when the user changes the petition
function change_petition(){
    var cel = $("#switched_cel").find(":selected").text();
    var new_petition = $("#petition_area").val();
    $.ajax({
        type: "POST",
        url: "scripts/change_petition.php",
        data: {
            cel: cel,
            new_petition: new_petition
        },
        success: function(){
            $("#petition_area").val("");
            $("#petition_hidden").toggle();
            update_petition(cel);
        }
    });
    $("#petition_icon").attr("src", "img/edit.png");
    $("#petition_icon").parents(".box").css("max-height", "130px");
}

//activates when the user changes the video link
function change_video_link(){
    var cel = $("#switched_cel").find(":selected").text();
    var new_video_link = $("#video_link_area").val();
    $.ajax({
        type: "POST",
        url: "scripts/change_video_link.php",
        data: {
            cel: cel,
            new_video_link: new_video_link
        },
        success: function(){
            $("#video_link_area").val("");
            $("#link_hidden").toggle();
            update_video(cel);
        }
    });
    $("#video_icon").attr("src", "img/edit.png");
}

function show_editor(){
    $(".toggle").show();
}

$("a.delete_button").click(function(event){
    event.preventDefault();
});

$(document).ready(function(){
    //hides the input boxes
    $(".read_more").hide();
    $(".toggle").hide();
    $("#username").focus();

    //enable tabs within a textarea
    $("textarea").keydown(function(e){
        if(e.keyCode == 9){
            e.preventDefault();
            var start = $(this).get(0).selectionStart;
            var end = $(this).get(0).selectionEnd;
            $(this).val($(this).val().substring(0, start) + "\t" + $(this).val().substring(end));
            $(this).get(0).selectionStart = $(this).get(0).selectionEnd = start + 1;
        }   
    });
    
    //Allows you to hit enter when adding a CEL
    $("#add_form").keydown(function(e){
        if(e.keyCode == 13){
            e.preventDefault();
            add_cel();
        }
    });

    //Allows you to hit enter when editing a CEL name
    $("#change_form").keydown(function(e){
        if(e.keyCode == 13){
            e.preventDefault();
            change_cel_name();
        }
    });

    //Allows you to hit enter when adding a bill
    $("#new_bill").keydown(function(e){
        if(e.keyCode == 13){
            e.preventDefault();
            $("#new_bill_button").click();
        }
    });

    //shows the input boxes whenever the user clicks
    $("a.toggle").click(function(event){
        event.preventDefault();
        if($(this).find("img").attr("src") == "img/edit.png"){
            $(this).find("img").attr("src", "img/edit_active.png");
            $(this).parents(".box").css("max-height", "none");
        }
        else{
            $(this).find("img").attr("src", "img/edit.png");
        }
        $(this).parents(".update").find(".read_more").toggle();
        $(this).parents(".update").find(".content").toggle();
        $(this).parents(".update").find("input").focus();
        $(this).parents(".update").find("textarea").focus();
    });

    //toggles the edit cel name field
    $(".top_edit_icon").click(function(event){
        $("#change_cel_writing_area").toggle();
        $(this).parents("#cel_title").find(".content").toggle();
    });
    
    $("#bill_icon").click(function(event){
        if($("#bill_icon").attr("src") == "img/edit_active.png"){
            update_bill($("#switched_cel").find(":selected").text());
        }
    });

    $("#add").click(function(event){
        event.preventDefault();
        if($("#top_add_icon").attr("src") == "img/add.png"){
            $("#top_add_icon").attr("src", "img/add_active.png");
        }
        else{
            $("#top_add_icon").attr("src", "img/add.png");
        }
        $(".overlay").css('display', 'inline');
        $("#add_box").css('display', 'inline');
        $("#new_issue").focus();
    });

    $(".overlay").click(function(event){
        event.preventDefault();
        $(".overlay").css('display', 'none');
        $("#add_box").css('display', 'none');
        $("#top_add_icon").attr("src", "img/add.png");
    });

    $("a.submit").click(function(event){
        event.preventDefault();
    });

     //shows the upload picture button when the user hits the edit button on their profile page
    $("a.toggle_picture").click(function(event){
        event.preventDefault();
        $(this).parents(".update").find("#file").click();
    });
     
});
 
function formatDisplayText(text){
    text = text.replace(/\r?\n/g, "<br />");
    text = text.replace(/\t/g, "&nbsp;&nbsp;&nbsp;&nbsp;");
    text = replaceDisplayUrls(text);
    return text;
}

function formatEditText(text){ 
    text = text.replace(/\r?<br>/g, "\n");
    text = text.replace(/&nbsp;&nbsp;&nbsp;&nbsp;/g, "\t");
    text = replaceEditUrls(text);
    return text;
}

//simple contains method
function contains(string, key){
    if(string.indexOf(key) !== -1){
        return true;
    }
    else{
        return false;
    }
}

//removes duplicates from an array
function removeDuplicates(array){
    var unique = [];
    $.each(array, function(i,element){
        if($.inArray(element, unique) === -1) unique.push(element);
    });
    return unique;
}

//converts text between [url] tags into an actual url 
function replaceDisplayUrls(string){
    var cel = $("#switched_cel").find(":selected").text();
    var regex = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
    string = string.replace(regex, "<a class='analytics' id='" + cel + ": $1' href='$1'>$1</a>");

    /*urls = string.match(/\[url\](.*?)\[url\]/);
    if(urls != null){
        for(var i=0; i < urls.length; i+=2){
            if(!contains(urls[i+1], "http://")){
                string = string.replace(urls[i], "<a href=http://" + urls[i+1] + ">" + urls[i+1] + "</a>");
            }
            else{
                string = string.replace(urls[i], "<a href=" + urls[i+1] + ">" + urls[i+1] + "</a>");
            }
        }
    }*/
    /*while(contains(string, "[url]")){
        var old = string.match(/\[url\](.*?)\[url\]/)[0];
        var url = string.match(/\[url\](.*?)\[url\]/)[1];
        var updated_url = url;
        if(!contains(url, "http://")){
            updated_url = "http://" + url;
        }
        var revised = "<a href=" + updated_url + ">" + url + "</a>";
        string = string.replace(old, revised);
    }*/
    return string;
}

function replaceEditUrls(string){
    var regex = /<a class="analytics" id="(.*?): (.*?)"(.*?)<\/a>/;
    while(regex.test(string)){
        string = string.replace(regex, "$2");
    }
    //string.replace(regex,  
    //console.log(string.match(url_regex)[1]);
    //string = string.replace(html_regex, html_regex[1]); 
    //while(contains(string, '<a href="')){
      //  var old = string.match(/<a href="(.*?)<\/a>/)[0];
        //var url = string.match(/>(.*?)<\/a>/)[1];
        //var revised = /*"[url]" +*/ url/* + "[url]"*/;
        //string = string.replace(old, revised);
    //}
    return string;
}

//confirmation message for deleting a CEL
function confirmation(){
    if(confirm("Are you sure you want to delete this CEL issue?")){ 
        return true;
    }
    else{
        return false;
    }
}

//confirmation message for deleting a post
function post_confirmation(){
    if(confirm("Are you sure you want to delete this post?")){
        return true;
    }
    else{
        return false;
    }
}

//confirmation message for deleting a bill
function delete_bill_confirmation(){
    if(confirm("Are you sure you want to delete this bill from the list?")){
        return true;
    }
    else{
        return false;
    }
}

