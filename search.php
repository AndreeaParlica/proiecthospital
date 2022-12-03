<?php
session_start();
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;

$con = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
// $con=mysqli_connect("localhost","root","","myhmsdb3");
if(isset($_POST['search_submit'])){
  $contact=$_POST['contact'];
  $docname = $_SESSION['dname'];
 $query="select * from appointmenttb where contact='$contact' and doctor='$docname';";
 $result=mysqli_query($con,$query);
 echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body style="background-color:#cca000;color:white;text-align:center;padding-top:50px;">
  <div class="container" style="text-align:left;">
  <center><h3>Search Results</h3></center><br>
  <table class="table table-hover">
  <thead>
    <tr>
      <th>Prenume</th>
      <th>Nume</th>
      <th>Email</th>
      <th>Contact</th>
      <th>Data programare</th>
      <th>Ora programare</th>
    </tr>
  </thead>
  <tbody>
  ';
  while($row=mysqli_fetch_array($result)){
    $fname=$row['fname'];
    $lname=$row['lname'];
    $email=$row['email'];
    $contact=$row['contact'];
    $appdate=$row['appdate'];
    $apptime=$row['apptime'];
    echo '<tr>
      <td>'.$fname.'</td>
      <td>'.$lname.'</td>
      <td>'.$email.'</td>
      <td>'.$contact.'</td>
      <td>'.$appdate.'</td>
      <td>'.$apptime.'</td>
    </tr>';
  }
echo '</tbody></table></div> 
<div><a href="doctor-panel.php" class="btn btn-light">Go Back</a></div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>';
}

?>