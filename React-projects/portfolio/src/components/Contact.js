// import EmailContact from "./EmailContact"
import Map from "./Map"
import ContactForm from './ContactForm';
import Socials from './Socials'
// import myResume from '../my-resume.pdf';

export default function Contact(props){
  let active
  if (props.active === 5){
      active = "section--is-active"
  } else {
      active = ""
  }
  const resumeUrl = 'https://drive.google.com/file/d/1Ht0jXy1DcchNL3JscpZc9byEpGL6ddmi/view?usp=sharing';

  const handleDownloadClick = () => {
    window.open(resumeUrl, '_blank');
  }
    return (
        <li className={`l-section section ${active}`}>
        <div className="contact">
          <div className="contact--lockup">
            <button onClick={handleDownloadClick} style={{zIndex:'1'}} className="btn btn-4" id='resume'>Download Resume</button>
            <Socials />
            <ContactForm />
            <Map />
          </div>
        </div>
      </li>
    )
}