import React from "react"

export default function Die(props) {
    const styles = {
        backgroundColor: props.isHeld ? "#59E391" : "white"
    }

    function dieSpan(){
        switch(props.value) {
            case 1:
              // code block
              return (
                <div className="die-face first-face" onClick={()=>{props.holdDice(); props.counter();}} style={styles}>
                    <span className="dot">
                    </span>
                </div>
                )

            case 2:
              // code block
              return (
                <div className="die-face second-face" onClick={()=>{props.holdDice(); props.counter();}} style={styles}>
                    <span className="dot">
                    </span>
                    <span className="dot">
                    </span>
                </div>
                )
            case 3:
                return (
                <div className="die-face third-face" onClick={()=>{props.holdDice(); props.counter();}} style={styles}>
                    <span className="dot"></span>
                    <span className="dot"></span>
                    <span className="dot"></span>
                  </div>
                )
            case 4:
                return (
                <div className="die-face fourth-face" onClick={()=>{props.holdDice(); props.counter();}} style={styles}>
                    <div className="column">
                      <span className="dot"></span>
                      <span className="dot"></span>
                    </div>
                    <div className="column">
                      <span className="dot"></span>
                      <span className="dot"></span>
                    </div>
                  </div>
                )
            case 5:
                return (
                <div className="die-face fifth-face" onClick={()=>{props.holdDice(); props.counter();}} style={styles}>
  
                    <div className="column">
                      <span className="dot"></span>
                      <span className="dot"></span>
                    </div>
                    
                    <div className="column">
                      <span className="dot"></span>
                    </div>
                    
                    <div className="column">
                      <span className="dot"></span>
                      <span className="dot"></span>
                    </div>
                  
                </div>
                )
            case 6:
                return (
                <div className="die-face sixth-face" onClick={()=>{props.holdDice(); props.counter();}} style={styles}>
                    <div className="column">
                      <span className="dot"></span>
                      <span className="dot"></span>
                      <span className="dot"></span>
                    </div>
                    <div className="column">
                      <span className="dot"></span>
                      <span className="dot"></span>
                          <span className="dot"></span>
                    </div>
                  
                </div>
                )
            default:
              // code block
              break;
          }
    }

    return (
        <>
            {dieSpan()}
        </>
            
    )
}