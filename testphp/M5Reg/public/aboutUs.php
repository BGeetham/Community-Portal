<?php
ob_start();
require_once 'includes/autoload.php';
include 'includes/headerMain.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial;
    font-size: 17px;
}

.container {
    position: relative;
    max-width: 800px;
    margin: 0 auto;
}

.container img {vertical-align: middle;}

.container .content {
    position: absolute;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5); /* Black background with transparency */
    color: #f1f1f1;
    width: 100%;
    padding: 20px;
}
</style>
</head>
<body>

<div class="container">
<img src="images/u295.jpg" alt="Notebook" style="width:100%;">
<div class="content">
<h3>ABC pvt Ltd</h3>
<p text-color="blue">ABC Jobs Pte Ltd’is a community portal for Software Developers.
Users will be able to register in the portal and can search for other users and interact with them.
request for forgotten password and Update their profile information
</p>
</div>
</div>

</body>
</html>
<?php 
include 'includes/footer.php';
?>
