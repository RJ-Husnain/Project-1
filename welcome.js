// For Show and Hide Popup box
quickExpense.addEventListener("click", () => {
    document.querySelector("#Epopup").style.display = "flex";
})
quickIncome.addEventListener("click", () => {
    document.querySelector("#Rpopup").style.display = "flex";
})
document.querySelector("#E_add").addEventListener("click", () => {
    document.querySelector("#Epopup").style.display = "flex";
})
document.querySelector("#R_add").addEventListener("click", () => {
    document.querySelector("#Rpopup").style.display = "flex";
})
document.querySelector("#Eclose").addEventListener("click", () => {
    document.querySelector("#Epopup").style.display = "none";
})
document.querySelector("#Rclose").addEventListener("click", () => {
    document.querySelector("#Rpopup").style.display = "none";
})



// For Adding new field from Popup to List
let expenseButton = document.getElementById('Eadd');
let expenseInput = document.getElementById('expensepopup');
let expenseInputAmount = document.getElementById('expensepopupAmount');
let incomeButton = document.getElementById('Radd');
let incomeInput = document.querySelector('#resourcepopup');
let incomeInputAmount = document.querySelector('#resourcepopupAmount');

expenseButton.addEventListener('click', () => {
    let expenseName = expenseInput.value;
    let expenseNameAmount = expenseInputAmount.value;

    document.querySelector(".Elist ul").innerHTML += `<li>
            <p>${expenseName}</p>
        </li>`;


    document.querySelector("#Epopup").style.display = "none";
    // expenseInput.value="";


});

incomeButton.addEventListener('click', () => {
    let incomeName = incomeInput.value;
    let incomeNameAmount = incomeInputAmount.income
    document.querySelector(".Rlist ul").innerHTML += `<li>
            <p>${incomeName}</p>
            </li>`;
    document.querySelector("#Rpopup").style.display = "none";
});

// Hamburger Side bar
hamburger.addEventListener('click', () => {
    const sidebar = document.querySelector(".sidebar");
        sidebar.style.left = "0px";
})
sideCross.addEventListener('click', () => {
    const sidebar = document.querySelector(".sidebar");
        sidebar.style.left = "-700px";
})

