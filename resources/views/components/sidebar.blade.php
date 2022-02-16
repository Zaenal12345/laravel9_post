<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('template/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Point Of Sale</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">

        <li>
            <a href="{{ url('/dashboard') }}">
                <div class="parent-icon"><i class="bx bx-home-circle"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Data Master</div>
            </a>
            <ul>
                <li> <a href="{{ route('category.index') }}"><i class="bx bx-right-arrow-alt"></i>Kategori</a>
                </li>
                <li> <a href="{{ route('good.index') }}"><i class="bx bx-right-arrow-alt"></i>Barang</a>
                </li>
                <li> <a href="app-file-manager.html"><i class="bx bx-right-arrow-alt"></i>Stok</a>
                </li>
            </ul>
        </li>
        
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->