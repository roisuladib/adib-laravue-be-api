@extends('layouts.admin')

@section('title', 'Create new product')

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
         <h3>Edit product</h3>
      </div>
      <div class="card-body card-block">
         <form action="{{ route('products.update', $product->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
               <label for="name" class="form-control-label">Name</label>
               <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : $product->name }}" autofocus />
               @error('name')
                  <div class="text-danger">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group">
               <label for="type" class="form-control-label">Type</label>
               <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') ? old('type') : $product->type }}" />
               @error('type')
                  <div class="text-danger">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group">
               <label for="qty" class="form-control-label">Quantity</label>
               <input type="number" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty') ? old('qty') : $product->qty }}" />
               @error('qty')
                  <div class="text-danger">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group">
               <label for="price" class="form-control-label">Price</label>
               <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') ? old('price') : $product->price }}" />
               @error('price')
                  <div class="text-danger">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group">
               <label for="description" class="form-control-label">Description</label>
               <textarea type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror">{!! old('description') ? old('description') : $product->description !!}</textarea>
               @error('description')
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
               $('#save').attr('disabled', 'true');
               $('.spinner').show();
               $('.hide-text').hide();
            })
        })();
   </script>
   <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
   <script>
       ClassicEditor
         .create( document.querySelector('#description') )
         .then( editor => {
            console.log( editor );
         })
         .catch( error => {
            console.error( error );
         });
   </script>
@endpush