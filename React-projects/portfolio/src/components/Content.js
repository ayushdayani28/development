import Home from './Home'
import Education from './Education'
import Work from './Work'
import Skills from './Skills'
import Contact from './Contact'
import About from './About'
export default function Content(props){

    return (
        <ul className="l-main-content main-content" >
          <Home active={props.active}/>
          <About active={props.active}/>
          <Education active={props.active}/>
          <Work active={props.active}/>
          <Skills active={props.active}/>
          <Contact active={props.active}/>
        </ul>
    )
}