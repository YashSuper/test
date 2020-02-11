<?php
  // Array given in question.
   $array = array (
      array (
        'pd' => 'pd1',
        'sp' => 5,
        'sd' => '4thFeb',
        'ct' => 'C1',
      ),
      array (
        'pd' => 'pd1',
        'sp' => 15,
        'sd' => '5thFeb',
        'ct' => 'C1'
      ),
      array (
        'pd' => 'pd2',
        'sp' => 50,
        'sd' => '4thFeb',
        'ct' => 'C1'
      ),
      array (
        'pd' => 'pd3',
        'sp' => 40,
        'sd' => '6thFeb',
        'ct' => 'C2'
      ),
        array (
        'pd' => 'pd2',
        'sp' => 75,
        'sd' => '3thFeb',
        'ct' => 'C1'
      ),
      array (
        'pd' => 'pd2',
        'sp' => 65,
        'sd' => '7thFeb',
        'ct' => 'C1'
      ),
      array (
        'pd' => 'pd4',
        'sp' => 190,
        'sd' => '8thFeb',
        'ct' => 'C2'
      ),
      array (
        'pd' => 'pd4',
        'sp' => 190,
        'sd' => '8thFeb',
        'ct' => 'C2'
      ),
  );

  /**
   * This function generates a new array with timestamp.
   * @param  array $array
   *  Given array.
   * @return array
   */
  function convert ($array) {
    $new = array();
    foreach ($array as $key) {
      $key['sd'] = strtotime($key['sd']);

      array_push ($new, $key);
    }
    return $new;
  }

  // Get converted array in a new variable.
  $conArray = convert ($array);

  // Sort array according to the selling date.
  usort($conArray, function($a, $b) {
    return $a['sd'] - $b['sd'];
});


$temp = array();
foreach ($conArray as $key => $value) {
	if ($key > 0) {
		for ($i = 0; $i < $key; $i++) {
			if ($conArray[$i]['pd'] == $value['pd']) {
				if (isset($temp[$key])) {
					$temp[$key] = $conArray[$i]['sp'] + $temp[$key];
				}
				else {
					$temp[$key] = $conArray[$i]['sp'] + $value['sp'];
				}
			}
		}
	}
}

foreach ($temp as $key => $value) {
	foreach ($conArray as $a_key => &$a_value) {
		if ($key == $a_key) {
			$a_value['sp'] = $temp[$key];
		}
	}
}




$counter = array();
foreach ($conArray as $key => $value) {
	if(isset($counter[$value['ct']])){
		$counter[$value['ct']] += 1;
	}
	else {
		$counter[$value['ct']]=1;
	}
}
foreach ($counter as $ct => $count) {
	$p=1;
	for ($i=0; $i < count($conArray); $i++) {
		if($ct==$conArray[$i]['ct']){
			$conArray[$i]['ct'] = $ct."-P".$p;
			$p++;
		}
	}
}


foreach ($conArray as $key) {
  $key['sd'] = date('d-m-Y', $key['sd']);
  print_r ($key);
  echo "<br>";
}

?>
