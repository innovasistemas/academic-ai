const audioPlayer = document.querySelector('#audio-player');
const divList = document.querySelector('#div-list');
const smallRecords = document.querySelector('#small-records')
const infSong = document.querySelector('#inf-song')
const infTitle = document.querySelector('#inf-title')
const infAlbum = document.querySelector('#inf-album')
const infAuthor = document.querySelector('#inf-author')
const infDuration = document.querySelector('#inf-duration')
const btnPrevious = document.querySelector('#btn-previous');
const btnPlayPause = document.querySelector('#btn-play-pause');
const btnNext = document.querySelector('#btn-next');
const btnRepeat = document.querySelector('#btn-repeat');
const btnShuffle = document.querySelector('#btn-shuffle');
const btnVolume = document.querySelector('#btn-volume');
const rgnVolume = document.querySelector('#rng-volume');

let dataMusic = [];
let index = 0;
let paused = false;
let repeat = false;
let stPrevNext = false;

fetch(`${routeAssets}/json/music.json`)
    .then(response => {
        if (!response.ok) {
            throw new Error("Error al cargar el archivo");
        }
        return response.json(); // Convierte el JSON a un objeto JS
    })
    .then(data => {
        audioPlayer.src = `${routeAssets}/${data[0].src}`;
        dataMusic = data;
        loadList(data);
    })
    .catch(error => console.error("Hubo un error:", error));

function loadList(data)
{
    data.forEach((element, idx) => {
        const link = document.createElement('a');
        const small = document.createElement('small');
        link.setAttribute('id', `link${idx}`);
        link.setAttribute('href', '#');
        link.setAttribute('alt', element.title);
        link.setAttribute('title', element.title);
        link.classList.add('text-decoration-none');
        link.textContent = `${idx + 1}. ${element.title}`;
        small.classList.add('text-secondary');
        small.textContent = `${element.duration} - ${element.author}`;
        link.addEventListener('click', (event) => playSong(event, element.src, idx));
        divList.append(link);
        divList.append(document.createElement('br'));
        divList.append(small);
        divList.append(document.createElement('hr'));
    });
    smallRecords.textContent = `${index} / ${dataMusic.length}`;
}

function playSong(event, src, idx)
{
    event.preventDefault();
    index = idx;
    activateSong(src);
}

function activateSong(src)
{
    divList.querySelector('a.text-info')?.classList.remove('text-info');
    configActiveSong();
    if (audioPlayer.paused) {
        paused = true;
    } 
    audioPlayer.pause();
    audioPlayer.src = `${routeAssets}/${src}`;
    audioPlayer.load();
    audioPlayer.play();
}

function configActiveSong()
{
    const currentSong = divList.querySelectorAll('a')[index];
    if (currentSong) {
        currentSong.classList.add('text-info');
        smallRecords.textContent = `${index + 1} / ${dataMusic.length}`;
        infSong.textContent = index + 1;
        infTitle.textContent = dataMusic[index].title;
        infAlbum.textContent = dataMusic[index].album;
        infAuthor.textContent = dataMusic[index].author;
        infDuration.textContent = dataMusic[index].duration;
    } 
}

btnPlayPause.addEventListener('click', (e) => {
    if (audioPlayer.paused) {
        configActiveSong();
        paused = true;
        audioPlayer.play();
    } else {
        audioPlayer.pause();
    }
});

btnPrevious.addEventListener('click', (e) => {
    index = index == 0 ? dataMusic.length - 1 : index - 1;
    stPrevNext = true;
    activateSong(dataMusic[index].src);
});

btnNext.addEventListener('click', (e) => {
    index = index == dataMusic.length - 1 ? 0 : index + 1;
    stPrevNext = true;
    activateSong(dataMusic[index].src);
});

btnRepeat.addEventListener('click', (e) => {
    repeat = !repeat;
    e.currentTarget.classList.toggle('btn-dark');
    e.currentTarget.classList.toggle('btn-secondary');
});

btnVolume.addEventListener('click', (e) => {
    audioPlayer.muted = !audioPlayer.muted;
});

rgnVolume.addEventListener('input', (e) => {
    audioPlayer.volume = e.currentTarget.value;
});

audioPlayer.addEventListener('play', () => {
    if (paused) {
        btnPlayPause.querySelector('i').classList.toggle('bi-pause-fill');
        btnPlayPause.querySelector('i').classList.toggle('bi-play-fill');
    } else if (index == 0 && !stPrevNext) {
        btnPlayPause.querySelector('i').classList.toggle('bi-pause-fill');
        btnPlayPause.querySelector('i').classList.toggle('bi-play-fill');
        configActiveSong();
    }
    paused = false;
    stPrevNext = false;
});

audioPlayer.addEventListener('pause', () => {
    if (!paused) {
        btnPlayPause.querySelector('i').classList.toggle('bi-pause-fill');
        btnPlayPause.querySelector('i').classList.toggle('bi-play-fill');
    }
    paused = true;
});

audioPlayer.addEventListener('ended', () => {
    if (index < dataMusic.length - 1) {
        index++;
        activateSong(dataMusic[index].src);
    } else if (repeat) {
        index = 0;
        activateSong(dataMusic[index].src);
    } else {
        audioPlayer.pause(); 
    }
});

audioPlayer.addEventListener('volumechange', () => {
    btnVolume.querySelector('i').classList.toggle('bi-volume-down-fill', !audioPlayer.muted);
    btnVolume.querySelector('i').classList.toggle('bi-volume-mute-fill', audioPlayer.muted);
    rgnVolume.value = audioPlayer.volume;
});