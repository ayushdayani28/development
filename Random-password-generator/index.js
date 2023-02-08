const cap_char = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"]

const low_char = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",]

const nums = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"]

const specials = ["~","`","!","@","#","$","%","^","&","*","(",")","_","-","+","=","{","[","}","]",",","|",":",";","<",">",".","?","/"]

const charDic = {'cap_char':cap_char, 'low_char': low_char, 'nums': nums, 'specials': specials}
let lengthEl = document.getElementById("lengthEl")
let alertEl = document.getElementById("copyAlertEl")
let sliderEl = document.getElementById("myRange")
let r1El = document.getElementById("r1_el")
let r2El = document.getElementById("r2_el")
let specEl = document.getElementById("specEl")
let len = sliderEl.value
let specFlag = false
let p1 = ""
let p2 = ""

function spec(){
    if (specFlag){
        specFlag = false
        specEl.textContent = "Click for Special Characters"
    } else{
        specFlag = true
        specEl.textContent = "Click for No Special Characters"
    }
}

sliderEl.oninput = function() {
  len = sliderEl.value
//   console.log(length)
  lengthEl.textContent = len
}

function randomNum(end){
    return Math.floor(Math.random()*end)
}

function randomChar(specFlag){
    typeCh = ['cap_char', 'low_char', 'nums', 'specials']
    if (specFlag){
        type = randomNum(4)
        
    } else{
        type = randomNum(3)
    }
    charNum = randomNum(charDic[typeCh[type]].length)
    return charDic[typeCh[type]][charNum]
}

function generate(){
    alertEl.textContent = ""
    p1 = ""
    p2 = ""
    for (i=0; i<len; i++){
        p1+=randomChar(specFlag)
    }
    for (i=0; i<len; i++){
        p2+=randomChar(specFlag)
    }
    if (p1.length > 20){
        r1El.textContent = p1.slice(0,20)+"..."
        r2El.textContent = p2.slice(0,20)+"..."
    } else{
        r1El.textContent = p1
        r2El.textContent = p2
    }
}

function reset(){
    r1El.textContent = "Password One"
    r2El.textContent = "Password Two"
}

function copy(str){
    var copyText = document.getElementById(str);
    console.log(typeof copyText.textContent)
    // 
    var clipboard = navigator.clipboard;
    if (clipboard == undefined) {
        console.log('clipboard is undefined');
    } else {
        clipboard.writeText(copyText.textContent).then(function() {
            console.log('Copied to clipboard successfully!');
            alertEl.textContent = "password copied!"
        }, function() {
            console.error('Unable to write to clipboard. :-(');
        });
    }
    
}