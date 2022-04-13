<aside id="left-panel" class="left-panel">
   <nav class="navbar navbar-expand-sm navbar-default">
      <div id="main-menu" class="main-menu collapse navbar-collapse">
         <ul class="nav navbar-nav">
            <li class="{{ request()->is('admin') ? 'active' : '' }}">
               <a href="{{ route('/') }}">
               <i class="menu-icon fa fa-laptop"></i>Dashboard </a>
            </li>
            <li class="menu-title">Barang</li>
            <li class="{{ request()->is('admin/products/*') ? 'active' : '' }}">
               <a href="{{ route('products.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Barang</a>
            </li>
            <li class="{{ request()->is('admin/products/create*') ? 'active' : '' }}">
               <a href="{{ route('products.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Barang</a>
            </li>
            <li class="menu-title">Foto Barang</li>
            <li class="{{ request()->is('admin/product-gallerries*') ? 'active' : '' }}">
               <a href="{{ route('product-gallerries.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Foto Barang</a>
            </li>
            <li class="{{ request()->is('admin/product-gallerries/create') ? 'active' : '' }}">
               <a href="{{ route('product-gallerries.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Foto Barang</a>
            </li>
            <li class="menu-title">Transaksi</li>
            <li class="">
               <a href="{{ route('transactions.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Transaksi</a>
            </li>
         </ul>
      </div>
   </nav>
</aside>