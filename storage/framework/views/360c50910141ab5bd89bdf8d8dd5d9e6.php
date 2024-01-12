<!-- resources/views/component/card.blade.php -->




    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="Image">
        <div class="card-body">
            <h5 class="card-title">
                <a href="<?php echo e(route('store.detail', ['storeId' => $store->id])); ?>"><?php echo e($store->name); ?></a>
            </h5>
            <p class="card-text"><?php echo e($barang->deskripsi); ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Nama Barang: <?php echo e($barang->nama_barang); ?></li>
            <li class="list-group-item">Harga: <?php echo e($barang->harga); ?></li>
            <!-- Tambahkan item-item lain yang ingin Anda tampilkan -->
        </ul>
        <div class="card-body">
            <a href="#" class="btn btn-success">Add to Cart</a>
            <a href="#" class="btn btn-warning">Beli</a>
        </div>
    </div>

<?php /**PATH C:\laragon\www\enoko1\E-noko\resources\views/component/card.blade.php ENDPATH**/ ?>