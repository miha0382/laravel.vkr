<div class="container">
    <div class="row">
        <div class="col-md-0">

        </div>
        <div class="col-md-8"> 
            @include('includes.messages')
            <form method="POST" action="{{ route('save-options') }}">
                @csrf
                <div class="card shadow-sm my-3">
                    <div class="card-body">
                        <label for="maxDiscount" class="form-label">Максимальная скидка</label>
                        <div class="input-group">
                            <input type="number" min="0" class="form-control" id="maxDiscount" name="maxDiscount" onchange="maxDisc(this)" disabled placeholder="Установите размер максимальной возможной скидки">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="switchMax" name="switchMax" onchange="active(this)">
                            <label class="form-check-label" for="switchMax">Учитывать максимальный возможный размер скидки</label>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm my-3">
                    <div class="card-body">
                        <label for="curDiscount" class="form-label">Общая скидка</label>
                        <div class="input-group">
                            <input type="number" min="0" class="form-control" id="curDiscount" name="curDiscount" disabled placeholder="Установите размер общей скидки">
                            <span class="input-group-text">%</span>
                        </div>    
                    </div>
                    <div class="card-footer">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="switchCur" name="switchCur" onchange="active(this)">
                            <label class="form-check-label" for="switchCur">Активировать общую скидку</label>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm my-3">
                    <div class="card-body">
                        <label for="specialDiscount" class="form-label">Индивидуальная скидка</label>
                        <div class="input-group">
                            <input type="number" min="0" step="0.1" class="form-control" id="specialDiscount" name="specialDiscount" disabled placeholder="Установите коэффициент индивидуальной скидки">
                            <span class="input-group-text" 
                            title="Коэффициент - это значение, необходимое для расчета индивидуальной скидки. Величина индивидуальной скидки прямопропорциональна коэффициенту и равна произведению числа посещений и данного коэффициента.">
                                ?
                            </span>
                        </div>    
                    </div>
                    <div class="card-footer">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="switchSpec" name="switchSpec" onchange="active(this)">
                            <label class="form-check-label" for="switchSpec">Активировать индивидуальную скидку</label>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm my-3">
                    <div class="card-body">
                        <label for="freeService" class="form-label">Бесплатное обслуживание</label>
                        <div class="input-group">
                            <input type="number" min="0" class="form-control" id="freeService" name="freeService" disabled placeholder="Установите количество посещений, необходимое для бесплатного обслуживания">
                            <span class="input-group-text"
                            title="Например: каждое 10 посещение бесплатно.">
                                ?
                            </span>
                        </div>    
                    </div>
                    <div class="card-footer">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="switchFree" name="switchFree" onchange="active(this)">
                            <label class="form-check-label" for="switchFree">Активировать возможность бесплатного обслуживания</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary my-3">Сохранить настройки</button>
                <a href="{{ route('backup-options') }}"><button type="button" class="btn btn-secondary">Вернуть предыдущие настройки</button></a>
            </form>
            
        </div>
        <div class="col-md-4">
            <div class="card my-3 mx-2">
                <div class="card-header"><b>Текущие настройки</b></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <p>Максимальная скидка</p>
                            <p>Общая скидка</p>
                            <p>Коэф-т индивидуальной скидки</p>
                            <p>Бесплатное обслуживание</p>
                        </div>
                        <div class="col-md-3 text-end">
                            @if($options->isActiveMax)
                                <p>{{ $options->maxDiscount }} %</p>
                            @else
                                <p>Нет</p>
                            @endif
                            @if($options->isActiveCur)
                                <p>{{ $options->curDiscount }} %</p>
                            @else
                                <p>Нет</p>
                            @endif
                            @if($options->isActiveSpec)
                                <p>{{ $options->specDiscount }}</p>
                            @else
                                <p>Нет</p>
                            @endif
                            @if($options->isActiveFree)
                                <p>{{ $options->freeService }}</p>
                            @else
                                <p>Нет</p>
                            @endif
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Обновлено</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <p>{{ $options->created_at }} </p>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>