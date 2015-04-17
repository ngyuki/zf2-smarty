<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    {$this->headTitle("ZF2 Smarty")->setSeparator(' - ') nofilter}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand" href="{url home}">ZF2 Smarty</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href={url home}>Home</a></li>
                <li><a href={url foo}>Foo</a></li>
                <li><a href={url bar [id => 12345]}>Bar</a></li>
                <li><a href={url json}>Json</a></li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        {$content nofilter}
    </div>
</body>
</html>
