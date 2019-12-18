$(document).ready(() => {
    $('#tbl').DataTable(
        {paging: true, pageLength: 10}
    );

    // this event triggers whenever we have switched to a new page (i.e. table page one, table page two)
    $('#tbl').on('draw.dt', function(){
        formatNumbers();
    });

    $('#upload').submit(function(event){
        event.preventDefault();
    });

    $('#calculator').submit(function(event){
        event.preventDefault();
    });

    formatNumbers();

});

function formatNumbers(){
    function formatByClass(css, currency){
        // set the text of elements with the seelected class to be the formatted number of whatever we set
        Array.from(document.getElementsByClassName(css)).forEach(element => {
            let formatted = element.innerHTML;
            if (!isNaN(Number(element.innerHTML))){
                formatted = new Intl.NumberFormat('en-GB', { style: 'currency', currency: currency }).format(Number(element.innerHTML)); 
            }
            element.innerHTML = formatted;
        });
    }

    formatByClass('formatted-GBP', 'GBP');
    formatByClass('formatted-USD', 'USD');
}


function updatePicture(url){
    document.getElementById('employeeImg').setAttribute('src', url);
}

function updateTax(data){
    let salary, takeHomePay, monthly, taxed;
    salary = new Intl.NumberFormat('en-GB', { style: 'currency', currency: data[0].currency }).format(Number(data[0].salary));
    if (data[0].currency === 'GBP'){
        takeHomePay = new Intl.NumberFormat('en-GB', { style: 'currency', currency: data[0].currency }).format(Number(data[0].takeHomePay));
        monthly = new Intl.NumberFormat('en-GB', { style: 'currency', currency: data[0].currency }).format(Number(data[0].monthly));
        taxed = new Intl.NumberFormat('en-GB', { style: 'currency', currency: data[0].currency }).format(Number(data[0].taxed));
    } else {
        const foreign = 'foreign currency';
        takeHomePay = foreign;
        monthly = foreign;
        taxed = foreign;
    }
    document.getElementById('salaryNew').setAttribute('value', salary);
    document.getElementById('takeHomePayNew').setAttribute('value', takeHomePay);
    document.getElementById('monthlyNew').setAttribute('value', monthly);
    document.getElementById('taxedNew').setAttribute('value', taxed);
}

function recalculateTax(){
    const data = $('#calculator').serializeArray();
    const formData = new FormData(document.getElementById('calculator'));
    $.ajax({
        type: 'POST',
        url: '../ajaxHandler.php',
        processData: false,
        contentType: false,
        dataType: 'json',
        data: formData,
        success: function(data){
            updateTax(data);
        }
    });
}

function uploadImage(){
    const formData = new FormData();
    formData.append('file', $('#profileUpload').prop('files')[0]);
    formData.append('id', document.getElementById('employeeID').getAttribute('value'));
    $.ajax({
        type: 'POST',
        url: '../imageupload.php',
        processData: false,
        contentType: false,
        dataType: 'json',
        data: formData,
        success: function(data){
            updatePicture(data[0]);
        }
    });
}

