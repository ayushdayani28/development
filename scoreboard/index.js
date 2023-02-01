let scoreHomeEl = document.getElementById("score-home-el")
let scoreGuestEl = document.getElementById("score-guest-el")
let freethrowEl = document.getElementById("freethrow-el")
let midrangeEl = document.getElementById("midrange-el")
let longthreeEl = document.getElementById("Longthree-el")
let leadTeamEl = document.getElementById("lead-team")
let countHome = 0
let countGuest = 0
let lead_team = "same"
// Home Score Counter
function freethrowHome() {
    countHome += 1
    scoreHomeEl.textContent = countHome
    lead()
} 
function midrangeHome() {
    countHome += 2
    scoreHomeEl.textContent = countHome
    lead()
}
function longthreeHome() {
    countHome += 3
    scoreHomeEl.textContent = countHome
    lead()
}
function freethrowGuest() {
    countGuest += 1
    scoreGuestEl.textContent = countGuest
    lead()
}
function midrangeGuest() {
    countGuest += 2
    lead()
    scoreGuestEl.textContent = countGuest
} 
function longthreeGuest() {
    countGuest += 3
    lead()
    scoreGuestEl.textContent = countGuest
}
function reset(){
    countHome = 0
    countGuest = 0
    lead_team = "START"
    leadTeamEl.textContent = lead_team
    scoreHomeEl.textContent = countHome
    scoreGuestEl.textContent = countGuest
    
}

function lead(){
    if (countHome > countGuest){
        lead_team = "HOME"
    }
    else if (countHome < countGuest){
        lead_team = "GUEST"
    }
    else{
        lead_team = "DRAW"
    }
    console.log(lead_team)
    leadTeamEl.textContent = lead_team
}