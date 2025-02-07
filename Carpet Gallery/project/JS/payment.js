$(document).ready(function() {
   alldeleteBtn = document.querySelectorAll('.delete')
   alldeleteBtn.forEach(onebyone => {
      onebyone.addEventListener('click',deleteINsession)
   })

function deleteINsession(){
removable_id = this.id;
$.ajax({
          url:'addcart.php',
          method:'POST',
          dataType:'json',
          data:{ 
                id_to_remove:removable_id,
                action:'remove' 
          },
          success:function(data){
                  $('#Displaydata').html(data);
     alldeleteBtn = document.querySelectorAll('.delete')
   alldeleteBtn.forEach(onebyone => {
      onebyone.addEventListener('click',deleteINsession)
   })
                }
        }).fail( function(xhr, textStatus, errorThrown) {
  alert(xhr.responseText);
});

}


  $('.add').click(function() { 
      id = $(this).data('id');
      title = $('#name' + id).val();
      price = $('#price' + id).val();
      quantity = $('#quantity' + id).val();
        $.ajax({
          url:'addcart.php',
          method:'POST',
          dataType:'json',
          data:{
                cart_id : id,
                cart_name : title,
                cart_price : price,
                action:'add' 
          },
          success:function(data){
                  $('#Displaydata').html(data);
                  alldeleteBtn = document.querySelectorAll('.delete')
   alldeleteBtn.forEach(onebyone => {
      onebyone.addEventListener('click',deleteINsession)
   })
                }
        }).fail( function(xhr, textStatus, errorThrown) {
  alert(xhr.responseText);
});
  
  })
})

        // JavaScript to handle the button click and update the cart count
        document.getElementById("add-to-cart-btn").addEventListener("click", function() {
         // Get the current count from the cart
         var countElement = document.getElementById("cart-count");
         var count = parseInt(countElement.textContent);

         // Increment the count
         count++;

         // Update the count in the cart
         countElement.textContent = count;
     });