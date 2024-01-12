<!-- resources/views/barang/create.blade.php -->



<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Tambah Barang</h1>

        <!-- Tampilkan form tambah barang -->
        <form action="<?php echo e(route('barang.store')); ?>" method="post">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" name="harga" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\enoko1\E-noko\resources\views/barang/create.blade.php ENDPATH**/ ?>