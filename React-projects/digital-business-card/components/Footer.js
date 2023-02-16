import React from 'react'

export default function Footer(){
    return(
        <footer className='footer'>
            <button className='footerButtons' onClick={() => openInNewTab('https://github.com/ayushdayani28','link')}><i className="fa fa-github" aria-hidden="true"></i></button>
            <button className='footerButtons' onClick={() => openInNewTab('https://twitter.com/ad2898_dayani','link')}><i className="fa fa-twitter" aria-hidden="true"></i></button>
            <button className='footerButtons' onClick={() => openInNewTab('https://www.instagram.com/iamayushdayani/','link')}><i className="fa fa-instagram" aria-hidden="true"></i></button>
            <button className='footerButtons' onClick={() => openInNewTab('https://www.facebook.com/ayush.dayani.9','link')}><i className="fa fa-facebook" aria-hidden="true"></i></button>
        </footer>
    )
}

const openInNewTab = (url, type) => {
    if (type==='link'){
        window.open(url, '_blank', 'noreferrer');
    } else if (type==='mail'){
        url = 'mailto:'+url;
        window.open(url, 'Mailer', '_blank');
    }
};

