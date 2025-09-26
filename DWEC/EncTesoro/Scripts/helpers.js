
function getRandomNumber(size){
    return Math.floor(Math.random() * size);
}

function getDistance(even, target){
    let difX = even.offsetX - target.x;
    let difY = even.offsetY - target.y;

    return Math.sqrt((difX * difX) + (difY + difY));
}

function getDistanceHint(distance){
    if(distance < 30){
        return "Te quemass!!!!";
    }else if (distance < 40){
        return "Muy Caliente";
    }else if (distance < 60){
        return "Caliente";
    }else if (distance < 100){
        return "Templado";
    }else if (distance < 200){
        return "Frío";
    }else if (distance < 360){
        return "Muy frío";
    }else{
        return "Congelado";
    }
}