<?php
session_start();
session_destroy();
$style = "
    font-size: 16px;
    padding: 7px 15px;
    background: #0031CC;
    color: #FFF;
    border: none;
    cursor: pointer;
    text-decoration: none;
";
?>

<html>
<head>

</head>
<body>
<a href="index.php" target="_top" style="<?php echo $style;?>">Click here to continue.</a>
</body>
</html>
