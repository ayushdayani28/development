import React from 'react'
import {learn} from './data'

export default function Learning(){
    let tList = []
    for (const t in learn['tech']){
        const temp = learn['tech'][t]
        tList.push(<li key={temp['id']} className='c-list' style={{backgroundImage:`url(${temp['img']})`}}>
            <a href={temp['link']} target='_blank' style={{color:`${temp['color']}`,}}><h1>{temp['course']}</h1></a>
            <div className='c-details'>
                <h3>{temp['inst']}</h3>
                <h3>{temp['pf']}</h3>
                <h3 id = 'c-status'>Status: {temp['status']===100?'Completed':`${temp['status']}%`}</h3>
            </div>
        </li>)
    }
    let rList = []
    for (const r in learn['readings']){
        const temp = learn['readings'][r]
        rList.push(
            <a key={temp['id']} href={temp['link']} target='_blank'>
                <li  className='r-list' style={{backgroundImage:`url(${temp['img']})`}}>
        </li>
        </a>)

    }
    return (
        <div className='learning'>
            <h1>Active Learning</h1>
            <div className='course'>
                <h2>Courses</h2>
                <ul>
                    {tList}
                </ul>
            </div>
            <div className="width80">
                <div className="divider light" />
            </div>
            <div className='readings'>
                <h2>Readings</h2>
                <ul>
                    {rList}
                </ul>
            </div>
            
        </div>
    )
}