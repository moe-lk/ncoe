<?php
  if (!isset($_SESSION["alindex"])){
    redirect('/');
  }
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

<?php // echo validation_errors(); ?>
<?php //echo form_open_multipart('Alpirivena/checkalres'); ?>
<form action="<?php echo site_url(); ?>Alpirivena/checkalres" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="index">G.C.E. (A\L) Examination Year: <span style="color:red">* <?php echo form_error('year'); ?></span></label>
                <!-- <input type="text" class="form-control" id="alyear" placeholder="Enter your A\L year" name="alyear"> -->
                <select class="form-control" id="year" placeholder="Enter Your G.C.E. (A\L) Year" name="year">
                    <option value="">Select</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                </select>
            </div>
        </div>
        

        
        <!-- <div style="text-align:center">
            <button style="margin-top:10px; margin-left:300px" type="submit" class="btn btn-info">Submit</button>
        </div> -->
        
    </div>
    <?php 
        $alsubs = array(1 => 'Physics', 2 =>	'Chemistry' ,7 => 'Mathematics' ,8 => 'Agricultural Science' ,9 => 'Biology' ,10 => 'Combind Mathematics' ,11 => 'Higher Mathematics' ,12 => 'Common General Test'	,13 => 'General English',14 => 'Civil Technology' ,15 => 'Mechanical Technology ',16 => 'Eletrical,Electronic and Information Technology'	,17 => 'Food Technology' ,18 => 'Agro Technology'	,19 => 'Bio- Resource Technology' ,20 => 'Information & Communication Technology' ,21 => 'Economics' ,22 => 'Geography' ,23 => 'Political Science' ,24 => 'Logic and Scientific Method'	,25 => 'History'	,28 => 'Home Economics'	,29 => 'Communication & Media Studies' ,31 => 'Business Statistics'	,32 => 'Business Studies' ,33 => 'Accounting'	,41 => 'Buddhism' ,42 => 'Hinduism' ,43 => 'Christianity' ,44 => 'Islam'				, 45 => 'Buddhist Civilization', 46 => 'Hindu Civilization', 47 => 'Islam Civilization', 48 => 'Greek & Rooman Civilization', 49 => 'Christian Civilization', 51 => 'Art', 52 => 'A Dancing (Indigenous  -Kandyan)', 52 => 'B Dancing (Indigenous  -Low country)', 52 => 'C Dancing (Indigenous Sabaragamu)', 53 => 'Dancing (Bharata)', 54 => 'Oriental Music', 55 => 'Carnatic Music', 56 => 'Western Music', 57 => 'Drama and Theatre (Sinhala)', 58 => 'Drama and Theatre (Tamil)', 59 => 'Drama and Theatre (English)', 65 => 'Engineering Technology', 66 => 'Bio Systems Technology', 67 => 'Science fot Technology', 71 => 'Sinhala', 72 => 'Tamil', 73 => 'English', 74 => 'pali', 75 => 'Sanskrit', 78 => 'Arabic', 79 => 'Malay', 81 => 'French', 82 => 'German', 83 => 'Russian', 84 => 'Hindi', 86 => 'Chinese', 87 => 'Japanese');
    ?> 
   
    <h2>G.C.E. Advanced Level (A/L) Examination Results</h2>
    <div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <label for="index">G.C.E. (A\L) Examination Index: <span style="color:red">* <?php echo form_error('alindex'); ?></span></label>
            <input type="text" class="form-control" id="alindex" placeholder="G.C.E. (A\L) Examination Index" name="alindex">
        </div>
    </div>
    <div class="col-sm-3">
            <div class="form-group">
                <label for="stream">Stream <span style="color:red">* <?php echo form_error('stream'); ?></span></label>
                <div class="form-group">
                <select name="stream" class="form-control" id="stream">
                    <option value="" selected>Select</option>
                    <option value="1">Physical Science</option>
                    <option value="2">Biological Science</option>
                    <option value="3">Commerce</option>
                    <option value="4">Arts</option>
                    <option value="5">Technology</option>
                    <option value="6">Common</option>
                </select>
                </div>
                 <br>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="index">Medium<span style="color:red">* <?php echo form_error('medium'); ?></span></label>
                <!-- <input type="text" class="form-control" id="medium" placeholder="Medium" name="medium"> -->
                <select name="medium" class="form-control" id="medium">
                    <option value="" selected>Select</option>
                    <option value="1">Sinhala</option>
                    <option value="2">Tamil</option>
                    <option value="3">English</option>
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="attempt">Attempt <span style="color:red">* <?php echo form_error('attempt'); ?></span></label>
                <div class="form-group">
                <select name="attempt" class="form-control" id="attempt">
                    <option value="" selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                </div>
                 <br>
            </div>
        </div>
</div>

<div class="row">
        
        <!-- <div class="col-sm-4">
                <div class="form-group">
                    <label for="index">Subject Name</label>
                    <input type="text" class="form-control" id="subjectname1" placeholder="Subject Name" name="subjectname1">
                </div>
        </div> -->
        <div class="col-sm-6">
            <div class="form-group">
                <label for="index">Subject Number <br><span style="color:red">* <?php echo form_error('subjectnumber1'); ?></span></label>
                <select class="form-control" id="subjectnumber1" placeholder="Subject Number" name="subjectnumber1">
                <option value="">Select</option>
                    <?php
                        foreach($alsubs as $key => $value){
                            echo "<option value='$key'>$key - $value</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="form-group">
                    <label for="index">Grade <br><span style="color:red">* <?php echo form_error('grade1'); ?></span></label>
                    <select class="form-control" id="grade1" placeholder="Grade" name="grade1">
                        <option value="0" selected disabled>Select Your Grade</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="S">S</option>
                        <option value="F">F</option>
                        <option value="+">+</option>
                        <option value="X">X</option>
                        <option value="N">N</option>
                    </select>
                </div>
                 <br>
            </div>
        </div>     
</div>

<div class="row">
        
        <!-- <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="subjectname2" placeholder="Subject Name" name="subjectname2">
                </div>
        </div> -->
        <div class="col-sm-6">
            <div class="form-group">
                <span style="color:red">* <?php echo form_error('subjectnumber2'); ?></span>
                <select class="form-control" id="subjectnumber2" placeholder="Subject Number" name="subjectnumber2">
                <option value="">Select</option>
                <?php
                    foreach($alsubs as $key => $value){
                        echo "<option value='$key'>$key - $value</option>";
                    }
                ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="form-group">
                    <span style="color:red">* <?php echo form_error('grade2'); ?></span>
                    <select class="form-control" id="grade2" placeholder="Grade" name="grade2">
                        <option value="0" selected disabled>Select Your Grade</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="S">S</option>
                        <option value="F">F</option>
                        <option value="+">+</option>
                        <option value="X">X</option>
                        <option value="N">N</option>
                    </select>
                </div>
                 <br>
            </div>
        </div>

        <!-- <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="medium2" placeholder="Medium" name="medium2">
                </div>
        </div> -->
</div>
    <div class="row">
        
        <!-- <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="subjectname3" placeholder="Subject Name" name="subjectname3">
                </div>
        </div> -->
        <div class="col-sm-6">
            <div class="form-group">
                <span style="color:red">* <?php echo form_error('subjectnumber3'); ?></span>
                <select class="form-control" id="subjectnumber3" placeholder="Subject Number" name="subjectnumber3">
                <option value="">Select</option>
                <?php
                        foreach($alsubs as $key => $value){
                            echo "<option value='$key'>$key - $value</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="form-group">
                    <span style="color:red">* <?php echo form_error('grade3'); ?></span>
                    <select class="form-control" id="grade3" placeholder="Grade" name="grade3">
                        <option value="0" selected disabled>Select Your Grade</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="S">S</option>
                        <option value="F">F</option>
                        <option value="+">+</option>
                        <option value="X">X</option>
                        <option value="N">N</option>
                    </select>
                </div>
                 <br>
            </div>
        </div>

        <!-- <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="medium3" placeholder="Medium" name="medium3">
                </div>
        </div> -->
    </div>
    <!-- <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="subjectnumber4" placeholder="Subject Number" name="subjectnumber4">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="form-group">
                    <select class="form-control" id="grade4" placeholder="Grade" name="grade4">
                        <option value="0" selected disabled>Select your Grade</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="S">S</option>
                        <option value="F">F</option>
                        <option value="+">+</option>
                        <option value="X">X</option>
                        <option value="N">N</option>
                    </select>
                </div>
                 <br>
            </div>
        </div>
    </div> -->
    <hr>
    <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
            <label for="git">Common General Test Marks: <span style="color:red">* <?php echo form_error('gentst'); ?></span></label>
            <input type="text" class="form-control" id="gentst" placeholder="Common General Test Marks" name="gentst">
            <br>
        </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="git">Z-score: <span style="color:red">* <?php echo form_error('zscore'); ?></span></label>
                    <input type="text" class="form-control" id="zscore" placeholder="Z-score" name="zscore">
                <br>
            </div>
        </div>
    
    <!-- <div class="col-sm-4">
        <div class="form-group">
            <label for="git">Sat for the GIT exam: <span style="color:red">* <?php echo form_error('git'); ?></span></label>
            <select class="form-control" id="git" name="git" placeholder="Enter the GIT marks">
                <option value="">SELECT</option>
                <option value="yes">YES</option>
                <option value="no">NO</option>
            </select>
        </div>
    </div> -->
</div>

<div style="text-align:center">
<a href="/ncoe" type="button" style="margin-top:25px; margin-left:15px" class="btn btn-success">Back</a>
    <button style="margin-top:25px; margin-left:15px" type="submit" class="btn btn-info">Submit</button>
    
</div>

    


</div>
</form>
</div>
<br><br>
<div class="row">
  &nbsp;
</div>
<div class="row">
  &nbsp;
</div>
<div class="row">
  &nbsp;
</div>
</div>
<div class="row">
  &nbsp;
</div>
<br>
<!-- <footer class="footer">
    <div class="container">
        <span><h4>©2020 Data Management Branch, Ministry of Education, Sri Lanka.</h4></span>
    </div>
</footer> -->
<!-- <script src="<?php //echo site_url(); ?>assets/js/alpir.js"></script> -->
<script>
$("#alyear").change(function(){
    var alyear = $(this).val();

    if(alyear == 2018){
        // $("#alyear")[0].selectedIndex = "";
        // window.location.href = "<?php //echo site_url(); ?>/alresults";
        console.log(alyear);
    }
    // alert(alyear);

});
</script>
