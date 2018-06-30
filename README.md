# Decision-Maker
Decision maker is built with PHP and lets users to create a pole, and gives them a vote link to send to the participants and a result link to see the results. MySQL is used as database language and JQuery is used to create dyanmic pages.

# Dependencies
- Node
- PHP
- MySQL
- Apache


# Running the app
- If you don't have Apache and MySQL installed on your system, the easiest way is to install Xampp
- In the project directory go to ./includes/Tables.php and change the value for $user, $pass and $database_name to the username, password and the name of database your MySQL recognizes
- In your browser go to localhost:8080/dmaker

# ScreenShots
- The first page user sees. User should enter his email, the pole question and the choices for participants to vote

!["The chatty app page"](https://github.com/hajinasiri/Decision-Maker/blob/master/Docs/Screen%20Shot%202018-06-29%20at%209.22.30%20PM.png?raw=true)


- After entering the needed information user should press on submit button

!["The chatty app page"](https://github.com/hajinasiri/Decision-Maker/blob/master/Docs/Screen%20Shot%202018-06-29%20at%209.26.59%20PM.png?raw=true)


- On the next page the app gives the user two links, one for participants to vote, and one for showing results

!["The chatty app page"](https://github.com/hajinasiri/Decision-Maker/blob/master/Docs/Screen%20Shot%202018-06-29%20at%209.27.12%20PM.png?raw=true)


- By clicking on the vote link or entering it in address bar, user gets to the vote page and can rank the choices according to his preferance 

!["The chatty app page"](https://github.com/hajinasiri/Decision-Maker/blob/master/Docs/Screen%20Shot%202018-06-29%20at%209.27.37%20PM.png?raw=true)


- After submitting the vote, the app shows the result link one more time

!["The chatty app page"](https://github.com/hajinasiri/Decision-Maker/blob/master/Docs/Screen%20Shot%202018-06-29%20at%209.27.46%20PM.png?raw=true)


- On result page, the app shows the result of the pole up to the moment

!["The chatty app page"](https://github.com/hajinasiri/Decision-Maker/blob/master/Docs/Screen%20Shot%202018-06-29%20at%209.27.57%20PM.png?raw=true)
