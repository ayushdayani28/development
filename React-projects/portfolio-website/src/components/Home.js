import React from 'react'

// import homeImg from '../images/introduction-visual.png'
export default function Home(props){
    let active
    if (props.active === 0){
        active = "section--is-active"
    } else {
        active = ""
    }
    const messages=["Software Developer", "FullStack Developer", "Web Developer", "Machine Learning Engineer", "Self Learner"]
    const period = 70
   // console.log(active)
    return (
        <li className={`l-section section ${active}`}>
          
          <div className="title">
            <h3 id="hello">Hello I'm</h3>
            <h1 className='name'>Ayush Dayani</h1>
          </div>
          <Typewriter messages={messages} period={period} />
          </li>
    )
}



// ********************************************************************************************************




const Typewriter = ({ messages, period }) => {
  const [text, setText] = React.useState('');
  const [isDeleting, setIsDeleting] = React.useState(false);
  const [loopNum, setLoopNum] = React.useState(0);
  const typingRef = React.useRef(null);
  React.useEffect(() => {
    const updateText = () => {
     
      const i = loopNum % messages.length;
      const fullTxt = messages[i];

      if (isDeleting) {
        setText(fullTxt.substring(0, text.length - 1));
      } else {
        setText(fullTxt.substring(0, text.length + 1));
      }

      if (!isDeleting && text === fullTxt) {
        setIsDeleting(true);
      } else if (isDeleting && text === '') {
        setIsDeleting(false);
        setLoopNum(loopNum + 1);
      }

    };

    // Start the typewriter effect when the component mounts
    typingRef.current = setTimeout(updateText, period);
    return () => {
      // Cleanup: cancel any ongoing setTimeouts when the component unmounts
      clearTimeout(typingRef.current);
    };
  }, [messages, period, loopNum, isDeleting, text]);

  return (
    <h1>
      <div className="typewrite">
        <span className="wrap">{text}_</span>
      </div>
    </h1>
  );
};
