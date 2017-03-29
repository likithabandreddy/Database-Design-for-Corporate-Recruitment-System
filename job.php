<!DOCTYPE HTML>
<?php
  $db1 = new mysqli('localhost','root','','db1');
  if ($db1->connect_error) {
        die("Connection failed: " . $db1->connect_error);
    } 
?>
<html>
<head>
	<title>DB team 14</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="database.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
     <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Online Job Portal</a>
    </div>
    <div class="nav navbar-form navbar-right">
      <a href="info.php"><button class="btn btn-info">Info</button></a>
      <a href="home.php"><button class="btn btn-success">Home Page</button></a>
    </div>
  </div> 
</nav>
<div class="container above-gap">

<div class="container">
  <h4>Query 1:</h4>
  <div class="container">
    <p>Give me details of the companies which are on the Fortune 500 list</p>
    <p>SQL: SELECT COMPANY_NAME FROM JOB_PROVIDER  WHERE FORTUNE_500 = 'Y'</p>
  </div>
  <form method="post">
    <p class="text-muted left-gap">Choose the order of results to sort </p>
    <div class="left-gap">
    <input type="radio" name="order" value="a">Ascending
    <input type="radio" name="order" value="d">Descending
    </div>
    <br>
    <button class="btn btn-primary btn-sm left-gap" name="button1">Run</button>
  </form>
  <?php
  if(isset($_POST['button1'])) {
    if(isset($_POST['order']) && $_POST['order'] == "a") {
  echo "<div>
    <p>Results - </p>";
    $sql1 = "SELECT COMPANY_NAME FROM JOB_PROVIDER  WHERE FORTUNE_500 = 'Y' ORDER BY COMPANY_NAME ASC";
    try{
    $result1 = $db1->query($sql1);
    }
    catch(Exception $e) {
    echo "Message:" .$e->getMessage();
    }
    echo "<table class='table table-bordered table-striped input-sm table-size'>";
    echo "<tr><th>Company Name</th></tr>";
    while ($data = mysqli_fetch_array($result1)) {
      echo "<tr>
      <td>".$data['COMPANY_NAME']."</td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";
    }
    else if(isset($_POST['order']) && $_POST['order'] == "d") {
      echo "<div>
    <p>Results - </p>";
    $sql1 = "SELECT COMPANY_NAME FROM JOB_PROVIDER  WHERE FORTUNE_500 = 'Y' ORDER BY COMPANY_NAME DESC";
    try{
    $result1 = $db1->query($sql1);
    }
    catch(Exception $e) {
    echo "Message:" .$e->getMessage();
    }
    echo "<table class='table table-bordered table-striped input-sm table-size'>";
    echo "<tr><th>Company Name</th></tr>";
    while ($data = mysqli_fetch_array($result1)) {
      echo "<tr>
      <td>".$data['COMPANY_NAME']."</td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";
    }
    else {
      echo "<div>
    <p>Results - </p>";
    $sql1 = "SELECT COMPANY_NAME FROM JOB_PROVIDER  WHERE FORTUNE_500 = 'Y'";
    try{
    $result1 = $db1->query($sql1);
    }
    catch(Exception $e) {
    echo "Message:" .$e->getMessage();
    }
    echo "<table class='table table-bordered table-striped input-sm table-size'>";
    echo "<tr><th>Company Name</th></tr>";
    while ($data = mysqli_fetch_array($result1)) {
      echo "<tr>
      <td>".$data['COMPANY_NAME']."</td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";
    }
    }?>
</div>
<hr> 
<div class="container">
  <h4>Query 2:</h4>
  <div class="container">
    <p>List of companies with minimum GPA_Requirement of 3.5 along with vacancies and applicable JOB SEEKERS</p>
    <p>SQL: SELECT S.SSN, S.JOB_SEEKER_NAME, J.COMPANY_NAME, J.VACANCY_COUNT, J.GPA_REQ FROM JOB J, JOB_SEEKER S, SEARCH_FOR C  WHERE J.JOB_ID = C.JOB_ID AND J.COMPANY_NAME = C.COMPANY_NAME AND S.SSN = C.SSN AND J.GPA_REQ >= 3.5</p>
  </div>
  <form method="post">
    <span class="text-muted left-gap">To change GPA criteria, please enter any number</span>
    <input type="text" name="gpa" placeholder="Enter any GPA Requirement" class="left-gap box">
    <br>
    <button class="btn btn-primary btn-sm left-gap" name="button2">Run</button>
  </form>
  <?php
  if(isset($_POST['button2'])) {
    if(isset($_POST['gpa']) && $_POST['gpa'] > 1) {
    $val = $_POST['gpa'];
    echo "<div>
    <p>Results - </p>";
    $sql2 = "SELECT S.SSN, S.JOB_SEEKER_NAME, J.COMPANY_NAME, J.VACANCY_COUNT, J.GPA_REQ FROM JOB J, JOB_SEEKER S, SEARCH_FOR C  WHERE J.JOB_ID = C.JOB_ID AND J.COMPANY_NAME = C.COMPANY_NAME AND S.SSN = C.SSN AND J.GPA_REQ >= ".$val;
    try{
    $result2 = $db1->query($sql2);
    }
    catch(Exception $e) {
    echo "Message:" .$e->getMessage();
    }
    echo "<table class='table table-bordered table-striped input-sm table-size'>";
    echo "<tr>
    <th>SSN</th>
    <th>Job Seeker Name</th>
    <th>Company Name</th>
    <th>Vacancy Count</th>
    <th>GPA Requirement</th>
    </tr>";
    while ($data = mysqli_fetch_array($result2)) {
      echo "<tr>
      <td>".$data['SSN']."</td>
      <td>".$data['JOB_SEEKER_NAME']."</td>
      <td>".$data['COMPANY_NAME']."</td>
      <td>".$data['VACANCY_COUNT']."</td>
      <td>".$data['GPA_REQ']."</td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";
    }
    else {
    echo "<div>
    <p>Results - </p>";
    $sql2 = "SELECT S.SSN, S.JOB_SEEKER_NAME, J.COMPANY_NAME, J.VACANCY_COUNT, J.GPA_REQ FROM JOB J, JOB_SEEKER S, SEARCH_FOR C  WHERE J.JOB_ID = C.JOB_ID AND J.COMPANY_NAME = C.COMPANY_NAME AND S.SSN = C.SSN AND J.GPA_REQ >= 3.5";
    try{
    $result2 = $db1->query($sql2);
    }
    catch(Exception $e) {
    echo "Message:" .$e->getMessage();
    }
    echo "<table class='table table-bordered table-striped input-sm table-size'>";
    echo "<tr>
    <th>SSN</th>
    <th>Job Seeker Name</th>
    <th>Company Name</th>
    <th>Vacancy Count</th>
    <th>GPA Requirement</th>
    </tr>";
    while ($data = mysqli_fetch_array($result2)) {
      echo "<tr>
      <td>".$data['SSN']."</td>
      <td>".$data['JOB_SEEKER_NAME']."</td>
      <td>".$data['COMPANY_NAME']."</td>
      <td>".$data['VACANCY_COUNT']."</td>
      <td>".$data['GPA_REQ']."</td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";
    }
    }?>
</div>
<hr>
<div class="container">
  <h4>Query 3:</h4>
  <div class="container">
    <p>Show me the companies where both IT and Non-IT jobs are available</p>
    <p>SQL: SELECT COMPANY_NAME FROM JOB a INNER JOIN JOB b USING(COMPANY_NAME) WHERE UPPER(a.JOB_TYPE)='IT' AND UPPER(b.JOB_TYPE)='NONIT'</p>
  </div>
  <form method="post">
    <button class="btn btn-primary btn-sm left-gap" name="button3">Run</button>
  </form>
  <?php
  if(isset($_POST['button3'])) {
  echo "<div>
    <p>Results - </p>";
    $sql3 = "SELECT COMPANY_NAME FROM JOB a INNER JOIN JOB b USING(COMPANY_NAME) WHERE UPPER(a.JOB_TYPE)='IT' AND UPPER(b.JOB_TYPE)='NONIT'";
    try{
    $result3 = $db1->query($sql3);
    }
    catch(Exception $e) {
    echo "Message:" .$e->getMessage();
    }
    echo "<table class='table table-bordered table-striped input-sm table-size'>";
    echo "<tr><th>Company Name</th></tr>";
    while ($data = mysqli_fetch_array($result3)) {
      echo "<tr>
      <td>".$data['COMPANY_NAME']."</td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";
    }?>
</div>
<hr>
<div class="container">
  <h4>Query 4:</h4>
  <div class="container">
    <p>What is the average salary offered by every company?</p>
    <p>SELECT COMPANY_NAME, AVG(SALARY) Average_Salary FROM JOB  GROUP BY COMPANY_NAME HAVING AVG(SALARY) >= 20000 ORDER BY Average_Salary</p>
  </div>
  <form method="post">
    <button class="btn btn-primary btn-sm left-gap" name="button4">Run</button>
  </form>
  <?php
  if(isset($_POST['button4'])) {
  echo "<div>
    <p>Results - </p>";
    $sql4 = "SELECT COMPANY_NAME, AVG(SALARY) Average_Salary FROM JOB  GROUP BY COMPANY_NAME HAVING AVG(SALARY) >= 20000 ORDER BY Average_Salary";
    try{
    $result4 = $db1->query($sql4);
    }
    catch(Exception $e) {
    echo "Message:" .$e->getMessage();
    }
    echo "<table class='table table-bordered table-striped input-sm table-size'>";
    echo "<tr><th>Company Name</th><th>Average Salary in $</th></tr>";
    while ($data = mysqli_fetch_array($result4)) {
      echo "<tr>
      <td>".$data['COMPANY_NAME']."</td>
      <td>".$data['Average_Salary']."</td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";
    }?>
</div>
<hr>
<div class="container">
  <h4>Query 5:</h4>
  <div class="container">
    <p>What is the maximum salary for JOB_SEEKER depending on his experience?</p>
    <p>SQL: SELECT E.EXPERIENCED_YEARS, MAX(J.SALARY) FROM JOB J, JOB_SEEKER S, SEARCH_FOR C, EXPERIENCED E WHERE J.JOB_ID = C.JOB_ID AND J.COMPANY_NAME = C.COMPANY_NAME AND S.SSN = C.SSN AND S.SSN = E.ESSN AND J.EXPERIENCE_REQ = E.EXPERIENCED_YEARS GROUP BY E.EXPERIENCED_YEARS HAVING MAX(J.SALARY) > 10000</p>
  </div>
  <form method="post">
    <button class="btn btn-primary btn-sm left-gap" name="button5">Run</button>
  </form>
  <?php
  if(isset($_POST['button5'])) {
  echo "<div>
    <p>Results - </p>";
    $sql5 = "SELECT E.EXPERIENCED_YEARS, MAX(J.SALARY) Max_Salary FROM JOB J, JOB_SEEKER S, SEARCH_FOR C, EXPERIENCED E WHERE J.JOB_ID = C.JOB_ID AND J.COMPANY_NAME = C.COMPANY_NAME AND S.SSN = C.SSN AND S.SSN = E.ESSN AND J.EXPERIENCE_REQ = E.EXPERIENCED_YEARS GROUP BY E.EXPERIENCED_YEARS HAVING MAX(J.SALARY) > 10000";
    try{
    $result5 = $db1->query($sql5);
    }
    catch(Exception $e) {
    echo "Message:" .$e->getMessage();
    }
    echo "<table class='table table-bordered table-striped input-sm table-size'>";
    echo "<tr><th>Experienced Years</th><th>Max Salary</th></tr>";
    while ($data = mysqli_fetch_array($result5)) {
      echo "<tr>
      <td>".$data['EXPERIENCED_YEARS']."</td>
      <td>".$data['Max_Salary']."</td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";
    }?>
</div>
<hr>
<div class="container">
  <h4>Query 6:</h4>
  <div class="container">
    <p>How many Job Providers are registered/associated with the system?</p>
    <p>SQL: SELECT COUNT(REG_ID) Count FROM JOB_PROVIDER</p>
  </div>
  <form method="post">
    <button class="btn btn-primary btn-sm left-gap" name="button6">Run</button>
  </form>
  <?php
  if(isset($_POST['button6'])) {
  echo "<div>
    <p>Results - </p>";
    $sql6 = "SELECT COUNT(REG_ID) Count FROM JOB_PROVIDER";
    try{
    $result6 = $db1->query($sql6);
    }
    catch(Exception $e) {
    echo "Message:" .$e->getMessage();
    }
    echo "<table class='table table-bordered table-striped input-sm table-size'>";
    echo "<tr><th>COUNT(REG_ID)</th></tr>";
    while ($data = mysqli_fetch_array($result6)) {
      echo "<tr>
      <td>".$data['Count']."</td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";
    }?>
</div>
<hr>
<div class="container">
  <h4>Query 7:</h4>
  <div class="container">
    <p>List of fresher candidates having Internship experience with the availalble JOB_PROVIDER companies</p>
    <p>SQL: SELECT J.SSN, J.JOB_SEEKER_NAME, F.INTERNSHIP_COMPANY FROM FRESHER F, JOB_SEEKER J  WHERE F.FSSN=J.SSN AND F.INTERNSHIP_COMPANY IN (SELECT DISTINCT(COMPANY_NAME) FROM JOB)</p>
  </div>
  <form method="post">
    <button class="btn btn-primary btn-sm left-gap" name="button7">Run</button>
  </form>
  <?php
  if(isset($_POST['button7'])) {
  echo "<div>
    <p>Results - </p>";
    $sql7 = "SELECT J.SSN, J.JOB_SEEKER_NAME, F.INTERNSHIP_COMPANY FROM FRESHER F, JOB_SEEKER J  WHERE F.FSSN=J.SSN AND F.INTERNSHIP_COMPANY IN (SELECT DISTINCT(COMPANY_NAME) FROM JOB)";
    try{
    $result7 = $db1->query($sql7);
    }
    catch(Exception $e) {
    echo "Message:" .$e->getMessage();
    }
    echo "<table class='table table-bordered table-striped input-sm table-size'>";
    echo "<tr>
    <th>SSN</th>
    <th>Job Seeker Name</th>
    <th>Internship Company Name</th>
    </tr>";
    while ($data = mysqli_fetch_array($result7)) {
     echo "<tr>
      <td>".$data['SSN']."</td>
      <td>".$data['JOB_SEEKER_NAME']."</td>
      <td>".$data['INTERNSHIP_COMPANY']."</td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";
    }?>
</div>
<hr>
<div class="container">
  <h4>Query 8:</h4>
  <div class="container">
    <p>Show me the list of available jobs in the system along with their vacancies</p>
    <p>SQL: SELECT * FROM JOB WHERE  VACANCY_COUNT >= 0</p>
  </div>
  <form method="post">
    <span class="text-muted left-gap">To change the count, set the value from 1 to 20</span>
    <input type="number" name="vacancy" min="1" max="20" class="left-gap">
    <br>
    <button class="btn btn-primary btn-sm left-gap" name="button8">Run</button>
  </form>
  <?php
  if(isset($_POST['button8'])) {
  echo "<div>
    <p>Results - </p>";
    if (isset($_POST['vacancy']) && $_POST['vacancy'] >= 1) {
      $sql8 = "SELECT * FROM JOB WHERE  VACANCY_COUNT >= ".$_POST['vacancy'];
    }
    else {
      $sql8 = "SELECT * FROM JOB WHERE  VACANCY_COUNT >= 0";
    }
    try{
    $result8 = $db1->query($sql8);
    }
    catch(Exception $e) {
    echo "Message:" .$e->getMessage();
    }
    echo "<table class='table table-bordered table-striped input-sm table-size'>";
    echo "<tr>
    <th>Job ID</th>
    <th>Job Type</th>
    <th>Registration ID</th>
    <th>Company Name</th>
    <th>Vacancies</th>
    <th>Salary</th>
    <th>GPA Requirement</th>
    <th>Expereince Requirement</th>
    </tr>";
    while ($data = mysqli_fetch_array($result8)) {
     echo "<tr>
      <td>".$data['JOB_ID']."</td>
      <td>".$data['JOB_TYPE']."</td>
      <td>".$data['REG_ID']."</td>
      <td>".$data['COMPANY_NAME']."</td>
      <td>".$data['VACANCY_COUNT']."</td>
      <td>".$data['SALARY']."</td>
      <td>".$data['GPA_REQ']."</td>
      <td>".$data['EXPERIENCE_REQ']."</td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";
    }?>
</div>
<hr>

<div class="container">
  <h4>Query 9:</h4>
  <div class="container">
    <p>How many candidates are having more than 2 years of experience?</p>
    <p>SQL: SELECT * FROM EXPERIENCED WHERE  EXPERIENCED_YEARS > 2</p>
  </div>
  <form method="post">
    <button class="btn btn-primary btn-sm left-gap" name="button9">Run</button>
  </form>
  <?php
  if(isset($_POST['button9'])) {
  echo "<div>
    <p>Results - </p>";
    $sql9 = "SELECT * FROM EXPERIENCED WHERE  EXPERIENCED_YEARS > 3";
    try{
    $result9 = $db1->query($sql9);
    }
    catch(Exception $e) {
    echo "Message:" .$e->getMessage();
    }
    echo "<table class='table table-bordered table-striped input-sm table-size'>";
    echo "<tr>
    <th>SSN</th>
    <th>Experienced Yeras</th>
    </tr>";
    while ($data = mysqli_fetch_array($result9)) {
     echo "<tr>
      <td>".$data['ESSN']."</td>
      <td>".$data['EXPERIENCED_YEARS']."</td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";
    }?>
</div>
<hr>
<div class="container">
  <h4>Query 10:</h4>
  <div class="container">
    <p>How many candidates have worked with the available companies previously? (Priority Candidates) </p>
    <p>SQL: CREATE VIEW PRIORITY_CANDIDATES AS SELECT S.SSN,S.JOB_SEEKER_NAME,S.EMAIL_ID  FROM JOB_SEEKER S,EXPERIENCED E, JOB_PROVIDER P WHERE S.SSN = E.ESSN AND E.LAST_COMPANY_NAME = P.COMPANY_NAME; (Query on View)</p>
  </div>
  <form method="post">
    <button class="btn btn-primary btn-sm left-gap" name="button10">Run</button>
  </form>
  <?php
  if(isset($_POST['button10'])) {
  echo "<div>
    <p>Results - </p>";
    $sql10 = "SELECT * FROM PRIORITY_CANDIDATES";
    try{
    $result10 = $db1->query($sql10);
    }
    catch(Exception $e) {
    echo "Message:" .$e->getMessage();
    }
    echo "<table class='table table-bordered table-striped input-sm table-size'>";
    echo "<tr>
    <th>SSN</th>
    <th>Job Seeker Name</th>
    <th>Email ID</th>
    <th>Company Name</th>
    </tr>";
    while ($data = mysqli_fetch_array($result10)) {
     echo "<tr>
      <td>".$data['SSN']."</td>
      <td>".$data['JOB_SEEKER_NAME']."</td>
      <td>".$data['EMAIL_ID']."</td>
      <td>".$data['COMPANY_NAME']."</td>
      </tr>";
    }
    echo "</table>";
    echo "</div>";
    }?>
</div>

</div>

</div>
</body>
</html>
