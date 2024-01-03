<div class="mask d-flex align-items-center">
<div class="container">
    <div class="row d-flex justify-content-center align-items-center my-3">
    <div class="col-md-9">
        <div class="card shadow" style="border-radius: 15px;">
        <div class="card-body p-5">
            
            <div class="d-flex justfiy-content-between align-items-center mb-3">

                <h2 class="text-uppercase text-center">Create an account</h2>

                <?php if($this->session->userdata('authenticated')==2):?>
                    
                    <a href="<?= base_url('adminpage')?>" class="btn btn-secondary ms-auto">
                    <i class="fa-solid fa-arrow-left"></i>
                     Back to user list</a>
                <?php endif;?>
            </div>

            <form action="<?php echo base_url('register') ?>" method="post">

            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example1cg">Your Name</label>
                <input type="text" name="name" value="<?php echo set_value("name") ?>" id="form3Example1cg" class="form-control form-control-lg" />
                <small><?php  echo form_error('name','<p class="text-danger">','</p>') ?></small>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example2cg">Your Last Name</label>
                <input type="text" name="lastName" value="<?php echo set_value("lastName"); ?>" id="form3Example2cg" class="form-control form-control-lg" />
                <small><?php  echo form_error('lastName','<p class="text-danger">','</p>') ?></small>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3cg">Your Email</label>
                <input type="email" name="email" value="<?php echo set_value("email"); ?>" id="form3Example3cg" class="form-control form-control-lg" />
                <small><?php  echo form_error('email','<p class="text-danger">','</p>') ?></small>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4cg">Password</label>
                <input type="password" name="password" value="<?php echo set_value("password"); ?>" id="form3Example4cg" class="form-control form-control-lg" />
                <small><?php  echo form_error('password','<p class="text-danger">','</p>') ?></small>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                <input type="password" name="cpassword" id="form3Example4cdg" class="form-control form-control-lg" />
                <small><?php  echo form_error('cpassword','<p class="text-danger">','</p>') ?></small>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit"
                class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
            </div>

            
            <?php if(!$this->session->userdata('authenticated')==2):?>
                
                <p class="text-center text-muted mt-5 mb-0">Have already an account? 
                    <a href="<?php echo base_url('login') ?>" class="fw-bold text-body"><u>Login here</u></a>
                </p>
                    
                <?php endif;?>
            </form>

        </div>
        </div>
    </div>
    </div>
</div>
</div>