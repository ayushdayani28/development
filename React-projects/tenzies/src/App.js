import React from "react"
import Die from "./Die"
import {nanoid} from "nanoid"
import Confetti from "react-confetti"

export default function App() {
    const [rolls, setRolls] = React.useState(0)
    const [dice, setDice] = React.useState(allNewDice())
    const [tenzies, setTenzies] = React.useState(false)
    const [tp, setTop] = React.useState('')

    React.useEffect(() => {
        const allHeld = dice.every(die => die.isHeld)
        const firstValue = dice[0].value
        const allSameValue = dice.every(die => die.value === firstValue)
        if (allHeld && allSameValue) {
            setTenzies(true)
        }
    }, [dice])

    function generateNewDie() {
        return {
            value: Math.ceil(Math.random() * 6),
            isHeld: false,
            id: nanoid()
        }
    }
    
    function allNewDice() {

        const newDice = []
        for (let i = 0; i < 10; i++) {
            newDice.push(generateNewDie())
        }
        return newDice
    }
    
    function rollDice() {
        if(!tenzies) {
            setDice(oldDice => oldDice.map(die => {
                return die.isHeld ? 
                    die :
                    generateNewDie()
            }))
        } else {
          setTenzies(false)
          setDice(allNewDice())
        }
    }
    
    function holdDice(id) {
        setDice(oldDice => oldDice.map(die => {
            return die.id === id ? 
                {...die, isHeld: !die.isHeld} :
                die
        }))
    }
    
    const diceElements = dice.map(die => (
        <Die 
            key={die.id} 
            value={die.value} 
            isHeld={die.isHeld} 
            holdDice={() => holdDice(die.id)}
        />
    ))

    function rollCounter(){
      if(!tenzies){
        setRolls(prevRolls => prevRolls+1)}
      else{
        const newRoll = rolls
        
        setTimeout(() => {
          let top = localStorage.getItem('rolls')
          if (top === null || top === 'null' || parseInt(top) > newRoll){
            setTop(newRoll)
            localStorage.setItem('rolls', newRoll)
          }
        })
        setRolls(0)
      }
    }

    function refresh(){
      setTop("")
      localStorage.removeItem('rolls')
    }

    return (
        <main>
            {tenzies && <Confetti />}
            <h1 className="title">Tenzies</h1>
            <p className="instructions">Roll until all dice are the same. 
            Click each die to freeze it at its current value between rolls.</p>
            <div className="dice-container">
                {diceElements}
            </div>
            
            <button 
                className="roll-dice" 
                onClick={() => {
                  
                  rollDice();
                  rollCounter();
                }}
            >
                {tenzies ? "New Game" : "Roll"}
            </button>
            <h1>{tp}</h1>
            <button className="refresh" onClick={refresh}>Refresh Game</button>
            
        </main>
    )
}