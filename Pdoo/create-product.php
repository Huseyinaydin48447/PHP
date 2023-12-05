<?php
include 'classes/db.class.php';
include 'classes/product.class.php'

?>
<?php include('includes/header.php') ?>
<?php
        if(isset($_POST["submit"])){
            $title=$_POST["title"];
            $description=$_POST["description"];
            $price=$_POST["price"];

            $product=new Product();
            
            if($product->createProduct($title,$description,$price)){
                header("Location:index.php");
            }

        }

?>
<div class="container my-3">
    <div class="row">

        <form action="" method="post">
            <div class="col-6">
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">

                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="price">Price</label>
                    <input type="price" name="price" id="price" class="form-control">

                </div>
                <button type="submit" name="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </form>
    </div>


</div>
<?php include('includes/footer.php') ?>