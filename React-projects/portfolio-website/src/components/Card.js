import React from 'react'

export default function Card(props){
    const [cards, setCards] = React.useState([])
    React.useEffect(()=>{
        setCards(prev => 
            props.projects ? props.projects.map(project => {
                return(
                    <div className='card' key={project.name}>
                        <img src={`${project.img}`} className="card--image" alt=''/>
                        <div id='details'>
                            {project.app ? <a href={project.app} target='_blank' rel="noreferrer"><h1 id="name">{project.name}</h1></a> : <h1 id="name">{project.name}</h1>}
                            <h3 id='association'>{project.association}</h3>
                            <h3 id="duration">{project.duration}</h3>
                            {project.projectLink && <a href={project.projectLink} id='project-link' target='_blank' rel="noreferrer">Github</a>}
                            <p id='desc'>{project.desc}</p>
                        </div>
                    </div>
                )  
            })
        :prev)    
    }, [props.projects])
    return (
        <div className='project-grid'>
            {cards}
        </div>
    )
}