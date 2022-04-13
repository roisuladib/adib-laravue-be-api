@extends('layouts.admin')

@section('title', 'Ubah Transaksi')

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
         <h3>Ubah Transaksi</h3>
      </div>
      <div class="card-body card-block">
         <form action="{{ route('transactions.update', $item->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
               <label for="name">Customer</label>
               <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : $item->name }}" autofocus />
               @error('name')
                  <div class="text-danger">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ? old('email') : $item->email }}" />
               @error('email')
                  <div class="text-danger">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group">
               <label for="tlpn">Telephone</label>
               <input type="number" name="tlpn" id="tlpn" class="form-control @error('tlpn') is-invalid @enderror" value="{{ old('tlpn') ? old('tlpn') : $item->tlpn }}" />
               @error('tlpn')
                  <div class="text-danger">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group">
               <label for="address">Address</label>
               <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') ? old('address') : $item->address }}" />
               @error('address')
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