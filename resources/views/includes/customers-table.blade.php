@if(count($customers))
<div class="container p-3">
    <form action="{{ route('search') }}" method="get">
        
        <div class="input-group mb-4">
            <span class="input-group-text">Поиск по номеру</span>
            <input type="text" class="form-control" name="number" placeholder="Введите номер или его часть для поиска"> 
            <button type="submit" class="btn btn-dark" style="width: 145px;">Найти</button>
        </div>       
    </form>
    <hr>
    
   <table class="table table-striped table-hover">
       <thead>
           <tr>
               <th scope="col" class="hover-th">ID
                   <div class="btn-group-vertical">
                   <a href="{{ route('sort-by-asc', 'id') }}" class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                        <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                        </svg>
                   </a>
                   <a href="{{ route('sort-by-desc', 'id') }}" class="btn none-display">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                       <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                       </svg>
                   </a>
                   </div>
               </th>
               <th scope="col" class="hover-th">Государственный номер
                   <div class="btn-group-vertical">
                   <a href="{{ route('sort-by-asc', 'plateNumber') }}" class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                        <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                        </svg>
                   </a>
                   <a href="{{ route('sort-by-desc', 'plateNumber') }}" class="btn none-display">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                       <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                       </svg>
                   </a>
                   </div>
               </th>
               <th scope="col" class="hover-th">Число посещений
                   <div class="btn-group-vertical">
                   <a href="{{ route('sort-by-asc', 'visitCount') }}" class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                        <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                        </svg>
                   </a>
                   <a href="{{ route('sort-by-desc', 'visitCount') }}" class="btn none-display">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                       <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                       </svg>
                   </a>
                   </div>
               </th>
               <th scope="col" class="hover-th">Первое посещение
                   <div class="btn-group-vertical">
                   <a href="{{ route('sort-by-asc', 'created_at') }}" class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                        <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                        </svg>
                   </a>
                   <a href="{{ route('sort-by-desc', 'created_at') }}" class="btn none-display">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                       <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                       </svg>
                   </a>
                   </div>
               </th>
               <th scope="col" class="hover-th">Последнее посещение
                   <div class="btn-group-vertical">
                   <a href="{{ route('sort-by-asc', 'updated_at') }}" class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                        <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                        </svg>
                   </a>
                   <a href="{{ route('sort-by-desc', 'updated_at') }}" class="btn none-display">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                       <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                       </svg>
                   </a>
                   </div>
               </th>
           </tr>
       </thead>

        <script>
            let hiddenElements = document.querySelectorAll('.none-display');
            hiddenElements.style.display = 'block';
        </script>

       <tbody>
           @foreach($customers as $customer)
           <tr>
               <th scope="row">{{ $customer->id }}</th>
               <td>{{ $customer->plateNumber }}</td>
               <td>{{ $customer->visitCount }}</td>
               <td>{{ $customer->created_at }}</td>
               <td>{{ $customer->updated_at }}</td>
               
               <td class="text-end" style="width: 155px;">
                    <a href="{{ route('get-contact', $customer->id) }}" class="btn btn-dark" title="Подробнее">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                    </a>
                    <button type="button" class="btn btn-dark" title="Изменить" data-bs-toggle="modal" data-bs-target="#modalCustomerUpdate{{ $customer->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                    </button>
                    <button type="button" class="btn btn-dark" title="Удалить" data-bs-toggle="modal" data-bs-target="#modalCustomerDelete{{ $customer->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                    </button>
               </td>

               <div class="modal fade" id="modalCustomerUpdate{{ $customer->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel3">Редактирование записи</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('update-customer', $customer->id) }}" method="POST">
                            @csrf
                                <div class="modal-body">
                                    <label for="changePlateNumberInput" class="form-label">Государственный номер:</label>
                                    <input type="text" class="form-control" name="plateNumber" id="changePlateNumberInput" value="{{ $customer->plateNumber }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="modal fade" id="modalCustomerDelete{{ $customer->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel4" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel4">Удаление записи</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body">
                            <p>Вы действительно хотите удалить запись {{ $customer->id }}?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                            <a href="{{ route('delete-customer', $customer->id) }}"><button type="button" class="btn btn-danger">Удалить</button></a>
                        </div>
                        </div>
                    </div>
                </div>
               <!-- <td><a href="#"><button class="btn btn-danger">X</button></a></td> -->
           </tr>
           @endforeach
       </tbody>
   </table>
   {{$customers->appends(['number' => request()->number])->links()}}

   @include('includes.messages')
</div>
@endif
