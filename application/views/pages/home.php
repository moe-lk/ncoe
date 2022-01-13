<?php session_destroy(); ?>
<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
$(document).ready(function () {

    if($('#agree').prop("checked") == false){
    $('#agree').prop('checked', false); 
    }

    $('#one').prop('disabled', true);
    $('#two').prop('disabled', true);

$("#agree").on('change', function() {

  if ($(this).is(':checked')) {
    $('#one').prop('disabled', false);
    $('#two').prop('disabled', false);

} else {
    $('#one').prop('disabled', true);
    $('#two').prop('disabled', true);

}

});
});

$(document).ready(function () {

if($('#agree1').prop("checked") == false){
$('#agree1').prop('checked', false); 
}

$('#one').prop('disabled', true);
$('#two').prop('disabled', true);

$("#agree1").on('change', function() {



if ($(this).is(':checked')) {
$('#one').prop('disabled', false);
$('#two').prop('disabled', false);

} else {
$('#one').prop('disabled', true);
$('#two').prop('disabled', true);

}

});
});

$(document).ready(function () {

if($('#agree2').prop("checked") == false){
$('#agree2').prop('checked', false); 
}

$('#one').prop('disabled', true);
$('#two').prop('disabled', true);

$("#agree2").on('change', function() {

if ($(this).is(':checked')) {
$('#one').prop('disabled', false);
$('#two').prop('disabled', false);

} else {
$('#one').prop('disabled', true);
$('#two').prop('disabled', true);

}

});
});

</script>

<div class="row" style="text-align: center; margin-left:350px;">
<div class="col-sm-6">
        <h1>Notices</h1>
        <br />
</div>
</div>

<div class="col-sm-12" style="background-color: #ddffff; padding: 20px 20px 20px 25px; margin-left:50px; width: 95%; font-size: 22px">
    <input type="checkbox" id="agree"  name="agree" value="false">
    <label for="agree">I hereby declare that the information given below is true and accurate to the best of my knowledge.</label>
</div>

<div class="col-sm-12" style="background-color: #ddffff; padding: 20px 20px 20px 25px; margin-left:50px; width: 95%; font-size: 22px">
    <input type="checkbox" id="agree1"  name="agree1" value="false">
    <label for="agree">I hereby declare that the information given below is true and accurate to the best of my knowledge.</label>
</div>

<div class="col-sm-12" style="background-color: #ddffff; padding: 20px 20px 20px 25px; margin-left:50px; width: 95%; font-size: 22px">
    <input type="checkbox" id="agree2"  name="agree2" value="false">
    <label for="agree">I hereby declare that the information given below is true and accurate to the best of my knowledge.</label>
</div>
<br /><br /><br /><br />


<div class="row" style="text-align: center;">
    <div class="col-sm-6">
        <h3>Create a New Application</h3>
        <div class="col-sm-12">
        <br>
        &nbsp;
        </div>
        <div class="form-group">  
      
        <div style="text-align :center;">
                <button  onclick="window.location.href='alresults'"  type="button" class="btn btn-primary btn-lg" id="one"  style="width: 80%; padding: 10px;" ><b>G.C.E. (A/L) Year 2019/2020 </b><br>&nbsp;<br> </button>
            </div> 
        </div>
        <div class="form-group"> 
            <div style="text-align: center;">
                <button  onclick="window.location.href='prirvenaal'" class="btn btn-primary btn-lg" type="button" id="two"  style="width: 80%; padding: 10px;" ><b>G.C.E. (A/L) Year 2018 or Previous Years</b><br>&nbsp;<br></button>
            </div>      
        </div>
    </div>
    <div class="col-sm-6">
        <h3>Edit an Existing Application</h3>
        <div class="col-sm-12">
        <br>
        &nbsp;
        </div>
        <form action="<?php echo site_url(); ?>editrec/index" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="row" style="margin: auto; text-align:center;">
                <div class="col-sm-2">&nbsp;</div>
                <div class="col-sm-8" style="background-color: #ddffff; padding: 15px 20px 15px 20px; width: 100%">
                <span style="color: red;"><?php echo validation_errors(); ?></span>
                    <p style="margin-bottom: 10px;">G.C.E. (A/L) Index Number</p> 
                    <input class="form-control" type="text" name="alindex" id="alindex" style="width: 100%;"><br>
                    <input type="submit" class="btn btn-warning" style="width: 100%;" value="Edit Application">
                    <br>&nbsp;
                </div>
                <div class="col-sm-2">&nbsp;</div>
            </div>
        </form>
    </div>
</div>
</div>
<div class="row" style="height: 80%">
  &nbsp;
</div>
<br>
<footer class="footer">
    <div class="container">
        <span><h4>©2020 Data Management Branch, Ministry of Education, Sri Lanka.</h4></span>
    </div>
</footer>
