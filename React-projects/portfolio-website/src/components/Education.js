import React from 'react'
import { data } from './data'
import $ from 'jquery'

export default function Education(props) {
  let active
  const ed = { 0: 'SBU', 1: 'GTU', 2: 'DCS' }
  const [edu, setEdu] = React.useState(0)
  const [curLeftPos, setCurLeftPos] = React.useState(2);
  const [curCenterPos, setCurCenterPos] = React.useState(0);
  const [curRightPos, setCurRightPos] = React.useState(1);
  const [click, setClick] = React.useState(0)
  const sliderRef = React.useRef(null)
  const [isHovering, setIsHovering] = React.useState(false)
  const hoverRef = React.useRef(null)
  const educationRef = React.useRef(null)
  const edStyles = {
    backgroundImage: `url(${data[ed[edu]]['bimg']})`
  }

  if (props.active === 2) {
    active = "section--is-active"
  } else {
    active = ""
  }


  React.useEffect(() => {
    if (click) {
      $(sliderRef.current).animate({ opacity: 0 }, 400)
    } else { $(sliderRef.current).animate({ opacity: 1 }, 400) }

  }, [click])



  const handlePrevClick = () => {
    setClick(1)
    setTimeout(() => {
      let newLeftPos = curRightPos
      let newCenterPos = curLeftPos
      let newRightPos = curCenterPos
      setEdu(newCenterPos)
      setCurLeftPos(newLeftPos);
      setCurCenterPos(newCenterPos);
      setCurRightPos(newRightPos)
      setClick(0)
        ;
    }, 400)
  };

  const handleNextClick = () => {
    setClick(1)
    setTimeout(() => {
      let newLeftPos = curCenterPos
      let newCenterPos = curRightPos
      let newRightPos = curLeftPos
      setEdu(newCenterPos)
      setCurLeftPos(newLeftPos);
      setCurCenterPos(newCenterPos);
      setCurRightPos(newRightPos)
      setClick(0)
        ;
    }, 400)
  };

  function posAssigner(number) {
    if (number === curLeftPos) {
      return 'slider--item-left'
    } else if (number === curCenterPos) {
      return 'slider--item-center'
    } else if (number === curRightPos) {
      return 'slider--item-right'
    }
  }

  const handleMouseEnter = () => {
    setIsHovering(true)
  }

  const handleMouseLeave = () => {
    $(hoverRef.current).animate({ width: '0vw' }, 400)
    setTimeout(() => {
      setIsHovering(false)
    }, 400)
  }

  React.useEffect(() => {
    if (isHovering) {
      setTimeout(() => {
        $(hoverRef.current).animate({ width: '85vw' }, 800)
      }
        , 200)

    }
  })

  function dummy(clicked) {
    if (clicked === curLeftPos) {
      return handlePrevClick
    } else if (clicked === curRightPos) {
      return handleNextClick
    }
  }
  return (
    <li ref={educationRef} className={`l-section section ${active}`}>
      <div className="education">
        <h2>{data[ed[edu]]['degree']}</h2>
        <div className="education--lockup">
          <ul className='slider' ref={sliderRef} >
            <li className={`slider--item ${posAssigner(2)}`}>
              <div className="slider--item-image">
                <img src={data[ed[2]]['img']} alt="DCS" id="dcs" onMouseEnter={curCenterPos === 2 ? handleMouseEnter : null} onClick={dummy(2)} />
              </div>
              <p className="slider--item-school">{data[ed[2]]['school']}</p>
              <p className="slider--item-program">{data[ed[2]]['program']}</p>
              <p className="slider--item-duration">{data[ed[2]]['duration']}</p>
            </li>
            <li className={`slider--item ${posAssigner(0)}`}>
              <div className="slider--item-image">
                <img src={data[ed[0]]['img']} alt="SBU" id="sbu" onMouseEnter={curCenterPos === 0 ? handleMouseEnter : null} onClick={dummy(0)} />
              </div>
              <p className="slider--item-school">{data[ed[0]]['school']}</p>
              <p className="slider--item-program">{data[ed[0]]['program']}</p>
              <p className="slider--item-duration">{data[ed[0]]['duration']}</p>
            </li>
            <li className={`slider--item ${posAssigner(1)}`}>
              <div className="slider--item-image">
                <img src={data[ed[1]]['img']} alt="GTU" id="gtu" onMouseEnter={curCenterPos === 1 ? handleMouseEnter : null} onClick={dummy(1)} />
              </div>
              <p className="slider--item-school">{data[ed[1]]['school']}</p>
              <p className="slider--item-program">{data[ed[1]]['program']}</p>
              <p className="slider--item-duration">{data[ed[1]]['duration']}</p>
            </li>
          </ul>
          <div className="slider--prev" onClick={handlePrevClick}>
            <svg version="1.1" id="Layer_1" xmlns="https://www.w3.org/2000/svg" xmlnsXlink="https://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="0 0 150 118" style={{ enableBackground: "new 0 0 150 118" }} xmlSpace="preserve">
              <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                <path d="M561,1169C525,1155,10,640,3,612c-3-13,1-36,8-52c8-15,134-145,281-289C527,41,562,10,590,10c22,0,41,9,61,29
                c55,55,49,64-163,278L296,510h575c564,0,576,0,597,20c46,43,37,109-18,137c-19,10-159,13-590,13l-565,1l182,180
                c101,99,187,188,193,199c16,30,12,57-12,84C631,1174,595,1183,561,1169z"/>
              </g>
            </svg>
          </div>
          <div className="slider--next" onClick={handleNextClick}>
            <svg version="1.1" id="Layer_1" xmlns="https://www.w3.org/2000/svg" xmlnsXlink="https://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="0 0 150 118" style={{ enableBackground: "new 0 0 150 118" }} xmlSpace="preserve">
              <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,
                597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,
                1180,926,1196,870,1167z"/>
              </g>
            </svg>
          </div>
          {isHovering && (<div ref={hoverRef} className='edOverlay' style={edStyles} id={ed[edu]} onWheel={handleMouseLeave}>
            <Academics
              curr={ed[curCenterPos]}
              handleMouseLeave={handleMouseLeave}
            />
          </div>)}
        </div>
      </div>
    </li>
  )
}

function Academics(props) {
  let school = props.curr
  let courses = data[school]['courses'].join(', ')
  return (
    <div className='edInfo'>
      <button className='closeEd' onClick={props.handleMouseLeave}>X</button>
      <div className='edDetails'>
        <h1>{data[school]['school']}</h1>
        <h4>{data[school]['Affiliation']}</h4>
        <h2>{data[school]['degree']} : {data[school]['program']}</h2>
        <h3>{data[school]['duration']}</h3>
        <h3>{data[school]['GPA']} / {data[school]['Bounds']}</h3>
        <p>{data[school]['Desc']}</p>
        <h3 id='eduCourses'>Courses: {courses}</h3>
      </div>
    </div>
  )
}