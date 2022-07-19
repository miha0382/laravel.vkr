@extends('layouts.main')

@section('title')
История транзакций
@endsection

@section('content')

<div class="container">
    <div class="card shadow-sm my-4">
        <div class="card-body">
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
        </div>
    </div>
</div>

@endsection