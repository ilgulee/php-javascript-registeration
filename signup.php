<?php include('adduser.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">    
          <a class="navbar-brand" href="signup.php">Sign up</a>
        </div>
      </div>
    </nav>
    <div class="container">
        <?php if(count($fleshMsg) != 0): ?>
            <?php foreach($fleshMsg as $value):?>
    		<div class="alert <?php echo $fleshMsgClass; ?>">
                <?php echo $value?>
            </div>
        <?php endforeach;?>
    	<?php endif; ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validate(this)" >
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="firstname">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lastname">
            </div>
            <div class="form-group">
                <label>User Name</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" class="form-control" name="age">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea name="message" class="form-control"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="app.js"></script>
</body>
</html>