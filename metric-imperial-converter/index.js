/*
1 meter = 3.281 feet
1 liter = 0.264 gallon
1 kilogram = 2.204 pound
container = #F4F4F4
cards = #FFFFFF
h2 = #5A537B
h4 = #353535
*/

const convertEl = document.getElementById('convert')
const inputEl = document.getElementById('input-space')
const lengthEl = document.getElementById('length-el')
const volumeEl = document.getElementById('volume-el')
const massEl = document.getElementById('mass-el')
const container = document.getElementById('container')

convertEl.addEventListener('click', function(){
    const value = parseFloat(inputEl.value)
    convLength(value)
    convVolume(value)
    convMass(value)
})

function convLength(value){
    let lengthInMeter = (value/3.281).toFixed(3)
    let lengthInFeet = (value*3.281).toFixed(3)
    
    lengthEl.textContent = `${value} meters = ${lengthInFeet} feet | ${value} feet = ${lengthInMeter} meters`
    
}

function convVolume(value){
    let volumeInLitre = (value/0.264).toFixed(3)
    let volumeInGallon = (value*0.264).toFixed(3)
    
    volumeEl.textContent = `${value} litres = ${volumeInGallon} gallons | ${value} gallons = ${volumeInLitre} litres`
}

function convMass(value){
    let massInKg = (value/2.204).toFixed(3)
    let massInPds = (value*2.204).toFixed(3)
    
    massEl.textContent = `${value} kilos = ${massInPds} pounds | ${value} pounds = ${massInKg} kilos`
    
}
// --------------------------------------------------------------------------------
const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
const currentTheme = localStorage.getItem('theme');
const cards = document.getElementsByClassName('cards')
const h2 = document.querySelectorAll('h2')
const h4 = document.querySelectorAll('h4')
const body = document.querySelector('body')
// console.log(cards)
if (currentTheme){
    if(currentTheme === 'light'){
        toggleSwitch.checked = true
        localStorage.setItem('theme', 'dark')
    } else if (currentTheme === 'dark'){
        toggleSwitch.checked = true
    }
}


toggleSwitch.addEventListener('change', switchTheme, false);

function switchTheme(e) {
    if (! e.target.checked) {
        container.style.background = '#E8E8E8'
        for(i = 0; i < cards.length; i++) {
            cards[i].style.background = '#FFFFFF';
        }
        for(i = 0; i < h2.length; i++) {
            h2[i].style.color = '#5A537B';
        }
        for(i = 0; i < h4.length; i++) {
            h4[i].style.color = '#5A537B';
        }
        body.style.background = '#FFFFFF'
        localStorage.setItem('theme', 'dark');
    }
    else {       
        container.style.background = '#1F2937'
        for(i = 0; i < cards.length; i++) {
            cards[i].style.background = '#273549';
        }
        for(i = 0; i < h2.length; i++) {
            h2[i].style.color = '#CCC1FF';
        }
        for(i = 0; i < h4.length; i++) {
            h4[i].style.color = '#F0F0F0';
        }
        body.style.background = '#111827'
        localStorage.setItem('theme', 'light');
    }    
}

