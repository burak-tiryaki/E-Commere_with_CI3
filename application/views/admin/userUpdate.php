<?php if(!empty($user)):?>
<div class="row">
    <div class="col-sm-6 offset-sm-3 border rounded shadow my-2">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 class="display-5"> Update User</h4>
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
        
        
        <form action="<?php echo base_url('setUpdateUser') ?>" method="post">
        
            <input type="hidden" name="user_id" value="<?= $user->user_id?>">
        
            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example1cg">Your Name</label>
                <input type="text" name="name" value="<?= $user->name?>" id="form3Example1cg" class="form-control form-control-lg" />
                
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example2cg">Your Last Name</label>
                <input type="text" name="surname" value="<?= $user->surname?>" id="form3Example2cg" class="form-control form-control-lg" />
                
            </div>
        
            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3cg">Your Email</label>
                <input type="email" name="email" value="<?= $user->email?>" id="form3Example3cg" class="form-control form-control-lg" />
                
            </div>
        
            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4cg">Password</label>
                <input type="text" name="password" value="<?= $user->password?>" id="form3Example4cg" class="form-control form-control-lg" />
                
            </div>
        
        
            <div class="d-flex justify-content-center my-2">
                <button type="submit"
                class="btn btn-success btn-block btn-lg">Update</button>
            </div>
        
        </form>
        <?php endif;?>

    </div>
</div>