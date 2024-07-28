# Laravel-Quiz-Assaignment
Quiz application.

# Project short Description :

Here, I have used laravel latest 11.0 version.
1. At first, user will receive a page where all quiz questions will be shown but if any non-logged in users access thses quizzes this will redirect to login page. Non-logged in users cannot access these add quiz and result menus.
2. Logged in user can add quiz and can play other users quizzes and show their result which is initially 0. 
3. Logged in user cannot play their quiz.
4. Logged in user cannot access login and register page.
5. 3 users created in members table. password is 123456.

# Instructions for running the project locally

1. Install xampp in browser and then start apache and mysql. Then open localhost dashboard in browser.
2. Create a database in localhost , name quiz_assaignment
3. After download all folders , there is a quiz_db zip file. Unzip quiz_db folder and then import the database in mysql quiz_assaignment database.
4. Remove quiz_db folder from the project folder.
5. Open cmd inside the project folder.
6. Run composer install.
7. Run php artisan key:generate.
8. Next run php artisan serve.
9. There will generate an url. Run the URL in browser and project will be open.
