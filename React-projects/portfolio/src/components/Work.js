import React from 'react'
import {workEx} from './data'
import $ from 'jquery'

export default function Work(props){
  const [isHovering, setIsHovering] = React.useState(false)
  const [exp, setExp] = React.useState(null)
  let active
  if (props.active === 3){
      active = "section--is-active"
  } else {
      active = ""
  }

  const handleMouseEnter = (i) => {
    setIsHovering(true)
    setExp(i)
    setTimeout(()=>{
    $(effectRef.current).animate({opacity:1},400)},50)
  }
  const handleMouseLeave = () => {
    $(effectRef.current).animate({opacity:0},300)
    setTimeout(()=>{
    setExp(null)
    setIsHovering(false)},100)
  }
  const effectRef = React.useRef(null)
  

    return(
      <li className={`l-section section ${active}`}>
        <div className="work">
        <h1 className="work--banner">Experience</h1>
        <ul className="timeline">
          <li>
            <div className="direction-r">
              <div className="flag-wrapper">
                <span className="flag" onMouseEnter={() => handleMouseEnter(0)} onMouseLeave={handleMouseLeave}>{workEx['gwr']['comp']}</span>
                <span className="time-wrapper"><span className="time">{workEx['gwr']['duration']}</span></span>
              </div>
              <div className="desg">{workEx['gwr']['desg']}</div>
              {isHovering && exp===0 && <div ref={effectRef} className='desc'>
                <p>{workEx['gwr']['desc']}</p>
              </div>}
            </div>
          </li>
          <li>
            <div className="direction-l">
              <div className="flag-wrapper">
                <span className="flag" onMouseEnter={() => handleMouseEnter(1)} onMouseLeave={handleMouseLeave}>{workEx['sbu']['comp']}</span>
                <span className="time-wrapper"><span className="time">{workEx['sbu']['duration']}</span></span>
              </div>
              <div className="desg">{workEx['sbu']['desg']}</div>
              {isHovering && exp===1 && <div ref={effectRef} className={`desc`}>
                <p>{workEx['sbu']['desc']}</p>
              </div>}
            </div>
          </li>
          <li>
            <div className="direction-r">
              <div className="flag-wrapper">
                <span className="flag" onMouseEnter={() => handleMouseEnter(2)} onMouseLeave={handleMouseLeave}>{workEx['vte']['comp']}</span>
                <span className="time-wrapper"><span className="time">{workEx['vte']['duration']}</span></span>
              </div>
              <div className="desg">{workEx['vte']['desg']}</div>
              {isHovering && exp===2 && <div ref={effectRef} className={`desc`}>
                <p>{workEx['vte']['desc']}</p>
              </div>}
            </div>
          </li>
        </ul>
      </div>
    </li>
    )
}