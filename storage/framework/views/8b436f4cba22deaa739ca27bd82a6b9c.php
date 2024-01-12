<!-- resources/views/store/detail.blade.php -->



<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Detail Toko</h1>

        <h2>Nama Toko: <?php echo e($store->name); ?></h2>
        <p>Category UMKM: <?php echo e($store->category); ?></p>
        <p>Deskripsi Toko: <?php echo e($store->description); ?></p>

        <h2>Barang-barang:</h2>
        <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($barang->nama_barang); ?></h5>
                    <p class="card-text">Deskripsi: <?php echo e($barang->deskripsi); ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\enoko1\E-noko\resources\views/store/detail.blade.php ENDPATH**/ ?>