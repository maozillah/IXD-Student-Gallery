<?php require ('scripts/select_filters.php'); ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Document</title>
 </head>
 <body>

<form>
     <input type="text" name="search" placeholder="search for projects or authors"/>
     <input type="submit" id="btnSubmit" name="submit" onClick="searchResults(this.value)"/>

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

function searchResults(str) {
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
        xmlhttp.open("GET", "scripts/search.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
     
 </body>
 </html> 