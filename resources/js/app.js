/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */
// require('./bootstrap');
// require('axios');
// require ('../../node_modules/jquery/src/jquery.js');
// require('jquery');
require('inputmask');
// import IMask from 'imask';

import $ from 'jquery';
window.$ = window.jQuery = $;
// import Inputmask from "inputmask";
// import 'inputmask/dist/jquery.inputmask.js';
import 'jquery-ui/ui/widgets/datepicker.js';


require('./app-custom');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// require('./components/Example');
// require('./components/Admin/AdminPanel');
require('./components/Datapicker/Datapicker');
// require('./components/Datapicker/DataMoments');


