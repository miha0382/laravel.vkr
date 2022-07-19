<div class="container">
<div class="row p-3">

    <div class="col-md-8">
               
        <div class="card my-3 px-1 shadow-sm">
            <div class="card-body">
            <form action="" method="" id="selects" name="selects">
                @csrf
                <label for="numberInput" class="form-label">Государственный номер</label>
                <input type="text" class="form-control mb-3" placeholder="Введите гос. номер" name="plateNumber" id="numberInput" onchange="calculate()">
            </form>
            <button type="button" class="btn btn-primary form-control" onclick="createSelect()">Добавить услугу</button>
            </div>
        </div>
        
    </div>
    
    <div class="col-md-4">
        
        <div class="card mt-3 mb-2 px-1 shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col md-6">
                        <p><h4><b>Итого </b></h4></p>
                        <p class="text-muted" id="">Стоимость </p>
                        <p class="text-muted">Скидка </p>
                    </div>
                    <div class="col md-6 text-end">
                        <p><h4><b id="finalPriceOutput">0.00 руб.</b></h4></p>
                        <p class="text-muted" id="priceOutput">0.00 руб.</p>
                        <p class="text-muted" id="discount">0.00 руб.</p>
                    </div>
                </div>
                
                <!--<button type="button" class="btn btn-primary form-control" onclick="calculate()">Рассчитать</button> -->
            </div>   
        </div>
        <button type="button" class="btn btn-primary form-control" onclick="saveTransaction()">Сохранить транзакцию</button>
    </div>
</div>
</div>