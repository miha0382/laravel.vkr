function test(){
    console.log('Success!');
}

let countOfSelects = 0;
let curSelectNameId = 0;
let maxLimit = 10;

function deleteSelect(select){
    if(countOfSelects > 1){
        let contDiv = select.parentNode;
        contDiv.parentNode.removeChild(contDiv);
        countOfSelects--;
        calculate();
    }
}

function createSelect(){

    let request = new XMLHttpRequest();

    request.open('GET', '/get-services');
    request.send();

    request.onreadystatechange = function () {
        if(request.readyState == 4 && request.status == 200){
            let response = request.response;
            let html = toSelectHtml(JSON.parse(response));
            //console.log(response);
            document.getElementById('selects').innerHTML += html;
        }
    }
}

function toSelectHtml(obj){

    countOfSelects++;
    curSelectNameId++;

    let htmlText = '<div class="input-group shadow-sm my-3">';
    htmlText += '<select name="select' + curSelectNameId + '" class="form-select" onchange="calculate()">';
    htmlText += '<option value=0>Выберите услугу</option>';
    for(elem of obj){
        let id = elem['id'];
        let name = elem['name'];
        htmlText += '<option value=' + id + '>' + name + '</option>';
    }
    htmlText += '</select><button class="btn btn-outline-secondary" type="button" onclick="deleteSelect(this)">Удалить</button></div>';

    return htmlText;
}

function calculate(){

    let formData = new FormData(document.forms.selects);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/calculate');
    xhr.send(formData);

    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200){
            let response = xhr.response;
            console.log(response);
            response = JSON.parse(response);
            if(Object.keys(response)[0] == 'error'){
                alert(response['error']);
                return;
            }
            document.getElementById('finalPriceOutput').innerHTML = response['finalPrice'] + ' руб.';
            document.getElementById('priceOutput').innerHTML = response['sum'] + ' руб.';
            document.getElementById('discount').innerHTML = response['discount'] + ' руб.';
        }
    }
}

function active(obj){
    if(obj.id == 'switchMax'){
        let input = document.getElementById('maxDiscount');
        input.disabled = obj.checked ? false : true;
    }
    if(obj.id == 'switchCur'){
        let input = document.getElementById('curDiscount');
        input.disabled = obj.checked ? false : true;  
    }
    if(obj.id == 'switchSpec'){
        let input = document.getElementById('specialDiscount');
        input.disabled = obj.checked ? false : true;  
    }
    if(obj.id == 'switchFree'){
        let input = document.getElementById('freeService');
        input.disabled = obj.checked ? false : true;
    }
}

function maxDisc(obj){
    let curDiscount = document.getElementById('curDiscount');
    curDiscount.max = obj.value;
    //alert(obj.value);
}

function saveTransaction(){

    let formData = new FormData(document.forms.selects);
    //let plateNumber = document.getElementById('numberInput').value;
    let finalPrice = document.getElementById('finalPriceOutput').innerHTML;
    let price = document.getElementById('priceOutput').innerHTML;
    let discount = document.getElementById('discount').innerHTML;

    //formData.append('plateNumber', plateNumber);
    formData.append('finalPrice', finalPrice);
    formData.append('price', price);
    formData.append('discount', discount);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/save-transaction');
    xhr.send(formData);

    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200){

            let response = xhr.response;

            if(response == 'Error') alert('Данные не корректны!');
            if(response == 'Success') alert('Транзакция сохранена!');
            console.log(response);

        
        }
    }
}

