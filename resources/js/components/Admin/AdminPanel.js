import React from 'react';
import { Admin, Resource, fetchUtils } from 'react-admin';
import ReactDOM from 'react-dom';
import jsonServerProvider from 'ra-data-json-server';
import simpleRestProvider from 'ra-data-simple-rest';
import { CakefillingList, CakefillingShow, CakefillingCreate, CakefillingEdit } from './Cakefilling';

const CSRF = document.getElementsByName('csrf-token')[0].content;

const httpClient = (url, options = {}) => {
    if (!options.headers) {
        options.headers = new Headers({ Accept: 'application/json' });
    }
    // add your own headers here
    // options.headers.set('X-Custom-Header', 'json');
    options.user = {
        authenticated: true,
        token: CSRF
    }
    return fetchUtils.fetchJson(url, options);
}

const dataProvider = jsonServerProvider('http://qsell:81/api', httpClient);
// const dataProvider = simpleRestProvider('http://qsell:81/api', httpClient);

const AdminPanel = () => (
    // <h1>TEst</h1>
    <Admin dataProvider={dataProvider} >
        <Resource name="cake-filling" options={{ label: 'Cake Filling' }} list={CakefillingList} show={CakefillingShow} edit={CakefillingEdit} create={CakefillingCreate}/>
    </Admin>
    );

export default AdminPanel;

// ReactDOM.render(<AdminPanel />, document.getElementById('admin'));
if (document.getElementById('admin')) {
    ReactDOM.render(<AdminPanel />, document.getElementById('admin'));
}
