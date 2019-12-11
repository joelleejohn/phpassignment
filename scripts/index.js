$(document).ready(() => {
    $('#tbl').DataTable(
        {paging: true, pageLength: 10}
    );

    $('#upload').submit(function(event){
        event.preventDefault();
    });
});

function updatePicture(url){
    document.getElementById('employeeImg').setAttribute('src', url);
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
            console.log(data);
            updatePicture(data[0]);
        }
    });
}

