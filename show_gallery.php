<?php
require ('scripts/protectedPage.inc.php'); ?>
<?php
require ('scripts/select_projectType.inc.php'); ?>
<?php
require ('scripts/upload_project.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php require ('header.php'); ?>
 <?php
echo printDBValues(); ?>

<h1>Upload Project Data</h1>
<!-- or to confirmation screen -->
<form id='gallerySelection' action="<?php
    echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-horizontal" role="form">
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Project Title</label>
        <div class="col-sm-10">
            <input type="text" name="projTitle" class="form-control" placeholder="enter project title"/><?php
            echo $nameErr; ?>
        </div>
    </div>
    <div class="form-group">
        <div class="dropdown col-sm-3">
            <select name="projectType" onchange="fetch_select(this.value);" class="btn btn-default dropdown-toggle">
                <option value="0">all project types</option>
                <?php
                echo GetProjecTypesList(); ?>
            </select>
        </div>
        <div class="dropdown col-sm-3">
            <select name="projectScope" id="new_select" class="btn btn-default dropdown-toggle">
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <label>Project Description</label>
        </div>
        <div class="col-sm-12">
            <textarea name="projDescr" rows="5" class="form-control"></textarea>
        </div>
    </div>
    <h2>Total time</h2>
    <div class="form-group">
   <div class="col-sm-6"> <label>Estimated</label><input type="time" name="estTime" class="form-control" /></div>
   <div class="col-sm-6"> <label>Actual</label><input type="time" name="actTime" class="form-control"/></div>
</div>

    <input type="submit" id="btnSubmit" name="submit" value="upload" class="btn btn-lg btn-primary" />
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
            function fetch_select(val)
        {
        $.ajax({
            type: 'post',
            url: 'scope.php',
            data: {
            get_option:val
            },
            success: function (response) {
            document.getElementById("new_select").innerHTML=response;
            }
        });
        }
</script>
<?php require ('footer.php'); ?>