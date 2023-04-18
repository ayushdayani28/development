import React from 'react'
import Header from './Header'
import {Navbar, Search, SearchBar} from './Navbar'
import Content from './Content'

export default function Main(props){
    const [active, setActive] = React.useState(0)
    const [scrollAmount, setScrollAmount] = React.useState(0);
    const [isVis, setIsVis] = React.useState(0);
    const [showAnimation, setShowAnimation] = React.useState(false);
    const [content, setContent] = React.useState(null);
    const [projectSearch, setProjectSearch] = React.useState(null)
    const containerRef = React.useRef(null);
    const [touchStartTime, setTouchStartTime] = React.useState(null);

    React.useEffect(()=>{
        if (isVis!==0){
            const timeoutId = setTimeout(() => {
                setShowAnimation(true)
            },25);
            return () => clearTimeout(timeoutId); 
        } else {
            const timeoutId = setTimeout(() => {
                setShowAnimation(false)
            },400);
            return () => clearTimeout(timeoutId); 
        }
    }, [isVis]);

    function setVis(view){
        setIsVis(view)
    }

    function sActive(page){
        setActive(page)
    }

    const handleWheel = (event) => {
        if (!isVis){
        const { deltaY } = event;
        
        clearTimeout(handleWheel.timeoutId);

        handleWheel.timeoutId = setTimeout(() => {
        if (Math.abs(scrollAmount) > 20) {
            // console.log(scrollAmount);
            if (scrollAmount<0){
                if (active!==0){
                    sActive(active-1)
                }else{
                    sActive(5)
                }
            }else if(scrollAmount>0){
                if (active !== 5){
                    sActive(active+1)
                }else{
                    sActive(0)
                }
            }
        }
        setScrollAmount(0);
        }, 350);

        setScrollAmount((prevAmount) => prevAmount + deltaY);}

    };
   

    function effectAnimate(view){
            if (view===1){
                return showAnimation ? `effect-flip-center--animate` : 'effect-flip-center--animate';
            }   

    }
    
    function dummy(){}
    function handleProjectSearch(lang){
        setIsVis(1)
        setProjectSearch(lang)
    }

    const handleSwipe = (direction) => {
        // Handle swipe event based on direction (left or right)
        if (direction === 'top') {
            if (active!==0){
                sActive(active-1)
            }else{
                sActive(5)
        }
        } else if (direction === 'bottom') {
          // Handle swipe right
          if (active !== 5){
            sActive(active+1)
        }else{
            sActive(0)
        }
        }
      };
    
    const onTouchStart = (event) => {
        setTouchStartTime(new Date());
        const touchStartY = event.touches[0].clientY;
        const onTouchEnd = (event) => {
            const touchDuration = new Date() - touchStartTime;
            console.log(`Touch duration: ${touchDuration}ms`);
            // Reset touch start time
            if (touchDuration < 1800){
                const touchEndY = event.changedTouches[0].clientY;
                const minSwipeDistance = 50; // Minimum swipe distance threshold
                const swipeDistance = touchEndY - touchStartY;
                if (swipeDistance > minSwipeDistance) {
                handleSwipe('top');
                } else if (swipeDistance < -minSwipeDistance) {
                handleSwipe('bottom');
                }
            }
            containerRef.current.removeEventListener('touchend', onTouchEnd);
        };
        containerRef.current.addEventListener('touchend', onTouchEnd);
    };
    

    return (
        <div  className={`perspective effect-flip-center perspective--modalview ${isVis===0?'':`${effectAnimate(isVis)}`}`}
                 onWheel={handleWheel} onTouchStart={onTouchStart} ref={containerRef}>
            <div className="container" onClick={()=>{isVis === 0 ? dummy() : setVis(0)}}>
                {!isVis && <div id="viewport" className="viewport" >
                    <div className="vp-wrapper" >
                        {active!==0 && <Header 
                            isVis={isVis}
                            setIsVis={setVis}
                        />}
                        {active!==0 && <Navbar
                            active={active}
                            setActive={sActive}
                            // isVis={isVis}
                            
                        />}
                        <Content
                            active={active}
                            projectSearch={handleProjectSearch}
                        />
                        
                    </div>
                </div>}
            </div>
            {isVis && <Search 
                isVis={isVis}
                setIsVis={setVis}
                content={content}
                projectSearch={handleProjectSearch}
            />}

            {isVis && <SearchBar
                isVis={isVis}
                setIsVis={setVis}
                setContent={setContent}
                projectSearch={projectSearch}
                setProjectSearch={handleProjectSearch}
            />}
            
        </div>
    )
}

{/* <div className={`outer-view--return ${isVis===1?'is-vis':''}`} ></div> */}