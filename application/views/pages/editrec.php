<h2><?= $title ?></h2>
  <?php //var_dump($personal); ?>
  <?php //var_dump($_SESSION); ?>
<div class="container">
<form action="<?php echo site_url(); ?>editrec/editdata" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<?php foreach($selection as $select){ ?>
  <div class="form-group">
    <label for="preference1">Select Your First Preference: </label><span style="color:red">* <?php echo form_error('course1'); ?></span>
    <select class="form-control" id="course1" name="course1">
      <option value="">SELECT</option>
      <?php foreach($courses as $course): ?>
        <?php if($course['course_no'] == $select['pref1']){?>
        <option selected="selected" value="<?php echo $course['course_no']?>"><?php echo $course['course_no']?> - <?php echo ucfirst($course['name']); ?></option>
        <?php }else{ ?> 
          <option value="<?php echo $course['course_no']?>"><?php echo $course['course_no']?> - <?php echo ucfirst($course['name']); ?></option>
        <?php } ?>
      <?php endforeach; ?>                                                   
    </select>
  </div>
  <div class="form-group">
    <label for="preference2">Select Your Second Preference: </label>
    <select class="form-control" id="course2" name="course2">
      <option value="">SELECT</option>
      <?php foreach($courses as $course): ?>
        <?php if($course['course_no'] == $select['pref2']){?>
          <option selected="selected" value="<?php echo $course['course_no']?>"><?php echo $course['course_no']?> - <?php echo ucfirst($course['name']); ?></option>
        <?php }else{ ?> 
          <option value="<?php echo $course['course_no']?>"><?php echo $course['course_no']?> - <?php echo ucfirst($course['name']); ?></option>
        <?php } ?>
        <?php endforeach; ?>                                                   
    </select>
  </div>
  <div class="form-group">
    <label for="preference3">Select Your Third Preference: </label>
    <select class="form-control" id="course3" name="course3">
      <option value="">SELECT</option>
      <?php foreach($courses as $course): ?>
        <?php if($course['course_no'] == $select['pref3']){?>
          <option selected="selected" value="<?php echo $course['course_no']?>"><?php echo $course['course_no']?> - <?php echo ucfirst($course['name']); ?></option>
          <?php }else{ ?> 
            <option value="<?php echo $course['course_no']?>"><?php echo $course['course_no']?> - <?php echo ucfirst($course['name']); ?></option>
          <?php } ?>
      <?php endforeach; ?>                                                   
    </select>
  </div>
<?php if($_SESSION['alindex'] != ""){ ?>
  <input type="hidden" name="alindex" value="<?php echo $_SESSION['alindex']; ?>">
<?php } ?>

    <div id="certificates" style="display :none;">
    <div class="col-sm-12" style="background-color: #ddffff; border-radius: 5px;" >
      <div class="form-group">
        <label for="coursename"><b>Physical Education Marks: </b></label><span style="color:red">* <?php echo form_error('pemarks'); ?></span><br>
        <label><p><span style="color:red">* </span><i>Calculate the final score manually and enter here. When calculating do not miss the marks for G.C E O/L health science</i></p></label><br>
        <?php foreach($personal as $person){ ?>
          <!-- <input type="text" class="form-control" id="pemarks" name="pemarks" value="<?php// echo $person['pemarks'] ?>">  -->   
        <div class="form-row">
					<div class="form-group col-md-4">
						<label><p><span style="color:red">* </span><i>O/L Examination Marks</i></p></label><br>
						<input type="number" class="form-control col-sm-4" id="peolmarks" onBlur="calcSum();" name="peolmarks" /> 
					</div>
					<div class="form-group col-md-4">
						<label><p><span style="color:red">* </span><i>Marks According to the Gazette</i></p></label><br>
						<input type="number" class="form-control col-sm-4" id="pencoemarks" onBlur="calcSum();" name="pencoemarks" /> 
					</div>
					<div class="form-group col-md-4">
						<label><p><span style="color:red">* </span><i>Total</i></p></label><br>
						<input type="number" value="<?php echo $person['pemarks']; ?>" class="form-control col-sm-4" id="pemarks1" name="pemarks1" max=80 value="" /> 
					</div>
				</div>
            <?php break; ?>
          <?php } ?>   
        </div>
      </div>
    </div>

  <div class="col-sm-12" style="background-color: #ddffff; border-radius: 5px;" id="category">  
  <div class="form-group">
      <label for="category"><b>Select Catholicism or Christianity: </b></label><span style="color:red">* <?php echo form_error('category'); ?></span><br>
      <?php if($select['category'] == "Catholic" ){ ?>
        <input type="radio" name="category" value="Catholic" checked> Catholicism
        <br>
        <input type="radio" name="category" value="Christianity"> Christianity
      <?php } elseif($select['category'] == "Christianity" ){ ?>
        <input type="radio" name="category" value="Catholic"> Catholicism
        <br>
        <input type="radio" name="category" value="Christianity" checked> Christianity
      <?php } else{ ?>
        <input type="radio" name="category" value="Catholic">Catholicism
        <br>
        <input type="radio" name="category" value="Christianity"> Christianity
      <?php }
      ?>
    </div>
  </div>
<?php $gitgrades = array('A','B','C','S','F','+','X','N'); ?>
<?php //if($select['gitmarks'] != NULL || $select['gitmarks'] != ''){ ?>
  <!-- <div class="col-sm-4" style="padding-left: 0px; display :block;" id="gitmarks"> -->
<?php //}else{ ?>
  <div class="col-sm-12" style="background-color: #ddffff; border-radius: 5px;" id="gitmarks">
  <?php //} ?>
    <div class="form-group">
    <label for="gitmk"><b>GIT Grades: </b></label><br><span style="color:red">* <?php echo form_error('gitmk'); ?></span>
      <!-- <input type="number" class="form-control" id="gitmk" name="gitmk" >     -->
      <select class="form-control"  id="gitmk" name="gitmk" placeholder="Grade">
        <option value="0" selected disabled>Select your Grade</option>
        <?php
          foreach($gitgrades as $gitgrade){
            if($gitgrade == $select['gitmarks']){
              echo "<option value='$gitgrade' selected>$gitgrade</option>";
            }else{
              echo "<option value='$gitgrade'>$gitgrade</option>";
            }
          }
        ?>
      </select>    
    </div>
  </div>
</div>
<!---------------------------------------------personal details----------------------------------------->
<hr>
<?php break; } ?>
<?php foreach($personal as $person){ ?>
<div class="form-group">
    <!-- <div class="form-group">
      <label for="emailindex" style="display :block">O/L index number:</label><span style="color:red">* <?php// echo form_error('olindex1'); ?></span>
      <input value="<?php// echo $person['OLindex1']; ?>" type="text" class="form-control" id="olindex1" placeholder="Enter your  1st index " name="olindex1" style="display :block">
    </div>

    <div class="form-group">
      <label for="emailindex" style="display :block">O/L index number:</label>
      <input value="<?php// echo $person['OLindex2']; ?>" type="text" class="form-control" id="olindex2" placeholder="Enter your 2nd index" name="olindex2"  style="display :block">
    </div>

    <div class="form-group">
      <label for="emailindex" style="display :block">O/L index number:</label>
      <input value="<?php// echo $person['OLindex3']; ?>" type="text" class="form-control" id="olindex3" placeholder="Enter your 3rd index" name="olindex3" style="display :block">
    </div> -->
<hr>
  <div class="form-group">
  <?php // var_dump($_SESSION['sworker']); ?>
      <label for="fullname">Name in Full: </label><span style="color:red">* <?php echo form_error('fullname'); ?></span>
      <input type="text" class="form-control" id="fullname" placeholder="Enter your full name" name="fullname" value="<?php echo $person['fullname']; ?>">
    </div>
    <div class="form-group">
      <label for="namewithinitials">Name with Initials: </label><span style="color:red">* <?php echo form_error('namewithinitials'); ?></span>
      <input type="text" class="form-control" id="namewithinitials" placeholder="Enter your name with Initials" name="namewithinitials" value="<?php echo $person['namewithinitials']; ?>">
    </div>
    <div class="form-group">
      <label for="dob">Date of Birth: </label><span style="color:red">* <?php echo form_error('dob'); ?></span>
      <input type="date" class="form-control" id="dob"  name="dob" value="<?php echo $person['dob']; ?>">
    </div>
    <div class="form-group">
      <label for="address">Permanent Address: </label><span style="color:red">* <?php echo form_error('Addressl1'); ?></span>
      <input type="text" class="form-control" id="addressline1" placeholder="Enter your address- line01" name="addressline1" value="<?php echo $person['Addressl1']; ?>"><br>
      <input type="text" class="form-control" id="addressline2" placeholder="Enter your address- line02" name="addressline2" value="<?php echo $person['Addressl2']; ?>"><br>
      <input type="text" class="form-control" id="addressline3" placeholder="Enter your address- line03" name="addressline3" value="<?php echo $person['Addressl3']; ?>"><br>
      <input type="text" class="form-control" id="addressline4" placeholder="Enter your address- line04" name="addressline4" value="<?php echo $person['Addressl4']; ?>"><br>
    </div>
    <div class="form-group">
    <label for="district">Permanent Residence District Name and Number: <span style="color:red">* <?php echo form_error('district'); ?></span></label>
    <!-- <input type="text" class="form-control" id="district" placeholder="Enter your district name and number" name="district"> -->
      <?php 
        $districts = array('16' => 'Ampara', "20" => 'Anuradhapura',"22" => 'Badulla',"15" => 'Batticaloa',"01" => 'Colombo',"07" => 'Galle',"02" => 'Gampaha',"09" => 'Hambantota',"10" => 'Jaffna',"03" => 'Kaluthara',"04" => 'Kandy',"25" => 'Kegalle',"11" => 'Kilinochchi',"18" => 'Kurunegala',"12" => 'Mannar',"05" => 'Matale',"08" => 'Matara',"23" => 'Monaragala',"14" => 'Mullaitivu',"06" => 'Nuwara Eliya',"21" => 'Polonnaruwa',"19" => 'Puttalam',"24" => 'Ratnapura',"17" => 'Trincomalee',"13" => 'Vavuniya');
      ?>
      <select class="form-control" id="district" name="district">
        <option value="">Select a District</option>
        <?php 
        foreach ($districts as $key => $value) {
          if ($key == $person['Resdistrict']) {
            echo('<option selected="selected" value='.$key.'>'.$value.'</option>');
          } else {
            echo('<option value='.$key.'>'.$value.'</option>');
          }
        }?>
      </select>
    </div>
   
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
             <label for="nic">NIC Number: </label><span style="color:red">* <?php echo form_error('nic'); ?></span>
             <input type="text" class="form-control" id="nic" placeholder="Enter your NIC" name="nic" value="<?php echo $person['NIC']; ?>">
           </div>
        </div>

        <?php if($person['Gender'] == "female"){ ?>
        <div class="col-sm-6">  
            <div class="form-group">
              <label for="gender">Gender: </label><span style="color:red">* <?php echo form_error('gender'); ?></span><br>
              <input type="radio" name="gender"
              <?php if (isset($gender) && $gender=="female") echo "checked";?>
              value="female" checked>Female
              <input type="radio" name="gender"
              <?php if (isset($gender) && $gender=="male") echo "checked";?>
              value="male">Male
            </div>
         </div>
        <?php } ?>

        <?php if($person['Gender'] == "male"){ ?>
        <div class="col-sm-6">  
            <div class="form-group">
              <label for="gender">Gender: </label><span style="color:red">* <?php echo form_error('gender'); ?></span><br><br>
              <input type="radio" name="gender"
              <?php if (isset($gender) && $gender=="female") echo "checked";?>
              value="female">Female
              <input type="radio" name="gender"
              <?php if (isset($gender) && $gender=="male") echo "checked";?>
              value="male" checked>Male
            </div>
         </div>
        <?php } ?>
    </div>

    <?php $titlevals = array('Mr', 'Miss', 'Rev'); ?>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group"> 
          <label for="title">Title: <span style="color:red">* <?php echo form_error('title'); ?></span></label>
          <select class="form-control" id="title" placeholder="Mr/Mrs/Miss/Rev.." name="title">
          <option value="">Select</option>
          <?php 
          foreach($titlevals as $titleval){
            if($titleval == $person['Title']){
              echo "<option value='$titleval' Selected>$titleval</option>";
            }else{
              echo "<option value='$titleval'>$titleval</option>";
            }
          }
          ?>
          </select>
        </div>
        </div>
        <?php $ethnicvals  = array('Sinhalese', 'Sri Lankan Tamil' , 'Tamil of Indian Origin', 'Muslim', 'Other'); ?>
        <div class="col-sm-6">   
            <div class="form-group">          
            <label for="ethnicity">Race: <span style="color:red">* <?php echo form_error('ethnicity'); ?></span></label>
            <select class="form-control" id="ethnicity" placeholder="Enter your Ethnicity" name="ethnicity">
            <option value="">Select</option>
            <?php
              foreach($ethnicvals as $ethnicval){
                if($ethnicval == $person['Ethnicity']){
                  echo "<option value='$ethnicval' Selected>$ethnicval</option>";
                }else{
                  echo "<option value='$ethnicval'>$ethnicval</option>";
                }
              }
            ?>
            </select>
            </div>
        </div>
    </div>


    <label>Contact Details:</label><br>       
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group"> 
               <label for="mobile">Mobile Number: </label>
                <input type="text" class="form-control" id="mobile" placeholder="0700000000" name="mobile" value="<?php echo $person['Mobile']; ?>">
            </div>
        </div>
        <div class="col-sm-6">  
            <div class="form-group">           
                <label for="home">Landline Number: </label>
                <input type="text" class="form-control" id="home" placeholder="0000000000" name="home" value="<?php echo $person['home']; ?>"> 
            </div>     
        </div>
    </div>

    <div class="form-group">            
            <label for="home">Email: </label>
            <input type="email" class="form-control" id="email" placeholder="abc@gmail.com" name="email" value="<?php echo $person['email']; ?>">             
    </div>
    <!-- <div class="form-group">
      <label for="index1" id="label1" title=" National College of Education">Are you applying for Sripada NCoE? <span style="color:red">* <?php echo form_error('sripada'); ?><?php echo form_error('sworker'); ?></span></label>
      <select name="sripada"  id="sripada" height="4" class="form-control" >
        <option selected value="">SELECT</option>
        <option  value="1">Yes</option>
        <option  value="0">No</option>
    </select>
    </div>
    <br>
   
    <div class="form-group">
    <label for="sworker" id="label2" name="state" style="display: none;">Are you a child of a Estate Worker? <span style="color:red">* </span></label>
      <select name="sworker"  id="sworker" height="4" style="display: none;" class="form-control">
        <option selected value="">SELECT</option>
        <option  value="1">Yes</option>
        <option  value="0">No</option>
        </select>
      <br> -->

    </div>
    
    <?php 
      // $version = $person['version'] + 1;
    ?>
    <!-- <input type="hidden" value="<?php //echo $version; ?>" name="version" id="version"> -->
    <!-- <button type="submit" name="btnprv" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span> Previous</button> -->
    <!-- <a class="btn btn-primary" href="">Recheck</a> -->
    <button formtarget="_blank" type="submit" name="btnnext" class="btn btn-info"><span  class="glyphicon glyphicon-arrow-right"></span> Submit </button>
<?php break; } ?>
</form>
<script src="<?php echo site_url(); ?>assets/js/sripada2.js"></script>
<script src="<?php echo site_url(); ?>assets/js/prefer.js"></script>
<script>
function calcSum()
{
	var num1 = parseInt(document.getElementById("peolmarks").value);
	var num2 = parseInt(document.getElementById("pencoemarks").value);
	document.getElementById("pemarks1").value = num1 + num2;
}
</script>
