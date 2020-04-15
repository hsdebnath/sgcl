@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/home" role="button">Home / </a>Report</div>

                {{-- <div class="card-body"> --}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Company</th>
                                <th>Balance</th>
                                <th>type</th>
                            </tr>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    @if ($item->balance < 0 )
                                        <td>{{-1 * $item->balance}}</td>
                                        <td class="text-danger">Payable</td>    
                                    @else 
                                        <td>{{$item->balance}}</td>
                                        <td class="text-success">Recieveable</td>      
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
