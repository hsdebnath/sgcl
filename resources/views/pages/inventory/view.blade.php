@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/dash" role="button">Dashboard / </a>Inventory </div>

                {{-- <div class="card-body"> --}}
                    @if (count($inventory) > 0)
                        
                    <table class="table table-striped">
                        <tr>
                            <th>name</th>
                            <th>Quanity</th>
                            <th>rate</th>
                        </tr>
                        @foreach ($inventory as $inv)
                            <tr data-toggle="collapse" data-target="#col{{$inv->id}}">   
                            <td>{{$inv->items->name}}</td>
                            <td>{{$inv->quantity}} {{$inv->items->unit}}</td>
                            <td>{{$inv->rate}}</td>
                            </tr>
                            <tr id="col{{$inv->id}}" class="collapse out">
                                <td colspan="4">
                                    <p>{{$inv->items->name}} [ {{$inv->items->company->name}}]<br>
                                        Stock : {{$inv->quantity}} {{$inv->items->unit}}<br>
                                        Purchase Rate : {{$inv->rate}}<br>
                                    </p>
                                </td>
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