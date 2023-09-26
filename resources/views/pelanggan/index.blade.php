@extends('templates.layout')

@section('content')
    <div class="container">
        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-12 text-left">
                  
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form-modal" data-mode="tambah">
                        Tambah Data
                      </button>
                  
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="card-title">@lang('crud.barang.index_title')</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th>Kode Pelanggan</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Email</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($daftarPelanggan as $p)
                               <tr>
                                <td>{{ $p->kode_pelanggan }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->no_telp }}</td>
                                <td>{{ $p->email }}</td>
                                <td class="text-center" style="width: 134px;">
                                    <div role="group" aria-label="Row Actions" class="btn-group">
                                        
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                                data-bs-target="#form-modal" data-mode="edit" data-id="{{ $p->id }}">
                                                <i class="icon ion-md-create"></i>
                                            </button>
                                        
                                        <form action="{{ route('pelanggan.destroy', $p) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-light text-danger delete-btn">
                                                <i class="icon ion-md-trash"></i>
                                            </button>
                                        </form>
                                </div>
                            </td>
                               </tr>
                           @endforeach
                        </tbody>
                       
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('pelanggan.form')
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("#form-modal").on("show.bs.modal", event => {
                const btn = $(event.relatedTarget)
                const modal = $(this)
                let mode = $(btn).data("mode")
                switch (mode) {
                    case "add":
                        modal.find(".modal-title").text("tambahDataPelanggan")
                        modal.find("#method").html("")

                        setValue(modal)

                        modal.find(".modal-body form").attr("action", "/pelanggan")
                        break;
                    case "edit":
                        const object = JSON.stringify(@json($daftarPelanggan))
                        const data = JSON.parse(object)
                        const idPelanggan = btn.data("id")
                        console.log(data)
                        const pelanggan = data.find(item => item.id == idPelanggan)

                        setValue(modal, pelanggan.kode_pelanggan, pelanggan.nama, pelanggan.alamat, pelanggan.no_telp,pelanggan.email  )

                        modal.find(".modal-title").text("Edit Data Pelanggan")
                    modal.find("#method").html(`@method('PUT')`)
                        

                        modal.find(".modal-body form").attr("action", `{{ url('pelanggan') }}/${idPelanggan}`);

                    default:
                        break;
                }
            })

            $(".delete-btn").on("click", event => {
                event.preventDefault()
                const nama = $(this).data("nama")
                Swal.fire({
                    title: `Apakah data <span style="color: red;"></span> akan dihapus?`,
                    text: "Data tidak bisa dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#dd3333",
                    confirmButtonText: "Ya, hapus data ini"
                }).then(result => {
                    if (result.isConfirmed)
                        $(event.target).closest("form").submit()
                    else Swal.close()
                })
            })

            function setValue(modal, kode_pelanggan = "", nama = "", alamat = "", no_telp = "", email = "") {
                const modalFOrm = $("#form-modal")

                modalFOrm.find("#kode_pelanggan").val(kode_pelanggan)
                modalFOrm.find("#nama").val(nama)
                modalFOrm.find("#alamat").val(alamat)
                modalFOrm.find("#no_telp").val(no_telp)
                modalFOrm.find("#email").val(email)
                return true
            }
        })
    </script>
@endpush