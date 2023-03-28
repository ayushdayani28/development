import React from 'react'

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
    function handleClose(){
        props.setIsVis(0)
    }
    return(
        <div className={`outer-view ${props.isVis?'is-vis':''}`}>
            {props.isVis && <button className="close" onClick={()=> handleClose()}>X</button>}
            {props.isVis===1 && <div className="projects"><h1>Hi</h1></div>}
        </div>

    )
}

function SearchBar(props){
    return (
    <>
    {props.isVis && <div className="searchBox">
                <input className="searchInput" type="text" name="" placeholder="Search" />
                <button className="searchButton" href="#">
                    <i className="material-icons">
                        se
                    </i>
                </button>
        </div>}
    </>
    )
}

export {Navbar, Search, SearchBar}