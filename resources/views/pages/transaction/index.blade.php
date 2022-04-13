@extends('layouts.admin')

@section('title', 'Daftar Transaksi')

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
                     Transactions
                  </h4>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Telephone</th>
                              <th>Address</th>
                              <th>Transaction Total</th>
                              <th>Transaction Status</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @forelse ($items as $no => $item)
                              <tr>
                                 <td>{{ $no+=1 }}</td>
                                 <td>{{ $item->name }}</td>
                                 <td>{{ $item->email }}</td>
                                 <td>{{ $item->tlpn }}</td>
                                 <td>{{ $item->address }}</td>
                                 <td>Rp. {{ number_format($item->transaction_total) }}</td>
                                 <td>
                                    @if ($item->transaction_status === 'PENDING')
                                       <span class="badge badge-warning badge-pill text-dark">
                                    @elseif ($item->transaction_status === 'SUCCESS')
                                       <span class="badge badge-success badge-pill">
                                    @elseif ($item->transaction_status === 'FAILED')
                                       <span class="badge badge-danger badge-pill">
                                    @else
                                       <span>
                                    @endif
                                    {{ $item->transaction_status }}</span>
                                 </td>
                                 <td>
                                    @if ($item->transaction_status === 'PENDING')
                                       <a href="{{ route('transaction-status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-sm">
                                          <i class="fa fa-check"></i>
                                       </a>
                                       <a href="{{ route('transaction-status', $item->id) }}?status=FAILED" class="btn btn-danger btn-sm">
                                          <i class="fa fa-times"></i>
                                       </a>
                                    @endif
                                    {{-- <a href="#mymodal" data-toggle="modal" data-target="#mymodal" data-title="Detail Transaksi {{ $item->unid }}" data-remote="{{ route('transactions.show', $item->id) }}" class="btn btn-info btn-sm">
                                       <i class="fa fa-eye"></i>
                                    </a> --}}
                                    <a href="#mymodal"
                                       data-remote="{{ route('transactions.show', $item->id) }}"
                                       data-toggle="modal"
                                       data-target="#mymodal"
                                       data-title="Detail Transaksi <span class='badge badge-success'>{{ $item->unid }}</span>"
                                       class="btn btn-info btn-sm">
                                       <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('transactions.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                       <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('transactions.destroy', $item->id) }}" class="d-inline" method="post">
                                       @csrf
                                       @method('delete')
                                       <button class="btn btn-danger btn-sm" onclick="return confirm(`Yakin Hapus '{{ $item->name }}' ?`);">
                                          <i class="fa fa-trash"></i>
                                       </button>
                                    </form>
                                 </td>
                              </tr>                        
                           @empty
                             <tr><td class="text-center p-3 text-danger" colspan="8">Transaction not found</td></tr>
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