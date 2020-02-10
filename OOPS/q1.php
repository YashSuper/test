 <?php

  // Class declaration of the student
  class student {
    // Properties
    private $id;
    private $name;
    private $dob;
    public $grade;
    private $eng = 0;
    private $math = 0;
    private $hindi = 0;

   /**
   * Constructor function for student class
   * @param string $argId
   *  This contains the ID of student.
   * @param string $argName
   *  This contains name of the student.
   * @param string $argDob
   *  This contains the date of birth in the form : YYYY-mm-dd.
   * @param int $argGrade
   *  This contains the grade of the student.
   */
  function __construct($argId,$argName,$argDob,$argGrade) {
    $this -> $id = $argId;
    $this -> $name = $argName;
    $this -> $dob = strtotime($ardDob);
    $this -> $grade = $argGrade;
    }

    /**
     * This function set_marks sets the marks of particular student.
     * @param int $argEng
     *  Contains marks of english.
     * @param int $argHindi
     *  Contains marks of hindi.
     * @param int $argMath
     *  Contains marks of mathmatics.
     */
    function set_marks ($argEng, $argHindi, $argMath) {
      $this -> $eng = $argEng;
      $this -> $hindi = $argHindi;
      $this -> $math = $argMath;
    }

    /**
     * This function get_marks returns the data
     * @param  string $subName
     *  Name of the subject whose marks have to be returned.
     * @return int
     */
    function get_marks ($subName) {
      if ($subName == 'eng')
        return $eng;
      if ($subName == 'hindi')
        return $hindi;
      if ($subName == 'math')
        return $math;
    }
  }

  // Initializing the new objects.
  $st1 = new student('st1', 'Yash', '1998-08-14', 12);
  $st2 = new student('st2', 'Zab', '1990-03-13', 11);
  $st3 = new student('st3', 'Kunal', '1995-11-12', 12);
  $st4 = new student('st4', 'Hemu', '1996-05-17', 11);
  // Array of new student objects.
  $students = array (
              $st1,
              $st2,
              $st3,
              $st4,
  );

  // Class declaration for the subjects.
  class subject {
    // Properties
    private $name;
    private $code;
    private $mm;

    /**
     * Constructor of the class subject
     * @param string $argName
     *  Name of the subject.
     * @param string $argCode
     *  Code of the subject.
     * @param int $argMm
     *  Minimum marks for passing the subect.
     */
    function __construct($argName, $argCode, $argMm) {
       $this -> $name = $argName;
       $this -> $code = $argCode;
       $this -> $mm = $argMm;
    }

  }

  // Initializing the subject objects.
  $eng = new subject ('eng', 'E', '50');
  $hindi = new subject ('hindi', 'H', '50');
  $math = new subject ('math', 'M', '50');

  // Array of all the subjects.
  $subjects = array (
              $eng,
              $hindi,
              $math,
  );

  /**
  * Function to display Marks of student by id of students.
  * @param string $sid
  *   Unique id of Student.
  * @param array $obtainedMarks
  *   Array of obtained marks by students.
  * @return mixed
  *   Echoing out marks in the desired format
  */

  function sub_by_student ($sid, $obtainedMarks) {
    foreach ($obtainedMarks as $key => $marks) {
      if($key == $sid) {
        echo "<br><br>Marks of ".$sid." is:<br>";
        foreach ($marks as $sub => $mark) {
          echo $sub." ".$mark." &nbsp; ";
        }
      }
    }
  }
  // Sample output of the above function.
  sub_by_student('st1', $obtainedMarks);


  /**
  * Function which returns result of a student either pass or fail.
  * @param string $sid
  *   Unique id of Student like : 'st1'.
  * @param array $student
  *   Array of student containg details of student.
  * @param array $subs
  *   Array of subjects
  * @param array $obtainedMarks
  *   Array of obtained marks by students.
  * @return string $result
  *   Returns the string Pass or Fail.
  */

  function  result ($sid,$student,$subs,$obtainedMarks) {
    $pass = 0; $fail = 0; $result='';
    foreach ($student as $id => $details) {
      if($details['id'] == $sid) {
        foreach ($obtainedMarks as $oid => $omarks) {
          if($oid == $sid) {
            foreach ($subs as $msubs) {
              if($details['grade'] == $msubs['grade']) {
                if($msubs['name'] == 'hindi' && $omarks['hindi'] > $msubs['mm']) {
                  $pass++;
                }
                elseif($msubs['name'] == 'hindi' && $omarks['hindi'] < $msubs['mm']) {
                  $fail++;
                }
                if($msubs['name'] == 'eng' && $omarks['eng'] > $msubs['mm']) {
                  $pass++;
                }
                elseif($msubs['name'] == 'eng' && $omarks['eng'] < $msubs['mm']) {
                  $fail++;
                }
                if($msubs['name'] == 'math' && $omarks['math'] > $msubs['mm']) {
                  $pass++;
                }
                elseif($msubs['name'] == 'math' && $omarks['math'] < $msubs['mm']) {
                  $fail++;
                }
              }
            }
          }
        }
      }
    }
    $total = $pass + $fail ;
    if($pass/$total >= 0.4) {
       $result = "Pass";
    }
    else {
      $result = "fail";
    }
  return $result;
  }

  // Driver code to print out the data in desired output.

  echo "<table border=1 style='width:70%; border-collapse: collapse;'><th>Name</th><th>DOB</th><th>Marks</th><th>Grade</th><th>Result</th>";
  foreach ($student as $key => $value) {
    echo "<tr><td>".$value['name']."</td><td>".date("Y-m-d", ($value['dob']))."</td>";
    foreach($obtainedMarks as $id => $sub) {
      foreach($subs as $msubs) {
        if($value['id'] == $id && $value['grade'] == $msubs['grade'] ) {
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
