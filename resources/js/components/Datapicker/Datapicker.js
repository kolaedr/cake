
import React, { useState, useEffect } from 'react';
import DayPicker from "react-day-picker";
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

const birthdayStyle = `.DayPicker-Day--highlighted {
    background-color: orange;
    color: white;
  }`;


const Datapicker = () => {
    const dd = new Date();
    const [days, setDay] = useState(dd);

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
        selectedDays={days}
        disabledDays={[
            new Date(2020, 3, 23),
            new Date(2020, 3, 25),
            {
            after: new Date(2020, 3, 27),
            before: new Date(2020, 3, 29),
            },
        ]}
         />

        <input name="booking" type="hidden" value={`${Date.parse(days).toISOString()}`} id="booking" />

    </div>
    );

}

// const handleDayClick = (day, { selected }) =>{
//     selected ? undefined : setDay(day);
// }

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
