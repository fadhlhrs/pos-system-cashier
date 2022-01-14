<div>
    <form class="row g-3 mt-3" wire:submit.prevent="submit">
        <div class="col-12">
            <label for="inputAddress" class="form-label">Product Name</label>
            <input type="text" wire:model="nama_product" class="form-control @error('nama_product') is-invalid @enderror" id="inputAddress" placeholder="Insert desired product name here" required>
            @error('nama_product') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Product Code</label>
            <input type="text" wire:model=kode_product class="form-control" id="inputEmail4" placeholder="Insert desired product code here">
            @error('kode_product') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Product Price</label>
            <input type="number" wire:model="harga_product" class="form-control" id="inputPassword4" min="1" required>
            @error('harga_product') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-12 pt-2">
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </div>
    </form>
</div>
