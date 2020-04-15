@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/home" role="button">Home / </a>Dashboard</div>

                {{-- <div class="card-body"> --}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-4">
                          <div class="card">
                            <div class="card-body">
                            <a href="orders" class="btn btn-primary btn-block">Orders</a>
                            <a href="sales" class="btn btn-primary btn-block">Salses</a>
                            <a href="purchase" class="btn btn-primary btn-block">Purchase</a>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="card">
                            <div class="card-body">
                              <a href="/inventory" class="btn btn-primary btn-block">inventory </a>
                              <a href="items" class="btn btn-primary btn-block">Items </a>
                              <a href="users" class="btn btn-primary btn-block">Users </a> 
                              <a href="company" class="btn btn-primary btn-block">Clients </a>                          
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="card">
                            <div class="card-body">
                            <a href="account" class="btn btn-primary btn-block">Transactions </a>
                            <a href="/expanse" class="btn btn-primary btn-block">Expanses </a>
                            <a href="fund" class="btn btn-primary btn-block">Funds</a>
                            </div>
                          </div>
                      </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
