<?php require ('scripts/select_filters.php'); ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Document</title>
 </head>

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
 <body>

<form method="post" action="scripts/search.inc.php">
    <input type="text" name="search" id="search_box" class='search_box'/>
    <input type="submit" value="Search" class="search_button" /><br />
</form>

<form>
    <select name="year" onchange="showYear(this.value)">
        <option value="all">all years</option>
        <option value="1">First year</option>
        <option value="2">Second year</option>
        <option value="3">Third year</option>
        <option value="4">Fourth year</option>
    </select>

    <select name="class" onchange="showClass(this.value)">
        <option value="all">class</option>
        <?php echo getClasses(); ?>
    </select>
</form>

<div class="word">Search Query: </div>
<div id="txtHint">
</div>

<script>
window.onload = showYear('all');

function showYear(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "scripts/filter.php?q=" + str, true);
        xmlhttp.send();
    }
}

function showClass(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "scripts/class.php?q=" + str, true);
        xmlhttp.send();
    }
}

$(function() {

     $(".word").hide();
 
    $(".search_button").click(function() {
        // getting the value that user typed
        var searchString    = $("#search_box").val();
        // forming the queryString
        var data            = 'search='+ searchString;
         
        // if searchString is not empty
        if(searchString) {
            // ajax call
            $.ajax({
                type: "POST",
                url: "scripts/search.inc.php",
                data: data,
                beforeSend: function(html) { // this happens before actual call
                    $(".word").show();
                    $(".word").append(searchString);
               },
               success: function(html){ // this happens after we get results
                    $("#txtHint").show();
                    $("#txtHint").html(html);
              }
            });    
        }
        return false;
    });
});
</script>
     
 </body>
 </html> 