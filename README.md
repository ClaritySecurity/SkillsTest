Welcome to the Clarity Skills Test Sandbox

Initial Setup
1. Clone repo `git clone https://github.com/ClaritySecurity/SkillsTest.git`
2. Checkout branch `git checkout backend-senior`
3. modify docker-compose.yml to ensure correct database image for your 
   processor architecture
4. run `docker-compose up -d` or maybe have to do `docker-compose up -d 
--build`?
5. Open terminal from docker desktop 'devskillstest' container
6. run `composer install`
7. run `npm install`
8. run `php artisan migrate`
9. run `npm run build`
10. visit http://localhost/index to confirm that the app is running.

API documentation: 
https://rapidapi.com/apidojo/api/realty-in-us/playground/apiendpoint_c4d477ea-7292-48fa-9dfe-f093f2adf8ac

Bootstrap 5.3 is already included in the project: 
https://getbootstrap.com/docs/5.3/getting-started/introduction/

