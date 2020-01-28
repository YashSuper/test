<?php


  $id=array(1=>array('name' =>'Yash','class' =>12,'marks' =>array('hindi'=>80,'maths'=>54,'eng'=>50)),
        2=>array('name' =>'Pratek','class' =>10,'marks'=>array('hindi'=>90,'maths'=>54,'eng'=>50)),
        2=>array('name' =>'Pratek','class' =>10,'marks' =>array('hindi'=>40,'maths'=>54,'eng'=>50)),
        3=>array('name' =>'hemant','class' =>12,'marks' =>array('hindi'=>60,'maths'=>54,'eng'=>50)),
        4=>array('name' =>'suresh','class' =>10,'marks' =>array('hindi'=>80,'maths'=>54,'eng'=>50)),
        5=>array('name' =>'yogesh','class' =>10,'marks' =>array('hindi'=>90,'maths'=>54,'eng'=>50)),
        6=>array('name' =>'ram','class' =>11,'marks' =>array('hindi'=>70,'maths'=>54,'eng'=>50)),
        7=>array('name' =>'shyam','class' =>11,'marks' =>array('hindi'=>80,'maths'=>54,'eng'=>50)),
        8=>array('name' =>'akansh','class' =>11,'marks' =>array('hindi'=>30,'maths'=>54,'eng'=>50)),
        9=>array('name' =>'archit','class' =>9,'marks' =>array('hindi'=>10,'maths'=>54,'eng'=>50)),
        10=>array('name' =>'tak','class' =>9,'marks' =>array('hindi'=>70,'maths'=>54,'eng'=>50)),
        11=>array('name' =>'tak','class' =>12,'marks' =>array('hindi'=>300,'maths'=>54,'eng'=>50)),
        12=>array('name' =>'tushar','class' =>9,'marks' =>array('hindi'=>77,'maths'=>54,'eng'=>50)),
        13=>array('name' =>'tushar','class' =>12,'marks' =>array('hindi'=>77,'maths'=>54,'eng'=>50)),
      );
// Code of a temp array which will sort out all the marks
  $temp = array();
  foreach ($id as $key => $value)
  {   $totalmarks=$value['marks']['hindi']+$value['marks']['maths']+$value['marks']['eng'];
      array_push($temp,$totalmarks);
  }
  rsort($temp);
  print_r($temp);

// Function to render the table of
echo "<table border=2><th>Name</th><th>Marks</th><th>class</th>";
  function showclass($studentclass,$temp,$id)
    {
      $check=array();
      foreach ($temp as $marks)
       {
          foreach ($id as $key => $value)
           {
              if($marks==$value['marks']['hindi']+$value['marks']['maths']+$value['marks']['eng'])
                {
                  if($value['class']==$studentclass && !in_array($key,$check))
                  echo "<tr><td>".$value['name']."</td><td>".$marks."</td><td> ".$value['class']."</td><tr>";
                  array_push($check,$key);

                }
            }

        }
        }


        //Driver code
  showclass(12,$temp,$id);
  showclass(10,$temp,$id);
  showclass(11,$temp,$id);
  showclass(9,$temp,$id);
  echo "</table>";
?>
