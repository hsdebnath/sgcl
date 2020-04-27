@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Transactions</strong> <a href="/account/create" class="btn btn-success btn-sm float-right">Add New</a></div>

                <div class="container">
                    <div class="row justify-content-center">
                    <div class="col-md-12">
                        
                        <div class="form-row align-items-center">
                            
                            <div class="col-md-2 col-sm-2 my-1">
                                <h5>Select Data Range : </h5>
                            </div>

                            {!! Form::open(['action' => 'AccountsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                <div class="col-md-3 col-sm-3 my-1">
                                    {{Form::hidden('range', '15')}}
                                    {{Form::submit('15 days', ['class'=>'btn btn-primary'])}}
                                </div>
                            {!! Form::close() !!} 

                            {!! Form::open(['action' => 'AccountsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                <div class="col-md-3 col-sm-3 my-1">
                                    {{Form::hidden('range', '30')}}
                                    {{Form::submit('30 days', ['class'=>'btn btn-primary'])}}
                                </div>
                            {!! Form::close() !!} 
                            
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".mod-range">selecr date range</a>   
                            {{-- Edit status Modal start--}}
                            <div class="modal fade mod-range" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3>selecr date range</h3>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['action' => 'AccountsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="form align-items-center">
                                                <div class="col-sm-auto my-1">
                                                    <label for="exampleInputEmail1">Start Date</label>
                                                    {{Form::date('start', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'required'])}}
                                                </div>
                                                <div class="col-sm-auto my-1">
                                                    <label for="exampleInputEmail1">End Date</label>
                                                    {{Form::date('end', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'required'])}}
                                                </div>
                                                <div class="col-auto my-1">
                                                    {{Form::submit('Submit', ['class'=>'btn btn-primary btn-block'])}}
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>    
                                    </div>
                                </div>
                            </div>
                            {{-- Edit status Modal End--}}
                        </div>
                    </div>
                    </div>
                </div>
                <br>
                
                @php $debit = $credit = $balance = 0; @endphp 
                @if (count($accounts) > 0)
                    
                    @if ($agent->isMobile()) {{--  for mobile view --}}
                        
                        <table class="table table-striped">
                            <colgroup>
                                <col></col>
                                <col class="alert-success"></col>
                                <col class="alert-danger"></col>
                                <col class="alert-info"></col>
                            </colgroup>
                            <tr>
                                <th>Date</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Balance</th>
                            </tr>   
                            @foreach ($accounts as $account)
                                @if ($account->company_id == Auth::user()->company_id)
                                    <tr data-toggle="collapse" data-target="#col{{$account->id}}">   
                                        <td>{{$account->created_at->format('j M, y')}}</td>
                                        <td>{{$account->debit}}</td>
                                        <td>{{$account->credit}}</td>
                                        <td>{{$account->balance}}</td>
                                        @php $debit += $account->debit;  $credit += $account->credit; $balance = $account->balance; @endphp
                                    </tr>
                                    <tr id="col{{$account->id}}" class="collapse out">
                                        <td colspan="4">
                                            <p>{{$account->company->name}} [{{$account->created_at->format('j M, y')}}] <br>
                                                NOTE: {{$account->note}}
                                            </p>
                                        </td>
                                    </tr>
                                
                                @endif
                            @endforeach
                            <tfoot>
                                <th>Total →</th>
                                <th> @php echo $debit; @endphp</th>
                                <th> @php echo $credit; @endphp</th>
                                <th> </th>
                            </tfoot>
                        </table>

                    @else  {{--  for pc view --}}

                    <div class="card-body">    
                                           
                     @foreach ($company as $comp)
                     @php $debit = $credit = $balance = 0; @endphp 
                   <div id="row{{$comp->id}}">   
                    <legend>Accounts of {{$comp->name}}</legend>
                    <table class="table table-striped" id="{{$comp->id}}">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Balance</th>
                            <th>Note</th>
                        </tr>
                        </thead>
                        <tbody>   
                        @foreach ($accounts as $account)
                        @if ($comp->id == $account->company_id)
                        <tr>   
                            <td>{{$account->created_at->format('j M, y')}}</td>
                            <td>@money($account->debit)</td>
                            <td>@money($account->credit)</td>
                            <td>@money($account->balance)</td>
                            <td>{{$account->note}}</td>

                            @php $debit += $account->debit;  $credit += $account->credit; $balance = $account->balance; @endphp

                        </tr>
                        @endif
                        @endforeach
                        <tfoot>
                            <th></th>
                            <th> @money($debit)</th>
                            <th> @money($credit)</th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </tbody>
                    </table>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#'+{{$comp->id}}).DataTable( {
                                dom: 'Bfrtip',
                                buttons: [
                                    'excel', 'pdf', 'print'
                                ]
                            } );
                        } );
                    </script>
                    <br> <br>
                </div>    
                @endforeach    
                    </div>
                    @endif
                @else
                     <h3>No Items Found !!</h3>                    
                @endif

                </div>
            </div>
            
        </div>
    </div>
</div>                    
    
{{-- <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        } );
    } );
</script> --}}
@endsection