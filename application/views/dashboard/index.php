<h2>Selamat Datang, <?php echo $user->username; ?>!</h2>
<p>Ini adalah Dashboard Anda. Dari sini Anda dapat mengelola item Anda.</p>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Profil Anda</h5>
            </div>
            <div class="card-body">
                <p><strong>Username:</strong> <?php echo $user->username; ?></p>
                <p><strong>Email:</strong> <?php echo $user->email; ?></p>
                <p><strong>Bergabung Sejak:</strong> <?php echo date('F j, Y', strtotime($user->created_at)); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Statistik</h5>
            </div>
            <div class="card-body">
                <p><strong>Total Items:</strong> <?php echo count($items); ?></p>
                <a href="<?php echo base_url('items'); ?>" class="btn btn-primary">Lihat Semua Item</a>
                <a href="<?php echo base_url('items/create'); ?>" class="btn btn-success">Tambahkan Item Baru</a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Item Terbaru</h5>
    </div>
    <div class="card-body">
        <?php if (!empty($items)) : ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_slice($items, 0, 5) as $item) : ?>
                            <tr>
                                <td><?php echo $item->name; ?></td>
                                <td>Rp. <?php echo number_format($item->price, 2); ?></td>
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
        <?php else : ?>
            <p>Anda belum menambahkan item apa pun.</p>
            <a href="<?php echo base_url('items/create'); ?>" class="btn btn-success">Tambahkan Item Pertama Anda</a>
        <?php endif; ?>
    </div>
</div>
