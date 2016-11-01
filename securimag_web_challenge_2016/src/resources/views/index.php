<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/swc16.css">
    <title>Animal market analyzer</title>
</head>
<body>
<div class="header">
    <h1>Animal market analyzer</h1>
    <h2>Under construction until the next fund-raising round</h2>
</div>
<div class="content">
    <?php
    if (isset($is_auth_failure) && $is_auth_failure === true) {
    ?>
        <p class="text-error">Authentication failure!</p>
    <?php
    }
    ?>
    <form method="post" class="pure-form">
        <fieldset>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" class="pure-button pure-button-primary" value="Log in">
        </fieldset>
    </form>
</div>
</body>
</html>