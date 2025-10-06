
# Course Enrollment API

## Setup instructions
1. Clone the project repository.
2. Run:
   ```bash
   composer install
   ```
3. Copy `.env.example` to `.env`:
   ```bash
   cp .env.example .env
   ```
4. Update the `.env` file with your database settings:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=course_enrollment
   DB_USERNAME=root
   DB_PASSWORD=
   ```
5. Run the migrations:
   ```bash
   php artisan migrate
   ```
6. Start the server:
   ```bash
   php artisan serve
   ```

The project will run at:  
`http://127.0.0.1:8000`

## How to test each API endpoint
- **POST /register**: Register a new user.  
  Body: `name`, `email`, `password`, `password_confirmation`

- **POST /login**: Login with email and password.  
  Body: `email`, `password`

- **POST /logout**: Logout the logged-in user.  
  Requires JWT token in header.

- **GET /courses**: Get all available courses.

- **POST /enroll**: Enroll in a course.  
  Requires JWT token.  
  Body: `course_id`

- **GET /my-courses**: Get courses the logged-in user is enrolled in.  
  Requires JWT token.

## Notes
- All protected endpoints require a valid JWT token in the Authorization header:
  ```
  Authorization: Bearer {token}
  ```
- The `/logout` endpoint should also be protected with JWT.
- Courses should be created in the database before enrolling.
- This project only provides API endpoints (no frontend views).
