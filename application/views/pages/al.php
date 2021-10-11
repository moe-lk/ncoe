<div class="container mb-5">
	<h2><?= $title; ?></h2>
</div>

<?php // echo form_open_multipart('alresults/checkalres'); ?>
<form action="<?php echo site_url(); ?>alresults/checkalres" enctype="multipart/form-data" method="post" accept-charset="utf-8">
	
	<div class="row">
		<div class="col-12 col-sm-4">
			<div class="form-group">
				<label for="index">A\L year: <span style="color:red">*</span></label>
				<span style="color: red;"><?php echo form_error('year'); ?></span>
				<select class="form-control" id="year" placeholder="Select your A\L year" name="year">
						<option value="">SELECT</option>
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
						<option value="">SELECT</option>
						<option value="Old">Old</option>
						<option value="New">New</option>
				</select>
			</div>
		</div>
		<div class="col-12 col-sm-4">
			<div class="form-group">
				<label for="index">A\L index number: <span style="color:red">* </span></label>
				<span style="color: red;"><?php echo form_error('alindex'); ?></span>
				<input type="text" class="form-control" id="alindex" placeholder="Enter your A\L index number" name="alindex" value="<?php echo set_value('alindex'); ?>">
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
