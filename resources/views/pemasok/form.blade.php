
<div class="modal fade" id="form-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    @csrf
                    <div id="method">

                    </div>
                    <div class="row">
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama Pemasok</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="nama_pemasok" name='nama_pemasok'>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>


  