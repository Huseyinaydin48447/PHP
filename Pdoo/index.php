<?php
include 'classes/db.class.php';
include 'classes/product.class.php'

?>
<?php include('includes/header.php') ?>
<div class="container my-3">
    <a href="./create-product.php" class="btn btn-primary">Create Product</a>
    <?php
    $product = new Product();
    // echo "<pre>";
    // print_r($product->getProducts());

    // print_r($product->getProduct(2));
    ?>
    <?php if ($product->getProducts()) :  ?>
        <?php include('includes/product-list.php') ?>
    <?php else : ?>
        <?php  include('includes/no-product.php') ?>

    <?php endif; ?>
</div>
<?php include('includes/footer.php') ?>