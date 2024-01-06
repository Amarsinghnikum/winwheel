<?php

//import.php

if(isset($_POST["first_name"]))
{
 $connect = new PDO("mysql:host=localhost; dbname=winwheel", "root", "");

 session_start();

 $file_data = $_SESSION['file_data'];

 unset($_SESSION['file_data']);

 foreach($file_data as $row)
 {
  $data[] = '("'.$row[$_POST["text"]].'", "'.$row[$_POST["fillStyle"]].'")';
 }

 if(isset($data))
 {
  $query = "
  INSERT INTO csv_file 
  (text, fillStyle) 
  VALUES ".implode(",", $data)."
  ";

  $statement = $connect->prepare($query);

  if($statement->execute())
  {
   echo 'Data Imported Successfully';
  }
 }
}



?>