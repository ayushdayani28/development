import React from 'react'

export default function Card(props){
    const [cards, setCards] = React.useState([])
    React.useEffect(()=>{
        setCards(prev => 
            props.projects ? props.projects.map(project => {
                return(
                    <div className='card' key={project.name}>
                        <img src={`${project.img}`} className="card--image" />
                        <div>
                        <div id='details'>
                            <h1 id="place">{project.name}</h1>
                            <h3 id="duration">{project.duration}</h3>
                            <p id='desc'>{project.desc}</p>
                        </div>
                        </div>
                    </div>
                )  
            })
        :prev)    
    }, [props.projects])
    return (
        <div>
            {cards}
        </div>
    )
}