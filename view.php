<?php
include ('./db_connect.php');
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phonenumber=$_POST['phone-number'];
    $image=$_FILES['file'];
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $phonenumber;
    echo "<br>";
    print_r($image);
    echo "<br>";
    $imagefilename=$image['name'];
    print_r($imagefilename);
    echo "<br>";
    $imagefileerror=$image['error'];
    print_r($imagefileerror);
    echo "<br>";
    $imagefiletemp=$image['tmp_name'];
    print_r($imagefiletemp);
    echo "<br>";
    $filename_separate=explode('.',$imagefilename);
   print_r($filename_separate);
    echo "<br>";
    $file_extension=strtolower($filename_separate[1]);
    print_r($file_extension);
    $file_extension=strtolower(end($filename_separate));
    print_r($file_extension);
    $extension=array('jpeg','jpg','png');
    if (in_array($file_extension,$extension)){
        $upload_image='images/'.$imagefilename;
        move_uploaded_file($imagefiletemp,$upload_image);
        $sql="insert into `registration`(name,email,phonenumber,image) values('$name','$email','$phonenumber','$upload_image')";
        $result=mysqli_query($con,$sql);
        if($result){
            echo '<div class="alert alert-success" role="alert">
            <strong>Success</strong> Data inserted successfully
            </div>';
        }else{
            die(mysqli_error($con));
        }
    }



}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Display data</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            img{
                width:100px;
            }
        </style>
      
    </head>
    <body>
    <h1 class="text-center my-4">Registration Data</h1>
    <div class="container mt-5 d-flex justify-content-center">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql="Select * from `registration`";
                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result)){
                
            
                $id= $row['id'];
                $name= $row['name'];
                $email= $row['email'];
                $phonenumber=$row['phonenumber'];
                $image=$row['image'];
                echo '<tr>
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$phonenumber.'</td--->
                <td><img src='.$image.'/></td>
                </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>



    </body>
</html>