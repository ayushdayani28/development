import React from 'react'
import { FaGithub, FaLinkedin, FaInstagram, FaTwitter } from 'react-icons/fa';

export default function Socials(){
    // const [menu, setMenu] = React.useState(false)
    // const handleClick = () =>{
    //     if (!menu){
    //         setMenu(true)
    //     }else{
    //         setMenu(false)
    //     }
    //     console.log(menu)
    // }
    const [isOpen, setIsOpen] = React.useState(false);
    const toggleMenu = () => {
        setIsOpen(!isOpen);
        console.log('open')
    };
    return(
        <div className="socials">
            <ul id="socials-menu" >       
                <a className="menu-button icon-plus" id="open-menu" href="#socials-menu" title="Show navigation" onClick={toggleMenu}></a>
                <a className="menu-button icon-minus" href="#0" title="Hide navigation" onClick={toggleMenu}></a>
                <li className="menu-item">
                    <a href="#socials-menu">
                        <FaGithub />
                    </a>
                </li>
                <li className="menu-item">
                    <a href="#socials-menu">
                        <FaLinkedin />
                    </a>
                </li>
                <li className="menu-item">
                    <a href="#socials-menu">
                        <FaInstagram />
                    </a>
                </li>
                <li className="menu-item">
                    <a href="#socials-menu">
                        <span className="fa fa-twitter"></span>
                    </a>
                </li>
            </ul>
        </div>
    )
}