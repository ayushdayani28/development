import React from 'react'

export default function Card(props){
    // console.log(props.item)
    return(
        <div className='card'>
            <img src={`${props.item.imageUrl}`} className="card--image" />
            <div>
                <div id='im_Loc'>
                    <i className="fa fa-map-marker marker"  style={{"fontSize":"12px", "color":"#F55A5A"}}></i>
                    <h3 id="location">{props.item.location.toUpperCase()}</h3>
                    <a id="gLink"  href={props.item.googleMapsUrl} target='_blank'>View on Google Maps</a>
                </div>
                <div id='details'>
                    <h1 id="place">{props.item.title}</h1>
                    <h3 id="duration">{props.item.startDate} - {props.item.endDate}</h3>
                    <p id='desc'>{props.item.description}</p>
                </div>
            </div>
        </div>
    )
    
    // return(
    //     data
    // )
}
