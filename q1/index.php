<?php

/**
*
* @file index.php
*   This is the solution of first problem
*/


  // Array of students is defined
$student = array(0 => array('id' => 'st1', 'name' => 'Hemant', 'dob' => strtotime("1990-02-01"), 'grade' => '12' ),
                 1 => array('id' => 'st2', 'name' => 'Yash', 'dob' => strtotime("1998-08-14"), 'grade' => '11' ),
                 2 => array('id' => 'st3', 'name' => 'Zubin', 'dob' => strtotime("1994-08-11"), 'grade' => '11' ));

 //  Data structure for subjects
$subs = array(array('grade' => 12, 'name' => 'math', 'code' => '12M', 'mm' => 60),
              array('grade' => 12, 'name' => 'eng', 'code' => '12E', 'mm' => 80),
              array('grade' => 12, 'name' => 'hindi', 'code' => '12H', 'mm' => 60),
              array('grade' => 11, 'name' => 'math', 'code' => '11M', 'mm' => 55),
              array('grade' => 11, 'name' => 'eng', 'code' => '11E', 'mm' => 60),
              array('grade' => 11, 'name' => 'hindi', 'code' => '11H', 'mm' => 70));



  /** function to display subjects for specific grades
  *
  * @param int $grade
  *   Grade of the student.
  * @param array $subs
  *   array of subject details
  * @return nothing

  */

function subs_of_grade ($grade, $subs)
{
  foreach ($subs as $subject) {
    if($subject['grade'] == $grade){
      echo "<br>";
      echo "Subject code".$subject['code']."-> Subject name :".$subject['name'];
    }
  }
}
      //sample output
subs_of_grade (12, $subs);
// Array for marks obtained of each student with student id as key
$obtainedMarks = array ('st1' => array ('math' => '100', 'eng' => '00', 'hindi' => '70'),
  'st2' => array ('math' => '80', 'eng' => '70', 'hindi' => '62'),
  'st3' => array ('math' => '80', 'eng' => '40', 'hindi' => '36'));



  /** function to display Marks of student by id of students
  *
  * @param string $sid
  *   unique id of Student like : 'st1'
  * @param array $obtainedMarks
  *   array of obtained marks by students
  * @return nothing

  */
function sub_by_student ($sid, $obtainedMarks){
  foreach ($obtainedMarks as $key => $marks) {
    if($key == $sid){
      echo "<br><br>Marks of ".$sid." is:<br>";
      foreach ($marks as $sub => $mark) {
        echo $sub." ".$mark." &nbsp; ";
      }
    }
  }
}
//sample output of the above function
sub_by_student('st1', $obtainedMarks);



/** function which returns result of a student either pass or fail
*
* @param string $sid
*   unique id of Student like : 'st1'
* @param array $student
*   array of student containg details of student
* @param array $subs
*   array of subjects
* @param array $obtainedMarks
*   array of obtained marks by students
* @return string $result
*   returns the string Pass or Fail
*/

function  result ($sid,$student,$subs,$obtainedMarks)
{
  $pass = 0; $fail = 0; $result='';
  foreach ($student as $id => $details) {
    if($details['id'] == $sid){
      foreach ($obtainedMarks as $oid => $omarks) {
        if($oid == $sid) {
          foreach ($subs as $msubs) {
            if($details['grade'] == $msubs['grade']){
              if($msubs['name'] == 'hindi' && $omarks['hindi'] > $msubs['mm']){
                $pass++;
              }
              elseif($msubs['name'] == 'hindi' && $omarks['hindi'] < $msubs['mm']){
                $fail++;
              }
              if($msubs['name'] == 'eng' && $omarks['eng'] > $msubs['mm']){
                $pass++;
              }
              elseif($msubs['name'] == 'eng' && $omarks['eng'] < $msubs['mm']){
                $fail++;
              }
              if($msubs['name'] == 'math' && $omarks['math'] > $msubs['mm']){
                $pass++;
              }
              elseif($msubs['name'] == 'math' && $omarks['math'] < $msubs['mm']){
                $fail++;
              }
            }
          }
        }
      }
    }
  }
  $total = $pass + $fail ;
  if($pass/$total >= 0.4){
     $result = "Pass";
  }
  else{
    $result = "fail";
  }
return $result;
}

// Driver code to print out the data in desired output

echo "<table border=1 style='width:70%; border-collapse: collapse;'><th>Name</th><th>DOB</th><th>Marks</th><th>Grade</th><th>Result</th>";
foreach ($student as $key => $value) {
  echo "<tr><td>".$value['name']."</td><td>".date("Y-m-d", ($value['dob']))."</td>";
  foreach($obtainedMarks as $id => $sub){
    foreach($subs as $msubs){
      if($value['id'] == $id && $value['grade'] == $msubs['grade'] ){
        if($msubs['name'] == 'math')
          echo "<td>".$msubs['code']."(".$sub['math'].",".$msubs['mm'].")<br>";
        if($msubs['name'] == 'eng')
          echo $msubs['code']."(".$sub['eng'].",".$msubs['mm'].")<br>";
        if($msubs['name'] == 'hindi')
          echo $msubs['code']."(".$sub['hindi'].",".$msubs['mm'].")</td>";
        }
      }
    }
    echo  "<td>".$value['grade']."</td><td>".result($value['id'],$student,$subs,$obtainedMarks)."</td></tr>";
  }
?>
