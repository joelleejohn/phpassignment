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
    const formattedNumber = new Intl.NumberFormat('en-GB', { style: 'currency', currency: 'GBP' }).format(Number(data[0].takeHomePay));
    document.getElementById('salary').setAttribute('value', formattedNumber);
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

