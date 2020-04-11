@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/home" role="button">Home / </a><a href="/dash" role="button">Dashboard / </a>Inventory </div>

                <div class="card-body">
                    @if (count($inventory) > 0)
                        
                    <table class="table table-bordered">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>Quanity</th>
                            <th>Vendor</th>
                            <th>rate</th>
                        </tr>
                        @foreach ($inventory as $inv)
                            <tr>
                            <td>{{$inv->id}}</td>    
                            <td>{{$inv->items->name}}</td>
                            <td>{{$inv->quantity}} {{$inv->items->unit}}</td>
                            <td>{{$inv->items->company->name}}</td>
                            <td>{{$inv->rate}}</td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <h3>No Items Found !!</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>                    
    
@endsection