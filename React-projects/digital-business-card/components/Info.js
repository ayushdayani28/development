import React from "react"

export default function Info(){
    return(
        <div className='Info'>
            <h1 className="name">Ayush Dayani</h1>
            <h4 className="designation">Software Developer</h4>
            <h5 className="website"> To Be Announced </h5>
            <button className='contact' id='email'><i className="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;email</button>
            <button className='contact' id='linkedin'><i className="fa fa-linkedin" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Linkedin</button>
        </div>
    )
}