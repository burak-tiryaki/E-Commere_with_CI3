<div class="row">
    <div class="col-sm-6 offset-sm-3 border rounded shadow my-2">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center my-3">
                <h2 class="">Add Product</h2>
                <a href="<?= base_url('adminpage')?>" class="btn btn-secondary ms-auto">
                <i class="fa-solid fa-arrow-left"></i>    
                 Back to list</a>
                <hr>
            </div>
        </div>
        
        
        <form action="<?php echo base_url('addProduct') ?>" method="post" enctype="multipart/form-data">
        
            <input type="hidden" name="user_id" value="">
        
            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example1cg">Product Name</label>
                <input type="text" name="name" value="" id="form3Example1cg" class="form-control" />
                
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example2cg">Price</label>
                <input type="number" name="price" value="" min="0" step="0.01" id="form3Example2cg" class="form-control" />
                
            </div>
        
            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3cg">Summary</label>
                <textarea name="summary" id="form3Example3cg" class="form-control"></textarea>
                
            </div>
        
            <div class="form-outline mb-3">
                <label class="form-label me-2" for="form3Example4cg">Set as Active?</label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="isActive" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="isActive" id="inlineRadio2" value="0">
                    <label class="form-check-label" for="inlineRadio2">No</label>
                </div>
            </div>


            <div class="form-outline mb-4">
                <label class="form-label" for="inputGroupFile02">Upload image</label>
                <input type="file" name="image" class="form-control" id="inputGroupFile02">
            </div>
        
        
            <div class="d-flex justify-content-center my-2">
                <button type="submit"
                class="btn btn-success btn-block btn-lg">Add Product</button>
            </div>
        
        </form>

    </div>
</div>