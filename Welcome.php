<?php
//     include'_dbconnect.php';
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST['expense'])) {
//         $expense = $_POST['expense'];
//     }else{
//         $expense = "";
//     }
//     $expenseSql = "INSERT INTO `expense` (`catagory`) VALUES ('$expense')";
//     $expenseResult = mysqli_query($conn, $expenseSql);   
//     if (!$expenseResult) {
//         echo "Record was not inserted Successfully due to ". mysqli_error($expenseResult);
//     }
//     if (isset($_POST['income'])) {
//         $income = $_POST['income'];
//     }else{
//         $income = "";
//     }
//     $incomeSql = "INSERT INTO `income` (`catagory`) VALUES ('$income')";
//     $incomeResult = mysqli_query($conn, $incomeSql);   
//     if (!$incomeResult) {
//         echo "Record was not inserted Successfully due to ". mysqli_error($incomeResult);
//     }
// }
// $sql_expense_data = "SELECT * FROM `expense`";
// $result_expense_data = mysqli_query($conn, $sql_expense_data);
// $sql_income_data = "SELECT * FROM `income`";
// $result_income_data = mysqli_query($conn, $sql_income_data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="welcomepage.css">
</head>

<body>
    <div id="Epopup">
        <div class="box">
            <div class="cross">
                <img src="cross.svg" alt="" class="close" id="Eclose">
            </div>
            <form action="welcome.php" method="POST">
                <div>
                    <h3>Add New Field</h3>
                </div>
                <div>
                    <p>Enter Expense</p>
                    <input type="text" name="expense" id="expensepopup">
                </div>
                <div class="btn">
                    <button id="Eadd">ADD Expense</button>
                </div>
            </form>
        </div>
    </div>
    <div id="Rpopup">
        <div class="box">
            <div class="cross">
                <img src="cross.svg" alt="" class="close" id="Rclose">
            </div>
            <form action="welcome.php" method="POST">
                <div>
                    <h3>Add New Field</h3>
                </div>
                <div>
                    <p>Enter Income</p>
                    <input type="text" name="income" id="resourcepopup">
                </div>
                <div class="btn">
                    <button id="Radd">ADD Resource</button>
                </div>
            </form>
        </div>
    </div>
    <div class="navbar">

        <div class="navigation">
            <ul>
                <li>
                    <div class="logo">
                        <p><span>E</span>xpensify</p>
                    </div>
                </li>
                <li><a href="#">Home</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
        </div>
        <div class="buttons">
            <button class="profile">
                <img src="profile.svg" alt="">
                <p>Profile</p>
            </button>
            <button class="logout">
                <p>Logout</p>
            </button>
        </div>

    </div>
    <div class="container">
        <div class="sidebar">
            <div class="expense">
                <div class="heading">
                    <h4>Expense Category</h4>
                </div>
                <div class="list Elist">
                    <ul>
                        <li>
                            <p>Food Expensive</p>
                        </li>
                        <li>
                            <p>Rent Expensive</p>
                        </li>
                        <li>
                            <p>Transport Expensive</p>
                        </li>
                        <li>
                            <p>Health Expensive</p>
                        </li>
                        <li>
                            <p>Electricity Expensive</p>
                        </li>
                        <li>
                        <?php
                            // if(mysqli_num_rows($result_expense_data) > 0) {
                            //   while ($row = mysqli_fetch_assoc($result_expense_data)) {
                            //     echo '<p>' . $row['catagory']. '</p>';
                            //   }
                            // }
                         ?>
                        </li>
                    </ul>
                </div>
                <div class="expensebtn">
                    <button>
                        <img src="plus.svg" alt="" id="E_add" class="add">
                    </button>
                </div>
            </div>
            <div class="source">
                <div class="heading">
                    <h4>Income Category</h4>
                </div>
                <div class="list Rlist">
                    <ul>
                        <li>
                            <p>Salary</p>
                        </li>
                        <li>
                            <p>Buisness Profit</p>
                        </li>
                        <li>
                        <?php
                            // if(mysqli_num_rows($result_income_data) > 0) {
                            //   while ($row = mysqli_fetch_assoc($result_income_data)) {
                            //     echo '<p>' . $row['catagory']. '</p>';
                            //   }
                            // }
                         ?>
                        </li>
                    </ul>
                </div>
                <div class="resourcebtn">
                    <button><img src="plus.svg" alt="" id="R_add" class="add"></button>
                </div>
            </div>
        </div>
        <div class="actualPage">
        <div class="containerBox">
            <div class="expenseBox boxActualpage">
                <div class="heading">
                    <p> Expense</p>  
                </div>
                <div>
                    <ul>
                        <li class="line">
                            <div>Food Expense</div>
                            <div>4500</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="incomeBox boxActualpage">
            <div class="heading">
                    <p> Income</p>   
                </div>
            </div>
            <div class="balanceBox boxActualpage">
            <div class="heading">
                    <p> Balance</p>  
                </div>
            </div>
        </div>
        <div class="quickAccess">
            
        </div>
        </div>
    </div>
    <script src="welcome.js"></script>
</body>

</html>