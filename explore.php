<?php
//export.php  
$connect = mysqli_connect("localhost", "root", "", "laravel");
$output = '';
 $query = "SELECT * FROM posts";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table"  bordered="1">  
       <tr>
         <th >S.No</th>
         <th>Email Id</th>
         <th>Feedback</th>
         <th>Feedback Given Time</th>
       </tr>
  ';
    $no= 1;
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
     <td>'.$no.'</td>  
<td>'.$row["title"].'</td>  
<td>'.$row["body"].'</td>
<td>'.$row["updated_at"].'</td>
                    </tr>
   ';
   $no++;
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
?>
       