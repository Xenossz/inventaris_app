<h2>Edit Item</h2>

<div class="card">
    <div class="card-body">
        <?php echo form_open('items/edit/'.$item->id); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name', $item->name); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="4"><?php echo set_value('description', $item->description); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?php echo set_value('price', $item->price); ?>" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url('items'); ?>" class="btn btn-secondary">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>