$(document).ready(function(){
  $('.product_drag_area').on('dragover',function(){
      $(this).addClass('product_drag_over');
      return false;
  });
  $('.product_drag_area').on('dragleave',function(){
      $(this).removeClass('product_drag_over');
      return false;
  });
  $('.product_drag').on('dragstart',function(e){
      e.originalEvent.dataTransfer.setData("id",$(this).data("id"));
      e.originalEvent.dataTransfer.setData("name",$(this).data("name"));
      e.originalEvent.dataTransfer.setData("price",$(this).data("price"));
  });
  $(document).on('click', '.remove_product', function(){
             if(confirm("คุณต้องการลบสินค้าหรือไม่?"))
             {
                  var id = $(this).attr("id");
                  var action="delete";
                  $.ajax({
                       url:"action.php",
                       method:"POST",
                       data:{id:id, action:action},
                       success:function(data){
                            $('#dragable_product_order').html(data);
                       }
                  });
             }
             else
             {
                  return false;
             }
        });
  $('.product_drag_area').on('drop',function(e){
      e.preventDefault();
      $(this).removeClass('product_drag_over');
      var id=e.originalEvent.dataTransfer.getData("id");
      var name=e.originalEvent.dataTransfer.getData("name");
      var price=e.originalEvent.dataTransfer.getData("price");
      var action="add";
      $.ajax({
          url:"action.php",
          method:"POST",
          data:{id:id,name:name,price:price,action:action},
          success:function(data){
            $('#dragable_product_order').html(data);
          }
      });
  });
});
