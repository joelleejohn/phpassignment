const numOfTickets = () => document.getElementById("numberOfTickets").value;

document.getElementById("numberOfTickets").addEventListener("keyup", () => {
    console.log(numOfTickets());
});