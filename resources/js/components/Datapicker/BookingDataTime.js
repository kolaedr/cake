
import React, { useState, useEffect } from 'react';
import DatePicker, { registerLocale }  from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";
import * as moment from 'moment';
// import DayPickerInput from 'react-day-picker/DayPickerInput';
import ReactDOM from 'react-dom';
// import "react-day-picker/lib/style.css";
import {setHours, setMinutes, addDays, getDay, subDays, format, getDayOfYear} from "date-fns";
import el from "date-fns/locale/ru";
// import  from "date-fns/setMinutes";
import './BookingDataTime.css';
import axios from 'axios';
registerLocale("ru", el);
// const dd = moment().format('YYYY-MM-DD');



let disabledDay =[];
// const disabledDay = [new Date(2020, 3, 13), new Date(2020, 3, 23)];
const bookingDay = [new Date(2020, 3, 15), new Date(2020, 3, 25)];
// const bookingTime = [setHours(setMinutes(new Date(), 30), 12),
//     setHours(setMinutes(new Date(), 30), 19),
//     setHours(setMinutes(new Date(), 30), 13)];

// const highlightWithRanges = [
//     {
//       "react-datepicker__day--highlighted-custom-1": disabledDay
//     },
//     {
//       "react-datepicker__day--highlighted-custom-4": bookingDay
//     }
//   ];

// const renderDayContents = (day, date) => {
//     const tooltipText = `Tooltip for date: ${date}`;
//     return (<span title={tooltipText}>{getDate(date)}</span>);
//   };

const BookingDataTime = () => {
    const [startDate, setStartDate] = useState(new Date());
    const [disableDay, setDisableDay] = useState([]);
    const [count, setCount] = useState(0);
    const [freeDay, setFreeDay] = useState([]);
    const [booking, setBooking] = useState([]);
    // const [disableTime, setDisableTime] = useState([]);

    useEffect(() => {
            axios.get(`/api/booking-calendar`)
            .then(res => {
                setBooking(res.data);
                let disabledDay = res.data.booking.filter(function(item) {
                    if (item.cake_count === 0) {
                        return item;
                    }
                }).map(function(item) {
                    item = new Date(item.booking_day);
                    return item;
                });
                // let dd = disabledDay
                setDisableDay(disabledDay);

                // console.log('disabledDay ', dd);

                //work for all days
                // let disabledTime = res.data.disabled_times.map(function(item) {
                //     return new Date(item);
                //   });
                //   setDisableTime(disabledTime);
                        // let countCake = res.data.disabled_days.map(function(item) {
                        //     return new Date(item);
                        // });
                setFreeDay(res.data.cake_count);
                // console.log(res.data);
                });
                // console.log((subDays(new Date(), getDayOfYear(new Date()))));
        }, []);
        // const ExampleCustomInput = ({ value, onClick }) => (
        //     <button className="example-custom-input" onClick={onClick}>
        //       {value}
        //     </button>
        //   );

    const changeDya = (date) => {
        setStartDate(date);
        setCount(booking.default[0].cake_count);
        booking.booking.find(function(item) {
            if (getDayOfYear(new Date(item.booking_day)) == getDayOfYear(date)) {
                setCount(item.cake_count);
            }
        });
    };

    return (<div>
                 <span>На этот день осталось {count} торта.</span>
                <DatePicker
                //   customInput={<ExampleCustomInput />}
                    placeholderText="Click to select a date"
                    selected={startDate}
                    // onChange={date => setStartDate(date)}
                    onChange={date => changeDya(date)}
                    showTimeSelect
                    // highlightDates={highlightWithRanges}
                    excludeDates={disableDay}
                    minDate={moment().toDate()}
                    // excludeTimes={disableTime}       //work for all days
                    // filterDate={isWeekday}
                    dateFormat="MMMM d, yyyy HH:mm"
                    locale={'ru'}
                    timeFormat="p"
                    timeIntervals={15}
                    timeCaption="Время"
                    minTime={setHours(setMinutes(new Date(), 0), 8)}
                    maxTime={setHours(setMinutes(new Date(), 30), 20)}
                    // renderDayContents={renderDayContents}
                    // withPortal
                    inline
                />
                <input name="booking" type="hidden" value={format(startDate, 'Y-MM-dd HH:mm:ss')} id="booking" />
                <br />


      </div>
    );
  };

// const handleDayClick = (day, { selected }) =>{
//     selected ? undefined : setDay(day);
// }<input name="booking" type="hidden" value={`${Date.parse(days).toISOString()}`} id="booking" />

export default BookingDataTime;

if (document.getElementById('data-picker')) {
    ReactDOM.render(<BookingDataTime />, document.getElementById('data-picker'));
}



