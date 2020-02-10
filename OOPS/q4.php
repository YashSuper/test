<?php
  /**
  *@file
  * Implementation of question 4 using oops.
  */
  // Class of fields.
  class info {
      public $name;
      public $gender;
  }
  $arrange = array();
  // Creating objects of class.
  $arrange[0] = new info();
  $arrange[1] = new info();
  $arrange[2] = new info();
  $arrange[3] = new info();
  $arrange[4] = new info();
  $arrange[5] = new info();
  $arrange[6] = new info();
  $arrange[7] = new info();
  $arrange[8] = new info();
  $arrange[9] = new info();
  // Assigning values to the objects of class starts here.
  $arrange[0]->name = 'yash';
  $arrange[0]->gender = 'M';
  $arrange[1]->name = 'ankita';
  $arrange[1]->gender = 'F';
  $arrange[2]->name = 'mahima';
  $arrange[2]->gender = 'F';
  $arrange[3]->name = 'ankit';
  $arrange[3]->gender = 'M';
  $arrange[4]->name = 'suresh';
  $arrange[4]->gender = 'M';
  $arrange[5]->name = 'arpit';
  $arrange[5]->gender = 'M';
  $arrange[6]->name = 'kanishka';
  $arrange[6]->gender = 'F';
  $arrange[7]->name = 'kunal';
  $arrange[7]->gender = 'M';
  $arrange[8]->name = 'zubin';
  $arrange[8]->gender = 'M';
  $arrange[9]->name = 'anshul';
  $arrange[9]->gender = 'M';
  // Assigning values to the objects of class ends here.
  $seating = $male = $female = array();
  foreach ($arrange as $key => $value) {
    if ($value->gender == 'F') {
        // Group arrays of female into different array.
        array_push($female, $value->name);
    }
    elseif ($value->gender == 'M') {
        // Group arrays of male into different array.
        array_push($male, $value->name);
    }
  }
  for($i=0,$j=0,$k=0;$i<7,$i<3,$k<10;$i++,$j++,$k++) {
    if ($i<7) {
        // Push array of male in a new array.
       array_push($seating, $male[$i]);
    }
    if ($j<3){
        // Push array of female in continuation.
       array_push($seating, $female[$j]);
    }
  }
  // Output display.
  echo "array( ";
  foreach ($seating as $value) {
    echo $value;
    echo ", ";
  }
  echo ");";

?>
