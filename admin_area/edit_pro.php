<!DOCTYPE html>
<?php

include("../DatabaseConnection.php");


if(isset($_GET['edit_pro'])){
    $get_id = $_GET['edit_pro'];
    $get_pro="select * from products where product_id ='$get_id'";
    $run_pro=mysqli_query($con,$get_pro);
    $i=0;
$row_pro=mysqli_fetch_array($run_pro);

    $pro_id=$row_pro['product_id'];
    $pro_title=$row_pro['product_title'];
    $pro_image=$row_pro['product_image'];
    $pro_price=$row_pro['product_price'];
    $pro_desc=$row_pro['product_desc'];
    $pro_keywords=$row_pro['product_keywords'];
    $pro_cat=$row_pro['product_cat'];
    $pro_brand=$row_pro['product_brand'];
    $pro_qty=$row_pro['product_qty'];

    $get_cat ="select * from categories where cat_id ='$pro_cat'";
    $run_cat =mysqli_query($con, $get_cat);
    $row_cat=mysqli_fetch_array($run_cat);
    $category_title =$row_cat['cat_title'];
    
    $get_brand ="select * from brands where brand_id ='$pro_brand'";
    $run_brand =mysqli_query($con, $get_brand);
    $row_brand=mysqli_fetch_array($run_brand);
    $brand_title =$row_brand['brand_title'];
    
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Products</title>
    
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

</head>
<body bgcolor="skyblue">

<form  action ="edit_pro.php" method="post" enctype="multipart/form-data">

<table align="center" width="750" border="2" bgcolor="orange">
    <tr align="center">
       <td colspan="7"><h2>Edit & update Products Here</h2></td>
    </tr>
    
    <tr>
        <td align="right"><b>Product Title</b></td>
        <td><input type="text" name="product_title"  size="50" value="<?php echo $pro_title;?>"></td>
    </tr>

    <tr>
        <td align="right"><b>Product Category</b> </td>
     
        <td>
             <select name="product_cat" >
                <option ><?php echo $category_title;?></option>
                 <?php
                 
                $get_cats="select * from categories";
                $run_cats=mysqli_query($con,$get_cats);

                 while($row_cats=mysqli_fetch_array($run_cats)){

                    $cat_id=$row_cats['cat_id'];
                    $cat_title=$row_cats['cat_title'];
                    
                   echo "<option value='$cat_id'>$cat_title</option>";

                 }
                ?>
             </select>

        </td>

    </tr>
    <tr>
        <td align="right"><b>Product Brand</b> </td>
        <td>
        <select name="product_brand">
                <option ><?php echo $brand_title;?></option>
                 <?php
                 
                $get_brands="select * from brands";
                $run_brands=mysqli_query($con,$get_brands);

                 while($row_brands=mysqli_fetch_array($run_brands)){

                    $brand_id=$row_brands['brand_id'];
                    $brand_title=$row_brands['brand_title'];
                    
                   echo "<option value='$brand_id'>$brand_title</option>";

                 }
                ?>
             </select>
        
        </td>
    </tr>
    
    
    <tr>
        <td align="right"><b>Product Image</b> </td>
        <td><input type="file" name="product_image" /><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60/></td>
    </tr>
    <tr>
        <td align="right"><b>Product Price</b> </td>
        <td><input type="text" name="product_price" value="<?php echo $pro_price;?>"></td>
    </tr>
    <tr>
        <td align="right"><b>Product Description</b> </td>
        <td>
            <textarea name="product_desc" id="" cols="35" rows="8"><?php echo $pro_desc;?></textarea>
        </td>
    </tr>
    <tr>
        <td align="right"><b>Product Keywords</b> </td>
        <td><input type="text" name="product_keywords" value="<?php echo $pro_keywords;?>"></td>
    </tr>
    <tr>
        <td align="right"><b>Quantity</b> </td>
        <td><input type="text" name="product_quantity" value="<?php echo $pro_qty;?>"></td>
    </tr>
    <tr>
        <td colspan="7" align="center"><input type="submit" name="update_product" value="Update product"></td>
    </tr>   
      
    
</table>

</form>

</body>

</html>

<?php

    if(isset($_POST['update_product'])){
        
        //getting the text data from the fields

        $update_id = $pro_id;

        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];
        $product_qty= $_POST['product_quantity'];


        //getting the image from the field
        $product_image = $_FILES['product_image']['name'];

        move_uploaded_file($_FILES['product_image']['tmp_name'], "product_images/$product_image");
        

        $update_product ="UPDATE products SET product_cat='$product_cat', 
        product_brand='$product_brand',product_title='$product_title', product_price='$product_price',
        product_qty='$product_qty', product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords'
        WHERE product_id='$update_id'";

        $run_product = mysqli_query($con, $update_product);

        if($run_product){
            echo "<script>alert('Product has been updated!')</script>";

            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
        
    }
?>
