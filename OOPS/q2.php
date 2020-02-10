<?php

// defining a array for college
$arr=array(
	1 => 'poornima',
	2 => 'skit'
);

// defining a class for data object
class data
{
	public $doc_name;
	public $doc_type;
	public $doc_college;
	public $sent;
	public $sent_status;
}

// creation of array of object
$doc=array();
$doc[0] = new data();
$doc[1] = new data();
$doc[0]->doc_name = 'abc.txt';
$doc[0]->doc_type = 'A';
$doc[0]->doc_college = 1;
$doc[0]->sent = 1;
$doc[1]->doc_name = 'xyz.txt';
$doc[1]->doc_type = 'B';
$doc[1]->doc_college = 1;
$doc[1]->sent = 0;

/** This function is used to display the data with proper arrangement of data with specific document id for college.
*
* @param array $a
*  This array contains the info about colleges.
* @param array $b
*  This array contains the info about documents.
*
* @return mixed
*  It displays the data of colleges along with their specific document.
*/
function work($a, $b) {
	// Condition to check sent_status
	for ($i=0; $i < count($b); $i++) {
		if ($b[$i]->sent == 1) {
			$b[$i]->sent_status="Success";
		}
		else {
			$b[$i]->sent_status="Fail";
		}
	}

	// Displaying data on the basis of doc_college for every college
	foreach ($a as $id => $college) {
		echo "<br>";
		echo "\$coll[college_id]->college_name='". $college ."';";
		echo "<br>";
		echo "\$coll[college_id]->college_id='". $id ."';";
		foreach ($b as $key => $value) {
			if ($b[$key]->doc_college == $id) {
				echo "<br>";
				echo "\$coll[college_id]->docs[".$key."]->doc_name ='". $b[$key]->doc_name ."';";
				echo "<br>";
				echo "\$coll[college_id]->docs[".$key."]->doc_type ='". $b[$key]->doc_type ."';";
				echo "<br>";
				echo "\$coll[college_id]->docs[".$key."]->sent_status ='". $b[$key]->sent_status ."';";
			}
			// if doc_college is null then it will displayed for every college
			elseif ($b[$key]->doc_college == null) {
				echo "<br>";
				echo "\$coll[college_id]->docs[".$key."]->doc_name ='". $b[$key]->doc_name ."';";
				echo "<br>";
				echo "\$coll[college_id]->docs[".$key."]->doc_type ='". $b[$key]->doc_type ."';";
				echo "<br>";
				echo "\$coll[college_id]->docs[".$key."]->sent_status ='". $b[$key]->sent_status ."';";
			}
		}

	}
}
// Driver code
work($arr, $doc);
?>
