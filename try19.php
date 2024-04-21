<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Playlist</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr 3fr; /* Divide into two columns */
            gap: 20px;
        }
        .playlist {
            list-style: none;
            padding: 0;
        }
        .playlist li {
            margin-bottom: 10px;
        }
        video {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div>
        <h1>Video Playlist</h1>
    
        <ul class="playlist">
            <?php
            // Directory containing video files
            $videoDir = 'videos/';

            // Get all video files in the directory
            $videoFiles = glob($videoDir . '*.mp4');

            // Display video links in the playlist
            foreach ($videoFiles as $videoFile) {
                $videoName = basename($videoFile);
                echo '<li><a href="' . $videoFile . '">' . $videoName . '</a></li>';
            }
            ?>
        </ul>
    </div>

    <div class="video-container">
        <video id="videoPlayer" controls>
            <source id="videoSource" src="" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <script>
        // Get all video links
        var videoLinks = document.querySelectorAll('.playlist a');

        // Add click event listener to each video link
        videoLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior

                var videoPath = this.getAttribute('href'); // Get video path from href attribute
                var videoPlayer = document.getElementById('videoPlayer');
                var videoSource = document.getElementById('videoSource');

                // Update video source and play
                videoSource.setAttribute('src', videoPath);
                videoPlayer.load(); // Reload the video element to apply changes
                videoPlayer.play();
            });
        });
    </script>
</body>
</html>
