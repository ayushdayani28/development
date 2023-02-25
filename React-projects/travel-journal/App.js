import React from "react"
import Card from "./components/Card"
import data from './components/data'

export default function App(){
    // console.log(data)
    let cards = data.map(item => {
      return(
          <Card
            key={item.title}
            item={item}
            />
        )  
    })
    return (
        <div id='container'>
            <div id='heading'>
                <i className="fa fa-globe" aria-hidden="true" style={{'fontSize':'24px'}}></i>
                <h1>&nbsp;my travel journal.</h1>
            </div>
            {cards}
        </div>
        )
}