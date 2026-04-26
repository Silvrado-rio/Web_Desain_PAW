function setGreetingAndBackground() {
    const heading = document.getElementById("greetingText");
    const videoSource = document.getElementById("video-source");
    const videoElement = document.getElementById("bg-video");

    const now = new Date();
    const hours = now.getHours();
    const minutes = now.getMinutes();

    const time = hours + (minutes / 100);

    let greetingText = "";
    let videoFile = "";

    if (time >= 0.01 && time <= 10.59) {
        greetingText = "SELAMAT PAGI";
        videoFile = "LiveWallpaper/pagi.mp4";
    } else if (time >= 11.00 && time <= 13.59) {
        greetingText = "SELAMAT SIANG";
        videoFile = "LiveWallpaper/siang.mp4";
    } else if (time >= 14.00 && time <= 17.59) {
        greetingText = "SELAMAT SORE";
        videoFile = "LiveWallpaper/sore.mp4";
    } else {
        greetingText = "SELAMAT MALAM";
        videoFile = "LiveWallpaper/malam.mp4";
    }

    heading.innerHTML = greetingText;

    if (!videoSource.src.endsWith(videoFile)) {
        videoSource.src = videoFile;
        videoElement.load();
    }
}

setGreetingAndBackground();

setInterval(setGreetingAndBackground, 60000);