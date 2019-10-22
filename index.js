function iterateTargets(selector, fn, data) {
    var items = document.querySelectorAll(selector);
    for (var i = 0; i < items.length; i++) {
        fn(items[i], data);
    }
}

function render(){
    const send = {numberoftickets: $("#numberoftickets").val()};
    $.post("ajaxHandler.php", send, function(data) {
        renderFormFields(data);
    }, "json");
}

function renderFormFields(data){
    data.forEach(element => {
        console.log(element);
        $("#cust").append(element);
    });
}
