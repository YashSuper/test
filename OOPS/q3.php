<?php
echo "<br><br>";

class details {
  public $team1;
  public $team2;
  public $team3;
  public $team4;
}

// Match of team1 & team2.
$match1 = new details();
$match1->team1 = array(
  'Suresh' => '100',
  'Ramesh' => '55',
  'Ram' => '23',
  'Shyam' => '34',
  'Sanju' => '23',);
$match1->team2 = array(
  'John' => '10',
  'David' => '43',
  'Warned' => '32',
  'Raina' => '33',
  'Pant' => '55',);
$match1->team3 = 0;
$match1->team4 = 0;

// Match of team1 & team3.
$match2 = new details();
$match2->team1 = array(
  'Suresh' => '10',
  'Ramesh' => '15',
  'Ram' => '13',
  'Shyam' => '3',
  'Sanju' => '23',);
$match2->team3 = array(
  'Prateek' => '40',
  'Hemant' => '53',
  'Ankit' => '2',
  'Yash' => '103',
  'Yogi' => '25',);

// Match of team1 & team4.
$match3 = new details();
$match3->team1 = array(
		 'Suresh' => '33',
		 'Ramesh' => '11',
		 'Ram' => '5',
		 'Shyam' => '44',
		 'Sanju' => '25',);
$match3->team4 = array(
		 'Michaela' => '12',
		 'Jane' => '88',
		 'Katy' => '44',
		 'Hana' => '00',
		 'Hafsa' => '1',);

// Match of team2 & team3.
$match4 = new details();
$match4->team2 = array(
		 'John' => '4',
		 'David' => '6',
		 'Warned' => '88',
		 'Raina' => '33',
		 'Pant' => '21',);
$match4->team3 = array(
		 'Prateek' => '43',
		 'Hemant' => '76',
		 'Ankit' => '100',
		 'Yash' => '1',
		 'Yogi' => '15',);

// Match of team2 & team4.
$match5 = new details();
$match5->team2 = array(
		 'John' => '21',
		 'David' => '54',
		 'Warned' => '77',
		 'Raina' => '1',
		 'Pant' => '3',);
$match5->team4 = array(
		 'Michaela' => '4',
		 'Jane' => '7',
		 'Katy' => '33',
		 'Hana' => '51',
		 'Hafsa' => '43',);

// Match of team3 & team4.
$match6 = new details();
$match6->team3 = array(
		 'Prateek' => '78',
		 'Hemant' => '65',
		 'Ankit' => '3',
		 'Yash' => '66',
		 'Yogi' => '1',);
$match6->team4 = array(
		 'Michaela' => '0',
		 'Jane' => '1',
		 'Katy' => '32',
		 'Hana' => '66',
		 'Hafsa' => '11',);

echo "<br>";
function score($match)
{
  foreach ($match as $team => $value) {	
  	if ($team == "team1") {
  	  foreach ($value as $name => $run) {
  	  	$team_totala = $team_totala + $run;
  	  }
	}
	elseif ($team == "team2") {
	  foreach ($value as $name => $run) {
		$team_totalb = $team_totalb + $run;
	  }
	}
	elseif ($team == "team3") {
	  foreach ($value as $name => $run) {
		$team_totalc = $team_totalc + $run;
	  }
	}
	elseif ($team == "team4") {
	  foreach ($value as $name => $run) {
		$team_totald = $team_totald + $run;
	  }
	}
  };
  $match_total = $team_totala + $team_totalb + $team_totalc + $team_totald;
  return $match_total;
}
$match_tot = array (score($match1), score($match2), score($match3), score($match4), score($match5), score($match6));
arsort($match_tot);
$maxscore = array_values($match_tot);
$maxteam = array_keys($match_tot);
echo "<br>----------------------------------------------------------------------------------------------------------------------------------";
echo "<br>HIGHEST TOTAL SCORE<br>MATCH NUMBER --><b> MATCH " . ++$maxteam[0] . " </b><br>TOTAL SCORE IN MATCH --> <b>" . $maxscore[0] . " Runs</b>";
echo "<br><br>flag end";


//function for team match wins
function win($match,$wins)
{
	echo '<tr>';
	foreach ($match as $team => $value) 
	{
		echo $team;
		if ($team != 0) 
		{	echo '<td>TEAM 1</td>';
			foreach ($value as $name => $run) 
			{
				$team_totala = $team_totala + $run;
				
			}
		}
		elseif ($team != 0)
		{echo '<td>TEAM 2</td>';
			foreach ($value as $name => $run) 
			{
				$team_totalb = $team_totalb + $run;
				
			}
		}
		elseif ($team != 0)
		{echo '<td>TEAM 3</td>';
			foreach ($value as $name => $run) 
			{
				$team_totalc = $team_totalc + $run;
				
			}
		}
		elseif ($team != 0)
		{echo '<td>TEAM 4</td>';
			foreach ($value as $name => $run) 
			{
				$team_totald = $team_totald + $run;
				
			}
		}
	};
	if (($team_totala > $team_totalb) && ($team_totala > $team_totalc) && ($team_totala > $team_totald)) 
	{
		$wins1 = $wins1 + 1;
		if(isset($team_totala))
		{
			echo '<td>'.$team_totala.'</td>';
		}
		if (isset($team_totalb)) 
		{
			echo '<td>'.$team_totalb.'</td>';
		}
		if (isset($team_totalc)) 
		{
			echo '<td>'.$team_totalc.'</td>';
		}
		if (isset($team_totald)) 
		{
			echo '<td>'.$team_totald.'</td>';
		}
		echo '<td>TEAM 1</td><td>'.$team_totala.'</td>';
	}
	if (($team_totalb > $team_totala) && ($team_totalb > $team_totalc) && ($team_totalb > $team_totald)) 
	{
		$wins2 = $wins2 + 1;
		if(isset($team_totala))
		{
			echo '<td>'.$team_totala.'</td>';
		}
		if (isset($team_totalb)) 
		{
			echo '<td>'.$team_totalb.'</td>';
		}
		if (isset($team_totalc)) 
		{
			echo '<td>'.$team_totalc.'</td>';
		}
		if (isset($team_totald)) 
		{
			echo '<td>'.$team_totald.'</td>';
		}
		echo '<td>TEAM 2</td><td>'.$team_totalb.'</td>';
	}
	if (($team_totalc > $team_totala) && ($team_totalc > $team_totalb) && ($team_totalc > $team_totald))
	{
		$wins3 = $wins3 + 1;
		if(isset($team_totala))
		{
			echo '<td>'.$team_totala.'</td>';
		}
		if (isset($team_totalb)) 
		{
			echo '<td>'.$team_totalb.'</td>';
		}
		if (isset($team_totalc)) 
		{
			echo '<td>'.$team_totalc.'</td>';
		}
		if (isset($team_totald)) 
		{
			echo '<td>'.$team_totald.'</td>';
		}
		echo '<td>TEAM 3</td><td>'.$team_totalc.'</td>';
	}
	if (($team_totald > $team_totala) && ($team_totald > $team_totalb) && ($team_totald > $team_totalc)) 
	{
		$wins4 = $wins4 + 1;
		if(isset($team_totala))
		{
			echo '<td>'.$team_totala.'</td>';
		}
		if (isset($team_totalb)) 
		{
			echo '<td>'.$team_totalb.'</td>';
		}
		if (isset($team_totalc)) 
		{
			echo '<td>'.$team_totalc.'</td>';
		}
		if (isset($team_totald)) 
		{
			echo '<td>'.$team_totald.'</td>';
		}
		echo '<td>TEAM 4</td><td>'.$team_totald.'</td>';
	}
	echo '</tr>';
	$winse = array ($wins1, $wins2, $wins3, $wins4);
	return $winse;
}

echo '<table border = "1px">';
$winss = array (win($match1,$winss), win($match2,$winss), win($match3,$winss), win($match4,$winss), win($match5,$winss), win($match6,$winss));
echo "</table>";
?>