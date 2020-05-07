import React, { useState } from 'react';
import Timer from './components/timer/timer'
import './App.scss';

import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link,
  useHistory
} from "react-router-dom";

// It's setting a state called timeId, and it default value is ''
function TimeId() {
  const history = useHistory()

  function goToTimeId(timeId){
    history.push('/blogger/workout-timer/build/timer/'+timeId)
  }

  function createTimeId(timeId) {
    localStorage.setItem(timeId, '{}')
    console.log('Time id created')
    goToTimeId(timeId)
  }

  const [timeId, setTimeId] = useState('')
  return (
    <div>
      <label>Time id:</label>
      <input type="text" value={timeId} onChange={(event) => setTimeId(event.target.value)} />
      {
        localStorage.getItem(timeId) // If localStorage with key timeid find
          ?
          (
            <div>
              <small>Time id found. Do you want do load it?</small>
              <Link to={"/blogger/workout-timer/build/timer/" + timeId}>
                <button className="btn-main" onClick={() => console.log(timeId)}>Load Timer</button>
              </Link>
            </div>
          )
          : // Else localStorage with key timeid find
          timeId === null || timeId === '' // If timeId null or ''
            ?
            (
              <small>You must type a key for your time id</small>
            )
            : // else timeId null or ''
            (
              <div>
                <small>Time id don't found. Do you want to create one?</small>
                <button className="btn-main" onClick={() => createTimeId(timeId)}>Create Timer</button>
              </div>
            )
      }
    </div>
  )
}

function App() {
  return (
    <div className="appMain">
      <h1>Time Workout</h1>
      <Router>
        <Switch>
          <Route exact path='/'>
            <TimeId />
          </Route>
          <Route exact path='/blogger/workout-timer/build/timer/:timeId' component={Timer} />
        </Switch>
      </Router>
    </div>
  );
}

export default App;
