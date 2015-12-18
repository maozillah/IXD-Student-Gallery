<?php require ('scripts/select_filters.php'); ?>
<?php require ('header.php'); ?>

 <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">IxD Gallery</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="navbar-form navbar-right">
                <a class="btn btn-primary" href="signup.php" role="button">Sign up &raquo;</a>
        
                <a class="btn btn-primary" href="project_upload.php" role="button">Upload &raquo;</a>
            </form>
        </div>
    </nav>

    <div class="jumbotron">
      <div class="container">
        <h1>Welcome to the Interaction Design Gallery</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
        <form class="form-inline" role="form">

             <div class="form-group">
            <input type="text" name="search" id="search_box" class='search_box form-control'/>
            <button type="submit" class="btn btn-default search_button">Search</button>
            </div>


            <select name="year" class="form-control" onchange="showYear(this.value)">
                <option value="all">all years</option>
                <option value="1">First year</option>
                <option value="2">Second year</option>
                <option value="3">Third year</option>
                <option value="4">Fourth year</option>
            </select>
            <select name="class" class="form-control" onchange="showClass(this.value)">
                <option value="all">All classes</option>
                <?php echo getClasses(); ?>
            </select>
        </form>
        <div class="row">
            <div id="txtHint">
            </div>
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
            
                    $(".query").html(searchString);
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
     
<?php require ('footer.php'); ?>