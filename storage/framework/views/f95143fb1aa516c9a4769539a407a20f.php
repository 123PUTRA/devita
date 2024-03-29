<!-- resources/views/store/dashboard.blade.php -->



<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Dashboard Toko</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <h2>Informasi Toko:</h2>
        <?php if($store): ?>
            <p>Nama Toko: <?php echo e($store->name); ?></p>
            <p>Kategori: <?php echo e($store->category); ?></p>
            <p>Deskripsi: <?php echo e($store->description); ?></p>
            <p>NPWP: <?php echo e($store->npwp); ?></p>

            <!-- Menampilkan informasi alamat -->
            <?php if($addressData): ?>
                <h2>Informasi Alamat:</h2>
                <p>Provinsi: <?php echo e($addressData->indonesia_province->name); ?></p>
                <p>Kabupaten: <?php echo e($addressData->indonesia_city->name); ?></p>
                <p>Kecamatan: <?php echo e($addressData->district->name); ?></p>
            <?php else: ?>
                <p>Alamat belum lengkap. <a href="<?php echo e(route('location.form')); ?>">Lengkapi Alamat</a></p>
            <?php endif; ?>

            <!-- Tombol untuk menambah barang -->
            <a href="<?php echo e(route('barang.create')); ?>" class="btn btn-primary">Tambah Barang</a>

            <!-- Tombol untuk melihat semua barang -->
            <a href="<?php echo e(route('barang.index')); ?>" class="btn btn-info">Lihat Semua Barang</a>

            <!-- Tombol untuk menuju ke formulir lokasi -->
            <a href="<?php echo e(route('location.form')); ?>" class="btn btn-success">Lengkapi Alamat</a>
        <?php else: ?>
            <p>Anda belum membuka toko. Silakan buka toko terlebih dahulu.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\enoko1\E-noko\resources\views/store/dashboard.blade.php ENDPATH**/ ?>