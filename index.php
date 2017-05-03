<?php //$pageTitle = "Create Task"; ?>
<?php include_once 'resource/session.php'; ?>
<?php include_once 'model/Database.php';?>
<?php include_once 'view/header.php'; ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>
<body>
<h2>User Authentication System</h2>

<?php if(!isset($_SESSION['username'])): ?>

<p>You are currently not signed in <a href="login.php">Login</a> Not yet a member? <a href="signup.php">Signup</a></p>
<?php else:?>
<p>You are logged in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?> <a href="logout.php">Logout</a>


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