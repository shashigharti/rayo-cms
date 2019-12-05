# Core Module for CMS
## Backend API(Laravel)

composer install
php artisan passport:keys
php artisan passport:client

Once the client is generated, copy the keys to .env file
PASSPORT_CLIENT_ID=1
PASSPORT_CLIENT_SECRET=v5AVQSwl4GI3g0XAbQhzkeiw48OZtnJBwmK7OiRv

Make a post request to http://localhost/lgprofile-app/public/oauth/token with following data
client_id:1
client_secret:v5AVQSwl4GI3g0XAbQhzkeiw48OZtnJBwmK7OiRv
scope:*
grant_type:client_credentials

##FrontEnd (React)
npm install
npm run build

##Conventions for React
https://github.com/airbnb/javascript/tree/master/react#naming


##To initialize the sub modules
git submodule init


##To update
git submodule update

##Install react node modules library
npm install --prefix resources/assets/js/modules

##Transpile react code; This will create a app.min.js file in public/assets/js
npm run prod --prefix resources/assets/js/modules

