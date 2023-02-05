const cap_char = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"]

const low_char = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",]

const nums = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9",]

const specials = ["~","`","!","@","#","$","%","^","&","*","(",")","_","-","+","=","{","[","}","]",",","|",":",";","<",">",".","?","/"]

const charDic = {'cap_char':cap_char, 'low_char': low_char, 'nums': nums, 'specials': specials}

let sliderEl = document.getElementById("myRange")
let len = sliderEl.value
let specFlag = false
let p1 = ""
let p2 = ""

function spec(){
    if (specFlag){
        specFlag = false
    } else{
        specFlag = true
    }
}

sliderEl.oninput = function() {
  len = sliderEl.value
//   console.log(length)
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
    p1 = ""
    p2 = ""
    for (i=0; i<len; i++){
        p1+=randomChar(specFlag)
    }
    for (i=0; i<len; i++){
        p2+=randomChar(specFlag)
    }
    console.log(p1+ "  " +p2)
}