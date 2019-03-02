
## Home assignment from mintos

Your task is to create simple RSS reader web application with following views:
1) User registration - form with e-mail and password fields + e-mail verification using ajax.
Existence of already registered e-mail should be checked “on the fly” via ajax call when writing e-mail address and before submitting form.
2) Login form with e-mail address and password
3) RSS feed view (Feed source: https://www.theregister.co.uk/software/headlines.atom)
     *) After successful login in top section display 10 most frequent words with their respective counts in the whole feed excluding top 50 English common words (taken from here https://en.wikipedia.org/wiki/Most_common_words_in_English)
     *)Underneath create list of feed items.

## Solution

This solution based on Laravel 5.8 and Vue.Js.

## How to install

- Clone this project
- Go to the folder application using cd command on your cmd or terminal
- Run composer install on your cmd or terminal
- Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu
- Open my .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration. 
- By default, the username is root and you can leave the password field empty. 
- By default, the username is root and password is also root.
- Run php artisan key:generate
- Run php artisan migrate
- Run php artisan serve
- Go to localhost:8000

