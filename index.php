<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <style>
         .contact{
             border: 0;
             width: 200px;
             border-bottom: 2px solid black;
             margin: 0 auto;
         }
     </style>
     <?php

     $msg= '';
     $msgErrorClass='';
     
      if(filter_has_var(INPUT_POST, 'submit')){
          $name = htmlspecialchars($_POST['name']);
          $email = htmlspecialchars($_POST['email']);
          $subject = htmlspecialchars($_POST['subject']);

          if(empty($name) || empty($email) || empty($subject)){
              $msg ="Please fill all the fields";
              $msgErrorClass = "alert-danger";
          }
          else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $msg ="Please use valid e-mail";
            $msgErrorClass = "alert-danger";
          }
          else{
              $toEmail = "mdnourabshir@gmail.com";
              $message ="Contact Request From".$name;
              $body = "<h2>Contact Request<h2>
                       <h4>Name :</h4><p>'.$name.'</p>
                       <h4>E-mail :</h4><p>'.$email.'</p>
                       <h4>Subject :</h4><p>'.$subject.'</p>
                       ";
             $headers = "MIME-Version 1.0"."\r\n";
             
             $headers .= "content-Type:text/html;charset=UTF-8"."\r\n";

             $headers .= "From" .$name."<".$email."<" .$subject;
             if(mail($toEmail, $message, $body, $headers)){
                $msg ="Thanks for contacting us!";
                $msgErrorClass = "alert-success";
             }
             else{
                $msg ="OOPS! Something Wrong you can't contact Us";
                $msgErrorClass = "alert-danger";
             }

          }

      }
     
     
     ?>
</head>
<body>
    <div class="container">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="mx-auto my-5 py-5 px-5" style="width: 500px;">
      <h1 class="contact">Contact Us</h1>
      <?php if($msg !== ''):?>
      <div class="alert <?php echo $msgErrorClass;?>"><?php echo $msg;?></div>
      <?php endif;?>
        <div class="form-group">
            <input type="text" class="form-control my-2 py-2 px-2" name="name" value="<?php echo isset($_POST['name']) ? $name : '';?>" placeholder="Enter your name......">
        </div>
        <div class="form-group">
         <input type="text" class="form-control my-2 py-2 px-2" name="email" value="<?php echo isset($_POST['email']) ? $email : '';?>" placeholder="Enter your E-ail......">
       </div>
       <div class="form-group">
         <textarea name="subject" rows="10" class="form-control my-2 py-2 px-2" placeholder="Subject"><?php echo isset($_POST['name']) ? $name : '';?></textarea>
     </div>
     <button type="submit" name="submit" class="btn btn-primary">Submit</button>

</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>