<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="/js/jquery-3.4.1.min.js"  type="text/javascript"></script>
    <script src="/js/bootstrap.min.js"  type="text/javascript"> </script>
    <script src="/js/popper.min.js"  type="text/javascript"></script>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
</head>
<body>
<div>
    <header>
        <nav class="navbar navbar-light bg-primary">
            <span class="navbar-brand mb-0 h1">Films</span>
            <?php if($_SESSION['session_username']): ?>
                <?php echo $_SESSION['session_username'];?>
                <a href="/auth/logout">LOGOUT</a>
            <?php else: ?>
                <p><a href="/auth/login">Login</a></p>
                <p><a href="/auth/register">Register</a></p>
            <?php endif; ?>
        </nav>
    </header>
</div>
</body>
</html>