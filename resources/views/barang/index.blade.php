@extends('templates.layout')

@section('content')
    <div class="container">
        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-12 text-left">
                  
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form-modal"
                            data-mode="add">
                            <i class="icon ion-md-add"></i> Tambah
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
                                <th class="text-left">
                                    @lang('crud.barang.inputs.kode_barang')
                                </th>
                                <th class="text-left">
                                    @lang('crud.barang.inputs.nama_barang')
                                </th>
                                <th class="text-left">
                                    @lang('crud.barang.inputs.satuan')
                                </th>
                                <th class="text-center">
                                    @lang('crud.barang.inputs.harga_jual')
                                </th>
                                <th class="text-center">
                                    @lang('crud.barang.inputs.stok')
                                </th>
                                <th class="text-center">
                                    @lang('crud.barang.inputs.ditarik')
                                </th>
                                <th class="text-left">
                                    @lang('crud.barang.inputs.user_id')
                                </th>
                                <th class="text-left">
                                    @lang('crud.barang.inputs.produk_id')
                                </th>
                                <th class="text-center">
                                    @lang('crud.common.actions')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($barangs as $barang)
                                <tr>
                                    <td>{{ $barang->kode_barang ?? '-' }}</td>
                                    <td>{{ $barang->nama_barang ?? '-' }}</td>
                                    <td>{{ $barang->satuan ?? '-' }}</td>
                                    <td class="text-center">{{ $barang->harga_jual ?? '-' }}</td>
                                    <td class="text-center">{{ $barang->stok ?? '-' }}</td>
                                    <td class="text-center">{{ $barang->ditarik ?? '-' }}</td>
                                    <td>{{ optional($barang->user)->name ?? '-' }}</td>
                                    <td>
                                        {{ optional($barang->produk)->nama_produk ?? '-' }}
                                    </td>
                                    <td class="text-center" style="width: 134px;">
                                        <div role="group" aria-label="Row Actions" class="btn-group">
                                           
                                                <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                                    data-bs-target="#form-modal" data-mode="edit" data-id="{{ $barang->id }}">
                                                    <i class="icon ion-md-create"></i>
                                                </button>
                                               
                                                <form action="{{ route('barang.destroy', $barang) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-light text-danger delete-btn">
                                                        <i class="icon ion-md-trash"></i>
                                                    </button>
                                                </form>
                                          
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">
                                        @lang('crud.common.no_items_found')
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                       
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('barang.form')
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
                        modal.find(".modal-title").text("Tambah Data Produk")
                        modal.find("#method").html("")

                        setValue(modal)

                        modal.find(".modal-body form").attr("action", "/barang")
                        break;
                    case "edit":
                        const object = JSON.stringify(@json($barangs))
                        const data = JSON.parse(object)
                        const idBarang = btn.data("id")
                        console.log(data)
                        const barang = data.find(item => item.id == idBarang)

                        setValue(modal, barang.kode_barang, barang.nama_barang, barang.satuan, barang.harga_jual, barang.stok, barang.produk.id, barang.user.id )

                        modal.find(".modal-title").text("Edit Data Produk")
                    modal.find("#method").html(`@method('PUT')`)
                        

                        modal.find(".modal-body form").attr("action", `{{ url('barang') }}/${idBarang}`);
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

            function setValue(modal, kodeBarang = "", namaBarang = "", satuan = "", hargaJual = "", stok = "", produk = "", user = "") {
                const modalFOrm = $("#form-modal")

                modalFOrm.find("#kode_barang").val(kodeBarang)
                modalFOrm.find("#nama_barang").val(namaBarang)
                modalFOrm.find("#satuan").val(satuan)
                modalFOrm.find("#harga_jual").val(hargaJual)
                modalFOrm.find("#stok").val(stok)
                modalFOrm.find("#produk_id").val(produk)
                modalFOrm.find("#user_id").val(user)
                return true
            }
        })
    </script>
@endpush