@extends('layouts.main')

@section('title')Подробная информация @endsection

@section('content')
<div class="container">
    <a href="{{ route('customers') }}" class="btn btn-primary mt-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
        </svg>
        Назад
    </a>
<div class="card shadow-sm my-3">
    <div class="card-body">
        <h4>Основная информация</h4>
        <table class="table table-striped table-hover table-bordered my-3">
            <tbody>
                <tr><td style="width: 50%;">Государственный номер</td><td>{{ $customer->plateNumber }}</td></tr>
                <tr><td>Количество посещений</td><td>{{ $customer->visitCount }}</td></tr>
                <tr><td>Первое посещение</td><td>{{ $customer->created_at }}</td></tr>
                <tr><td>Последнее посещение</td><td>{{ $customer->updated_at }}</td></tr>       
            </tbody>
        </table>
    </div>
</div>
<div class="card shadow-sm my-3">
    <div class="card-body">
        <h4>Контактная информация</h4>
        @include('includes.messages')
        @if(!isset($contact[0]))
        <p>Контактная информация по данному клиенту отсутствует. Хотите <a class="" data-bs-toggle="collapse" href="#collapseContactForm"> внести</a> данные?</p>
        <div class="collapse" id="collapseContactForm">
            <div class="card card-body shadow-sm">
                <form action="{{ route('add-contact', $customer->id) }}" method="POST" >
                    @csrf
                    
                    <label for="fioInput" class="form-label">ФИО</label>
                    <input type="text" class="form-control mb-2" name="fioInput" id="fioInput" placeholder="Введите ФИО">
                    <label for="phoneNumberInput" class="form-label">Номер телефона</label>
                    <input type="text" class="form-control mb-2" name="phoneNumberInput" id="phoneNumberInput" placeholder="Введите номер телефона">
                    <label for="emailInput" class="form-label">Электронная почта</label>
                    <input type="email" class="form-control mb-2" name="emailInput" id="emailInput" placeholder="Введите электронную почту">
                    <button class="btn btn-primary my-2" type="submit">Сохранить</button>
                </form>                
            </div>
        </div>
        @else
        <table class="table table-striped table-hover table-bordered my-3">
            <tbody>
                <tr><td style="width: 50%;">ФИО</td><td>{{ $contact[0]->fio }}</td></tr>
                <tr><td>Номер телефона</td><td>{{ $contact[0]->phoneNumber }}</td></tr>
                <tr><td>Электронная почта</td><td>{{ $contact[0]->email }}</td></tr>
                <tr><td>Дата добавления</td><td>{{ $contact[0]->created_at }}</td></tr> 
                <tr><td>Дата обновления</td><td>{{ $contact[0]->updated_at }}</td></tr>       
            </tbody>
        </table>
        <div class="text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changeContactModal">Редактировать</button>
            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteContactModal">Удалить</button>
        </div>
        <div class="modal fade" id="changeContactModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel1">Редактирование контактной информации</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('update-contact', $customer->id) }}" method="POST">
                    @csrf
                        <div class="modal-body">
                            <label for="fioInput" class="form-label">ФИО</label>
                            <input type="text" class="form-control mb-2" name="fioInput" id="fioInput" value="{{ $contact[0]->fio }}">
                            <label for="phoneNumberInput" class="form-label">Номер телефона</label>
                            <input type="text" class="form-control mb-2" name="phoneNumberInput" id="phoneNumberInput" value="{{ $contact[0]->phoneNumber }}">
                            <label for="emailInput" class="form-label">Электронная почта</label>
                            <input type="email" class="form-control mb-2" name="emailInput" id="emailInput" value="{{ $contact[0]->email }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteContactModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel4" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel4">Удаление контактной информации</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <p>Вы действительно хотите удалить контактную информацию данного клиента?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <a href="{{ route('delete-contact', $customer->id) }}"><button type="button" class="btn btn-danger">Удалить</button></a>
                </div>
                </div>
            </div>
        </div>
    
        @endif
    </div>
</div>  
<div class="card shadow-sm my-3">
    <div class="card-body">
        <h4>Транзакции</h4>
        @if(isset($data[0]))
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Клиент</th>
                        <th scope="col">Номерной знак</th>
                        <th scope="col">Работник</th>
                        <th scope="col" class="text-end">Сумма</th>
                        <th scope="col" class="text-end">Скидка</th>
                        <th scope="col" class="text-end">Сумма с учетом скидки</th>
                        <th scope="col">Дата проведения</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $elem)
                    <tr>
                        <th scope="row">{{ $elem['id'] }}</td>
                        <td>{{ $elem['customerName'] }}</td>
                        <td>{{ $elem['plateNumber'] }}</td>
                        <td>{{ $elem['worker'] }}</td>
                        <td class="text-end">{{ number_format($elem['sum'], 2, '.', ' ') }}</td>
                        <td class="text-end">{{ number_format($elem['discount'], 2, '.', ' ') }}</td>
                        <td class="text-end">{{ number_format($elem['finalSum'], 2, '.', ' ') }}</td>
                        <td>{{ $elem['date'] }}</td>
                    </tr>
                
                @endforeach
                </tbody>
            </table>
        @else 
            <p>Транзакции по данному клиенту не существуют.</p>
        @endif
    </div>
</div>  
</div>


@endsection