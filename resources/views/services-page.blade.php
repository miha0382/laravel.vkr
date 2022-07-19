@extends('layouts.main')

@section('title') Услуги @endsection

@section('content')
<div class="container">
    <div class="card shadow-sm my-4">
        <div class="card-body">
        @include('includes.services')
        </div>
    </div>
</div>
@endsection