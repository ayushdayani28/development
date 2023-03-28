// import React from 'react'
import img from '../images/dark-logo-no-background.png'
import searchIcon from '../images/dark-icons8-innovation-96.png'

function Header(props){

    function handleView(){
        if (props.isVis === 0){
            props.setIsVis(1)}
    }
    
    return(
        <header className="header">
                <img src={img} alt="logo" className='logo--img'/>
                <p className='header-name'>Ayush Dayani</p>
                <img src={searchIcon} alt="logo" className='project-search-logo' onClick={()=>handleView()}/>
        </header>
    )
}

export default Header;