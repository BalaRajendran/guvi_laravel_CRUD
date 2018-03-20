<?php include('config.php');    
session_start();
$error_message="";
  //server side validation
// code for check server side validation
    if(empty($_SESSION['6_letters_code_1'] ) ||
        strcasecmp($_SESSION['6_letters_code_1'], $_POST['cap']) != 0)
    {  
        echo"Captcha Your entered is wrong,Please try again !!"; 
}
 
else
{
    $result = $conn->prepare("SELECT * FROM posts where title=?");
    $result->bind_param('s', $_POST['email']);
    // Execute the prepared statement.
    $result->execute();

    // Gets a result set from a prepared statement.
    $result = $result->get_result();

    if($result->num_rows > 0)
    {
        echo  "This Email Already exist";
    }
    else
    {
     if ($data=$conn->prepare("INSERT INTO posts (title,body,created_at,updated_at) VALUES(?,?,?,?)"))
     {
                        $timezone = "Asia/Kolkata";
        date_default_timezone_set($timezone);
        $time = date('Y-m-d h:i:s', time());
         // Bind the variables to the parameter as strings. 
             $data->bind_param("ssss",$_POST['email'],$_POST['feed'],$time,$time);
 
             // Execute the prepared statement.
             $data->execute();
 	
//     $email=$_POST['email'];
// 		$to      =$email;
//     $subject = 'Feedback Details';
//  $message="Thank You for your feedback";
//     $headers = 'From: karurbalamathi@gmail.com' . "\r\n" .  
//     'Reply-To: karurbalamathi@gmail.com' . "\r\n" .       
//     'X-Mailer: PHP/' . phpversion();
// if(mail($to, $subject, $message, $headers))
// {
// } 
// 		 if(mail($to1, $subject, $message, $headers))
// {
// } 
             $data->close();
		 echo'Registration Successfull!We send confirmation message! For login http://localhost:8000/';
		}
         else
         {
              echo"Data Filed invalid";
         }
    }
}
?>