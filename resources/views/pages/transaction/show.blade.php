<table class="table table-bordered table-hover">
   <tr>
      <th>Name</th>
      <td>{{ $item->name }}</td>
   </tr>
   <tr>
      <th>Email</th>
      <td>{{ $item->email }}</td>
   </tr>
   <tr>
      <th>Telephone</th>
      <td>{{ $item->tlpn }}</td>
   </tr>
   <tr>
      <th>Alamat</th>
      <td>{{ $item->address }}</td>
   </tr>
   <tr>
      <th>Transaction Total</th>
      <td>Rp. {{ number_format($item->transaction_total) }}</td>
   </tr>
   <tr>
      <th>Transaction Status</th>
      <td>{{ $item->transaction_status }}</td>
   </tr>
   <tr>
      <th>Pembelian Produk</th>
      <td>
         <table class="table table-bordered table-hover w-100">
            <tr>
               <th>Name</th>
               <th>Type</th>
               <th>Price</th>
            </tr> 
            @foreach ($item->detail as $data)
               <tr>
                  <td>{{ $data->product->name }}</td>
                  <td>{{ $data->product->type }}</td>
                  <td>Rp. {{ number_format($data->product->price) }}</td>
               </tr>
            @endforeach
         </table>
      </td>
   </tr>
</table>
<div class="row">
   <div class="col-4">
      <a href="{{ route('transaction-status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-block">
         <i class="fa fa-check">SUCCESS</i>
      </a>
   </div>
   <div class="col-4">
      <a href="{{ route('transaction-status', $item->id) }}?status=FAILED" class="btn btn-danger btn-block">
         <i class="fa fa-close">FAILED</i>
      </a>
   </div>
   <div class="col-4">
      <a href="{{ route('transaction-status', $item->id) }}?status=PENDING" class="btn btn-warning btn-block">
         <i class="fa fa-spinner">PENDING</i>
      </a>
   </div>
</div>