<div class="mb-5">
	<h2>Sripada National College of Education</h2>
</div>
<?php
  if (!isset($_SESSION["alindex"])){
    redirect('/');
  }
?>
<span style="color: red;"><?php echo validation_errors(); ?></span>
<form action="<?php echo site_url(); ?>students/sripada" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<?php // echo form_open_multipart('students/sripada'); ?>
    <div class="form-group">
    <label><i>(<span style="color:red">*</span>Read the conditions in <b>“6.3 Selection for Sripada National College of Education”</b> of the gazette notification very carefully and filling this accordingly and correctly.)</i></label>
      <label for="index1" id="label1" title=" National College of Education">Are You Applying to Sripada National College of Education? <span style="color:red">* </span></label>
      <select name="sripada"  id="sripada" height="4" class="form-control">
        <option selected value="">Select</option>
        <option id="y" >Yes</option>
        <option id="n" >No</option>
    </select>
    </div>
    <br>
   
    <div class="form-group">
    <label for="sworker" id="label2" name="state" style="display :none">Are You a Child of an Estate Worker? <span style="color:red">* </span></label>
      <select name="sworker"  id="sworker" height="4" style="display :none" class="form-control">
        <option selected value="">Select</option>
        <option id="y">Yes</option>
        <option id="n">No</option>
        </select>
      <br>

    </div>
    
  
    <button type="submit" class="btn btn-info">Submit</button>
  </form>
</div>
<br>
<footer class="footer">
    <div class="container">
        <span><h4>©2020 Data Management Branch, Ministry of Education, Sri Lanka.</h4></span>
    </div>
</footer>
<script src="<?php echo site_url(); ?>assets/js/sripada.js">

