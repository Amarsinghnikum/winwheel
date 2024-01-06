<?php 
include('../../config/server.php');
    if(isset($_FILES['csv_name']['name']))
    {
        $csv_name = $_FILES['csv_name']['name'];
        
        $tmp = explode('.', $csv_name);
        $ext = end($tmp);
        $csv_name = "sample".'.'.$ext;
        $source_path = $_FILES['csv_name']['tmp_name'];
        $destination_path = "C:/xampp/htdocs/winwheel/examples/csv/".$csv_name;
        $upload = move_uploaded_file($source_path, $destination_path);
        
        if($upload==false)
        {
        $_SESSION['upload'] = "<div class='error'>Failed to Upload Csv.</div>";
        die();
        }
    }
    else
    {
        $image_name="";
    }
    header("Location: index.php");
    // header("Location: index.php");

    // $sql = "INSERT INTO csv SET 
    //     csv_name = '$csv_name'
    // ";
    // $res = mysqli_query($con, $sql);
    // if($res==true)
    // {
    //   header("Location: index.php");
    // }
    // else
    // {
    //   header("Location: index.php");
    // }
?>