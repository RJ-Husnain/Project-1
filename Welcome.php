<?php
include '_dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        // For Expense Data
        if (isset($_POST['expense']) && isset($_POST['eAmount'])) {
            $expense = $_POST['expense'];
            $expenseAmount = $_POST['eAmount'];
        } else {
            $expense = "";
            $expenseAmount = "";
        }

        if ($expense != "") {
            $expenseSql = "INSERT INTO `expense` (`catagory`, `amount`) VALUES ('$expense', '$expenseAmount')";
            $expenseResult = mysqli_query($conn, $expenseSql);
            if (!$expenseResult) {
                echo "Record was not inserted successfully due to " . mysqli_error($conn);
            }
        }

        // For Income Data
        if (isset($_POST['income']) && isset($_POST['iAmount'])) {
            $income = $_POST['income'];
            $incomeAmount = $_POST['iAmount'];
        } else {
            $income = "";
            $incomeAmount = "";
        }

        if ($income != "") {
            $incomeSql = "INSERT INTO `income` (`catagory`, `amount`) VALUES ('$income', '$incomeAmount')";
            $incomeResult = mysqli_query($conn, $incomeSql);
            if (!$incomeResult) {
                echo "Record was not inserted successfully due to " . mysqli_error($conn);
            }
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

$sql_expense_data = "SELECT * FROM `expense`";
$result_expense_data = mysqli_query($conn, $sql_expense_data);
$sql_expense_dataBox = "SELECT * FROM `expense`";
$result_expense_dataBox = mysqli_query($conn, $sql_expense_dataBox);

$sql_income_data = "SELECT * FROM `income`";
$result_income_data = mysqli_query($conn, $sql_income_data);
$sql_income_dataBox = "SELECT * FROM `income`";
$result_income_dataBox = mysqli_query($conn, $sql_income_dataBox);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="welcome.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>
    <!-- Form -->
<!-- Expense Popup  -->
 <div id="Epopup" class="popup">
    <div class="overlay flex">
        <div class="form-box flex">
            <img src="cross.svg" alt="Close" class="close" id="Eclose">
            <form action="welcome.php" method="POST">
                <h3>Add New Expense</h3>
                <label for="expensepopup">Enter Expense</label>
                <input type="text" name="expense" id="expensepopup" required>

                <label for="expensepopupAmount">Enter Amount</label>
                <input type="number" name="eAmount" id="expensepopupAmount" required>

                <div class="btn">
                    <input type="submit" name="submit" value="Submit" id="Eadd">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Income Popup  -->
<div id="Rpopup" class="popup">
    <div class="overlay flex">
        <div class="form-box flex">
            <img src="cross.svg" alt="Close" class="close" id="Rclose">
            <form action="welcome.php" method="POST">
                <h3>Add New Income</h3>
                <label for="resourcepopup">Enter Income</label>
                <input type="text" name="income" id="resourcepopup" required>

                <label for="resourcepopupAmount">Enter Amount</label>
                <input type="number" name="iAmount" id="resourcepopupAmount" required>

                <div class="btn">
                    <input type="submit" name="submit" value="Submit" id="Radd">
                </div>
            </form>
        </div>
    </div>
</div> 







    <!-- navbar -->
    <div class="navbar flex ">
        <!-- logo -->
        <div class="logo">
            <h2><span>E</span>xpensify</h2>
        </div>
        <!-- Navigation -->
        <div class="navigation">
            <ul class="flex">
                <li>Home</li>
                <li>Catagory</li>
                <li>Services</li>
                <li>About</li>
            </ul>
        </div>
        <!-- Buttons -->
        <div class="buttons flex">
            <button class="loginBtn">Login</button>
            <button class="signupBtn">Signup</button>
        </div>
    </div>
    <!-- boxContainer -->
    <div class="boxContainer flex">
        <!-- sidebar -->
        <div class="sidebar">
            <!-- <img src="cross.svg" alt="Cross" id="sideCross"> -->
            <div class="expenseSidebar">
                <div class="heading">
                    <h4>Expense Catagory</h4>
                </div>
                <div class="list Elist">
                    <ul>
                          <?php
                             if(mysqli_num_rows($result_expense_data) > 0) {
                                   while ($row = mysqli_fetch_assoc($result_expense_data)) {
                                   echo '<li>' . $row['catagory']. '</li>';
                                  }
                                } 
                             ?> 
                         
                      
                    </ul>
                </div>
                <div class="btn">
                    <button>
                        <img src="plus.svg" alt="" id="E_add" class="add">
                    </button>
                </div>
            </div>
            <div class="incomeSidebar">
                <div class="heading">
                    <h4>Income Catagory</h4>
                </div>
                <div class="list Rlist">
                    <ul>

                                  <?php 
                                if(mysqli_num_rows($result_income_data) > 0) {
                                  while ($row = mysqli_fetch_assoc($result_income_data)) {
                                    echo '<li>' . $row['catagory']. '</li>';
                                  }
                                }
                             ?>
                    </ul>
                </div>
                <div class="btn">
                    <button><img src="plus.svg" alt="" id="R_add" class="add"></button>
                </div>
            </div>

        </div>
        <!-- container -->
        <div class="container flex">
            <div class="dashboard flex">




                <div class="graphContainer">
                    <div class="graphHeading flex">
                        <img src="graph.png" alt="">
                        <p>Graph Monitoring</p>
                    </div>
                    <div class="chart-container">
                
    
                      <div class="chart">
                        <div class="y-axis-labels flex">
                          <span>6k</span>
                          <span>4k</span>
                          <span>2k</span>
                          <span>0</span>
                        </div>
                

                        <div class="month">
                            <div class="bar-group">
                              <div class="bar expense-bar" style="height: 160px;"></div>
                              <div class="bar income-bar" style="height: 110px;"></div>
                            </div>
                            <div class="bar-label">Jan</div>
                          </div>
                          
                          <div class="month">
                            <div class="bar-group">
                              <div class="bar expense-bar" style="height: 90px;"></div>
                              <div class="bar income-bar" style="height: 130px;"></div>
                            </div>
                            <div class="bar-label">Feb</div>
                          </div>
                          
                          <div class="month">
                            <div class="bar-group">
                              <div class="bar expense-bar" style="height: 120px;"></div>
                              <div class="bar income-bar" style="height: 80px;"></div>
                            </div>
                            <div class="bar-label">Mar</div>
                          </div>
                          
                          <div class="month">
                            <div class="bar-group">
                              <div class="bar expense-bar" style="height: 140px;"></div>
                              <div class="bar income-bar" style="height: 100px;"></div>
                            </div>
                            <div class="bar-label">Apr</div>
                          </div>
                          
                          <div class="month">
                            <div class="bar-group">
                              <div class="bar expense-bar" style="height: 170px;"></div>
                              <div class="bar income-bar" style="height: 160px;"></div>
                            </div>
                            <div class="bar-label">May</div>
                          </div>
                          
                          <div class="month">
                            <div class="bar-group">
                              <div class="bar expense-bar" style="height: 130px;"></div>
                              <div class="bar income-bar" style="height: 150px;"></div>
                            </div>
                            <div class="bar-label">Jun</div>
                          </div>
                          
                          <div class="month">
                            <div class="bar-group">
                              <div class="bar expense-bar" style="height: 110px;"></div>
                              <div class="bar income-bar" style="height: 90px;"></div>
                            </div>
                            <div class="bar-label">Jul</div>
                          </div>
                          
                          <div class="month">
                            <div class="bar-group">
                              <div class="bar expense-bar" style="height: 80px;"></div>
                              <div class="bar income-bar" style="height: 140px;"></div>
                            </div>
                            <div class="bar-label">Aug</div>
                          </div>
                          
                          <div class="month">
                            <div class="bar-group">
                              <div class="bar expense-bar" style="height: 150px;"></div>
                              <div class="bar income-bar" style="height: 70px;"></div>
                            </div>
                            <div class="bar-label">Sep</div>
                          </div>
                          
                          <div class="month">
                            <div class="bar-group">
                              <div class="bar expense-bar" style="height: 100px;"></div>
                              <div class="bar income-bar" style="height: 160px;"></div>
                            </div>
                            <div class="bar-label">Oct</div>
                          </div>
                          
                          <div class="month">
                            <div class="bar-group">
                              <div class="bar expense-bar" style="height: 70px;"></div>
                              <div class="bar income-bar" style="height: 40px;"></div>
                            </div>
                            <div class="bar-label">Nov</div>
                          </div>
                          
                          <div class="month">
                            <div class="bar-group">
                              <div class="bar expense-bar" style="height: 120px;"></div>
                              <div class="bar income-bar" style="height: 90px;"></div>
                            </div>
                            <div class="bar-label">Dec</div>
                          </div>



                      </div>
                       <!-- Add Legends -->
                       <div class="legends">
                        <div class="legend">
                          <span class="legend-box" style="background: #8400ff;"></span>
                          <span>Expense</span>
                        </div>
                      <div class="legend">
                        <span class="legend-box" style="background: #4db4ff;"></span>
                        <span>Income</span>
                      </div>
                    </div>
                    </div>
                  </div>
                  








                <div class="flex totalBox">
                    <div class="totalExp totalItem flex">
                        <img src="expense.png" alt="">
                        <div>
                            <h2>Total Expense</h2>
                            <p>$ 1200</p>
                        </div>
                    </div>
                    <div class="totalInc totalItem flex">
                        <img src="income.png" alt="">
                        <div>
                            <h2>Total Income</h2>
                            <p>$ 1200</p>
                        </div>
                    </div>
    
                    <div class="totalbal totalItem flex">
                        <img src="balance.png" alt="">
                        <div>
                            <h2>Total Balance</h2>
                            <p>$ 1200</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="balanceContainer flex">
                <div class="actionBox flex">
                    <div class="actionHeading flex">
                        <img src="action.png" alt="">
                        <p>Quick Access</p>
                    </div>
                    
                    <div class="actionButtons flex">
                        <button id="quickExpense">Add Expense</button>
                    <button id="quickIncome">Add Income</button>
                    <button id="quickReport">Create Report</button>
                    </div>
                </div>
                <div class="expenseBox box">
                    <div class="heading flex">
                        <img src="expense.png" alt="">
                        <h2>Expense</h2>
                    </div>

                    <div class="content">
                        <ul>
                            
                                <?php
                            if(mysqli_num_rows($result_expense_dataBox) > 0) {
                                while($row = mysqli_fetch_assoc($result_expense_dataBox)){
                                    echo '<li>
                                    <p>' . $row['catagory'] . '</p>
                                    <p>' . $row['amount'] . '</p>
                                     </li>';

                                }
                            }

                        ?>
                            
                            <!-- <li>
                                <p>House Expense</p>
                                <p>5000</p>
                            </li>
                            <li>
                                <p>Bike Expense</p>
                                <p>1500</p>
                            </li>
                            <li>
                                <p>Transport Expense</p>
                                <p>800</p>
                            </li>
                            <li>
                                <p>Electricity Bill</p>
                                <p>2500</p>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="incomeBox box">
                    <div class="heading flex">
                        <img src="income.png" alt="">
                        <h2>Income</h2>
                    </div>
                    <div class="content">
                        <ul>

                            <?php
                             if(mysqli_num_rows($result_income_dataBox) > 0) {
                               while($row = mysqli_fetch_assoc($result_income_dataBox)){
                                   echo '<li class="line">
                                   <div>' . $row['catagory'] . '</div>
                                    <div>' . $row['amount'] . '</div>
                                    </li>';

                                }
                            }
                            
                            ?>


                            <!-- <li>
                                <p>Salary</p>
                                <p>20000</p>
                            </li>
                            <li>
                                <p>Profits</p>
                                <p>15000</p>
                            </li>
                            <li>
                                <p>others</p>
                                <p>5000</p>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="welcome.js"></script>
</body>

</html>