<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><?php echo $item->name; ?></h2>
    <div>
        <a href="<?php echo base_url('items/edit/'.$item->id); ?>" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="<?php echo base_url('items/delete/'.$item->id); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
            <i class="fas fa-trash"></i> Hapus
        </a>
        <a href="<?php echo base_url('items'); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali ke Item
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <h4>Detail</h4>
                <hr>
                <div class="mb-3">
                    <strong>Nama:</strong> <?php echo $item->name; ?>
                </div>
                <div class="mb-3">
                    <strong>Deskripsi:</strong>
                    <p><?php echo nl2br($item->description); ?></p>
                </div>
                <div class="mb-3">
                    <strong>Harga:</strong> $<?php echo number_format($item->price, 2); ?>
                </div>
            </div>
            <div class="col-md-4">
                <h4>Informasi</h4>
                <hr>
                <div class="mb-3">
                    <strong>Dibuat:</strong> <?php echo date('F j, Y, g:i a', strtotime($item->created_at)); ?>
                </div>
                <div class="mb-3">
                    <strong>Terakhir Diperbarui:</strong> <?php echo date('F j, Y, g:i a', strtotime($item->updated_at)); ?>
                </div>
                <div class="mb-3">
                    <strong>ID Item:</strong> <?php echo $item->id; ?>
                </div>
            </div>
        </div>
    </div>
</div>