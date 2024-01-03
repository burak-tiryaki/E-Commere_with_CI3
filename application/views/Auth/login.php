<div class="mask d-flex align-items-center">
<div class="container">
    <div class="row d-flex justify-content-center align-items-center my-3">
    <div class="col-md-9">


        <?php if($this->session->flashdata("status")){ ?>
            <div class="alert alert-warning">
                <?php echo $this->session->flashdata("status") ?>
            </div>
        <?php } ?>

        <div class="card shadow" style="border-radius: 15px;">
        <div class="card-body p-5">
            <h2 class="text-uppercase text-center mb-5">Login account</h2>

            <form action="<?php echo base_url('login') ?>" method="POST">

            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3cg">Email</label>
                <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" />
                <small><?php  echo form_error('email','<p class="text-danger">','</p>') ?></small>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4cg">Password</label>
                <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" />
                <small><?php  echo form_error('password','<p class="text-danger">','</p>') ?></small>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit"
                class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Login</button>
            </div>

            <p class="text-center text-muted mt-5 mb-0">Don't have an account? 
                <a href="<?php echo base_url('register')?>" class="fw-bold text-body"><u>Click here to Create an account</u></a>
            </p>

            </form>

        </div>
        </div>
    </div>
    </div>
</div>
</div>