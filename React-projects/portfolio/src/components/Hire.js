import React from 'react'

export default function Hire(props){
  let active
  if (props.active === 6){
      active = "section--is-active"
  } else {
      active = ""
  }

  
    return(
        <li className={`l-section section ${active}`}>
          <div className="hire">
            <h2>You want us to do</h2>
            <form className="work-request">
              <div className="work-request--options">
                <span className="options-a">
                  <input id="opt-1" type="checkbox" value="app design" />
                  <label htmlFor="opt-1">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      viewBox="0 0 150 111" style={{enableBackground:"new 0 0 150 111"}} xmlSpace="preserve">
                      <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                        <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                      </g>
                      </svg>
                      App Design
                    </label>
                    <input id="opt-2" type="checkbox" value="graphic design" />
                    <label htmlFor="opt-2">
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      viewBox="0 0 150 111" style={{enableBackground:"new 0 0 150 111"}} xmlSpace="preserve">
                      <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                        <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                      </g>
                      </svg>
                      Graphic Design
                    </label>
                    <input id="opt-3" type="checkbox" value="motion design" />
                    <label htmlFor="opt-3">
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      viewBox="0 0 150 111" style={{enableBackground:"new 0 0 150 111"}} xmlSpace="preserve">
                      <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                        <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                      </g>
                      </svg>
                      Motion Design
                    </label>
                  </span>
                  <span className="options-b">
                    <input id="opt-4" type="checkbox" value="ux design" />
                    <label htmlFor="opt-4">
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      viewBox="0 0 150 111" style={{enableBackground:"new 0 0 150 111"}} xmlSpace="preserve">
                      <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                        <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                      </g>
                      </svg>
                      UX Design
                    </label>
                    <input id="opt-5" type="checkbox" value="webdesign" />
                    <label htmlFor="opt-5">
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      viewBox="0 0 150 111" style={{enableBackground:"new 0 0 150 111"}} xmlSpace="preserve">
                      <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                        <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                      </g>
                      </svg>
                      Webdesign
                    </label>
                    <input id="opt-6" type="checkbox" value="marketing" />
                    <label htmlFor="opt-6">
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      viewBox="0 0 150 111" style={{enableBackground:"new 0 0 150 111"}} xmlSpace="preserve">
                      <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                        <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                      </g>
                      </svg>
                      Marketing
                    </label>
                  </span>
                </div>
                <div className="work-request--information">
                  <div className="information-name">
                    <input id="name" type="text" spellCheck="false" />
                    <label htmlFor="name">Name</label>
                  </div>
                  <div className="information-email">
                    <input id="email" type="email" spellCheck="false" />
                    <label htmlFor="email">Email</label>
                  </div>
                </div>
                <input type="submit" value="Send Request" />
              </form>
            </div>
          </li>
    )
}