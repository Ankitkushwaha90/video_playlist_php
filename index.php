<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Playlist</title>
    <style>
    *{
    margin: 0px;
    padding: 0px;
    }
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 0px;
            margin: 0;
        }

        /* Navbar styles */
        .navbar {
            background-color: #4267B2; /* Facebook blue */
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            z-index: 10;
            width: 99%;
    
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
        }

        .navbar-menu {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar-menu li {
            margin-left: 20px;
        }

        .navbar-menu li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }

        .search-bar {
            flex: 1;
            margin: 0px 20px;
            background-color: #fff;
            border: none;
            border-radius: 20px;
            padding: 8px 16px;
            font-size: 16px;
            color: #333;
        }

        .search-bar::placeholder {
            color: #ccc;
        }

        .search-bar:focus {
            outline: none;
        }

        /* Container styles */
        .container {
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 20px;
        }

        .playlist-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        }

        .video-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            position: fixed;
            right: 20px;
            width: 70%;
            height: 95%;
            top: 15%;
            bottom: 15%;
        }

        .playlist {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .playlist li {
            margin-bottom: 10px;
        }

        video {
            width: 100%;
            height: 80%;
            border-radius: 10px;
            bottom: 5%;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="#" class="navbar-brand">Video App</a>
        <ul class="navbar-menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Trending</a></li>
            <li><a href="#">Explore</a></li>
            <li><a href="#">Profile</a></li>
        </ul>
        <input type="text" class="search-bar" placeholder="Search...">
    </div>

    <!-- Container for playlist and video player -->
    <div class="container">
        <!-- Playlist container -->
        <div class="playlist-container">
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

        <!-- Video player container -->
        <div class="video-container">
            <video id="videoPlayer" controls>
                <source id="videoSource" src="" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>

    <!-- JavaScript to handle video playback -->
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
