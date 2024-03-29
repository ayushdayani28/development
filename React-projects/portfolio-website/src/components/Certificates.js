import React from 'react'
import {certi} from './data'
import $ from 'jquery'
export default function Certificates(){
    const [page, setPage] = React.useState(0)
    const len = certi.length
   
    const [click, setClick] = React.useState(0)
    const sliderRef = React.useRef(null)



  React.useEffect(()=>{
    if (click){
    $(sliderRef.current).animate({ opacity: 0 }, 400)
    }else{$(sliderRef.current).animate({ opacity: 1 }, 400)}

  }, [click])



const handlePrevClick = (len) => {
    setClick(1)
    setTimeout(() => {
    setPage(page => {
        if(page === 0){
            return len-1
        }else{
            return page-1
        }
    })

    setClick(0)
    ;},400)
  };

  const handleNextClick = (len) => {
    setClick(1)
    setTimeout(() => {
        setPage(page => {
            if(page === len-1){
                return 0
            }else{
                return page+1
            }
        })

    setClick(0)
    ;},400)
  };




    return (
      <div className="certificate">
        <h2>{certi[page]['name']}</h2>
        <div className="certificate--lockup">
          <ul className='slider' ref={sliderRef} >
            <li className={`slider--item slider--item-center`}>
                <div className="slider--item-image">
                  <img src={require(`../${certi[page]['img']}`)}  alt={page}/>
                </div>
                {certi[page]['link'] ? <a href={certi[page]['link']} target='_blank' rel="noreferrer"><h2>{certi[page]['venue']}</h2></a>: <h2>{certi[page]['venue']}</h2>}
                <p>{certi[page]['desc']}</p>
            </li>
          </ul>
          <div className="slider--prev" onClick={() => handlePrevClick(len)}>
            <svg version="1.1" id="Layer_1" xmlns="https://www.w3.org/2000/svg" xmlnsXlink="https://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="0 0 150 118" style={{enableBackground:"new 0 0 150 118"}} xmlSpace="preserve">
              <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                <path d="M561,1169C525,1155,10,640,3,612c-3-13,1-36,8-52c8-15,134-145,281-289C527,41,562,10,590,10c22,0,41,9,61,29
                c55,55,49,64-163,278L296,510h575c564,0,576,0,597,20c46,43,37,109-18,137c-19,10-159,13-590,13l-565,1l182,180
                c101,99,187,188,193,199c16,30,12,57-12,84C631,1174,595,1183,561,1169z"/>
              </g>
            </svg>
          </div>
          <div className="slider--next" onClick={() => handleNextClick(len)}>
              <svg version="1.1" id="Layer_1" xmlns="https://www.w3.org/2000/svg" xmlnsXlink="https://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="0 0 150 118" style={{enableBackground:"new 0 0 150 118"}} xmlSpace="preserve">
              <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,
                597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,
                1180,926,1196,870,1167z"/>
              </g>
            </svg>
          </div>
        </div>
      </div>
    
    )
}

  // React.useEffect(()=>{
  //   if (isHovering){
  //   setTimeout(()=>{
  //     $(hoverRef.current).animate({width:'85vw'},800)}
  //   ,200)
      
  // }})