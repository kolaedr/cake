
import React, { useState, useEffect } from 'react';
// import DayPicker from "react-day-picker";
import * as moment from 'moment';
import DayPickerInput from 'react-day-picker/DayPickerInput';
import ReactDOM from 'react-dom';
import "react-day-picker/lib/style.css";

const WEEKDAYS_SHORT = {
    ru: ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс'],
};
const MONTHS = {
    ru: [
        'Январь',
        'Февраль',
        'Март',
        'Апрель',
        'Май',
        'Июнь',
        'Июль',
        'Август',
        'Сентябрь',
        'Октябрь',
        'Ноябрь',
        'Декабрь',
    ],
};

const WEEKDAYS_LONG = {
    ru: [
        'Воскресенье',
        'Понедельник',
        'Вторник',
        'Среда',
        'Четверг',
        'Пятница',
        'Суббота',
    ],
};

const FIRST_DAY_OF_WEEK = {
    ru: 0,
};
const locale = 'ru';

const birthdayStyle = `.DayPicker-Day--disabled {
    background-color: orange;
    color: white;
  }`;

//   Moment.globalMoment = moment;



const Datapicker = () => {
    const dd = moment().format('YYYY-MM-DD');
    const [days, setDay] = useState(dd);

    // let mome = moment().format('YYYY-MM-DD');
    console.log('object :', moment('2020-4-23').format('YYYY-MM-DD'));

    // console.log(day.toLocaleDateString())
    const handleDayClick = (day, { selected }) => {
        selected ? undefined : setDay(day||'');
    };

    return (<div>
        <DayPickerInput
        locale={locale}
        months={MONTHS[locale]}
        weekdaysLong={WEEKDAYS_LONG[locale]}
        weekdaysShort={WEEKDAYS_SHORT[locale]}
        firstDayOfWeek={FIRST_DAY_OF_WEEK[locale]}
        initialMonth={new Date()}
        fromMonth={new Date()}
        onDayClick={handleDayClick}
        // selectedDays={days}
        // disabledDays={[
        //     moment('2020-3-23').format('YYYY-MM-DD'),
        //     moment('2020-3-25').format('YYYY-MM-DD'),
        //     // new Date(2020, 3, 23),
        //     // new Date(2020, 3, 25),
        //     // {
        //     // after: new Date(2020, 3, 27),
        //     // before: new Date(2020, 3, 29),
        //     // },
        // ]}
        dayPickerProps={{
            selectedDays: {days},
            disabledDays: {
              daysOfWeek: [1, 3],

                },
          }}
         />
        <input name="booking" type="hidden" value={days} id="booking" />
    </div>
    );

}

// const handleDayClick = (day, { selected }) =>{
//     selected ? undefined : setDay(day);
// }<input name="booking" type="hidden" value={`${Date.parse(days).toISOString()}`} id="booking" />

export default Datapicker;

if (document.getElementById('data-picker')) {
    ReactDOM.render(<Datapicker />, document.getElementById('data-picker'));
}



// <DayPicker
//             locale={locale}
//             months={MONTHS[locale]}
//             weekdaysLong={WEEKDAYS_LONG[locale]}
//             weekdaysShort={WEEKDAYS_SHORT[locale]}
//             firstDayOfWeek={FIRST_DAY_OF_WEEK[locale]}
//             initialMonth={new Date()}
//             fromMonth={new Date()}
//             onDayClick={handleDayClick}
//             selectedDays={days}
//             disabledDays={[
//                 new Date(2020, 3, 23),
//                 new Date(2020, 3, 25),
//                 {
//                 after: new Date(2020, 3, 27),
//                 before: new Date(2020, 3, 29),
//                 },
//             ]}
//         />
