 <!DOCTYPE html>
 <html>
    <head>
<meta http-equiv="refresh" content="0.1;url=http://www.farmingarms.com/infotechpythonworkshop/register_collection.php" />
    </head>
<?php 
//Connect to database
	mysql_connect("208.91.198.197:3306","BalajiNandha","@Itengineer007") or die(mysql_error());
	mysql_select_db("farmingarms") or die(mysql_error());
$sql = "SELECT email FROM user";
	$res = mysql_query($sql) or die(mysql_error());
	while( $row = mysql_fetch_assoc($res) )
	{
	 $area = $row['email']. ", ";  
	// read the list of emails from the file.
	$email_list = $area;
	// count how many emails there are.
	$total_emails = count($email_list);
	// go through the list and trim off the newline character.
	for ($counter=0; $counter<$total_emails; $counter++) {
   $email_list[$counter] = trim($email_list[$counter]);
   }
	$message="M.KUMARASAMY COLLEGE OF ENGINEERING,THALAVAPALAYAM,KARUR";
	$to = $email_list;
	$subject=$_POST['msg'];
	$headers = 'From:balajirajendran@farmingarms.com' . "\r\n" .  
    'Reply-To:balajirajendran@farmingarms.com' . "\r\n" .       
    'X-Mailer: PHP/' . phpversion();
if(mail($to, $subject, $message, $headers))
{
}  }
?>
	 </html>