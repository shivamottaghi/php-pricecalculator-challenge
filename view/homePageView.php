
<div class="container">
    <form method="post">
    <div class="row">
        <?php $i = 0 ?>
        <?php foreach ($productList as $product) : ?>
        <div class="col-6 col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['name']?></h5>
                    <h6> &euro; <?php echo $product['price']/100; ?></h6>
                    <button type="submit" name="buyProduct" class="btn btn-outline-info"
                            value="<?php echo $i?>">Add to cart</button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </form>
</div>

