
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
                    <h5>User Page</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h3 class="display-7 link-offset-1"><u>My Orders</u></h3>
                        <?php foreach($userOrders as $o):?>
                            <div class="col-6 mt-3">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <span>
                                            Order Date: <?php
                                            $timestamp = strtotime($o->order_date);
                                            $dateWithoutTime = date("d-m-Y", $timestamp);
                                            echo $dateWithoutTime;
                                            ?>
                                        </span>
                                        <span>
                                            Order ID: #<?= $o->order_id?>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <?php foreach($userOrderDetails[$o->order_id] as $od):?>
                                            <div class="row border-bottom py-1">
                                                <div class="col-sm-3 align-items-center">
                                                    <img class="img-fluid img-thumbnail m-1" src="<?= base_url($od->product_imageurl)?>" alt="">
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="lead"><?= $od->product_name ?></p>
                                                    <p><?= $od->orderdetail_quantity?> piece</p>
                                                </div>
                                            </div>
                                            <?php endforeach?>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <span>Status: <?php echo ($o->isCompleted == 0) 
                                                    ? '<span class="bg-warning">in Progress</span>' 
                                                    : '<span class="text-success">Completed</span>' ;?></span>
                                        <span>Total: ₺<?= $o->order_sum?></span>
                                        
                                    </div>
                                </div>
                            </div>

                        <?php endforeach;?>
                    </div>
                    <hr>
                    <div class="row my-2">
                        <h3 class="display-7 link-offset-1"><u>My Informations</u></h3>
                                            
                        <div class="col-sm-6 border rounded m-3">

                            <form action="<?php echo base_url('userUpdate') ?>" method="post">

                                <input type="hidden" name="user_id" value="<?= $user->user_id?>">                

                                <div class="form-outline my-3">
                                    <label class="form-label" for="form3Example1cg">Your Name</label>
                                    <input type="text" name="name" value="<?php echo set_value("name",$user->name) ?>" id="form3Example1cg" class="form-control" />
                                    <small><?php  echo form_error('name','<p class="text-danger">','</p>') ?></small>
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="form3Example2cg">Your Last Name</label>
                                    <input type="text" name="surname" value="<?php echo set_value("surname",$user->surname); ?>" id="form3Example2cg" class="form-control" />
                                    <small><?php  echo form_error('surname','<p class="text-danger">','</p>') ?></small>
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="form3Example3cg">Your Email</label>
                                    <input type="email" name="email" value="<?php echo set_value("email",$user->email); ?>" id="form3Example3cg" class="form-control" />
                                    <small><?php  echo form_error('email','<p class="text-danger">','</p>') ?></small>
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="form3Example4cg">New Password</label>
                                    <input type="text" name="password" value="<?php echo set_value("password"); ?>" id="form3Example4cg" class="form-control" />
                                    <small><?php  echo form_error('password','<p class="text-danger">','</p>') ?></small>
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="form3Example4cdg">Repeat your new password</label>
                                    <input type="text" name="cpassword" id="form3Example4cdg" class="form-control" />
                                    <small><?php  echo form_error('cpassword','<p class="text-danger">','</p>') ?></small>
                                </div>

                                <div class="d-flex justify-content-center mb-3">
                                    <button type="submit"
                                    class="btn btn-success btn-block">Update my infos</button>
                                </div>

                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>