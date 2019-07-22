import React from 'react'
import ReactDOM from 'react-dom'
import { Provider } from 'react-redux'
import { store } from './helpers'
import { App } from './App'

// setup fake backend
// import { configureFakeBackend } from './helpers'
// configureFakeBackend()

ReactDOM.render(
    <Provider store={store}>
        <App />
    </Provider>
, document.getElementById('root'));

