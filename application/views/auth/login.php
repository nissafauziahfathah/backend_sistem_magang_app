<!DOCTYPE html>
<html>
<head>
    <title>Login Sistem Magang</title>
</head>
<body>

<h2>LOGIN ADMIN</h2>

<form action="<?= base_url('index.php/auth/login'); ?>" method="post">

    <label>Username</label><br>
    <input type="text" name="username" required>

    <br><br>

    <label>Password</label><br>
    <input type="password" name="password" required>

    <br><br>

    <button type="submit">Login</button>

</form>

</body>
</html>