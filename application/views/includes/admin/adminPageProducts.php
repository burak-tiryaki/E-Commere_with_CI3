<div class="row">

    <div class="col-12">
        <a href="<?= base_url('getAddProduct')?>" class="btn btn-success my-2">Add Product</a>
    </div>

    <div class="col-12">
    <?php if(!empty($products)):?>
    
    <table class="table table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Summary</th>
            <th>Status</th>
            <th>image_url</th>
            <th>options</th>
        </thead>
        <tbody>
            <?php foreach($products as $p):?>
                <tr>
                    <td><?= $p->product_id?></td>
                    <td><?= $p->product_name?></td>
                    <td><?= $p->product_price?></td>
                    <td><?= $p->product_summary?></td>
                    <td><?= ($p->product_isActive) ? 'Active' : 'Deactive';?></td>
                    <td><?= $p->product_imageurl?></td>
                    <td>
                        <a href="<?= base_url('updateProduct/').$p->product_id?>" class="btn btn-sm btn-primary">Update</a>
                        <a href="<?= base_url('setProductStatus/').$p->product_id?>" class="btn btn-sm <?= ($p->product_isActive) ? 'btn-danger' : 'btn-success';?> ">
                        <?= ($p->product_isActive) ? 'Deactive' : 'Active';?>
                        </a>
                    </td>  
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php endif;?>

    </div>
</div>

