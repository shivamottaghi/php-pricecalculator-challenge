<!--<h4>You're logged in as --><?php //echo $_SESSION['login']->getName().' '. $_SESSION['login']->getLastName(); ?><!--</h4>-->
<!--Collapse to show the cart-->
<button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
    Your Cart
</button>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <ol>
            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) : ?>
            <?php foreach ($_SESSION['cart'] as $item) : ?>
            <li>
                <?php echo $item->getName() . "&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
                <?php echo $item->getPrice() ?>
            </li>
                <?php endforeach; ?>
                <?php else: ?>
                    <p> There is nothing in your cart at the moment!</p>
                <?php endif; ?>
        </ol>
        <form action="" method="get">
            <button class="btn btn-outline-success btn-sm" type="submit" name="page" value="submitOrder">Submit Your
                Order
            </button>
        </form>
    </div>
</div>
<!--Container to show the products-->
<div class="container">
    <form method="post">
        <div class="row">
            <?php $i = 0 ?>
            <?php foreach ($productList as $product) : ?>
                <div class="col-6 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name'] ?></h5>
                            <h6> &euro; <?php echo $product['price'] / 100; ?></h6>
                            <button type="submit" name="buyProduct" class="btn btn-outline-info"
                                    value="<?php echo $i ?>">Add to cart
                            </button>
                        </div>
                    </div>
                </div>
                <?php $i++ ?>
            <?php endforeach; ?>
        </div>
    </form>
</div>

