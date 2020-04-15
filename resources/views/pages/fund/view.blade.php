@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/dash" role="button">Dashboard / </a>fundings<a href="/fund/create" class="btn btn-success btn-sm float-right">+ Fund</a></div>
                
                {{-- <div class="card-body"> --}}
                    @if (count($funds) > 0)
                        
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
                    @else
                        <h3>No data Found !!</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>                    
    
@endsection