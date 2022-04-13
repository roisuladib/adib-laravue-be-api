@extends('layouts.admin')

@section('title', 'Product All')

@section('content')
   <div class="orders">
      <div class="row">
         <div class="col-12">
            @if ($message = Session::get('success'))
               <div class="alert alert-success alert-block">
               <button type="button" class="close" data-dismiss="alert">×</button>    
                  <strong>{{ $message }}</strong>
               </div>
            @endif
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">
                     Daftar Barang
                  </h4>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Type</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @forelse ($products as $no => $product)
                              <tr>
                                 <td>{{ $no+=1 }}</td>
                                 <td>{{ $product->name }}</td>
                                 <td>{{ $product->type }}</td>
                                 <td>{{ $product->qty }}</td>
                                 <td>{{ $product->price }}</td>
                                 <td>
                                    <a href="{{ route('product-gallery', $product->id) }}" class="btn btn-info btn-sm">
                                       <i class="fa fa-picture-o"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                       <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" class="d-inline" method="post">
                                       @csrf
                                       @method('delete')
                                       <button class="btn btn-danger btn-sm" onclick="return confirm(`Yakin Hapus '{{ $product->name }}' ?`);">
                                          <i class="fa fa-trash"></i>
                                       </button>
                                    </form>
                                 </td>
                              </tr>                        
                           @empty
                             <tr><td class="text-center p-3" colspan="6">Data not found</td></tr>
                           @endforelse
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection