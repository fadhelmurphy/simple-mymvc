<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo $url_asset."style" ?>"/>
    <script type="text/javascript" src="<?php echo $url_asset."script" ?>"></script>
</head>
<body>
    <h1>Welcome</h1>
    <?php echo "<pre>".$_SERVER['REQUEST_METHOD'];
    print_r($_REQUEST);
    print_r(getallheaders());
    echo "</pre>";
    ?>
</body>
</html>