<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Image Upload</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link href="thirdparty/plugin-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="thirdparty/plugin-fileinput/js/fileinput.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>        
    </head>
    
<body>
<div class="container kv-main">
    <div class="page-header">
    <h1>ImageJ Web-Based GUI Client</h1>
    </div>

    <form enctype="multipart/form-data" method="post" action="image_processing.php">
        <input id="input-24" type="file" multiple="true" name="images">
    </form>
    

</div>
</body>

<script>
$("#input-24").fileinput({
    maxFileSize: 100,
    initialCaption: "Upload Images",
    allowedFileTypes: ["image"]
});
</script>
