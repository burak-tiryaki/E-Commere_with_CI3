<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body " data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="#">Burak's Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= base_url('/')?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('products')?>">Products</a>
        </li>
        <!-- User/admin section start -->
        <?php if(!$this->session->userdata('authenticated')): ?>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('register') ?>"><b>SignUp</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('login') ?>"><b>Login</b></a>
        </li>
        <?php endif; ?>

        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('userpage') ?>">Userpage</a>
        </li>

        <?php if($this->session->userdata('authenticated') && 
              $this->session->userdata('authenticated') == 2){ ?>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('adminpage') ?>">Adminpage</a>
        </li>
        <?php } ?>

      </ul>
      
      <!-- Cart -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('cart')?>">
          <i class="fa-solid fa-basket-shopping"></i>
          </a>
        </li>
      </ul>
      
      <!-- Logout -->
      <?php if($this->session->userdata('authenticated')): ?>
      <ul class="navbar-nav">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php if(!empty($this->session->userdata('auth_user'))){
              echo $this->session->userdata('auth_user')["name"].' ';
              echo $this->session->userdata('auth_user')["surname"]; 
            } ?>
            
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
          </ul>
        </li>
      </ul>
      <?php endif; ?>

  </div>
</nav>