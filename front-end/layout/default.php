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
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">Films</span>
            <span><?php echo $_SESSION['session_username'];?></span>
            <a href="/auth/logout">LOGOUT</a>
        </nav>
    </header>
    <div class="container" style="width: 900px;  margin: 0 auto">
        <div align="center"><?php echo $content; ?></div>
    </div>
    <footer>

    </footer>
</div>
</body>
</html>