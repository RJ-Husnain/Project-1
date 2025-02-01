<?php
    include'_dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['expense']) && isset($_POST['eAmount']) ) {
        $expense = $_POST['expense'];
        $expenseAmount= $_POST["eAmount"];
    }else{
        $expense = "";
        $expenseAmount= "";
    }
    $expenseSql = "INSERT INTO `expense` (`catagory`, `amount`) VALUES ('$expense', '$expenseAmount')";
    $expenseResult = mysqli_query($conn, $expenseSql);   
    if (!$expenseResult) {
        echo "Record was not inserted Successfully due to ". mysqli_error($expenseResult);
    }
    if (isset($_POST['income']) && isset($_POST['iAmount'])) {
        $income = $_POST['income'];
        $incomeAmount = $_POST['iAmount'];
    }else{
        $income = "";
        $incomeAmount = ""; 
    }
    $incomeSql = "INSERT INTO `income` (`catagory`, `amount`) VALUES ('$income', '$incomeAmount')";
    $incomeResult = mysqli_query($conn, $incomeSql);   
    if (!$incomeResult) {
        echo "Record was not inserted Successfully due to ". mysqli_error($incomeResult);
    }
}
$sql_expense_data = "SELECT * FROM `expense`";
$result_expense_data = mysqli_query($conn, $sql_expense_data);
$sql_income_data = "SELECT * FROM `income`";
$result_income_data = mysqli_query($conn, $sql_income_data);
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
                <div>
                    <p>Enter Amount</p>
                    <input type="number" name="eAmount" id="expensepopupAmount">
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
                <div>
                    <p>Enter Amount</p>
                    <input type="number" name="iAmount" id="resourcepopupAmount">
                </div>
                <div class="btn">
                    <button id="Radd">ADD Income</button>
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
                        <!-- <li>
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
                        </li> -->
                        <li>
                            <?php
                            if(mysqli_num_rows($result_expense_data) > 0) {
                              while ($row = mysqli_fetch_assoc($result_expense_data)) {
                                echo '<p>' . $row['catagory']. '</p>';
                              }
                            }
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
                        <!-- <li>
                            <p>Salary</p>
                        </li>
                        <li>
                            <p>Buisness Profit</p>
                        </li> -->
                        <li>
                            <?php
                            if(mysqli_num_rows($result_income_data) > 0) {
                              while ($row = mysqli_fetch_assoc($result_income_data)) {
                                echo '<p>' . $row['catagory']. '</p>';
                              }
                            }
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
                    <div class= "expenseLine">
                        <ul>
                            <li class="line">
                            <?php
                            if(mysqli_num_rows($result_expense_data) > 0) {
                              while ($row = mysqli_fetch_assoc($result_expense_data)) {
                                echo '<p>' . $row['catagory']. '</p>';
                                // echo '<div>' . $row['amount']. '</div>';
                              }
                            }
                         ?>
                            </li>
                           <!-- <li class="line">
                                <div>Food Expense</div>
                                <div>2000</div>
                            </li> -->
                            <!-- <li class="line">
                                <div>Food Expense</div>
                                <div>2000</div>
                            </li>
                            <li class="line">
                                <div>Rent Expense</div>
                                <div>4500</div>
                            </li>
                            <li class="line">
                                <div>Transport Expense</div>
                                <div>5000</div>
                            </li>
                            <li class="line">
                                <div>Health Expense</div>
                                <div>4500</div>
                            </li>
                            <li class="line">
                                <div>Electricity Expense</div>
                                <div>4500</div>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="incomeBox boxActualpage">
                    <div class="heading">
                        <p> Income</p>
                    </div>
                    <div>
                        <ul>
                            <!-- <li class="line">
                                <div>Salary</div>
                                <div>2000</div>
                            </li>
                            <li class="line">
                                <div>Buisness Profit</div>
                                <div>4500</div>
                            </li>
                            <li class="line">
                                <div>Others</div>
                                <div>5000</div>
                            </li> -->
                            <li class="line">
                            <?php
                            if(mysqli_num_rows($result_income_data) > 0) {
                              while ($row = mysqli_fetch_assoc($result_income_data)) {
                                echo '<div>' . $row['catagory']. '</div>';
                                echo '<div>' . $row['amount']. '</div>';
                              }
                            }
                         ?>
                            </li> 
                        </ul>
                    </div>
                </div>
                <div class="balanceBox boxActualpage">
                    <div class="heading">
                        <p> Balance</p>
                    </div>
                    <div>
                        <ul>
                            <li class="line">
                                <div>Food Expense</div>
                                <div>2000</div>
                            </li>
                            <li class="line">
                                <div>Electricity Expense</div>
                                <div>4500</div>
                            </li>
                            <li class="line">
                                <div>Rent Expense</div>
                                <div>5000</div>
                            </li>
                            <li class="line">
                                <div>Food Expense</div>
                                <div>4500</div>
                            </li>
                            <li class="line">
                                <div>Transport Expense</div>
                                <div>4500</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="quickAccess">
                <div class="heading">
                    <p>Quick Access</p>
                </div>
                <div class="btnbar">
                    <button>Add Expense</button>
                    <button>Add Income</button>
                    <button>Create Report</button>
                </div>
            </div>
            <div class="graphBox">
                <div class="heading">
                    <p>Graphs Monitoring</p>
                </div>
                <div class="graphbar">
                    <div class="expense">
                        <div class="chart-container">
                            <div class="title">
                                <p>Expense Graph</p>
                            </div>
                            <div class="chart">
                                <div class="y-axis-labels">
                                    <span>6k</span>
                                    <span>4k</span>
                                    <span>2k</span>
                                    <span>0</span>
                                </div>
                                <div class="bar">
                                    <div class="bar-inner" style="height: 120px;"></div>
                                    <div class="bar-label">Jan</div>
                                </div>
                                <div class="bar white-bar">
                                    <div class="bar-inner" style="height: 50px;"></div>
                                    <div class="bar-label">Feb</div>
                                </div>
                                <div class="bar">
                                    <div class="bar-inner" style="height: 160px;"></div>
                                    <div class="bar-label">Mar</div>
                                </div>
                                <div class="bar white-bar">
                                    <div class="bar-inner" style="height: 70px;"></div>
                                    <div class="bar-label">Apr</div>
                                </div>
                                <div class="bar">
                                    <div class="bar-inner" style="height: 140px;"></div>
                                    <div class="bar-label">May</div>
                                </div>
                                <div class="bar white-bar">
                                    <div class="bar-inner" style="height: 70px;"></div>
                                    <div class="bar-label">Jun</div>
                                </div>
                                <div class="bar">
                                    <div class="bar-inner" style="height: 90px;"></div>
                                    <div class="bar-label">July</div>
                                </div>
                                <div class="bar white-bar">
                                    <div class="bar-inner" style="height: 60px;"></div>
                                    <div class="bar-label">Aug</div>
                                </div>
                                <div class="bar">
                                    <div class="bar-inner" style="height: 120px;"></div>
                                    <div class="bar-label">Sep</div>
                                </div>
                                <div class="bar white-bar">
                                    <div class="bar-inner" style="height: 90px;"></div>
                                    <div class="bar-label">Oct</div>
                                </div>
                                <div class="bar">
                                    <div class="bar-inner" style="height: 40px;"></div>
                                    <div class="bar-label">Nov</div>
                                </div>
                                <div class="bar white-bar">
                                    <div class="bar-inner" style="height: 160px;"></div>
                                    <div class="bar-label">Dec</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="income">
                        <div class="chart-container">
                            <div class="title">
                                <p>Income Graph</p>
                            </div>
                            <div class="chart">
                                <div class="y-axis-labels">
                                    <span>6k</span>
                                    <span>4k</span>
                                    <span>2k</span>
                                    <span>0</span>
                                </div>
                                <div class="bar">
                                    <div class="bar-inner" style="height: 120px;"></div>
                                    <div class="bar-label">Jan</div>
                                </div>
                                <div class="bar white-bar">
                                    <div class="bar-inner" style="height: 50px;"></div>
                                    <div class="bar-label">Feb</div>
                                </div>
                                <div class="bar">
                                    <div class="bar-inner" style="height: 160px;"></div>
                                    <div class="bar-label">Mar</div>
                                </div>
                                <div class="bar white-bar">
                                    <div class="bar-inner" style="height: 70px;"></div>
                                    <div class="bar-label">Apr</div>
                                </div>
                                <div class="bar">
                                    <div class="bar-inner" style="height: 140px;"></div>
                                    <div class="bar-label">May</div>
                                </div>
                                <div class="bar white-bar">
                                    <div class="bar-inner" style="height: 70px;"></div>
                                    <div class="bar-label">Jun</div>
                                </div>
                                <div class="bar">
                                    <div class="bar-inner" style="height: 90px;"></div>
                                    <div class="bar-label">July</div>
                                </div>
                                <div class="bar white-bar">
                                    <div class="bar-inner" style="height: 60px;"></div>
                                    <div class="bar-label">Aug</div>
                                </div>
                                <div class="bar">
                                    <div class="bar-inner" style="height: 120px;"></div>
                                    <div class="bar-label">Sep</div>
                                </div>
                                <div class="bar white-bar">
                                    <div class="bar-inner" style="height: 90px;"></div>
                                    <div class="bar-label">Oct</div>
                                </div>
                                <div class="bar">
                                    <div class="bar-inner" style="height: 40px;"></div>
                                    <div class="bar-label">Nov</div>
                                </div>
                                <div class="bar white-bar">
                                    <div class="bar-inner" style="height: 160px;"></div>
                                    <div class="bar-label">Dec</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="welcome.js"></script>
</body>

</html>