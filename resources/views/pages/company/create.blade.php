@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/dash" role="button">Dashboard / </a><a href="/company" role="button">Company</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Add New Client Company</h1>
                    {!! Form::open(['action' => 'CompaniesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Company Name')}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Company Name'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('phone', 'Phone')}}
                            {{Form::text('phone', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'phone number'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('address', 'Address')}}
                            {{Form::text('address', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'address'])}}
                        </div>

                        {{Form::submit('Submit', ['class'=>'btn btn-primary btn-block'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>     
@endsection