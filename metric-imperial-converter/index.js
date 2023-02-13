/*
1 meter = 3.281 feet
1 liter = 0.264 gallon
1 kilogram = 2.204 pound
*/

const convertEl = document.getElementById('convert')
const inputEl = document.getElementById('input-space')
let lengthEl = document.getElementById('length-el')
let volumeEl = document.getElementById('volume-el')
let massEl = document.getElementById('mass-el')

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
