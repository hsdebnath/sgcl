@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- <div class="card"> --}}
                <div class="card-header"><a href="/dash" role="button">Dashboard / </a>Expanse<a href="/expanse/create" class="btn btn-success btn-sm float-right">+ Expanse</a></div>

                {{-- <div class="card-body"> --}}
                    @if (count($expanses) > 0)
                        
                    <table class="table table-striped">
                        <tr>
                            <th>Date</th>
                            <th>Purpose</th>
                            <th>Amount</th>
                        </tr>
                        @foreach ($expanses as $expanse)
                            <tr data-toggle="collapse" data-target="#col{{$expanse->id}}">  
                            <td>{{$expanse->created_at}}</td>
                            <td>{{$expanse->type}}</td>
                            <td>{{$expanse->amount}}</td>
                            </tr>
                            <tr id="col{{$expanse->id}}" class="collapse out">
                                <td colspan="3">
                                    <p>{{$expanse->amount}} as {{$expanse->type}} <br>
                                        @if ($expanse->user_id) {{$expanse->user->name}}<br> @endif  
                                        [{{$expanse->note}}] <br>
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