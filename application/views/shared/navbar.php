<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body " data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="#">Burak's Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= base_url('/')?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('products')?>">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('cart')?>">
          <i class="fa-solid fa-basket-shopping"></i>
          </a>
        </li>
      </ul>
      <!-- <div class="btn-group dropstart navbar-nav">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Cart
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Action two</a></li>
            <li><a class="dropdown-item" href="#">Action three</a></li>
        </ul>
        </div>
    </div> -->

  </div>
</nav>