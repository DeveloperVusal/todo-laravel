require('./bootstrap');

import buttons from './components/buttons'

for (let key of buttons) {
    key()
}