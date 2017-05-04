<?php //$pageTitle = "Create Task"; ?>
<?php include_once 'model/session.php'; ?>
<?php include_once 'model/Database.php';?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags --><meta charset="UTF-8">
    <title><?php if(isset($page_title)) echo $page_title; ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

</head>
<body>
<h2></h2>

<?php if(!isset($_SESSION['username'])): ?>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="flag">
        <h1>Optimized To-Do List Application</h1>
        <p class="lead">Create Tasks on the fly using my PHP engine.</p>
      </div>
    </div>

<p class="lead">Already a member? <a href="login.php">Login here. <br></a> Not yet a member? <a href="signup.php">Sign Up Here.</a></p>




<?php else:?>
<p class="lead">You are logged in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?> <a href="logout.php">Logout</a>


 <div class="container-fluid">
    <section class="col .col-xs-12 .col-sm-6 .col-md-8 col-lg-6 white">
        <h3 class="text-primary">Create a new task </h3><hr>
        <form id="create-task" action="" method="post">
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">Name</label>
                <div class="col-md-10">
                    <input name="name" class="form-control" id="name" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-2 control-label">Description</label>
                <div class="col-md-10">
                    <textarea class="form-control" rows="3" name="description" id="description"></textarea>
                </div>
            </div>
            <button type="submit" name="createBtn" class="btn btn-success pull-right">
                Create Task <i class="fa fa-plus"></i></button>
        </form>
    </section>
</div>
<?php endif ?>

<?php include_once 'view/footer.php'; ?>
</body>
</html>