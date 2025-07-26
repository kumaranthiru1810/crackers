<?php 
require_once('header.php');
?>

<?php

$statement = $pdo->prepare("SELECT tbl_product.p_id,tbl_product.p_name,tbl_product.p_featured_photo,tbl_product.p_current_price FROM tbl_product join tbl_wishlist on tbl_product.p_id=.tbl_wishlist.product_id");
if($statement->execute()){
$total = $statement->rowCount();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
}else{
    echo "You have to Login First!!!";
}
?>

<div class="page-banner" style="background-image: url(assets/uploads/banner_cart.jpg)">
    <div class="overlay"></div>
    <div class="page-banner-inner">
        <h1>Wishlist</h1>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <?php $csrf->echoInputField(); ?>
                    <div class="cart">
                        <table class="table table-responsive">
                            <tr>
                                <th>Serial Number</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Current Price</th>
                                <th class="text-center" style="width: 100px;">Action</th>
                            </tr>
                            <?php
                            $i = 1;
                            foreach ($result as $row) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>
                                        <img src="assets/uploads/<?php echo $row['p_featured_photo']; ?>" alt="">
                                    </td>
                                    <td><?php echo $row['p_name']; ?></td>
                                    <td>₹<?php echo $p_current_price = $row['p_current_price']; ?></td>
                                    <td class="text-center">
                                        <button style="border-style:none" type="submit" name="delete_wish" value="<?php echo $row['p_id'] ?>"><i class="fa fa-trash"></i></a></button>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </table>
                    </div>
                </form>
                <?php if (isset($_POST['delete_wish'])) {
                    $del_id = $_POST['delete_wish'];
                    $statement = $pdo->prepare("delete from tbl_wishlist where product_id='$del_id'");
                    if($statement->execute()){
                        header("Location:wishlist.php");
                    }
                } ?>
            </div>
        </div>
    </div>
</div>