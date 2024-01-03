
<div class="container">
    <div class="row my-3">
        <div class="col-12">
            
            <?php if($this->session->flashdata("status")){ ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata("status") ?>
                </div>
            <?php } ?>
            
            <div class="card">
                <div class="card-header">
                    <h5>Admin Page</h5>
                </div>
                <div class="card-body">
                    <p>You are in admin home page.</p>
                    
                    <div class="row">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-Users-tab" data-bs-toggle="tab" data-bs-target="#nav-Users" type="button" role="tab" aria-controls="nav-Users" aria-selected="true">Users</button>
                            <button class="nav-link" id="nav-Products-tab" data-bs-toggle="tab" data-bs-target="#nav-Products" type="button" role="tab" aria-controls="nav-Products" aria-selected="false">Products</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Orders</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-Users" role="tabpanel" aria-labelledby="nav-Users-tab" tabindex="0">
                        <?php include('includes/admin/adminPageUsers.php'); ?>
                        </div>
                        <div class="tab-pane fade" id="nav-Products" role="Products" aria-labelledby="nav-Products-tab" tabindex="0">
                            <?php include('includes/admin/adminPageProducts.php'); ?>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                        <?php include('includes/admin/adminPageOrders.php'); ?>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>