@extends('layouts.main')

@section('title')Клиенты@endsection

@section('content')

<div class="container">
    <div class="card shadow-sm my-4">
        <div class="card-body">
        @include('includes.customers-table')
        </div>
    </div>
</div>
@endsection