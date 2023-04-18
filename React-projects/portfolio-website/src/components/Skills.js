import React from 'react'
import {lang} from './data'
import Learning from './Learning'
import Certificates from './Certificates'

export default function Skills(props){
    let active
    if (props.active === 4){
        active = "section--is-active"
    } else {
        active = ""
    }
   
      return (
            <li className={`l-section section ${active}`}  >
                <div className='skills' style={{overflow:'hidden'}}>
                    <div id="tab0" ></div>
                    <div id="tab1" >
                        <Learning />
                    </div>
                    <div id="tab2"  >
                        <Certificates/>
                    </div>
                    <div id="tab3" >
                        <TechStack
                            projectSearch={props.projectSearch}    
                        />
                    </div>
                </div>
            </li>
      )
  }

function TechStack(props){
    const [hover, SetHover] = React.useState(false)
    const [tec, setTech] = React.useState(null)
    const [counter, setCounter] = React.useState(0);
    const [intervalId, setIntervalId] = React.useState(null);
    const [ang, setAng] = React.useState(0)

    const circularProgressStyles = {
        background: `conic-gradient(aqua, rgba(135,150,235,1), rgba(15,51,255,1) 
        ${counter * 3.6}deg, transparent 0deg)`
    }


  React.useEffect(() => {
    if (hover) {
      const id = setInterval(() => {
        setCounter((counter) => counter < ang? counter + 1:counter);
        if (counter >= ang) {
          clearInterval(intervalId);
        }
      }, 20);
      setIntervalId(id);
    } else {
      clearInterval(intervalId);
      setIntervalId(null);
      setCounter(0);
    }
    // eslint-disable-next-line 
  }, [hover]);

    const handleHover = (t, angle) => {
        setTimeout(()=>{
        SetHover(true)
        setTech(t)
        setCounter(0)
        setAng(angle)
        },150)
        }
    const handleHoverOut = () => {
        setTimeout(()=>{
        SetHover(false)
        setTech(null)
        setCounter(0)
    },150)
    }

    const handleClick = (lang) =>{
        props.projectSearch(lang)
    }

    let tech = []
    for (const l in lang){
        let tmp = lang[l]['id']
        let angle = lang[l]['level']
        tech.push(<div key={tmp}  className={`skills--grid--item ${hover && tec===tmp?'circular-progress':''}`} onMouseEnter={()=>handleHover(tmp, angle)}
             onMouseLeave={()=>handleHoverOut()} style={hover && tec===tmp?circularProgressStyles:{}} onClick={()=>handleClick(l)}>
            <img className='skills-image progress-value' src={require(`../${lang[l][hover && tec===tmp?'h':'uh']}`)} alt={l} />
        </div>)
    }
    return (
        <div className='tech-stack' >
            <h1 style={{overflow:'hidden'}}>Tech Stack</h1>
            <div className='skills--grid'>
                {tech}
            </div>
        </div>
    )
  }

   // const [isDragging, setIsDragging] = React.useState(false);
    // const certiGridRef = React.useRef(null);
    // const [scrollTop, setScrollTop] = React.useState(0);
    // const [startY, setStartY] = React.useState(0);
    
    // const handleMouseDown = (event) => {
    //     setIsDragging(true);
    //     setStartY(event.pageY - certiGridRef.current.offsetTop);
    //     setScrollTop(certiGridRef.current.scrollTop);
    //   };
    
    // const handleMouseMove = (event) => {
    // if (isDragging) {
    //     const y = event.pageY - certiGridRef.current.offsetTop;
    //     const walk = (y - startY) * 3;
    //     certiGridRef.current.scrollTop = scrollTop - walk;
    // }
    // };
    
    // const handleMouseUp = () => {
    //     setIsDragging(false);
    // };
    // ref={certiGridRef} onMouseDown={handleMouseDown} onMouseMove={handleMouseMove} onMouseUp={handleMouseUp} onWheel={handleWheel}
    // const handleWheel = (event) => {
    //     // event.preventDefault()
    //     certiGridRef.current.scrollTop += event.deltaX * 0.5;
    // }