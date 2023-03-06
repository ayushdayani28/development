import React from "react"
import Die from "./Die"
import {nanoid} from "nanoid"
import Confetti from "react-confetti"

export default function App() {
    const [rolls, setRolls] = React.useState(0)
    const [dice, setDice] = React.useState(allNewDice())
    const [tenzies, setTenzies] = React.useState(false)
    // const latestRollsRef = React.useRef(null);
    const [tp, setTop] = React.useState(null)

    React.useEffect(() => {
        const allHeld = dice.every(die => die.isHeld)
        const firstValue = dice[0].value
        const allSameValue = dice.every(die => die.value === firstValue)
        if (allHeld && allSameValue) {
            setTenzies(true)
        }
    }, [dice])
    React.useEffect(() => {
      setTop(localStorage.getItem('rolls'))
        // if (tenzies===true){
          
        // }
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
        for (let i = 0; i < 2; i++) {
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
            counter={rollCounter}
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
            localStorage.setItem('rolls', newRoll)
            // latestRollsRef.current = newRoll;
            // renderLatest()
          }
        })
        setRolls(0)
      }
    }
    
    // function renderLatest(){
    //   const latestRolls = latestRollsRef.current ?? localStorage.getItem("rolls");
    // return <h1>{latestRolls}</h1>;
    // }
    
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
        </main>
    )
}