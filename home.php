<!DOCTYPE HTML>

<html>
<head>
	<title>DB team 14</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="database.css">
</head>
<body class="bg">
<div class="container">
  <h1>Corporate Recruitment System</h1>
  <h2>CSE5330 Project: Team 14</h2>
  <div class="panel panel-default">
    <h3>Abstract</h3>
    <p class="gap">
      This project titled “Corporate Recruitment System” is an online Job Portal that will ease recruitment process by notifying Job Seekers the availability of current jobs.</p>
      <p class="gap">
      This corporate recruitment service system will primarily focus on the posting and searching of job vacancies. However, this can be the initial step towards achieving the long term goal of delivering broader services to support recruitment.</p>
      <p class="gap">
      This will provide service to the potential job applicants to search for working opportunities. It is planned that ultimately all vacancies will be posted online by Job Providers, so that Job Seekers will be able to take maximum benefit out of it in order to succeed. CRS will reduce communication gap between Job providers and Job Seekers. Tt will be beneficial not only for experienced candidates but also for the freshers.
    </p>
  </div>
  <form method="post">
  <button class="btn btn-danger" name="go">
    Go to the Portal >>
  </button>
  </form>
</div>

<?php 
  if(isset($_POST['go'])) {
  header('Location: job.php');
  }
?>

</body>
</html>