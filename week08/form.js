
window.onload = () =>
document.querySelectorAll(".item").forEach(input=>input.addEventListener("change",formValidation));

function formValidation() {

    let first_name = document.getElementById("first_name").value;
    let last_name = document.getElementById("last_name").value;
    let address = document.getElementById("address").value;
    let phone = document.getElementById("phone").value;

    // click checkbox
    // let item_0 = document.getElementById("item_0").value;
    // let item_1 = document.getElementById("item_1").value;
    // let item_2 = document.getElementById("item_2").value;
    // let item_3 = document.getElementById("item_3").value;
    let card = document.getElementById("card").value;
    let credit_card = document.getElementById("credit_card").value;
    let exp_date = document.getElementById("exp_date").value;

    // when checkbox is clicked
    let total = 0;
    document.querySelectorAll(".item").forEach(input=>total += (input.checked? Number.parseFloat(input.getAttribute("data-price")):0));
    document.getElementById("total").value = total;

    document.getElementById("output").innerHTML = "Customer information" + first_name + last_name +
                                                    address + phone + total + card + credit_card + exp_date;
}