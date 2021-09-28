<?php


?>
<table width="795" align="center" bgcolor="pink">



      <tr align="center">
          <td colspan="6"><h2>View All Orders</h2></td>
      </tr>

      <tr align="center"  >
              <th>Order Date ID</th>
              <th>Order ID</th>
              <th>customer id</th>
              <th>Product id</th>
              <th>Quantity</th>    
              <th>Transaction ID</th>
              <th>Payment Status</th>  
              <th>Select a Date<br>
             <form action="" method="POST">
                    <input type="date('Y-m-d')" name="order_date_entered_by_admin">
                    
             </form>
                
             </th>            
      </tr>
<?php 



include("../DatabaseConnection.php");


$order_date_entered_by_admin=date("Y-m-d",strtotime($_POST['order_date_entered_by_admin']));
echo $order_date_entered_by_admin;


$get_order="select * from orders where order_date='$order_date_entered_by_admin'";
$run_order=mysqli_query($con,$get_order);
$i=0;
while($row_order=mysqli_fetch_array($run_order)){

    $order_id=$row_order['order_id'];
    $customer_id=$row_order['customer_id'];
    
    $product_id=$row_order['product_id'];
    $quantity=$row_order['qty'];
    $transaction_id=$row_order['trx_id'];
    $payment_status=$row_order['p_status'];
    $order_date=$row_order['order_date'];
    

$i++;



?>


      <tr align="center">
          <td><?php echo $i; ?></td>
          <td><?php echo $order_id; ?></td>
          <td><?php echo $customer_id; ?></td>
          <td><?php echo $product_id; ?></td>
          <td><?php echo $quantity; ?></td>
          <td><?php echo $transaction_id; ?></td>
          <td><?php echo $payment_status; ?></td>
          <td><?php echo $order_date; ?></td>


      </tr>

<?php } ?>

</table>

<?php

?>