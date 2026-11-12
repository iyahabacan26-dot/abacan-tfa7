# Laravel POS Management System — TFA7

A Laravel application for managing customer and user records, with form validation, editing, and profile-picture uploads.

## Features

- Customer listing, creation, and editing
- User listing, creation, and editing
- Required-field and email validation
- Unique username validation
- Validation messages and preservation of previous form input
- Optional user avatar upload on the edit page
- JPG, PNG, and WebP uploads up to 2 MB
- Image dimensions limited to 6000 × 6000 pixels
- Avatar preparation as a 256 × 256 PNG thumbnail using Intervention Image
- Public-disk image storage, with only the relative path saved in the database
- Placeholder image for users without an avatar

## Requirements

- PHP 8.2 or later, compatible with composer.lock
- Composer
- PHP GD, mbstring, PDO SQLite, and SQLite3 extensions

## Local Setup

1. Download or clone this repository and open a terminal in the project folder.

2. Install dependencies:

   ```bash
   composer install
   ```

3. Copy `.env.example` to `.env`.

   Windows PowerShell:

   ```powershell
   Copy-Item .env.example .env
   ```

   macOS/Linux:

   ```bash
   cp .env.example .env
   ```

4. Generate the application key:

   ```bash
   php artisan key:generate
   ```

5. Set the database connection in `.env`:

   ```env
   DB_CONNECTION=sqlite
   ```

6. Create an empty `database/database.sqlite` file if it does not exist.

7. Clear cached configuration and create the database tables:

   ```bash
   php artisan config:clear
   php artisan migrate
   ```

8. Load five sample customers and five sample users:

   ```bash
   php artisan db:seed
   ```

9. Create the public storage link:

   ```bash
   php artisan storage:link
   ```

10. Start the development server:

    ```bash
    php artisan serve
    ```

11. Open the address printed in the terminal, normally:

    http://127.0.0.1:8000

## Main Pages

- `/` — Home
- `/about` — About
- `/customers` — Customer listing
- `/customers/create` — Create customer
- `/customers/{customer}/edit` — Edit customer
- `/users` — User listing
- `/users/create` — Create user
- `/users/{user}/edit` — Edit user and upload an avatar

Replace route placeholders with an existing record ID.

## Avatar Storage

Processed thumbnails are stored in `storage/app/public/avatars`.
The database stores only the relative path, such as `avatars/unique-id.png`.

Uploading a replacement removes the previous avatar after the record is saved.
Editing without selecting a new image preserves the existing avatar.

Uploaded avatars are local runtime files and are not included in the repository.
New installations display placeholder images until avatars are uploaded.

## Database

Migration and seeder files are included to recreate the database.
The local SQLite database and private `.env` file are excluded from version control.

## Hosting

The hosted application URL will be added after deployment.