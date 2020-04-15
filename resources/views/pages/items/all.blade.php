@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/dash" role="button">Dashboard / </a>Items <a href="/items/create" class="btn btn-success btn-sm float-right">Add New</a></div>

                {{-- <div class="card-body"> --}}
                    @if (count($items) > 0)
                        
                    <table class="table table-striped">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>vendor</th>
                            <th>unit</th>
                        </tr>
                        @foreach ($items as $item)
                            <tr>
                            <td>{{$item->id}}</td>    
                            <td>{{$item->name}}</td>
                            <td>{{$item->company->name}}</td>
                            <td>{{$item->unit}}</td>
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