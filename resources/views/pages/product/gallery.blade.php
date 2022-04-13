@extends('layouts.admin')

@section('title', 'Product Gallery')

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
                     Product Gallery <small class="text-info">{{ $product->name }}</small>
                  </h4>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Photo</th>
                              <th>Default</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @forelse ($galleries as $no => $gallery)
                              <tr>
                                 <td>{{ $no+=1 }}</td>
                                 <td>{{ $gallery->product->name }}</td>
                                 <td><img src="{{ url($gallery->photo) }}" alt="{{ $gallery->product->name }}" /></td>
                                 <td>{{ $gallery->is_default ? 'Ya' : 'Tidak' }}</td>
                                 <td>
                                    <form action="{{ route('product-gallerries.destroy', $gallery->id) }}" class="d-inline" method="POST">
                                       @csrf
                                       @method('delete')
                                       <button class="btn btn-danger btn-sm" onclick="return confirm(`Yakin Hapus '{{ $gallery->product->name }}' ?`);">
                                          <i class="fa fa-trash"></i>
                                       </button>
                                    </form>
                                 </td>
                              </tr>                        
                           @empty
                             <tr><td class="text-center p-3" colspan="6">Photo not found</td></tr>
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
@push('last-script')
<script>
   $('.close').setTimeout(() => {
      
   }, 3000);
</script>
@endpush