<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Toys</title>
    <link rel="stylesheet" type="text/css" href="./View/administrare/admin_login_page/admin_login_style.css">
</head>
<body>

    <form id="lng-login" method="POST" action=" ">
        <h1 class="lng-header" id="lng-login-header">Login</h1>
        <p style="color:pink; font-weight:bold;" id="lng-login-error-msg"><?php echo $result ?></p>
        <label class="lng-label" id="lng-user-label">Username:</label>
        <input class="lng-input-field" id="lng-user-input" type="text" name="username">
        <label class="lng-label" id="lng-pwd-label">Password:</label>
        <input class="lng-input-field" id="lng-pwd-input" type="password" name="password">
        <button class="lng-btn" id="lng-submit-btn">Login</button>
    </form>
    
</body>
</html>
