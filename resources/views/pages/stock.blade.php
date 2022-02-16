@extends('../template')

@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tables</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Stok</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('stock.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>

        @if(session('message'))
            <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2 alert-message">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Sukses</h6>
                        <div class="text-white">{{ session('message') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-stock" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Stok</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stocks as $data)
                            <tr>
                                <td class="text-center">{{ $data->stock }}</td>
                                <td class="text-center">{{ $data->goods->goods_name }}</td>
                                <td class="text-center">
                                    <form action="{{ route('stock.destroy',$data->id) }}" method="post" >
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('stock.edit',$data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-script')

<script>
    $('#table-stock').DataTable()
</script>

@endpush