<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

<div class="container">

      <form class="form-signin" method="POST" action="<?= FOLDER_PATH . 'Login/signin' ?>">
        <h2 class="form-signin-heading text-center">Iniciar sesión</h2>
        <div class="input-group input-group-lg">
          <span class="input-group-addon" id="sizing-addon1"></span>
        <input type="text" name="cedula" id="cedula" class="form-control" placeholder="cedula" required autofocus
        aria-describedby="sizing-addon1">
</div>
<br>
<div class="input-group input-group-lg">
<span class="input-group-addon" id="sizing-addon1"></span>
        <input type="password" name="password" id="password" class="form-control" placeholder="password"
        aria-described="sizing-addon1">
</div>
        <?php
          if(!empty($error_message)){
            echo '<br><div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>'
            .$error_message.
            '</div>';
          }
        ?>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> 
</body>
</html>