@extends('layouts.admin')

@section('title', 'Create new product gallery')

@push('last-style')
   <style>
      .spinner {
         display: none;
      }
   </style>
@endpush

@section('content')
   <div class="card">
      <div class="card-header">
         <h3>Create new product gallery</h3>
      </div>
      <div class="card-body card-block">
         <form action="{{ route('product-gallerries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
               <label for="products_id" >Name</label>
               <select type="text" name="products_id" id="products_id" class="form-control @error('products_id') is-invalid @enderror" value="{{ old('products_id') }}">
                  <option value="" disabled selected>~ Choose Produk ~</option>
                  @foreach ($products as $product)
                     <option value="{{ $product->id }}">{{ $product->name }}</option>
                  @endforeach
               </select>
               @error('products_id')
                  <div class="text-danger">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group">
               <label for="photo" >Photo</label>
               <input type="file" name="photo" id="photo" accept="image/*" class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}" />
               @error('photo')
                  <div class="text-danger">{{ $message }}</div>
               @enderror
            </div>            
            <div class="form-group">
               <label for="is_default">Default</label>
               &nbsp;
               <label>
                  <input type="radio" name="is_default" id="is_default" class="@error('is_default') is-invalid @enderror" value="1" /> Yes 
               </label>
               &nbsp;
               <label>
                  <input type="radio" name="is_default" id="is_default" class="@error('is_default') is-invalid @enderror" value="0"  /> No
               </label>
               @error('is_default')
                  <div class="text-danger">{{ $message }}</div>
               @enderror
            </div> 
            <button id="save" type="submit" class="btn btn-info btn-block">
               <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i>Save</div>
               <div class="hide-text">Save</div>
            </button>
         </form>
      </div>
   </div>
@endsection
@push('last-script')
   <script>
      (function () {
            $('#save').on('submit', function () {
               $('.save').attr('disabled', 'true');
               $('.spinner').show();
               $('.hide-text').hide();
            })
        })();
   </script>
@endpush