import React, { useRef, useEffect } from 'react';
import mapboxgl from 'mapbox-gl';

function Map() {
  const mapContainerRef = useRef(null);
  const [map, setMap] = React.useState(null);
  const YOUR_LONGITUDE=-73.133850
  const YOUR_LATITUDE=40.902771
  const YOUR_ZOOM_LEVEL=12
  useEffect(() => {
    if (!map) {
    mapboxgl.accessToken = 'pk.eyJ1IjoiYWRheWFuaSIsImEiOiJjbGZ0MzNxeGQwM21tM29wbndqcnZibW5nIn0.yEac8gYgYTYFMGY30Zji2w';
    const newMap = new mapboxgl.Map({
      container: mapContainerRef.current,
      style: 'mapbox://styles/mapbox/dark-v10',
    //   style: 'mapbox://styles/mapbox/streets-v12',
      center: [YOUR_LONGITUDE, YOUR_LATITUDE],
      zoom: YOUR_ZOOM_LEVEL
    });

    // new mapboxgl.Marker()
    //   .setLngLat([YOUR_LONGITUDE, YOUR_LATITUDE])
    //   .addTo(newMap);
    
    new mapboxgl.Marker({
        color: '#0f33ff', // set marker color to red
        circleRadius: 10, // set marker shape to a circle
    }).setLngLat([YOUR_LONGITUDE, YOUR_LATITUDE]).addTo(newMap);

    const nav = new mapboxgl.NavigationControl();
    newMap.addControl(nav, 'top-right');
    setMap(newMap);

    // eslint-disable-next-line
    }}, [map]);

  return (
    <div className="map-wrapper">
        <div ref={mapContainerRef} className='map-container' />
    </div>
        )
    ;
}

export default Map;
