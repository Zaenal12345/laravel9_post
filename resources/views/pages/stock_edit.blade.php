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
                        <li class="breadcrumb-item active" aria-current="page">Form Input Data Stok</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
            </div>
        </div>
        <!--end breadcrumb-->
        <form action="{{ route('stock.update',$stock->id) }}" method="post" id="stockForm">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="card">
                    <div class="card-body">

                        <div>
                            <label for="goods_id" class="form-label"><b>Barang :</b></label>
                            <select class="form-select mb-2" name="goods_id" id="goods_id">
                                @foreach($goods as $data)
                                    <option value="{{ $data->id }}" <?= $data->id == $stock->goods_id ? "selected" : "" ?>>{{ $data->goods_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="stock" class="form-label"><b>Stok :</b></label>
                            <input class="form-control mb-2" type="text" placeholder="" name="stock" id="stock" value="{{ $stock->stock }}">
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('stock.index') }}" class="btn btn-secondary">Kembali</a>
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
    $("#stockForm").validate({
        
        rules: {
            stock: {
                required: true,
                digits: true
            },
        },
        messages: {
            stock: {
                required: "Harga harus diisi.",
                digits: "Karakter yang dimasukkan tidak valid.",
            },
        }

    });
</script>
@endpush