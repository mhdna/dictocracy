# Dictocracy Laravel Project

## Description

This project is a PHP-based web application that allows users to create, edit, and manage definitions. It includes user authentication, role-based access control, and a dynamic UI built with Tailwind CSS.

## Features

- User authentication (login/register/logout)
- Role-based access control
- CRUD operations for definitions
- Pagination and filtering
- Dark mode support
- Responsive design using Tailwind CSS
- Search with a minimal autocompletion capability

## Installation

### Prerequisites

Ensure you have the following installed:

- PHP 8.0+
- Composer
- MySQL or SQLite
- Node.js & npm (for frontend assets)

### Steps

1. Clone the repository:

    ```bash
    git clone https://github.com/mhdna/dictocracy.git
    cd dictocracy
    ```

2. Install dependencies:

    ```bash
    composer install
    npm install && npm run dev
    ```

3. Set up the environment:

    ```bash
    cp .env.example .env
    ```

    Update `.env` with your database and application settings.

4. Generate application key:

    ```bash
    php artisan key:generate
    ```

5. Run database migrations and seed:

    ```bash
    php artisan migrate --seed
    ```

6. Start the development server:

    ```bash
    php artisan serve
    ```

## Usage

- Visit `http://localhost:8000` to access the application.
- Register or log in to create and manage definitions.
- Admin users can approve or reject submissions.

## Routes

### Public Routes

- `GET /` - Home page
- `GET /autocomplete` - Autocomplete search
- `GET /search` - Search terms
- `GET /term/{term}` - View a specific term
- `GET /termStartsWith` - Get terms starting with a letter

### Authenticated Routes

- `GET /userdefinitions` - View user definitions
- `GET /userTerm/{term}` - View a user’s term
- `POST /definition/{definition}/upvote` - Upvote a definition
- `POST /definition/{definition}/downvote` - Downvote a definition
- `DELETE /definition/{definition}/unvote` - Remove vote
- `GET /approve` - Approval dashboard
- `POST /approve/{id}` - Approve a definition
- `GET /account` - User account settings
- `DELETE /logout` - Logout user

### Admin Routes

- `Resource /roles` - Manage roles
- `Resource /users` - Manage users
- `Resource /definitions` - Manage definitions

### Authentication Routes

- `GET /register` - Show registration form
- `POST /register` - Register user
- `GET /login` - Show login form
- `POST /login` - Authenticate user

## License

This project is licensed under the MIT License. See the `LICENSE` file for more details.
