<!-- resources/views/barang/index.blade.php -->



<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Daftar Barang</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Tampilkan daftar barang -->
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($barang->nama_barang); ?></td>
                        <td><?php echo e($barang->deskripsi); ?></td>
                        <td><?php echo e($barang->harga); ?></td>
                        <td>
                            <a href="<?php echo e(route('barang.edit', $barang->id)); ?>" class="btn btn-primary">Edit</a>
                            <form action="<?php echo e(route('barang.destroy', $barang->id)); ?>" method="post" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <a href="<?php echo e(route('barang.create')); ?>" class="btn btn-success">Tambah Barang</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\enoko1\E-noko\resources\views/barang/index.blade.php ENDPATH**/ ?>