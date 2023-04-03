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
        console.log(view)
    }

    function sActive(page){
        setActive(page)
    }

    const handleWheel = (event) => {
        // const element = elementRef.current;
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

        setScrollAmount((prevAmount) => prevAmount + deltaY);

    };
    function dummy(){

    }

    function effectAnimate(view){
        if (view===1){
            return showAnimation ? `effect-rotate-left--animate` : '';
        } 
    }
    
    // function reverseAnimate(view){
    //     if (view===0){
    //     return showAnimation ? `` : ''; }
    // }

    return (
        <div  className={`perspective effect-rotate-left perspective--modalview ${isVis===0?'':`${effectAnimate(isVis)}`}`}
                 onWheel={handleWheel}>
            <div className="container" onClick={()=>{isVis === 0 ? dummy() :setVis(0)}}>
                <div className={`outer-view--return ${isVis===1?'is-vis':''}`} ></div>
                {!isVis && <div id="viewport" className="l-viewport" >
                    <div className="l-wrapper" >
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
                        />
                    </div>
                </div>}
            </div>
            <Search 
                isVis={isVis}
                setIsVis={setVis}
                content={content}
            />
            <SearchBar
                isVis={isVis}
                setIsVis={setVis}
                setContent={setContent}
            />
        </div>
    )
}

