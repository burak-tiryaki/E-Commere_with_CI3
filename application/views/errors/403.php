<div class="container">
    <div class="row my-3">
        <div class="col-12">
            
            <h5 class="display-4">403</h5>
            <h6 class="display-6 text-danger">Access Denied!</h6>

            <?php if($this->session->flashdata("status")){ ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata("status") ?>
                </div>
            <?php } ?>
            
        </div>
    </div>
</div>