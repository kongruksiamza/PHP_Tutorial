<?php
session_start();
if($_POST['action']=="add"){
  if(isset($_SESSION["shopping_cart"]))
  {
       $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
       if(!in_array($_POST["id"], $item_array_id))
       {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                 'item_id'               =>     $_POST["id"],
                 'item_name'               =>     $_POST["name"],
                 'item_price'          =>     $_POST["price"],
                 'item_quantity'          =>    1
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
       }
       else
       {
            echo '<script>alert("สินค้าถูกเพิ่มแล้ว")</script>';
       }
  }
  else
  {
       $item_array = array(
         'item_id'               =>     $_POST["id"],
         'item_name'               =>     $_POST["name"],
         'item_price'          =>     $_POST["price"],
         'item_quantity'          =>    1
       );
       $_SESSION["shopping_cart"][0] = $item_array;
  }
  echo make_table();
}
if($_POST["action"] == "delete"){
     foreach($_SESSION["shopping_cart"] as $keys => $values){
          if($values['item_id'] == $_POST["id"])
          {
               unset($_SESSION["shopping_cart"][$keys]);

          }
     }
      echo make_table();
}
function make_table(){
  $output='';
  if(!empty($_SESSION["shopping_cart"])){
      $total=0;
      $output.='<div class="table-responsive">
      <table class="table table-bordered">
        <tr>
          <th>สินค้า</th>
          <th>จำนวน</th>
          <th>ราคา</th>
          <th>รวม</th>
          <th>การดำเนินการ</th>
        </tr>';
      foreach ($_SESSION['shopping_cart'] as $key => $value){
      $output.='<tr>
        <td>'.$value['item_name'].'</td>
        <td>'.$value['item_quantity'].'</td>
        <td>'.$value['item_price'].'</td>
        <td>'.number_format($value['item_price']*$value['item_quantity'],2).'</td>
        <td><a href="#" class="remove_product" id="'.$value["item_id"]. '">Remove</span></a></td>
      </tr>';
      $total=$total+($value['item_price']*$value['item_quantity']);
    }
      $output.='<tr>
            <td colspan="3" align="right">ราคารวม</td>
            <td align="right">฿'.number_format($total, 2).'</td>
            <td></td>
            </tr></table>';
    }
      return $output;
}
?>
