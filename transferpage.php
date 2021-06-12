<html>
<body>

<?php

session_start();

        $servername = "localhost";
          $username = "root";
          $password = "root";
          $database = "customers";

          $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn){
      die("Connection failed".mysqli_connect_error());
    }

  $senders=$_SESSION['sender'];
  $receivers=$_POST['Receiver'];
  $amounts=$_POST['Amount'];
   
  $sql= "UPDATE customer_data SET balance=(balance-$amounts) WHERE name='$senders'" ;
  $res= mysqli_query($conn,$sql);   
  if($res)
{
    $sql="UPDATE customer_data SET balance=(balance+$amounts) WHERE customer_data.name='$receivers'";
    $result=mysqli_query($conn,$sql);
    $flag=true;
}
 if($flag==true)
 {
     $sql="INSERT INTO transaction_details(trans_id,sender_name,receiver_name,trans_amount,trans_time) VALUES (NULL, '$senders', '$receivers', '$amounts',NOW())";
     mysqli_query($conn,$sql);
     echo '<script type="text/javascript">';
     echo 'setTimeout(function () { swal({
      title: "SUCCESS!",
      text: "Money Successfully Transferred",
      icon: "success"
    }).then(function() {
      window.location.href = "customers.php";
    });
     }, 1000);</script>';
     
 }
  ?> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>

