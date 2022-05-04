# BRS(Book Rental System)-Laravel
Fullstack web application developed using Laravel and using a local SQLite database, and Twitter Boostrap as a CSS framework.

# Application Idea:
Online Book Rental System.\
in the system there are diffrenet functionlities for different users, the system includes 3 cateogries of users: \
anonymous ,readers , and librarians.

# functionlities for the three categories are the following:

## anonymous users can:
search for books by author or title \
list books by genre\
view the data sheet of a selected book
## A registered and authenticated reader can:
borrow a book\
view his/her active book rentals, and\
view the details of a selected book rental
## A librarian can:
add, edit or delete a book\
add, editg or delete a genre,\
list book rentals,\
view the details of a book rental,\
chang some status on a book rental, like status, deadline, note.

# to run the application you have to run the following commands:
composer install\
npm install\
npm run prod\
php artisan migrate:fresh\
php artisan db:seed\
php artisan serve


# Note:
The database tables are created by migrations and seeded with some fake data.
