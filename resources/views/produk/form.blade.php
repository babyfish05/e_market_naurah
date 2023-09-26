<!-- Modal -->
<div class="modal fade" id="produkFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post">
                @csrf
                <div class="form-group row">
                  <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk">
                  </div>
                </div>
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambahkan</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  