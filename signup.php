<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Signup</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <h1>Signup</h1>
    <form action="signup_process.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Signup</button>
    </form>
    <p>Already have an account? <a href="index.php">Login here</a>.</p>
</body>
</html>
