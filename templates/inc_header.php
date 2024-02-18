<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POC PHP Todo App</title>
    <link rel="stylesheet" type="text/css" href="/css/bulma.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/css/styles.css" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="/js/scripts.js"></script>
</head>
<body>

<div class="container">
    <a href="/" title="Home"><h1 class="title">POC PHP Todo App</h1></a>
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>Hello, <?php echo $_SESSION['user_name']; ?> |
        <a href="/logout" title="Logout">Logout</a><?php else: ?><a href="/login" title="Login">Login</a><?php endif; ?>
