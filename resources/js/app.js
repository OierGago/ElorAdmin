import './bootstrap';

window.rotate = function(value) {
    // Obtener el día del año de la fecha seleccionada
    const selectedDate = new Date(value);
    const dayOfYear = Math.ceil((selectedDate - new Date(selectedDate.getFullYear(), 0, 1)) / 86400000);

    // Determinar si el año es bisiesto
    const esBisiesto = (selectedDate.getFullYear() % 4 === 0 && (selectedDate.getFullYear() % 100 !== 0 || selectedDate.getFullYear() % 400 === 0));

    // Determinar el factor de rotación
    const rotationFactor = esBisiesto ? 0.9836 : 0.9863;

    const rotatedValue = dayOfYear * rotationFactor;

    const div1 = document.getElementById('div1');
    const span1 = document.getElementById('span1');

    div1.style.transform = `rotate(${rotatedValue}deg)`;
    div1.style.msTransform = `rotate(${rotatedValue}deg)`;
    div1.style.MozTransform = `rotate(${rotatedValue}deg)`;
    div1.style.OTransform = `rotate(${rotatedValue}deg)`;
    div1.style.transform = `rotate(${rotatedValue}deg)`;

    console.log(dayOfYear);
    console.log(esBisiesto);
};