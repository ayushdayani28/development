import React from "react"

export default function Info(){
    return(
        <div className='Info'>
            <h1 className="name">Ayush Dayani</h1>
            <h4 className="designation">Software Developer</h4>
            <h5 className="website"> To Be Announced </h5>
            <button className='contact' id='email' onClick={() => openInNewTab('adayani@cs.stonybrook.edu', 'mail')} target='_blank'><i className="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;email</button>
            <button className='contact' id='linkedin' onClick={() => openInNewTab('https://www.linkedin.com/in/28ayush','link')}><i className="fa fa-linkedin" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Linkedin</button>
        </div>
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

