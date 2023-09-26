<!-- Modal -->
<div class="modal fade" id="form-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post" id="form-data">
            <div id="method"></div>
            @csrf
            
            <div class="form-group mb-3">
                <label for="kode_pelanggan">Kode Pelanggan</label>
                <input type="text" name="kode_pelanggan" id="kode_pelanggan" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="nama">nama</label>
                <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="alamat">alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="no_telp">no_telp</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="email">email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div> 
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>