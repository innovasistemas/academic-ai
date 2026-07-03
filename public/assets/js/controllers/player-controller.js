const audioPlayer = document.querySelector('#audio-player');
const divList = document.querySelector('#div-list');
const divRecords = document.querySelector('#div-records');
const btnPrevious = document.querySelector('#btn-previous');
const btnPlayPause = document.querySelector('#btn-play-pause');
const btnNext = document.querySelector('#btn-next');

let dataMusic = [];
let index = 0;

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
        link.setAttribute('id', `link${idx}`);
        link.setAttribute('href', '#');
        link.setAttribute('alt', element.title);
        link.setAttribute('title', element.title);
        link.classList.add('text-decoration-none');
        link.textContent = `${idx + 1}. ${element.title}`;
        link.addEventListener('click', (event) => playSong(event, element.src, link, idx));
        divList.append(link);
        divList.append(document.createElement('br'));
    });
    const smallRecords = document.createElement('small');
    smallRecords.textContent = `Total canciones: ${data.length}`;
    divRecords.append(smallRecords);
}

function playSong(event, src, link, idx)
{
    event.preventDefault();
    activateSong(src);
    link.classList.add('text-warning');
    index = idx;
}

function activateSong(src)
{
    divList.querySelector('a.text-warning')?.classList.remove('text-warning');
    audioPlayer.pause();
    audioPlayer.src = `${routeAssets}/${src}`;
    audioPlayer.load();
    audioPlayer.play();
}

btnPlayPause.addEventListener('click', (e) => {
    if (audioPlayer.paused) {
        audioPlayer.play();
    } else {
        audioPlayer.pause();
    }
});

btnPrevious.addEventListener('click', (e) => {
    index = index == 0 ? dataMusic.length - 1 : index - 1;
    activateSong(dataMusic[index].src);
});

btnNext.addEventListener('click', (e) => {
    index = index == dataMusic.length - 1 ? 0 :  index + 1;
    activateSong(dataMusic[index].src);
});

audioPlayer.addEventListener('play', () => {
    btnPlayPause.querySelector('i').classList.toggle('bi-pause-fill');
    btnPlayPause.querySelector('i').classList.toggle('bi-play-fill');
});

audioPlayer.addEventListener('pause', () => {
    btnPlayPause.querySelector('i').classList.toggle('bi-pause-fill');
    btnPlayPause.querySelector('i').classList.toggle('bi-play-fill');
});