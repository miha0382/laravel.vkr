<div class="container">          
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Наименование</th>
            <th scope="col">Стоимость (руб.)</th>
            <th scope="col">Добавлена</th>
            <th scope="col">Последнее изменение</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
        <tr>
            <th scope="row">{{ $service->id }}</th>
            <td>{{ $service->name }}</td>
            <td class="text-center">{{ number_format($service->price, 2, '.', ' ') }}</td>
            <td>{{ $service->created_at }}</td>
            <td>{{ $service->updated_at }}</td>
            
            <td class="text-end">
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdropUpdate{{ $service->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                </button>

                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdropDelete{{ $service->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </button>
            </td>

            <div class="modal fade" id="staticBackdropUpdate{{ $service->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel1">Редактирование записи</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('update-service', $service->id) }}" method="POST">
                        @csrf
                            <div class="modal-body">
                                <label for="changeNameInput" class="form-label">Наименование:</label>
                                <input type="text" class="form-control" name="name" id="changeNameInput" value="{{ $service->name }}">
                                <br>
                                <label for="changePriceInput" class="form-label">Стоимость:</label>
                                <input type="number" step="0.01" class="form-control" name="price" id="changePriceInput" value="{{ $service->price }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>                    
                    </div>
                </div>
            </div>

            <div class="modal fade" id="staticBackdropDelete{{ $service->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel2">Удаление записи</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <p>Вы действительно хотите удалить запись {{ $service->id }}?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <a href="{{ route('delete-service', $service->id) }}"><button type="button" class="btn btn-danger">Удалить</button></a>
                    </div>
                    </div>
                </div>
            </div>
            
            <!-- <td><a href="#"><button class="btn btn-danger">X</button></a></td> -->
        </tr>
        @endforeach
        </tbody>
    </table>
 
    @include('includes.messages')

    <form action="{{ route('add-service') }}" method="POST">
        @csrf
        <div class="input-group">
            <span class="input-group-text">Добавление услуги</span>
            <input type="text" aria-label="" class="form-control" placeholder="Наименование" name="name">
            <input type="number" step="0.01" aria-label="" class="form-control" placeholder="Стоимость" name="price">
            <button class="btn btn-dark" type="submit" id="button-addon2">Добавить</button>
        </div>   
    </form>                  
</div>