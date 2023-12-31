<div class="container">
    <div class="row">
        <div class="col-md-8">

            <div class="my-3 border rounded px-4 py-2">

                <?php if(!isset($cartLines)):?>
                    <?php if($this->session->flashdata("status")):?>
                            <div class="alert alert-warning">
                                <?php echo $this->session->flashdata("status") ?>
                            </div>
                    <?php endif; ?>
                <?php endif;?>
                
                <?php if(isset($cartLines)):?>
                <?php foreach($cartLines as $c):?>
                <div class="row border rounded p-2 my-2">
                    <div class="col-3 d-flex align-items-center">
                        <img src="<?= base_url($c->product_imageurl) ?>" 
                        class="rounded w-100" alt="">
                    </div>
                    <div class="col-9">
                        <p class="lead"><?= $c->product_name ?></p>
                        <p><?= '₺'.$c->LineTotal ?></p>
                        
                        <form action="<?= base_url('updateCart')?>" method="POST">

                            <input type="hidden" name="product_id" value="<?= $c->product_id ?>">

                            <input type="number" value="<?= $c->total_quantity ?>" name="quantity" min="1" class="form-control w-25">
    
                            <div class="mt-2">
                                <button type="submit" class="btn btn-sm btn-primary">Update quantity</button>
                                <a href="<?= base_url('deleteOneCart/').$c->product_id?>" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endforeach?>
            </div>
            <div class="d-flex justify-content-center my-2">
                <a href="<?= base_url('deleteAllCart')?>" class="btn btn-danger ms-auto">Delete All</a>
            </div>
            <?php endif;?>
        </div>
        <div class="col-md-4 text-center border mt-3">
            <?php if(isset($cartLines)):?>
            <div class="border-2">
                <table class="table table-striped">
                    <thead>
                        <th scope="col">Product</th>
                        <th scope="col"></th>
                        <th scope="col">Quantity</th>
                        <th scope="col"></th>
                        <th scope="col">Line Total</th>
                    </thead>
                    <tbody>
                         <?php foreach($cartLines as $c):?>
                        <tr>
                            <td><?= $c->product_name ?></td>
                            <td>x</td>
                            <td><?= $c->total_quantity ?></td>
                            <td>=</td>
                            <td><?= '₺'.$c->LineTotal ?></td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-right">Total: </td>
                            <td class="text-right text-danger">
                                <?php 
                                    $total =0;
                                    foreach($cartLines as $c):
                                        $total += $c->LineTotal;
                                    endforeach;
                                    echo '₺'.$total;
                                ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            

                
                <a href="#" class="btn btn-lg btn-success mt-3">Checkout</a>
            <?php endif;?>
        </div>
    </div>
</div>