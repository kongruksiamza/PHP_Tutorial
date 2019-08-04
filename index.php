<!DOCTYPE html>
<?php
session_start();
$con=mysqli_connect("localhost","root","","dbproduct");
$sql="select * from product";
$result=mysqli_query($con,$sql);
if(isset($_GET['action'])){
  if($_GET['action']=="delete"){
  foreach ($_SESSION['shopping_cart'] as $key => $value) {
    if($value['item_id']==$_GET['id']){
        unset($_SESSION['shopping_cart'][$key]);
        echo '<script>alert("ลบเรียบร้อย")</script>';
        echo '<script>window.location="index.php"</script>';
      }
    }
  }
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css"/>
  </head>
  <body>
    <br><div class="container" style="width:700px">
        <h3 align="center">ระบบตะกร้าสินค้า</h3><br>
    <?php
        while($row=mysqli_fetch_array($result)){
    ?>
    <div class="col-md-4">
        <form method="post" action="index.php?action=add&id=<?php echo $row['id'];?>">
        <div style="border:1px solid #333;background-color:white;border-radius:5px;padding:1px;margin:1px;cursor:move">
          <img src="<?php echo $row['img'];?>" class="img-responsive product_drag" data-id=<?php echo $row['id'];?> data-name=<?php echo $row['name'];?> data-price=<?php echo $row['price'];?>><br>
          <h4 class="text-info">สินค้า : <?php echo $row['name'];?></h4>
          <h4 class="text-danger">ราคา: <?php echo number_format($row['price'],2);?> บาท</h4>
        </div>
        </form>
    </div>
    <?php
        }
    ?>
    <br>
    <div style="clear:both;"></div><br>
    <div align="center">
      <div class="product_drag_area">วางสินค้าที่ต้องการที่นี่</div>
    </div><br>
    <div id="dragable_product_order"></div>
    <br><br>
    </div>
    </div>
  </body>
</html>
<script src="app.js"></script>
