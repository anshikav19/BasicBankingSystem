<html>
 <head>
    <title>
    </title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>

table

{

border-style: none;
text-align: right;
width: 90%;
border-width:2px;
padding: 15px;
border-color: #BCC6CC;
border-spacing: 1px;
margin-left: auto;
margin-right:auto;
margin-top: 50px !important;
margin-bottom: 70px!important;


}

th,td
{
  padding: 15px 40px;
  text-align: center;
}
th
{
  text-transform: uppercase;
  font: 1em sans-serif;
  font-weight: bold;
  background-color: #C2DFFF;
  border-width: 10 px;
}
td
{
  color: #4E5180;
  font: 1em sans-serif;
 
}
.fa-file
{
  color: #4E5180;
}
</style>


 </head>
 <body>
<section id="nav-bar">
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="images/logo2.png"width="200" height="50"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customers.php">Customers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="transferhistory.php">Transfer History</a>
      </li>
</section>
<section id=banner>
<div class="container">
<div class="row">
<div class="col-md-6">

</div>
</div>
</div>
</section>    
  </div>
</nav>
  
  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <?php

$servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "customers";

    $conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
die("Connection failed".mysqli_connect_error());
}

$result = mysqli_query($conn,"SELECT * FROM transaction_details ORDER BY trans_id DESC");

echo "<table border='1'>

<tr>
<th>Transaction ID</th>
<th>Sender Name</th>
<th>Reciever Name</th>
<th>Amount Transferred</th>
<th>Timestamp</th>


</tr>";


while($row = mysqli_fetch_array($result))
{?>
<tr>
<td><?php echo $row['trans_id'];?>  </td>
<td><?php echo $row['sender_name'];?>  </td>
<td><?php echo $row['receiver_name'];?>  </td>
<td><?php echo $row['trans_amount'];?>  </td>
<td><?php echo $row['trans_time'];?>  </td>
</tr>
<?php
}
echo "</table>";
mysqli_close($conn);
?>



<footer>
<p class="p-3 text-dark text-center">©Future Plus Bank Pvt. Ltd.</p>
</footer>
<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
});
</script>
</body>
</html>