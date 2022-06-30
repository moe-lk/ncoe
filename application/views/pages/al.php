<?php
//  var_dump($_SESSION);

//   if (!isset($_SESSION["passed"])){
//     redirect('/');
//   }
// var_dump($_SESSION);
?>
<script>
	console.log(sessionStorage.passed);
	if(sessionStorage.passed != 1){
		window.location.href= "/ncoe";
	}
	
</script>
<div class="mb-5">
	<h2><?= $title; ?></h2>
</div> 

<?php // echo form_open_multipart('alresults/checkalres'); ?>
<form action="<?php echo site_url(); ?>alresults/checkalres" enctype="multipart/form-data" method="post" accept-charset="utf-8">
	
	<div class="row">
		<div class="col-12 col-sm-4">
			<div class="form-group">
				<label for="index">G.C.E. (A\L) Year: <span style="color:red">*</span></label>
				<span style="color: red;"><?php echo form_error('year'); ?></span>
				<select class="form-control" id="year" placeholder="Select your A\L year" name="year">
						<option value="">Select</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
				</select>
			</div>
		</div>
		<div class="col-12 col-sm-4">
			<div class="form-group">
				<label for="index">Syllabus: <span style="color:red">*</span></label>
				<span style="color: red;"><?php echo form_error('syllabus'); ?></span>
				<select class="form-control" id="syllabus" placeholder="Select the syllabus mode" name="syllabus">
						<option value="">Select</option>
						<option value="Old">Old</option>
						<option value="New">New</option>
				</select>
			</div>
		</div>
		<div class="col-12 col-sm-4">
			<div class="form-group">
				<label for="index">G.C.E. (A\L) Index Number: <span style="color:red">* </span></label>
				<span style="color: red;"><?php echo form_error('alindex'); ?></span>
				<input type="text" class="form-control" id="alindex" placeholder="Your G.C.E. (A\L) Index Number" name="alindex" value="<?php echo set_value('alindex'); ?>">
			</div>
		</div>
	</div>
		<!-- Validation error messages goes here -->
		

	
  <div class="form-group">
    <!-- <label for="git">Sat for the GIT exam: </label>
    <select class="form-control" id="git" name="git" placeholder="Enter the GIT marks">
      <option value="">SELECT</option>
      <option value="yes">YES</option>
      <option value="no">NO</option>
    </select> -->
  </div>
  <!-- <div class="form-group">
    <label for="stream">Stream</label>
    <div class="form-group">
      <select name="sel1" class="form-control" id="sel1">
        <option id="" selected>STREAM</option>
        <option id="maths">MATHS</option>
        <option id="bio">BIO SCIENCE</option>
        <option id="commerce">COMMERCE</option>
        <option id="arts">ARTS</option>
        <option id="tech">TECHNOLOGY</option>
        <option id="comm">COMMON</option>
      </select>
    </div> -->
    <!-- <br>
  </div> -->

  <a href="/ncoe" type="button" class="btn btn-success">Back</a>
	<button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
<!-- <div class="row" style="height: 80%">
  &nbsp;
</div> -->
<br>
<footer class="footer">
    <div class="container">
        <span><h4>©2020 Data Management Branch, Ministry of Education, Sri Lanka.</h4></span>
    </div>
</footer><!--The update -->
