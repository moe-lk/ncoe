<?php
tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "PDF Report";
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 12);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
// we can have any view part here like HTML, PHP etc
?>    

    <body>
    <div class="container mt-5" style="padding-top: 0px;">
            <h1>National Colleges of Education (NCoE) Admission</h1><br>
            <label for="fullname"><b>01. Name in Full:  </b></label><?php echo $fullname; ?><br>
            <label for="initials"><b>02. Name with Initials:    </b></label><?php echo $namewithinitials; ?><br>
            <label for="address"><b>03. Permanent Address: </b></label><?php echo $addressline1; ?>
            <?php echo $addressline2; ?>
            <?php echo $addressline3; ?>
            <?php echo $addressline4; ?><br>
            <label for="nic"><b>04. NIC Number: </b></label><?php echo $nic; ?><br>
            <label for="dob"><b>05. Date of Birth: </b></label><?php echo $dob; ?><br> 
            <label for="gender"><b>06. Gender: </b></label><?php echo $gender; ?><br>
            <label for="title"><b>07. Title: </b></label><?php echo $_SESSION['title']; ?><br>
            <label for="ethnicity"><b>08. Ethnicity: </b></label><?php echo $ethnicity; ?><br>
            <label for="mobile"><b>09. Mobile: </b></label><?php echo $mobile; ?><br>
            <label for="home"><b>10. Home Tel: </b></label><?php echo $home; ?><br>
            <label for="email"><b>11. Email: </b></label><?php echo $email; ?><br>
            <?php 
                $districts = array('16' => 'Ampara', "20" => 'Anuradhapura',"22" => 'Badulla',"15" => 'Batticaloa',"01" => 'Colombo',"07" => 'Galle',"02" => 'Gampaha',"09" => 'Hambantota',"10" => 'Jaffna',"03" => 'Kaluthara',"04" => 'Kandy',"25" => 'Kegalle',"11" => 'Kilinochchi',"18" => 'Kurunegala',"12" => 'Mannar',"05" => 'Matale',"08" => 'Matara',"23" => 'Monaragala',"14" => 'Mullaitivu',"06" => 'Nuwara Eliya',"21" => 'Polonnaruwa',"19" => 'Puttalam',"24" => 'Ratnapura',"17" => 'Trincomalee',"13" => 'Vavuniya');
            
                foreach ($districts as $key => $value) {
                    if ($key == $district) { 
                        echo "<label for='district'><b>12. District: </b></label>". $key." - " .$value."<br>";
                    }
                }?>
            <!-- <label for="Sripada">12. Are you applying for Sripada NCoE? </label><br>
            <label for="state">13. Are your parents are State Workers? </label><br><br> -->


            <h4><b>A/L Details: </b></h4>
            <?php foreach($alresults as $alresult): ?><br>
            <label for="alindex"><b>13. A/L Index No:</b></label><?php echo $alresult['AL_index']; ?><br>
            <?php if(isset($alresult['year'])){
                echo '<label for="alyear"><b>14. A/L Year: </b></label>'.$alresult['year'].'<br>';
            }else{
                echo '<label for="alyear"><b>14. A/L Year: </b></label>2018<br>';
            }?>
            

            <label for="alstream"><b>15. Stream: </b></label><?php echo $alresult['stream'] ?><br>
            <label for="almedium"><b>16. Medium: </b></label><?php echo $alresult['medium'] ?><br>
            <label for="alattempt"><b>17. Attempt: </b></label><?php echo $alresult['attempt'] ?><br><br>
            <h4><b>A/L Results: </b></h4>
                <table style="width: 100%">
                <tr>
                    <th style="width: 10%"></th>
                    <th><b>Subject</b></th>
                    <th><b>Grade</b></th>
                </tr>
                <tr>
                    <td>01. </td>
                    <td><?php echo $alresult['sub1'] ?></td>
                    <td><?php echo $alresult['grade1'] ?></td>
                </tr>
                <tr>
                    <td>02. </td>
                    <td><?php echo $alresult['sub2'] ?></td>
                    <td><?php echo $alresult['grade2'] ?></td>
                </tr>
                <tr>
                    <td>03. </td>
                    <td><?php echo $alresult['sub3'] ?></td>
                    <td><?php echo $alresult['grade3'] ?></td>
                </tr>
                <tr>
                    <td>04. </td>
                    <td><?php echo $alresult['sub4'] ?></td>
                    <td><?php echo $alresult['grade4'] ?></td>
                </tr>
                </table>
                
                <div style="height: 10px;"></div>
                <br><br>
                <label><b>18. Z-score: </b></label><?php echo $alresult['zscore'] ?><br>
                <?php endforeach; ?>
                <br>
            <h4><b>O/L Details: </b></h4>
            <br>&nbsp;&nbsp;<label for="olattempts"><b>19. Number of Attempts: </b><?php echo $attempts; ?><br>
            <?php if(isset($_SESSION['olindex1']) && $_SESSION['olindex1'] != ''){ ?>
                <label for="olindex"><b>20. Index Number 1: </b><?php echo $_SESSION["olindex1"]; ?><br><br>
            <?php }?>
            <?php foreach($olresults1 as $olresult1): if( $olresult1["OL_index"] != "N/A"){?><br>
                <h4><b>O/L Results: </b></h4>
                <table style="width: 100%">
                    <tr>
                        <th style="width: 10%"></th>
                        <th><b>Subject</b></th>
                        <th><b>Grade</b></th>
                    </tr>
                    <tr>
                        <td>01. </td>
                        <td><?php echo $olresult1['sub1']; ?></td>
                        <td><?php echo $olresult1['grade1']; ?></td>
                    </tr>
                    <tr>
                        <td>02. </td>
                        <td><?php echo $olresult1['sub2']; ?></td>
                        <td><?php echo $olresult1['grade2']; ?></td>
                    </tr>
                    <tr>
                        <td>03. </td>
                        <td><?php echo $olresult1['sub3']; ?></td>
                        <td><?php echo $olresult1['grade3']; ?></td>
                    </tr>
                    <tr>
                        <td>04. </td>
                        <td><?php echo $olresult1['sub4']; ?></td>
                        <td><?php echo $olresult1['grade4']; ?></td>
                    </tr>
                    <tr>
                        <td>05. </td>
                        <td><?php echo $olresult1['sub5']; ?></td>
                        <td><?php echo $olresult1['grade5']; ?></td>
                    </tr>
                    <tr>
                        <td>06. </td>
                        <td><?php echo $olresult1['sub6']; ?></td>
                        <td><?php echo $olresult1['grade6']; ?></td>
                    </tr>
                    <tr>
                        <td>07. </td>
                        <td><?php echo $olresult1['sub7']; ?></td>
                        <td><?php echo $olresult1['grade7']; ?></td>
                    </tr>
                    <tr>
                        <td>08. </td>
                        <td><?php echo $olresult1['sub8']; ?></td>
                        <td><?php echo $olresult1['grade8']; ?></td>
                    </tr>
                    <tr>
                        <td>09. </td>
                        <td><?php echo $olresult1['sub9']; ?></td>
                        <td><?php echo $olresult1['grade9']; ?></td>
                    </tr>
                </table><br>
            <?php }endforeach; ?>

            <?php if(isset($_SESSION['olindex2']) && $_SESSION['olindex2'] != ''){ ?>
                <label for="olindex"><b>20. Index Number 2: </b><?php echo $_SESSION["olindex2"]; ?><br><br>
            <?php } ?>
            <?php foreach($olresults2 as $olresult2): if( $olresult2["OL_index"] != "N/A"){?>            
            <h4>O/L Results: </h4>
            <table>
                <tr>
                    <th></th>
                    <th><b>Subject</b></th>
                    <th><b>Grade</b></th>
                </tr>
                <tr>
                    <td>01. </td>
                    <td><?php echo $olresult2['sub1']; ?></td>
                    <td><?php echo $olresult2['grade1']; ?></td>
                </tr>
                <tr>
                    <td>02. </td>
                    <td><?php echo $olresult2['sub2']; ?></td>
                    <td><?php echo $olresult2['grade2']; ?></td>
                </tr>
                <tr>
                    <td>03. </td>
                    <td><?php echo $olresult2['sub3']; ?></td>
                    <td><?php echo $olresult2['grade3']; ?></td>
                </tr>
                <tr>
                    <td>04. </td>
                    <td><?php echo $olresult2['sub4']; ?></td>
                    <td><?php echo $olresult2['grade4']; ?></td>
                </tr>
                <tr>
                    <td>05. </td>
                    <td><?php echo $olresult2['sub5']; ?></td>
                    <td><?php echo $olresult2['grade5']; ?></td>
                </tr>
                <tr>
                    <td>06. </td>
                    <td><?php echo $olresult2['sub6']; ?></td>
                    <td><?php echo $olresult2['grade6']; ?></td>
                </tr>
                <tr>
                    <td>07. </td>
                    <td><?php echo $olresult2['sub7']; ?></td>
                    <td><?php echo $olresult2['grade7']; ?></td>
                </tr>
                <tr>
                    <td>08. </td>
                    <td><?php echo $olresult2['sub8']; ?></td>
                    <td><?php echo $olresult2['grade8']; ?></td>
                </tr>
                <tr>
                    <td>09. </td>
                    <td><?php echo $olresult2['sub9']; ?></td>
                    <td><?php echo $olresult2['grade9']; ?></td>
                </tr>
            </table><br>
            <?php }endforeach; ?>

            <?php if(isset($_SESSION['olindex3']) && $_SESSION['olindex3'] != ''){ ?>
                <label for="olindex"><b>20. Index Number 3: </b><?php echo $_SESSION["olindex3"]; ?><br><br>
            <?php } ?>
            <?php foreach($olresults3 as $olresult3): if( $olresult3["OL_index"] != "N/A"){?>
            <h4><b>O/L Results: </b></h4>
            <table>
                <tr>
                    <th></th>
                    <th><b>Subject</b></th>
                    <th><b>Grade</b></th>
                </tr>
                <tr>
                    <td>01. </td>
                    <td><?php echo $olresult3['sub1']; ?></td>
                    <td><?php echo $olresult3['grade1']; ?></td>
                </tr>
                <tr>
                    <td>02. </td>
                    <td><?php echo $olresult3['sub2']; ?></td>
                    <td><?php echo $olresult3['grade2']; ?></td>
                </tr>
                <tr>
                    <td>03. </td>
                    <td><?php echo $olresult3['sub3']; ?></td>
                    <td><?php echo $olresult3['grade3']; ?></td>
                </tr>
                <tr>
                    <td>04. </td>
                    <td><?php echo $olresult3['sub4']; ?></td>
                    <td><?php echo $olresult3['grade4']; ?></td>
                </tr>
                <tr>
                    <td>05. </td>
                    <td><?php echo $olresult3['sub5']; ?></td>
                    <td><?php echo $olresult3['grade5']; ?></td>
                </tr>
                <tr>
                    <td>06. </td>
                    <td><?php echo $olresult3['sub6']; ?></td>
                    <td><?php echo $olresult3['grade6']; ?></td>
                </tr>
                <tr>
                    <td>07. </td>
                    <td><?php echo $olresult3['sub7']; ?></td>
                    <td><?php echo $olresult3['grade7']; ?></td>
                </tr>
                <tr>
                    <td>08. </td>
                    <td><?php echo $olresult3['sub8']; ?></td>
                    <td><?php echo $olresult3['grade8']; ?></td>
                </tr>
                <tr>
                    <td>09. </td>
                    <td><?php echo $olresult3['sub9']; ?></td>
                    <td><?php echo $olresult3['grade9']; ?></td>
                </tr>
            </table><br>
            <?php }endforeach; ?>
            
    <h4><b>Selected Courses: </b></h4>
    <ol>
        <?php if($_SESSION['course1'] != ""){ ?>
            <li><?php echo $course1["course_no"]; ?> - <?php echo $course1["name"]; ?></li>
        <?php } ?>

        <?php if($_SESSION['course2'] != ""){ ?>
            <li><?php echo $course2["course_no"]; ?> - <?php echo $course2["name"]; ?></li>
        <?php } ?>

        <?php if($_SESSION['course3'] != ""){ ?>
            <li><?php echo $course3["course_no"]; ?> - <?php echo $course3["name"]; ?></li>
        <?php } ?>
    </ol>
    <?php if($pemarks1 != NULL){ ?>
        <label for="pemarks"><b>21. Physical Education Marks: </b></label><?php echo $pemarks1; ?><br><br>
    <?php }?>
    <?php if($gitmk != NULL){ ?>
        <label for="gitmk"><b>22. GIT Grades: </b></label><?php echo $gitmk; ?><br><br>
    <?php }?>
    <!-- <h5>Declaration: </h5>
        <p style="text-align: justify">I am aware that I have forwarded my application in accordance with paragraph10.0 of the Gazette Notification, after reading and comprehending the Gazette Notification well. I certify that I have already acquired the qualifications mentioned in the Gazette Notification relevant to the Courses that have been applied by me. I am aware that the particulars furnished in the application by me are true and correct. I am aware that if any particulars given by me in this application are found to be false or incorrect or contradictory to the Gazette Notification, I am liable to be disqualified before selection or to be discontinued after selection. I certify that I have not registered to follow a course in a University/University Institute/any other Higher Education Institute/ I am not currently following a relevant course in an afore mentioned institute. I further certify that I agree to be discontinued from the course if It is found that the section 8.4 of the Gazette Notification has been/is violated by me. I declare that I agree to accept any punishment pronounced by the disciplinary board of the National College of Education and the Ministry of Education if I am found and proven to have been engaged in any action against the code of conduct of National Colleges of Education.</p>
        <div style="text-align:center">
            <strong> I Agreed </strong> <br/>
        </div> -->
    </div>
</body>
<?php
$content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('Report.pdf', 'I');
?>
