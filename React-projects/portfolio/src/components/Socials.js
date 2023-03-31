import React from 'react'
import { FaGithub, FaLinkedin, FaInstagram, FaTwitter } from 'react-icons/fa';

export default function Socials(){
    const [isOpen, setIsOpen] = React.useState(false);
    const toggleMenu = () => {
        setIsOpen(!isOpen);
        console.log('open')
    };
    const styles={backgroundImage: `url(${require('../images/d-chain.png')})`,backgroundPosition:'center',  backgroundSize:100, backgroundRepeat:'no-repeat', backgroundColor:'black'}
    return(
        <div className="socials">
            {/* <h1>Socials</h1> */}
            <ul id="socials-menu" >
                <a className="menu-button icon-plus" id="open-menu" href="#socials-menu" title="Show navigation" onClick={toggleMenu} style={styles}></a>
                <a className="menu-button icon-minus" href="#socials" title="Hide navigation" onClick={toggleMenu} style={styles}></a>
                <li className="menu-item">
                    <a href="https://github.com/ayushdayani28" target='_blank'>
                        <FaGithub />
                    </a>
                </li>
                <li className="menu-item">
                    <a href="https://www.linkedin.com/in/28ayush" target='_blank'>
                        <FaLinkedin />
                    </a>
                </li>
                <li className="menu-item">
                    <a href="https://www.instagram.com/iamayushdayani/" target='_blank'>
                        <FaInstagram />
                    </a>
                </li>
                <li className="menu-item">
                    <a href="https://twitter.com/ad2898_dayani" target='_blank'>
                        <FaTwitter />
                    </a>
                </li>
            </ul>
        </div>
    )
}