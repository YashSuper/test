<?php
$arr=array(
	1 => 'poornima',
	2 => 'skit'
);

class data
{
	public $doc_name;
	public $doc_type;
	public $doc_college;
	public $sent;
	public $sent_status;
}

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
function work($a, $b) {
	for ($i=0; $i < count($b); $i++) {
		// Condition to check sent_status
		if ($b[$i]->sent == 1) {
			$b[$i]->sent_status="Success";
		}
		else {
			$b[$i]->sent_status="Fail";
		}
	}
	for ($i=0; $i < count($a); $i++) {
		echo "<br>";
		echo "\$coll[college_id]->college_name='". $a[$i+1] ."';";
		echo "<br>";
		echo "\$coll[college_id]->college_id='". ($i+1) ."';";
		foreach ($b as $key => $value) {
			if ($b[$key]->doc_college == ($i+1)) {
				echo "<br>";
				echo "\$coll[college_id]->docs[".$key."]->doc_name ='". $b[$key]->doc_name ."';";
				echo "<br>";
				echo "\$coll[college_id]->docs[".$key."]->doc_type ='". $b[$key]->doc_type ."';";
				echo "<br>";
				echo "\$coll[college_id]->docs[".$key."]->sent_status ='". $b[$key]->sent_status ."';";
			}
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

work($arr, $doc);
?>
