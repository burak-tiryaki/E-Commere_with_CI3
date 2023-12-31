<div class="container">
    <div class="row">
        <div class="col-md-3">

            <div class="my-3">
            <h6 class="lead">
                <i class="fa fa-filter text-secondary"></i>
                Filters
            </h6>
        </div>

        <div class="my-2">
            <form method="GET" action="<?=  base_url('filteredProduct')?>">
                
                <div class="form-group my-2">
                    <input type="text" class="form-control" name="SearchTerm" placeholder="Search">
                </div>
                <div class="form-group my-2">
                    <input type="text" class="form-control" name="MinPrice" placeholder="Min. Price">
                </div>
                <div class="form-group my-2">
                    <input type="text" class="form-control" name="MaxPrice" placeholder="Max. Price">
                </div>

                <div class="form-group my-2">
                    <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                </div>
            </form>
        </div>
            
        </div>
        <div class="col-md-9">
            <div class="row">
                <?php foreach($products as $p) :?>
                <div class="col-md-4">
                    <div class="card m-1 text-center">
                        <form action="<?= base_url('insertCart')?>" method="POST">
        
                            <input type="hidden" name="product_id" value="<?= $p->product_id ?>">
        
                            <img src="<?= $p->product_imageurl?>" class="card-img-top p-1" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $p->product_name ?></h5>
                                <p class="card-text"><?= $p->product_price ?></p>
                                
                            </div>
                            <div class="card-footer">
                                <input type="number" name="quantity" value="1" min="1" id="qty" class="w-25 me-2">
                                <button type="submit" href="#" class="btn btn-primary px-3">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </div>
        
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div><!-- row end -->
</div>