const numsub = document.getElementById("numtick");
const numTik = document.getElementById("numberoftickets");
const cust = document.getElementById("cust");
const input = (doc) => doc.value;
let numberResponse;

function iterateTargets(selector, fn, data) {
    var items = document.querySelectorAll(selector);
    for (var i = 0; i < items.length; i++) {
        fn(items[i], data);
    }
}


iterateTargets("#cust", function(item, data){
    item.innerText = data;
});

numsub.addEventListener("click", (event) => {
    const req = new XMLHttpRequest();
    const number = input(numTik);
    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            event.target.dispatchEvent(new CustomEvent("loadFields", {bubbles: true, detail: { data: req.response }}));
        }
    };
    req.open("POST", "submit.php", true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send(`data=${number}`);
});

