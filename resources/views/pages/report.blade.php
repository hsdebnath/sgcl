@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/home" role="button">Home / </a>Report</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table table-bordered">
                            <tr>
                                <th>Company</th>
                                <th>Payable</th>
                                <th>Recieveable</th>
                            </tr>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    @if ($item->balance < 0 )
                                        <td>{{-1 * $item->balance}}</td>
                                        <td>0</td>    
                                    @else 
                                        <td>0</td>
                                        <td>{{$item->balance}}</td>      
                                    @endif
                                </tr>    
                                @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
