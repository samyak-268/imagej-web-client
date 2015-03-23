<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Image Processing</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>        
    </head>
<body>

    <h1>Results Panel</h1>
    </div>

    <?php
        /* 
         * Save the uploaded files to the /images/uploads/ folder after assigning names
         * in a standar format. The name-assignment protocol followed is:
         *      file_name + UNIX_server_time + client_IP
         */
        if( strcmp($_FILES['images']['type'], "image/jpeg") == 0 )
            $ext = '.jpg';
        else if( strcmp($_FILES['images']['type'], "image/gif") == 0 )
            $ext = '.gif';
        else if( strcmp($_FILES['images']['type'], "image/png") == 0 )
            $ext = '.png';
        else
            $ext = '.other';
        
        $raw_filename = time() . $_SERVER['REMOTE_ADDR'] . $ext;
        $filename = $_SERVER['DOCUMENT_ROOT'] . '/prototype/images/uploads/' . $raw_filename; 

        if(is_uploaded_file($_FILES['images']['tmp_name']))
        {
            if(copy($_FILES['images']['tmp_name'], $filename))
                echo "<pre> The file " . $_FILES['images']['name'] . " has been successfully uploaded! </pre>";
            else
                echo "<pre> Sorry, there was a problem in uploading the file!  </pre>";
        }

        /*
         * Run a shell script to invoke ImageJ
         */
        $stat1 = 'cd /home/samyak/Projects/ImageJ;';
        $stat2 = 'export DISPLAY=:0;';
        $stat3 = './ImageJ -macro SampleMacro.ijm ' . $raw_filename;
        $command = $stat1 . $stat2 . $stat3;
        
        $output = array();
        exec($command, $output, $return);
        echo "<br><pre>ImageJ ran successfully. Here are the results: <br>";
        echo "<center><img src='/prototype/images/results/results_" . $raw_filename . "' height='400'/></center></pre>";
    ?>

    <button type="button" class="btn btn-primary" onclick="window.location.href='index.php';">Back</button> 

</div>
</body>

</html>
