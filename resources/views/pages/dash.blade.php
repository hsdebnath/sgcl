@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                {{-- <div class="card-body"> --}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    {{-- Bank table --}}
                    @if (count($banks) > 0)
                    <legend class="alert-success">&nbsp;&nbsp;&nbsp;Bank Accounts</legend>
                    <table class="table table-striped">
                        <tr>
                            <th>name</th>
                            <th>branch</th>
                            <th>Balance</th>
                        </tr>
                        @foreach ($banks as $bank)
                            <tr data-toggle="collapse" data-target="#banks{{$bank->id}}">    
                            <td>{{$bank->name}}</td>
                            <td>{{$bank->branch}}</td>
                            <td>{{$bank->balance}} ~</td>
                            </tr>
                            <tr id="banks{{$bank->id}}" class="collapse out">
                                <td colspan="4">
                                    <p>{{$bank->name}}<br>
                                        {{$bank->branch}} branch<br>
                                        A/C {{$bank->ac_number}}<br>
                                        Balance : {{$bank->balance}} ~<br>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @endif    
                    {{-- Bank table end--}}

                    <hr/>

                    {{-- Payable/ Recieveable table --}}
                    <legend class="alert-warning">&nbsp;&nbsp;&nbsp;Balance</legend>
                    <table class="table table-striped table-bordered">
                        <colgroup>
                            <col></col>
                            <col class="alert-danger"></col>
                            <col class="alert-success"></col>
                        </colgroup>
                        <tr>
                            <th>Company</th>
                            <th>Payable</th>
                            <th>Recieveable</th>
                        </tr>
                        @php $pay = $rcv = 0; @endphp 
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            @if ($item->balance < 0 )
                                <td>{{-1 * $item->balance}}</td>
                                <td> 0</td>   
                                @php $pay += (-1 * $item->balance); @endphp 
                            @else 
                                <td>0</td>
                                <td>{{$item->balance}}</td>
                                @php $rcv += $item->balance; @endphp 
                            @endif
                        </tr>    
                        @endforeach
                        <tr class="font-weight-bolder font-italic">
                            <th>Total →</th>
                            <th>@php echo $pay; @endphp </th>
                            <th>@php echo $rcv; @endphp </th>
                        </tr>
                    </table>
                    {{-- Payable/ Recieveable table end--}}

                    <hr/>

                    {{-- Current orders table --}}
                    @if (count($orders) > 0)
                    <legend class="alert-primary">&nbsp;&nbsp;&nbsp;Recent Orders <a href="/orders" class="btn btn-primary float-right"><i class="fa fa-eye">&nbsp;More</i></a></legend>
                    <table class="table table-striped">
                        <tr>
                            <th>From</th>
                            <th>Item</th>
                            {{-- <th>Quantity</th> --}}
                            <th>Rate</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($orders as $order)  

                            <tr data-toggle="collapse" data-target="#order{{$order->id}}">
                                <td>{{$order->company->name}}</td>
                                <td>{{$order->items->name}}</td>
                                <td>{{$order->rate}}</td>
                            @if ($order->status == 0)
                                <td class="alert-primary">Open</td>
                            @else
                                <td class="alert-success">Complete</td>    
                            @endif
                            </tr>
                            <tr id="order{{$order->id}}" class="collapse out">
                                <td colspan="4">
                                    <strong><p>PO - {{$order->PO}}.&emsp;&emsp;
                                        {{$order->quantity}}{{$order->items->unit}} @ {{$order->rate}} Tk. &emsp;&emsp;
                                                                               
                                    </p></strong><hr>
                                    @foreach ($sales as $sale)  
                                        @if ($sale->orders_id == $order->id)
                                            <p>{{$sale->created_at->format('j M, y')}} - &emsp;
                                               Shipped : {{$sale->quantity}} {{$sale->orders->items->unit}} - &emsp;
                                               Expanse : {{$sale->expanse}} Tk.<hr>
                                            </p>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            
                        @endforeach
                    </table>
                    @endif
                    {{-- Current orders table end--}}

                    <hr>

                    {{-- Recent Purchase table --}}
                    @if (count($purchase) > 0)
                    <legend class="alert-warning">&nbsp;&nbsp;&nbsp;Recent Purchase <a href="/purchase" class="btn btn-warning float-right"><i class="fa fa-eye">&nbsp;More</i></a></legend>
                        
                    <table class="table table-striped">
                        <tr>
                            <th>item</th>
                            <th>rate</th>
                            <th>Quantity</th>
                        </tr>
                        @foreach ($purchase as $pur)
                            <tr data-toggle="collapse" data-target="#purchase{{$pur->id}}"> 
                            <td>{{$pur->items->name}}</td>
                            <td>{{$pur->rate}}</td>
                            <td>{{$pur->quantity}} {{$pur->items->unit}}</td>
                            </tr>
                            <tr id="purchase{{$pur->id}}" class="collapse out">
                                <td colspan="4">
                                    <p>{{$pur->items->name}} <br>
                                        From: {{$pur->items->company->name}} <br>
                                        {{$pur->quantity}} {{$pur->items->unit}} @ {{$pur->rate}} Tk.<br>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <h3>No Items Found !!</h3>
                    @endif
                    {{-- Recent Purchase table end--}}

                    <hr>

                    {{-- Recent expanses table --}}
                    @if (count($expanses) > 0)
                    <legend class="alert-danger">&nbsp;&nbsp;&nbsp;Recent Expances <a href="/expanse" class="btn btn-danger float-right"><i class="fa fa-eye">&nbsp;More</i></a></legend>
                        <table class="table table-striped">
                            <tr>
                                <th>Date</th>
                                <th>Purpose</th>
                                <th>Amount</th>
                            </tr>
                            @php $total = 0; @endphp
                            @foreach ($expanses as $expanse)
                                <tr data-toggle="collapse" data-target="#expanse-{{$expanse->id}}">  
                                <td>{{$expanse->created_at->format('j M, y')}}</td>
                                <td>{{$expanse->type}} <br> @if ($expanse->user_id)[ {{$expanse->user->name}} ]@endif </td>
                                <td>{{$expanse->amount}}</td>
                                @php $total += $expanse->amount; @endphp
                                </tr>
                                <tr id="expanse-{{$expanse->id}}" class="collapse out">
                                    <td colspan="3">{{$expanse->note}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th></th>
                                <th>Total →</th>
                                <th>@php echo $total; @endphp</th>
                            </tr>
                        </table>
                    @endif
                    {{-- Recent expanses table end--}}

                    <hr>
                    {{-- Recent funds table --}}
                    @if (count($funds) > 0)
                    <legend class="alert-success">&nbsp;&nbsp;&nbsp;Recent Funds <a href="/fund" class="btn btn-success float-right"><i class="fa fa-eye">&nbsp;More</i></a></legend>
                    <table class="table table-striped">
                        <tr>
                            <th>Fund By</th>
                            <th>Type</th>
                            <th>Amount</th>
                        </tr>
                        @foreach ($funds as $fund)
                            <tr data-toggle="collapse" data-target="#col{{$fund->id}}">  
                            <td>{{$fund->by}}</td>
                            <td>{{$fund->type}}</td>
                            <td>{{$fund->amount}}</td>
                            </tr>
                            <tr id="col{{$fund->id}}" class="collapse out">
                                <td colspan="3">
                                    <p>[{{$fund->created_at}}]<br>
                                        {{$fund->amount}} Tk. {{$fund->type}} <br>
                                        By {{$fund->by}} <br>
                                        [{{$fund->note}}]
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @endif
                    {{-- Recent funds table end--}}
                    
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
