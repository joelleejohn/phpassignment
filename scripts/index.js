$(document).ready(() => {
    $('#tbl').DataTable(
        {paging: true, pageLength: 10}
    );

    $('#upload').submit(function(){
        $.ajax({
            type: 'POST',
            url: '../imageupload.php',
            data: { userid: window.location, img: $('#profileUpload').val()}
        });
        return;
    });
});

