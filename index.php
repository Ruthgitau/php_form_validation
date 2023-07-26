<?php
require_once('./inputfields.php')
?>

<!DOCTYPE html>
<html>
    <head>
        <title>image upload</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <h1 class="text-center my-3">Registration Form</h1>
        <div class="container d-flex justify-content-center">
            <form action="view.php" method="post" class="w-50" enctype="multipart/form-data">
                <!---div class="form-group my-4">
                    <input type="text" name="name" placeholder="Name" class="form-control">
                </div>
                <div class="form-group my-4">
                    <input type="text" name="email" placeholder="Email" class="form-control">
                </div>
     
                <div class="form-group my-4">
                    <input type="tel" name="Phone-number" placeholder="Phone-number" class="form-control">
                </div>-->
            <?php inputFields("Name","name","","text");?>
            <?php inputFields("Email","email","","text");?>
            <?php inputFields("Phone-number","phone-number","","tel");?>
            <?php inputFields("","file","","file");?>
          
            <button class="btn btn-dark" name="submit" type="submit">Submit</button>
            
        
            </form>
        </div>
    </body>
</html>