<h2><?= $title; ?></h2>
<?php
  if (!isset($_SESSION["alindex"])){
    redirect('/');
  }
?>
<?php foreach($alresults as $alresult): ?>
<h4>Index Number : <?php echo $alresult['AL_index']; ?></h4>
<?php //$_SESSION['alindex'] = $alresult['AL_index']; ?>
  <table class="table">
    
      <?php // var_dump($_SESSION); ?>
      <?php 
        $alsubs = array(1 => 'Physics', 2 =>	'Chemistry' ,7 => 'Mathematics' ,8 => 'Agricultural Science' ,9 => 'Biology' ,10 => 'Combind Mathematics' ,11 => 'Higher Mathematics' ,12 => 'Common General Test'	,13 => 'General English',14 => 'Civil Technology' ,15 => 'Mechanical Technology ',16 => 'Eletrical,Electronic and Information Technology'	,17 => 'Food Technology' ,18 => 'Agro Technology'	,19 => 'Bio- Resource Technology' ,20 => 'Information & Communication Technology' ,21 => 'Economics' ,22 => 'Geography' ,23 => 'Political Science' ,24 => 'Logic and Scientific Method'	,25 => 'History'	,28 => 'Home Economics'	,29 => 'Communication & Media Studies' ,31 => 'Business Statistics'	,32 => 'Business Studies' ,33 => 'Accounting'	,41 => 'Buddhism' ,42 => 'Hinduism' ,43 => 'Christianity' ,44 => 'Islam'				, 45 => 'Buddhist Civilization', 46 => 'Hindu Civilization', 47 => 'Islam Civilization', 48 => 'Greek & Rooman Civilization', 49 => 'Christian Civilization', 51 => 'Art', 52 => 'A Dancing (Indigenous  -Kandyan)', 52 => 'B Dancing (Indigenous  -Low country)', 52 => 'C Dancing (Indigenous Sabaragamu)', 53 => 'Dancing (Bharata)', 54 => 'Oriental Music', 55 => 'Carnatic Music', 56 => 'Western Music', 57 => 'Drama and Theatre (Sinhala)', 58 => 'Drama and Theatre (Tamil)', 59 => 'Drama and Theatre (English)', 65 => 'Engineering Technology', 66 => 'Bio Systems Technology', 67 => 'Science fot Technology', 71 => 'Sinhala', 72 => 'Tamil', 73 => 'English', 74 => 'pali', 75 => 'Sanskrit', 78 => 'Arabic', 79 => 'Malay', 81 => 'French', 82 => 'German', 83 => 'Russian', 84 => 'Hindi', 86 => 'Chinese', 87 => 'Japanese');
      ?> 
    <thead>
      <tr>
        <th>Attempt</th>
        <th>Medium</th>
        <th>Subject</th>
        <th>Grade</th>
        <th>Subject</th>
        <th>Grade</th>
        <th>Subject</th>
        <th>Grade</th>
        <!-- <th>Subject</th> -->
        <!-- <th>Grade</th> -->
        <!-- <th>Gen. Test marks</th> -->
        <th>Z-score</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $alresult['attempt'] ?></td>
        <?php if($alresult['medium'] == 'S'){ ?>
          <td><?php echo "Sinhala" ?></td>
        <?php }elseif($alresult['medium'] == 'T'){ ?>
          <td><?php echo "Tamil" ?></td>
        <?php }elseif($alresult['medium'] == 'E'){ ?>
          <td><?php "English" ?></td>
        <?php } ?>
        <?php 
          if (!array_key_exists($alresult['sub1'], $alsubs)) {
            // echo "<td>". $alresult['sub1'] ."</td>";
          }
          foreach($alsubs as $key => $value){
            if($key == $alresult['sub1']){
              echo "<td>". $value ."</td>";
            }
          }
        ?>
        <!-- <td><?php //echo $alresult['sub1'] ?></td> -->
        <td><?php echo $alresult['grade1'] ?></td>

        <?php 
          if (!array_key_exists($alresult['sub2'], $alsubs)) {
            // echo "<td>". $alresult['sub2'] ."</td>";
          }
          foreach($alsubs as $key => $value){
            if($key == $alresult['sub2']){
              echo "<td>". $value ."</td>";
            }
          }
        ?>
        <td><?php echo $alresult['grade2'] ?></td>
        <!-- <td><?php //echo $alresult['sub3'] ?></td> -->

        <?php 
          if (!array_key_exists($alresult['sub3'], $alsubs)) {
            // echo "<td>". $alresult['sub3'] ."</td>";
          }
          foreach($alsubs as $key => $value){
            if($key == $alresult['sub3']){
              echo "<td>". $value ."</td>";
            }
          }
        ?>
        <td><?php echo $alresult['grade3'] ?></td>
        
        <!-- <td><?php //echo $alresult['sub4'] ?></td> -->
        <!-- <td><?php //echo $alresult['grade4'] ?></td> -->
        <!-- <td><?php //echo $alresult['gentst'] ?></td> -->
        <td><?php echo $alresult['zscore'] ?></td>
      </tr>      
    </tbody>
  </table>
  <?php endforeach; ?>
  <div style="text-align:right">
  <a class="btn btn-primary" href="<?php echo site_url(); ?>/olresults">Check O/L exam results</a>  
  <a class="btn btn-primary" href="<?php echo site_url(); ?>/mulika_pirivena">Check Mulika Pirivena exam results </a>  
  <!-- <button  type="submit" name="btnnext" class="btn btn-info"><span  class="glyphicon glyphicon-arrow-right"></span> Next </button> -->
  </div>
  </div>
<div class="row">
  &nbsp;
</div>
<br>
<footer class="footer">
    <div class="container">
        <span><h4>©2020 Data Management Branch, Ministry of Education, Sri Lanka.</h4></span>
    </div>
</footer>
