@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/home" role="button">Home / </a>Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-3">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Orders</h5>
                              <p class="card-text">With supporting text below as a natural lead-in.</p>
                              <a href="orders" class="btn btn-primary">Go →</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Salses</h5>
                              <p class="card-text">With supporting text below as a natural lead-in.</p>
                              <a href="sales" class="btn btn-primary">Go →</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">Purchase</h5>
                                <p class="card-text">With supporting text below as a natural lead-in.</p>
                                <a href="purchase" class="btn btn-primary">Go →</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Company</h5>
                              <p class="card-text">With supporting text below as a natural lead-in.</p>
                              <a href="company" class="btn btn-primary">Go →</a>
                            </div>
                          </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">inventory</h5>
                              <p class="card-text">With supporting text below as a natural lead-in.</p>
                              <a href="/inventory" class="btn btn-primary">Go →</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Itmes</h5>
                              <p class="card-text">With supporting text below as a natural lead-in.</p>
                              <a href="items" class="btn btn-primary">Go →</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">users</h5>
                                <p class="card-text">With supporting text below as a natural lead-in.</p>
                                <a href="users" class="btn btn-primary">Go →</a>
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
