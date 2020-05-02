import React from 'react'
import {useParams} from 'react-router-dom'
export default function Timer() {
    let { timeId } = useParams()
    return (
        <div>
        {console.log(timeId)}
            <h1>Timer</h1>
            <p>{timeId}</p>
        </div>
    )
}
