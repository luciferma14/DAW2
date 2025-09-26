
const WIDTH = 400;
const HEIGH = 400;

let target = {
    x: getRandomNumber(WIDTH),
    y: getRandomNumber(HEIGH)
}

let $map = document.getElementById('map');
let $distance = document.getElementById('distance');
let clicks = 0;

$map.addEventListener('click', function(even){
    clicks++;
    let distance = getDistance(even, target);
    let distanceHint = getDistanceHint(distance);
    $distance.innerHTML = `<h1>${distanceHint}</h1>`;

    if (distance < 20){
        alert(`Has encontrado el Tesoro en ${clicks} clicks!!!`);
        location.reload();
    }
})