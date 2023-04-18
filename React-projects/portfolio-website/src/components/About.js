import React from 'react'
import PixelatedImageReveal from './Pixelation'


export default function About(props){
    let active
    if (props.active === 1){
        active = "section--is-active"
    } else {
        active = ""
    }
    let desc = [`My name is Ayush Dayani and I recently graduated with a Masters degree in Computer Science from Stony Brook University, New York, USA. I 
                have experience in Web Development, Data Engineering and Machine Learning. My passion for creative innovation and solving complex problems 
                has developed through my experiences from various projects that I built during academics and industry exposure. I am actively seeking 
                opportunities in Software development engineering and Data Science & Engineering. `]
    let period = 50
    // console.log(elImage,'this')
    return(
        <li className={`l-section section ${active}`}>
            <div className='about'>
                {props.active === 1 && <PixelatedImageReveal
                    imageUrl={`images/ayush_d.jpg`}
                />}
                <Typewriter desc={desc} period={period}/>
            </div>
        </li>
    )
}

function Typewriter({desc, period}){
    const [text, setText] = React.useState('');
    const [isDeleting, setIsDeleting] = React.useState(false);
    const [loopNum, setLoopNum] = React.useState(0);
    const typingRef = React.useRef(null);
    React.useEffect(() => {
        const updateText = () => {
         
          const i = loopNum % desc.length;
          const fullTxt = desc[i];
    
          if (!isDeleting) {
              setText(fullTxt.substring(0, text.length + 1));
            }
            //  else {
              //   setText(fullTxt.substring(0, text.length - 1));
              // }
    
          if (!isDeleting && text === fullTxt) {
            setIsDeleting(true);
          //   setTimeout(()=>{setIsDeleting(true);},5000)
          // } else if (isDeleting && text === '') {
            
            setLoopNum(loopNum + 1);
          }
    
        };
        typingRef.current = setTimeout(updateText, period);
        return () => {
          // Cleanup: cancel any ongoing setTimeouts when the component unmounts
          clearTimeout(typingRef.current);
        };
      }, [desc, period, loopNum, isDeleting, text]);
    
    return(
        <h1>
        <div className="typewrite" id="about-typewrite">
          <span className="wrap" id = "about-wrap">{text}_</span>
        </div>
      </h1>
    )
}