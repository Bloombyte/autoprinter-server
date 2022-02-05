<?php

$userId = $_GET["UserId"];

?>
<html>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link href="./design.css" rel="stylesheet">
<head>
    <title>PTSUSDT</title>
</head>

<body>
    <div class="heading-text">
        Upload Your Printing File Here
    </div>
    <form action=<?php echo "./AutoPrinter/upload.php?UserId=".strval($userId)?> method="POST" id="myForm" enctype="multipart/form-data" target="hidden_iframe">
        
        <input type="hidden" value="myForm" name="<?php echo ini_get(" session.upload_progress.name"); ?>">
        <input type="file" name="myFile" id="upload-area">
        <label id="label" for="upload-area"> Click to Browse file to Upload</label><br>
        <div class="height"> </div>
        <input type="submit" id="submit" value="Start Upload" onclick = "RemoveStatus();">
    </form>
    <div id="status"></div>
    <div id="bar_blank">
        <div id="bar_color"></div>
    </div>
    <iframe id="hidden_iframe" name="hidden_iframe" src="about:blank"></iframe>
    <script type="text/javascript" src="./script.js"></script>
</body>

</html>