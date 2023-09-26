@extends('templates.layout')
@push('style')
    
@endpush
@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Produk</h3>

        <div class="card-tools">
          <button
            type="button"
            class="btn btn-tool"
            data-card-widget="collapse"
            title="Collapse"
          >
            <i class="fas fa-minus"></i>
          </button>
          <button
            type="button"
            class="btn btn-tool"
            data-card-widget="remove"
            title="Remove"
          >
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="card-body">
          @if(session('success'))
          <div class="alert alert alert-success alert-dismissible fade show role" id="alert-success" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
    <!-- Button trigger modal -->
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#produkFormModal">
    Tambah Produk
  </button>
  @include('produk.data')
 
    @if($errors->any())
    <div class="alert alert-danger alert-dismisible fade show" id="alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        
      </div>
      @endif

      
      <!-- /.card-body -->
      <div class="card-footer">Footer</div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
  </section>
  @include('produk.form')
  @include('produk.edit')
@endsection


@push('script')
  <script>
    $(document).ready(function() {
      // $('#alert-success').fadeOut()
    $('#alert-success').fadeTo(2000, 500).slideUp(500, function(){
      $('#alert-succes').slideUp(500)
    })
    $('#alert-danger').fadeTo(2000, 500).slideUp(500, function(){
      $('#alert-danger').slideUp(500)
    })

    $(".btn-delete").on("click", function(e) {
      console.log('oke')
      let nama_produk = $(this).closest('tr').find('td:eq(1)').text()
      Swal.fire({
       icon: 'error',
       title: 'Hapur Data',
       html: `Apakah data <b>${nama_produk}</b> akan di hapus?`,
       confirmButtonText: 'ya',
       denyButtonText: 'tidak',
       showDenyButton: true,
       focusConfirm: false
    }).then(function(result) {
      if (result.isConfirmed) $(e.target).closest('form').submit()
      else Swal.close()
    })
    })

  })
    
  </script>
  <script>  
    let table = new DataTable('#myTable');
  </script>
  
  <script> 
  $(document).ready(function(){
   
    $('#editProdukModal').on('show.bs.modal', function(e){
      let button = $(e.relatedTarget)
      let id = button.data('id')
      let nama = button.data('nama')
      $('#nama_produk_edit').val(nama)
      $('.form-edit').attr('action',`/produk/${id}`)
    })
  })
  </script>
@endpush