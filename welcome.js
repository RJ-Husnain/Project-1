// For Show and Hide Popup box
document.querySelector("#E_add").addEventListener("click", ()=>{
    document.querySelector("#Epopup").style.display= "flex";
    // document.querySelector(".chart_container").style.index = "-1";
})
document.querySelector("#R_add").addEventListener("click", ()=>{
    document.querySelector("#Rpopup").style.display= "flex";
})
document.querySelector("#Eclose").addEventListener("click", ()=>{
    document.querySelector("#Epopup").style.display= "none";
})
document.querySelector("#Rclose").addEventListener("click", ()=>{
  document.querySelector("#Rpopup").style.display= "none";
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
//   document.querySelector(".expenseLine ul").innerHTML += `<li class="line">
//             <div>${expenseName}</div>
//             <div>${expenseNameAmount}</div>
//         </li>`;
       
    document.querySelector("#Epopup").style.display= "none";
    // expenseInput.value="";
    
    
});

resourceButton.addEventListener('click', () => {
    let incomeName = incomeInput.value;
    let incomeNameAmount = incomeInputAmount.income
    document.querySelector(".Rlist ul").innerHTML += `<li>
            <p>${incomeName}</p>
            </li>`;

        //     document.querySelector(".incomeLine ul").innerHTML += `<li class="line">
        //     <div>${incomeName}</div>
        //     <div>${incomeNameAmount}</div>
        // </li>`;
            document.querySelector("#Rpopup").style.display= "none";
            // resourceInput.value="";
    });
          

          