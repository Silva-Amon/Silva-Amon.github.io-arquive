import React, { useState, useEffect } from 'react'
import { useParams } from 'react-router-dom'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faPlay, faPause } from '@fortawesome/free-solid-svg-icons'
import './timer.scss'

export default function Timer() {
    const [play, setPlay] = useState(false)
    const [hour, setHour] = useState('00')
    const [minute, setMinute] = useState('00')
    const [second, setSecond] = useState('00')
    let { timeId } = useParams()

    useEffect(() => {
        if (play === true) {
            const interval = setInterval(
                () => {
                    setSecond(second => {
                        if (second === 59) {
                            setMinute(minute => {
                                if (minute === 59) {
                                    setHour(hour => parseInt(hour) < 9 ? '0'+ (parseInt(hour) + 1) : parseInt(hour) + 1)
                                    return '00'
                                }
                                return parseInt(minute) < 9 ? '0' +  (parseInt(minute) +1 ) : parseInt(minute) + 1
                            })
                            return '00'
                        }
                        return parseInt(second) < 9 ? '0' + (parseInt(second) + 1) : parseInt(second) + 1
                    })
                }, 1000)
            return () => clearInterval(interval)
        }
    }, [play])

    return (
        <div className="timer">
            <h3>Timer id <span className="timeId">{timeId}</span></h3>
            <p className="time">
                <span className="hour">{hour}:</span>
                <span className="minute">{minute}:</span>
                <span className="second">{second}</span>
            </p>
            {
                play
                    ?
                    <button className="pause" onClick={() => setPlay(false)}>{<FontAwesomeIcon icon={faPause} />}</button>
                    :
                    <button className="play" onClick={() => setPlay(true)}>{<FontAwesomeIcon icon={faPlay} />}</button>
            }
        </div>
    )
}
