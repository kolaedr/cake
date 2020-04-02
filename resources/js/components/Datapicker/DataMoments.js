import 'input-moment/dist/input-moment.css';
// import 'app.less';
import moment from 'moment';
import React, { Component, useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import InputMoment from 'input-moment';
import packageJson from 'input-moment/package.json';

const DataMoments =()=> {
const [mm, setMoment] = useState(moment());
//   state = {
//     m: moment()
//   };

//   handleChange = m => {
//     // this.setState({ m });
//     setMoment(m);
//   };

//   handleSave = () => {
//     console.log('saved', this.state.m.format('llll'));
//   };

    return (
      <div className="app">
        <form>
          <div className="input">
            <input type="text" value={mm.format('llll')} readOnly />
          </div>
          <InputMoment
            moment={mm}
            // onChange={setMoment()}
            minStep={5}
            // onSave={handleSave}
          />
        </form>
      </div>
    );
}

// ReactDOM.render(<DataMoments />, document.getElementById('data-moments'));
export default DataMoments;

if (document.getElementById('data-moments')) {
    ReactDOM.render(<DataMoments />, document.getElementById('data-moments'));
}
