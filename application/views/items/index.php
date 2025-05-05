<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Item Anda</h2>
    <a href="<?php echo base_url('items/create'); ?>" class="btn btn-success">
        <i class="fas fa-plus"></i> Tambah Item Baru
    </a>
</div>

<?php if (!empty($items)) : ?>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="table-datatable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach ($items as $item) : 
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $item->name; ?></td>
                                <td><?php echo $item->description; ?></td>
                                <td><?php echo number_format($item->price, 2); ?></td>
                                <td><?php echo date('M j, Y', strtotime($item->created_at)); ?></td>
                                <td>
                                    <a href="<?php echo base_url('items/view/'.$item->id); ?>" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?php echo base_url('items/edit/'.$item->id); ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?php echo base_url('items/delete/'.$item->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="alert alert-info">
        <p>Anda belum menambahkan item apa pun.</p>
        <a href="<?php echo base_url('items/create'); ?>" class="btn btn-success">Tambahkan Item Pertama Anda</a>
    </div>
<?php endif; ?>