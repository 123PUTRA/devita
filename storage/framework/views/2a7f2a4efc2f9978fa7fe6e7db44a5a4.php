<!-- resources/views/navbar.blade.php -->


<nav class="navbar navbar-expand-lg bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <?php if(auth()->guard()->check()): ?>
          <?php if(auth()->user()->store): ?>
              <!-- Jika pengguna telah membuka toko, tampilkan tombol untuk menuju halaman dashboard -->
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(route('store.dashboard')); ?>">Dashboard</a>
              </li>
          <?php else: ?>
              <!-- Jika pengguna belum membuka toko, tampilkan tombol untuk membuka toko -->
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(route('store.open_store_form')); ?>">Buka Toko</a>
              </li>
          <?php endif; ?>
        <?php else: ?>
          <!-- Jika pengguna tidak login, tampilkan tombol untuk membuka toko -->
          <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('login')); ?>">Buka Toko</a>
          </li>
        <?php endif; ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      <!-- Check if user is authenticated -->
      <?php if(auth()->guard()->check()): ?>
        <!-- If authenticated, show logout button -->
        <form action="<?php echo e(route('logout')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <button class="btn btn-outline-primary" type="submit">Logout</button>
        </form>
      <?php else: ?>
        <!-- If not authenticated, show login button -->
        <a class="btn btn-outline-primary" href="<?php echo e(route('login')); ?>">Login</a>
      <?php endif; ?>
    </div>
  </div>
</nav>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\enoko1\E-noko\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>