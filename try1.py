<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Videos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .video-container {
            margin-bottom: 20px;
        }
        video {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <h1>All Videos</h1>

    <?php
    // Directory containing video files
    $videoDir = 'videos/';

    // Get all files in the directory
    $files = scandir($videoDir);

    // Filter out non-video files
    $videoFiles = array_filter($files, function($file) {
        return pathinfo($file, PATHINFO_EXTENSION) === 'mp4';
    });

    // Display video players for each video file
    foreach ($videoFiles as $videoFile) {
        $videoPath = $videoDir . $videoFile;
    ?>
    <div class="video-container">
        <video controls>
            <source src="<?php echo $videoPath; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <p><?php echo $videoFile; ?></p>
    </div>
    <?php } ?>

</body>
</html>
