<?php
include "nav.php";
?>
<style>
    .container-main{
        width: 70%;
        margin-left: 25%;
        margin-top: -50%;
    }
    #add-category-form {
        display: none;
        margin-top: 20px; /* Adjust as needed */
    }
    #add-category-form input[type="text"],
    #add-category-form input[type="submit"] {
        margin-bottom: 10px; /* Adjust as needed */
    }
</style>
<div class="container-main">
    <div class="col-md-6">
    <button id="show-add-category-form-btn">Add Category</button>
        <form id="add-category-form" action="function.php" method="post">
            <!-- Your form fields for adding a new category -->
            <input type="text" name="category_name" placeholder="Category Name">
            <input type="submit" name= "submit1" value="Submit">
        </form>
        <table border="1">
                 <thead>
                  <th> Category ID</th>
                  <th>Product Category</th>
                  <th>Action</th>
                  </thead>
                  <tbody>
                    <?php 
                    include "config.php";

                    $sql= "SELECT * FROM p_category";
                    $result = mysqli_query($conn,$sql);
                    
                    if ($result1 = mysqli_num_rows($result)>0) {
                        
                    while($row=mysqli_fetch_assoc($result)){

                      ?>
                    <td><?php echo $row['c_id'];?></td>
                    <td><?php echo $row['c_name'];?></td>
                    <td><button><a href="edit_category.php?id=<?php echo $row['c_id'];?>">Update </a></button> <button><a href="function.php?id=<?php echo $row['c_id'];?>">Delete </a></button></td>
                </tbody>
                <?php
                     }
                 }
                  ?>
            </table>
    </div>
</div>
<script>
    document.getElementById('show-add-category-form-btn').addEventListener('click', function() {
        var addCategoryForm = document.getElementById('add-category-form');
        if (addCategoryForm.style.display === 'none') {
            addCategoryForm.style.display = 'block';
        } else {
            addCategoryForm.style.display = 'none';
        }
    });
</script>
<?php
include "Footer.php";
?>