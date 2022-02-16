@extends('../template')

@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Forms</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Form Input Data Barang</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
            </div>
        </div>
        <!--end breadcrumb-->
        <form action="{{ route('good.store') }}" method="post" id="goodsForm">
        @csrf
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="card">
                    <div class="card-body">

                        <div>
                            <label for="category_id" class="form-label"><b>Kategori :</b></label>
                            <select class="form-select mb-2" name="category_id" id="category_id">
                                @foreach($category as $data)
                                    <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="goods_name" class="form-label"><b>Nama Barang :</b></label>
                            <input class="form-control mb-2" type="text" placeholder="" name="goods_name" id="goods_name">
                        </div>

                        <div>
                            <label for="price" class="form-label"><b>Harga :</b></label>
                            <input class="form-control mb-2" type="text" placeholder="" name="price" id="price">
                        </div>
                        
                        <div>
                            <label for="unit" class="form-label"><b>Satuan :</b></label>
                            <select class="form-select mb-2" name="unit" id="unit">
                                <option value="pcs">pcs</option>
                                <option value="buah">buah</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="mininum_stock" class="form-label"><b>Stok Minimum :</b></label>
                            <input class="form-control mb-2" type="text" placeholder="" name="mininum_stock" id="mininum_stock">
                        </div>
                        
                        <div>
                            <label for="expired_date" class="form-label"><b>Tanggal Kadaluarsa :</b></label>
                            <input class="form-control mb-2" type="date" name="expired_date" id="expired_date">
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('good.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </form>
        <!--end row-->
    </div>
</div>
<!--end page wrapper -->
@endsection

@push('custom-script')
<script>
    $("#goodsForm").validate({
        
        rules: {
            goods_name: {
                required: true
            },
            price: {
                required: true,
                digits: true
            },
            mininum_stock: {
                required: true,
                digits: true
            },
        },
        messages: {
            goods_name: "Nama barang harus diisi.",
            price: {
                required: "Harga harus diisi.",
                digits: "Karakter yang dimasukkan tidak valid.",
            },
            mininum_stock:{
                required: "Stok minimum harus diisi.",
                digits: "Karakter yang dimasukkan tidak valid.",
            },
        }

    });
</script>
@endpush