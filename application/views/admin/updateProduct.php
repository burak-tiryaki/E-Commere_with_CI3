<?php if(!empty($product)):?>
<div class="row">
    <div class="col-sm-6 offset-sm-3 border rounded shadow my-2">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 class="display-5"> Update Product</h4>
                <a href="<?= base_url('adminpage')?>" class="btn btn-secondary ms-auto">
                <i class="fa-solid fa-arrow-left"></i>    
                 Back to list</a>
                <hr>
            </div>
        </div>

        
            <?php if($this->session->flashdata("status")){ ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata("status") ?>
                    </div>
            <?php } ?>
        
        
        <form action="<?php echo base_url('setUpdateProduct') ?>" method="post" enctype="multipart/form-data">
        
            <input type="hidden" name="product_id" value="<?= $product->product_id?>">
        
            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example1cg">Product Name</label>
                <input type="text" name="name" value="<?= $product->product_name?>" id="form3Example1cg" class="form-control" />
                
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example2cg">Price</label>
                <input type="number" name="price" value="<?= $product->product_price?>" min="0" step="0.01" id="form3Example2cg" class="form-control" />
            </div>
        
            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3cg">Summary</label>
                <textarea name="summary" id="form3Example3cg" class="form-control"><?= $product->product_summary?></textarea>
            </div>
        
            <div class="form-outline mb-3">
                <label class="form-label me-2" for="form3Example4cg">Set as Active?</label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="isActive" id="inlineRadio1" value="1" <?= ($product->product_isActive == 1) ? 'checked':''; ?>>
                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="isActive" id="inlineRadio2" value="0" <?= ($product->product_isActive == 0) ? 'checked':''; ?>>
                    <label class="form-check-label" for="inlineRadio2">No</label>
                </div>
            </div>


            <div class="form-outline mb-4">
                <label class="form-label" for="inputGroupFile02">Upload image</label>
                <div class="row align-items-center">
                    <div class="col-sm-3">
                        <img class="img-fluid img-thumbnail" src="<?= base_url($product->product_imageurl)?>" alt="">
                    </div>
                    <div class="col-sm-9">
                        <input type="file" name="newImage" class="form-control" id="inputGroupFile02">
                    </div>
                </div>
            </div>
        
            <div class="d-flex justify-content-center my-2">
                <button type="submit"
                class="btn btn-success btn-block btn-lg">Update</button>
            </div>
        
        </form>
        <?php endif;?>

    </div>
</div>