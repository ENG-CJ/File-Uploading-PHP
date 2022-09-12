<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyProfile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="container">
   
    <form enctype="multipart/form-data">
    <div class="message-area hide">
        <h5 class="message ">File is required</h5>
    </div>
        <div class="form-group">
            <input type="file" id="user_image" class="form-control">
        </div>
        <button type="button" class="btn" id="upload">Upload</button>
    </form>
</div>


<script src="jquery-3.6.0.min.js"></script>
<script src="main.js"></script>
</body>
</html>