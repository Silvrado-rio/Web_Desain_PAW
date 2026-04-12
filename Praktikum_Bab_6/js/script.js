function toggleSound() {
    var video = document.getElementById("bgVideo");
    var soundBtn = document.getElementById("soundBtn");
    
    if (video.muted) {
        video.muted = false;
        soundBtn.innerHTML = "🔊 Matikan Suara";
    } else {
        video.muted = true;
        soundBtn.innerHTML = "🔇 Nyalakan Suara";
    }
}

window.onload = function() {
    var video = document.getElementById("bgVideo");
    var savedTime = localStorage.getItem('videoTime');
    
    if (video && savedTime) {
        video.currentTime = parseFloat(savedTime);
        localStorage.removeItem('videoTime');
    }
};

function saveVideoState() {
    var video = document.getElementById("bgVideo");
    if (video) {
        localStorage.setItem('videoTime', video.currentTime);
    }
}