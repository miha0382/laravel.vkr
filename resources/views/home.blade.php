@extends('layouts.main')

@section('title')Главная страница@endsection

@section('content')
    @guest('web')
    
    @include('includes.login')
    
    @endguest

    @auth('web')
    <!-- <a href="{{ route('logout') }}">Выход</a> -->
    <div class="container my-5">
        <nav class="flex-column flex-sm-row">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="flex-sm-fill text-sm-center text-dark nav-link active" id="nav-clients-tab" data-bs-toggle="tab" data-bs-target="#nav-clients" type="button" role="tab" aria-controls="nav-clients" aria-selected="true"><h4>Клиенты</h4></button>
                <button class="flex-sm-fill text-sm-center text-dark nav-link" id="nav-services-tab" data-bs-toggle="tab" data-bs-target="#nav-services" type="button" role="tab" aria-controls="nav-services" aria-selected="false"><h4>Услуги</h4></button>
                <button class="flex-sm-fill text-sm-center text-dark nav-link" id="nav-options-tab" data-bs-toggle="tab" data-bs-target="#nav-options" type="button" role="tab" aria-controls="nav-options" aria-selected="false"><h4>Программа лояльности</h4></button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-clients" role="tabpanel" aria-labelledby="nav-clients-tab">
                <div class="bg-body border-start border-end border-bottom">                   
                    @include('includes.customers-table')
                </div>
            </div>
            <div class="tab-pane fade" id="nav-services" role="tabpanel" aria-labelledby="nav-services-tab">
                <div class="bg-body border-start border-end border-bottom">
                    <div class="container mb-3">
                        @include('includes.services')
                    </div>
                    
                </div>
            </div>
            <div class="tab-pane fade" id="nav-options" role="tabpanel" aria-labelledby="nav-options-tab">
                <div class="bg-body border-start border-end border-bottom">
                    @include('includes.options')
                </div>
            </div>
        </div>
    </div>
    @endauth
@endsection