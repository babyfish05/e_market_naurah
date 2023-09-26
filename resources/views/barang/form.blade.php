@php $editing = isset($barang) @endphp


<div class="modal fade" id="form-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    @csrf
                    <div id="method">
                     
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                          <label for="kode_barang">kode barang</label>
                            <input type="text"name="kode_barang"class="form-control" id="kode_barang" placeholder="Kode Barang"
                            required>
                        </div>
                    
                        <div class="col-sm-12">
                          <label for="nama_barang">nama barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="nama_barang"placeholder="Nama Barang"
                            required>
                        </div>

                        <div class="col-sm-12">
                          <label for="harga_jual">Harga Jual</label>
                        <input type="text" name="harga_jual" class="form-control" id="harga_jual"placeholder="Nama Barang"
                            required>
                        </div>

                        <div class="col-sm-12">
                          <label for="satuan">Satuan</label>
                        <input type="text" name="satuan" class="form-control" id="satuan"placeholder="Nama Barang"
                            required>
                        </div>
                    
                        <div class="col-sm-12">
                          <label for="stok" class="col-form-label">Stok Barang</label>
                          <input type="number" class="form-control" id="stok" name='stok'>
                        </div>
                        <div class="col-sm-12">
                          <label for="user_id" class="col-form-label">User</label>
                          <select class="form-control" name="user_id" id="user_id">
                            <option selected disabled>silahkan pilih user</option>
                            @foreach ($users as $value =>$label)
                            <option value="{{$value}}" >{{$label}}</option>
                                
                            @endforeach
                           </select>
                        </div>

                        <div class="col-sm-12">
                          <label for="produk_id" class="col-form-label">Produk</label>
                          <select class="form-control" name="produk_id" id="produk_id">
                            <option selected disabled>silahkan pilih Produk</option>
                            @foreach ($produks as $value =>$label)
                            <option value="{{$value}}" >{{$label}}</option>
                                
                            @endforeach
                           </select>
                        </div>
          
                 
                      </div>
                      
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah barang</button>
                 
                  </div>
                </div>
              </div>
            </div> 
          </form>