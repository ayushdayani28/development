import React from 'react'
import {projects} from './data'

function Navbar(props){
    function handleClick(item){
        props.setActive(item)
    }

    return (
        <nav className="l-side-nav">
            <ul className="side-nav" >
                <li className={props.active === 0?"is-active": ""} onClick={() => handleClick(0)}><span>Home</span></li>
                <li className={props.active === 1?"is-active": ""} onClick={() => handleClick(1)}><span>About</span></li>
                <li className={props.active === 2?"is-active": ""} onClick={() => handleClick(2)}><span>Education</span></li>
                <li className={props.active === 3?"is-active": ""} onClick={() => handleClick(3)}><span>Experience</span></li>
                <li className={props.active === 4?"is-active": ""} onClick={() => handleClick(4)}><span>Skills</span></li>
                <li className={props.active === 5?"is-active": ""} onClick={() => handleClick(5)}><span>Contact</span></li>
            </ul>
        </nav>
    )
}

function Search(props){
    // const [projects, setProjects] = React.useState(null)
    const [origProjects, setOrigProjects] = React.useState([])
    const [updatedProjects, setUpdatedProjects] = React.useState(null);
    function handleClose(){
        props.setIsVis(0)
    }
    
    function normalizeString(str){
        if (str){
        const delimiters = /[ _./,-]+/;
        let words = str.split(delimiters).map(word => word.toLowerCase())
        let wordSet = new Set(words)
        words = Array.from(wordSet);
        return words
        } else{
            return []
        }
    }
    React.useEffect(()=>{
        setOrigProjects(projects.map(project => { return {
            ...project,
            keywords: project.keywords.map(key => key.toLowerCase())
                }
            }))
    }, [projects])
    
    React.useEffect(() => {
        const nStr = normalizeString(props.content);
        const len = nStr.length
        let up = []
        for(let project of origProjects){
            let count = 0
            let keyWords = project.keywords.flatMap(word => word.split(' '))
            for (let w of nStr ){
                // && !(up.includes(project.name))
                
                if (keyWords.includes(w)){
                    count+=1
                }
                if (count===len){
                    up.push(project.name)
                    break
                }
            }
        }
        
        setUpdatedProjects(prevProject => up.length === 0? prevProject: up );
        
    }, [props.content]);

    return(
        <div className={`outer-view ${props.isVis?'is-vis':''}`}>
            {props.isVis && <button className="close" onClick={()=> handleClose()}>X</button>}
            {props.isVis===1 && <div className="projects"><h1>{updatedProjects}</h1></div>}
        </div>
    )
}

function SearchBar(props){
    function handleChange(e){
        props.setContent(e.target.value)
    }
    return (
    <>
    {props.isVis && <div className="searchBox">
                <input className="searchInput" type="text" name="" placeholder="Search Projects ex. Python, Java, SBU" onChange={handleChange}/>
                <button className="searchButton" href="#">
                    <i className="material-icons">
                        <i className="fa fa-search" aria-hidden="true"></i>
                    </i>
                </button>
        </div>}
    </>
    )
}

export {Navbar, Search, SearchBar}