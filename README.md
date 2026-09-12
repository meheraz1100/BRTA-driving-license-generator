````markdown
# Digital Learner License Application

![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.5-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Blade](https://img.shields.io/badge/Blade-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![PHPUnit](https://img.shields.io/badge/PHPUnit-Tested-3C873A?style=for-the-badge)

A modern Laravel-based web application for managing a digital learner license application workflow.

The system allows users to register, authenticate, submit learner license applications, upload applicant information, track application status, and receive an approval notification with a generated PDF document.

Administrators can review submitted applications and approve or reject them through a dedicated admin dashboard.

> **Important:** This is an independent educational/demo project. It is not affiliated with, operated by, sponsored by, or endorsed by BRTA or any government authority. Any generated license-style document is a demo document and is **not a valid driving license, government ID, or official document.**

---

## ✨ Features

### 🔐 Authentication

- User registration
- User login
- User logout
- Authentication-protected application form
- Secure password hashing
- Automatic default user role
- Users cannot assign themselves the admin role
- Login-based application access

### 📝 Learner License Application

Authenticated users can:

- Submit learner license applications
- Enter personal information
- Enter identification information
- Enter date of birth
- Enter parent/spouse information
- Enter address information
- Enter contact information
- Select vehicle/class information
- Upload applicant photo
- Store application data in MySQL
- Receive a unique application number

Example application number:

```text
LL-2026-XXXXXXXX
````

### 📊 Application Management

Users can:

* View submitted applications
* View application details
* Track application status
* View pending applications
* View approved applications
* View rejected applications
* View rejection reasons
* Access approved demo PDF documents

### 👨‍💼 Admin Dashboard

Administrators can:

* Access the admin dashboard
* View submitted applications
* Review application details
* Approve pending applications
* Reject pending applications
* Provide rejection reasons
* Manage application status
* Trigger approval email notifications

### 📄 PDF Generation

The application supports PDF generation using:

```text
mPDF
```

Approved applications can generate a downloadable demo PDF containing relevant application information.

### 📧 Email Notification

When an application is approved:

```text
Admin approves application
        ↓
Application status updated
        ↓
PDF generated
        ↓
Approval email created
        ↓
PDF attached
        ↓
Email sent to applicant
```

### 🧪 Automated Testing

The project includes PHPUnit feature tests covering:

* Authentication
* Registration
* Login
* Logout
* Authorization
* Admin access
* Application submission
* Application ownership
* Application status
* Admin approval
* Admin rejection
* PDF generation
* Email notification
* PDF email attachment
* User application listing
* Navigation
* Theme preferences

---

# 🛠️ Technology Stack

## Backend

* PHP 8.5+
* Laravel 13
* MySQL 8+
* Laravel Eloquent ORM
* PHPUnit

## Frontend

* Blade
* Tailwind CSS
* JavaScript
* Vite

## PDF

* mPDF

## Email

* Laravel Mail
* SMTP

## Development

* Composer
* npm
* Node.js
* Git
* GitHub
* VS Code

---

# 🏗️ Application Architecture

The application follows Laravel's MVC architecture.

```text
                         ┌─────────────────┐
                         │     Browser     │
                         └────────┬────────┘
                                  │
                                  ▼
                         ┌─────────────────┐
                         │     Routes      │
                         └────────┬────────┘
                                  │
                                  ▼
                         ┌─────────────────┐
                         │   Controllers   │
                         └────────┬────────┘
                                  │
                    ┌─────────────┼─────────────┐
                    │             │             │
                    ▼             ▼             ▼
               Validation   Authorization   Services
                    │             │             │
                    └─────────────┼─────────────┘
                                  │
                                  ▼
                         ┌─────────────────┐
                         │     Models      │
                         └────────┬────────┘
                                  │
                                  ▼
                         ┌─────────────────┐
                         │      MySQL      │
                         └─────────────────┘
```

---

# 🔄 Application Workflow

```text
Guest
  │
  ├── Register
  │
  └── Login
       │
       ▼
Authenticated User
       │
       ▼
Submit Application
       │
       ▼
Pending
       │
       ▼
Admin Review
       │
       ├──────────────────────┐
       │                      │
       ▼                      ▼
   Approved                Rejected
       │                      │
       ▼                      ▼
Generate PDF          Store Rejection Reason
       │
       ▼
Send Approval Email
       │
       ▼
PDF Attachment
```

---

# 👥 User Roles

The application currently supports two roles.

| Role    | Description               |
| ------- | ------------------------- |
| `user`  | Normal applicant          |
| `admin` | Application administrator |

## User

A normal user can:

* Register
* Login
* Submit an application
* View their own applications
* Track application status
* View rejection information
* Access approved documents

A normal user cannot:

* Access the admin dashboard
* Approve applications
* Reject applications
* View other users' applications
* Change their role to admin

## Admin

An admin can:

* Access the admin dashboard
* View submitted applications
* Review application information
* Approve applications
* Reject applications
* Provide rejection reasons

---

# 📌 Application Status

Applications use the following statuses:

```text
pending
approved
rejected
```

### Pending

Newly submitted applications start with:

```text
pending
```

The application remains pending until an administrator reviews it.

### Approved

After approval:

```text
pending → approved
```

The applicant can then access the generated demo PDF and receive an approval email.

### Rejected

If rejected:

```text
pending → rejected
```

The administrator can provide a rejection reason.

---

# 🗄️ Database

The application uses **MySQL** as the database.

Example development database:

```text
brta_driving_license
```

The application stores users and learner license applications using Laravel migrations and Eloquent models.

---

# 💻 System Requirements

Before running the project, install:

* PHP 8.5+
* Composer
* MySQL 8+
* Node.js
* npm
* Git

Required PHP extensions:

```text
pdo_mysql
mysqli
mbstring
openssl
fileinfo
gd
```

Check your PHP version:

```bash
php -v
```

Check PHP extensions:

```bash
php -m
```

Make sure the following extensions are available:

```text
gd
mbstring
openssl
fileinfo
PDO
pdo_mysql
```

---

# 🚀 Installation

## 1. Clone the Repository

```bash
git clone https://github.com/YOUR_USERNAME/YOUR_REPOSITORY.git
```

Go to the project directory:

```bash
cd YOUR_REPOSITORY
```

---

## 2. Install Composer Dependencies

```bash
composer install
```

---

## 3. Install NPM Dependencies

```bash
npm install
```

---

## 4. Create Environment File

Copy `.env.example`:

### Linux / macOS

```bash
cp .env.example .env
```

### Windows PowerShell

```powershell
Copy-Item .env.example .env
```

---

## 5. Generate Application Key

```bash
php artisan key:generate
```

---

# ⚙️ Environment Configuration

Update your `.env` file.

Example:

```env
APP_NAME="Digital Learner License Application"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=brta_driving_license
DB_USERNAME=root
DB_PASSWORD=
```

If your MySQL server has a password:

```env
DB_PASSWORD=your_mysql_password
```

> Never commit `.env` to GitHub.

---

# 🗃️ Database Setup

Create the MySQL database:

```sql
CREATE DATABASE brta_driving_license;
```

Then run Laravel migrations:

```bash
php artisan migrate
```

If seeders are available:

```bash
php artisan db:seed
```

Or:

```bash
php artisan migrate --seed
```

---

# 📂 Storage Setup

Create the Laravel storage symlink:

```bash
php artisan storage:link
```

This connects:

```text
public/storage
        ↓
storage/app/public
```

Uploaded applicant files can then be served through the public storage path.

---

# 📧 Mail Configuration

The application uses Laravel's mail system for approval notifications.

Example Gmail SMTP configuration:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

For Gmail SMTP, use an **App Password** where required.

Do not use or commit your normal Gmail account password.

Never commit real mail credentials to GitHub.

---

# ▶️ Running the Application

Start Laravel:

```bash
php artisan serve
```

The application will normally be available at:

```text
http://127.0.0.1:8000
```

Start Vite in another terminal:

```bash
npm run dev
```

For production frontend assets:

```bash
npm run build
```

---

# 🧪 Testing

Run the complete test suite:

```bash
php artisan test
```

Run a specific test:

```bash
php artisan test --filter="AuthenticationTest"
```

Example:

```bash
php artisan test --filter="ApplicationApprovalMailTest"
```

---

# 🧪 Test Database

For testing, use a separate MySQL database.

Example:

```text
Development:
brta_driving_license

Testing:
brta_driving_license_test
```

Create the test database:

```sql
CREATE DATABASE brta_driving_license_test;
```

Configure the testing environment accordingly.

Example:

```xml
<env name="DB_CONNECTION" value="mysql"/>
<env name="DB_HOST" value="127.0.0.1"/>
<env name="DB_PORT" value="3306"/>
<env name="DB_DATABASE" value="brta_driving_license_test"/>
<env name="DB_USERNAME" value="root"/>
<env name="DB_PASSWORD" value=""/>
```

Using a separate database ensures that automated tests do not modify your development database.

---

# 🔒 Authentication & Authorization

Application routes are protected using Laravel authentication middleware.

Example:

```php
Route::middleware('auth')->group(function () {
    // Protected routes
});
```

Admin routes are protected with:

```php
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {
        // Admin routes
    });
```

This ensures that:

```text
Guest
  ↓
Cannot access application

User
  ↓
Can access own applications

Admin
  ↓
Can access admin dashboard
```

---

# 🛡️ Application Authorization

Application ownership is enforced through authorization policies.

The intended access model is:

```text
Application Owner
        ↓
Can view own application

Admin
        ↓
Can manage applications

Other Users
        ↓
Cannot access another user's application
```

This prevents unauthorized users from accessing private application information.

---

# 📄 PDF Generation

PDF documents are generated using:

```text
mPDF
```

The PDF generation logic is handled by:

```text
app/Services/LicenseCardPdf.php
```

The service is responsible for:

* Rendering the PDF view
* Configuring mPDF
* Generating PDF output
* Returning PDF data
* Providing PDF data for email attachments

Generated documents are intentionally presented as demo documents.

They contain a clear notice that they are not valid government-issued documents.

---

# ✉️ Approval Email

The approval email is handled through:

```text
app/Mail/ApplicationApprovedMail.php
```

When an administrator approves an application:

```text
Application
     ↓
Status = approved
     ↓
Generate PDF
     ↓
Create Mailable
     ↓
Attach PDF
     ↓
Send Email
```

The email includes:

* Applicant name
* Application number
* Approval status
* PDF attachment
* Application-related information

---

# 📮 Email Template

The approval email view is located at:

```text
resources/views/mail/application-approved.blade.php
```

The Mailable class is located at:

```text
app/Mail/ApplicationApprovedMail.php
```

Keeping the email template and Mailable class separate maintains a clean Laravel structure.

---

# 🧾 Application Number

Each application receives a unique application number.

Example:

```text
LL-2026-ARVPDK
```

The application number is used to identify the submitted application throughout the workflow.

---

# 🗺️ Routes

## Public Routes

```text
GET  /
GET  /register
POST /register
GET  /login
POST /login
```

## Authentication

```text
POST /logout
```

## User Routes

```text
GET  /my-applications

GET  /application
POST /application

GET  /application/{application}/success

GET  /application/{application}/license

GET  /application/{application}/license/pdf
```

## Admin Routes

```text
GET  /admin

POST /admin/applications/{application}/approve

POST /admin/applications/{application}/reject
```

---

# 📁 Project Structure

```text
registration-master/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── ...
│   │
│   ├── Mail/
│   │   └── ApplicationApprovedMail.php
│   │
│   ├── Models/
│   │   ├── Application.php
│   │   └── User.php
│   │
│   ├── Policies/
│   │   └── ApplicationPolicy.php
│   │
│   └── Services/
│       └── LicenseCardPdf.php
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── admin/
│       ├── auth/
│       ├── mail/
│       ├── registration/
│       └── ...
│
├── routes/
│   └── web.php
│
├── storage/
│
├── tests/
│   ├── Feature/
│   └── Unit/
│
├── public/
│
├── composer.json
├── package.json
├── phpunit.xml
└── README.md
```

---

# 🧩 Important Laravel Components

## Models

```text
app/Models/User.php
app/Models/Application.php
```

These models represent the application's users and submitted applications.

---

## Controllers

The application uses controllers to handle:

* Authentication
* Registration
* Application submission
* Application display
* Admin management
* Theme preferences

---

## Middleware

Middleware is used to protect:

* Authentication routes
* Admin routes
* Application access

---

## Policies

Policies handle application-level authorization and ownership checks.

---

## Services

PDF generation is separated into:

```text
app/Services/LicenseCardPdf.php
```

This keeps complex document-generation logic outside the controller.

---

# 🧹 Cache & Configuration

If Laravel does not reflect configuration or route changes, run:

```bash
php artisan optimize:clear
```

You can also run:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

---

# 🐛 Troubleshooting

## 1. `could not find driver`

If you see:

```text
could not find driver
```

verify that MySQL PDO support is enabled.

Check:

```bash
php -m
```

Make sure this appears:

```text
pdo_mysql
```

Check the active PHP configuration:

```bash
php --ini
```

---

## 2. `Vite manifest not found`

Run:

```bash
npm install
npm run build
```

For development:

```bash
npm run dev
```

---

## 3. Uploaded Images Are Not Showing

Run:

```bash
php artisan storage:link
```

Then verify:

```text
public/storage
```

exists.

---

## 4. Configuration Changes Are Not Working

Run:

```bash
php artisan optimize:clear
```

Then restart the Laravel server.

---

## 5. PDF Generation Problems

Verify required PHP extensions:

```text
gd
mbstring
openssl
fileinfo
```

Also make sure mPDF dependencies are installed:

```bash
composer install
```

---

# 🔐 Security Best Practices

Before deploying the application:

```env
APP_ENV=production
APP_DEBUG=false
```

Additional recommendations:

* Use HTTPS
* Use strong database credentials
* Never expose `.env`
* Never commit SMTP credentials
* Validate all user input
* Validate uploaded files
* Restrict upload file types
* Restrict upload file sizes
* Protect admin routes
* Use authorization policies
* Use a separate production database
* Keep Laravel dependencies updated
* Keep PHP updated
* Disable unnecessary debug information

---

# 🚀 Production Deployment

Before deployment:

```bash
composer install --no-dev --optimize-autoloader
npm install
npm run build
php artisan migrate --force
php artisan storage:link
php artisan optimize
```

Production environment example:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=your-database-host
DB_PORT=3306
DB_DATABASE=your-production-database
DB_USERNAME=your-production-user
DB_PASSWORD=your-production-password
```

Do not copy development credentials into production.

---

# ☁️ Deployment Architecture

A typical deployment architecture can look like:

```text
                       GitHub
                          │
                          ▼
                     Web Hosting
                          │
             ┌────────────┴────────────┐
             │                         │
             ▼                         ▼
         Laravel                    MySQL
             │
      ┌──────┴──────┐
      │             │
      ▼             ▼
   SMTP Mail      File Storage
```

For production deployments, uploaded files should preferably use persistent/cloud storage rather than relying entirely on ephemeral local storage.

---

# 📸 Screenshots

Add screenshots of the project inside:

```text
docs/screenshots/
```

Recommended screenshots:

```text
docs/
└── screenshots/
    ├── landing-page.png
    ├── register.png
    ├── login.png
    ├── application-form.png
    ├── application-success.png
    ├── my-applications.png
    ├── admin-dashboard.png
    ├── application-review.png
    ├── approved-application.png
    ├── rejected-application.png
    └── approval-email.png
```

Then display them in this README.

Example:

```md
## Screenshots

### Landing Page

![Landing Page](docs/screenshots/landing-page.png)

### Application Form

![Application Form](docs/screenshots/application-form.png)

### Admin Dashboard

![Admin Dashboard](docs/screenshots/admin-dashboard.png)
```

---

# 🌐 Live Demo

Add the deployed application URL here:

```text
https://your-domain.com
```

---

# 📦 Dependencies

Main backend dependencies include:

```text
Laravel Framework
mPDF
PHPUnit
```

Frontend dependencies include:

```text
Tailwind CSS
Vite
JavaScript
```

Install backend dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

---

# 🔄 Development Workflow

Recommended workflow:

```bash
git pull

composer install

npm install

php artisan migrate

npm run dev

php artisan serve
```

Before committing:

```bash
php artisan test
```

Build frontend assets when required:

```bash
npm run build
```

---

# 🌿 Git Workflow

Create a feature branch:

```bash
git checkout -b feature/application-search
```

Add changes:

```bash
git add .
```

Commit:

```bash
git commit -m "feat: add application search"
```

Push:

```bash
git push origin feature/application-search
```

---

# 📝 Recommended Commit Convention

Use descriptive commit messages.

Examples:

```text
feat: add learner license application form

feat: implement admin approval workflow

feat: add application rejection reason

feat: add PDF generation service

feat: send approval email with PDF attachment

test: add application authorization tests

test: add PDF download tests

fix: resolve MySQL connection issue

fix: resolve application ownership authorization

refactor: extract PDF generation into service
```

---

# 🧪 Testing Philosophy

The project follows a feature-oriented testing approach.

Important workflows are tested independently:

```text
Authentication
      ↓
Authorization
      ↓
Application Submission
      ↓
Application Ownership
      ↓
Application Status
      ↓
Admin Processing
      ↓
PDF Generation
      ↓
Email Notification
```

This helps ensure that important application workflows remain stable while new features are added.

---

# 🔮 Future Improvements

Planned improvements may include:

* Application search
* Application filtering
* Pagination
* Advanced admin dashboard
* Dashboard statistics
* Application audit logs
* Admin activity logs
* Email notification for rejected applications
* Password reset
* Email verification
* Two-factor authentication
* Queue-based email processing
* Cloud file storage
* Improved file management
* Application history
* User profile management
* API endpoints
* API authentication
* Rate limiting
* Advanced validation
* Accessibility improvements
* Improved mobile responsiveness
* Automated browser testing
* GitHub Actions CI/CD
* Production monitoring
* Error logging and reporting

---

# 🤝 Contributing

Contributions are welcome for educational and development purposes.

To contribute:

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add or update tests
5. Run the test suite
6. Commit your changes
7. Push your branch
8. Create a Pull Request

Example:

```bash
git checkout -b feature/new-feature
```

Run tests:

```bash
php artisan test
```

---

# 📜 License

This project is currently intended for educational and portfolio purposes.

If an open-source license is added to the repository, this section should be updated with the selected license and its complete terms.

---

# ⚠️ Disclaimer

This project is an independent educational/demo software project.

It is **not an official BRTA application** and is not affiliated with, sponsored by, authorized by, or endorsed by BRTA or any government authority.

The application workflow is inspired by real-world application-processing systems for educational and software-development purposes.

Any generated:

* License-style card
* PDF
* Application record
* Digital document
* Demo credential

is for demonstration purposes only.

These documents are **not valid government-issued documents, driving licenses, identity documents, or legal credentials**.

They must not be used to represent or impersonate an official government document.

---

# 👨‍💻 Author

## Mosaiyeb Meheraz

MERN Stack Developer | Laravel Developer | Software Developer

Bangladesh

### Skills

```text
Laravel
PHP
React
Next.js
Node.js
Express.js
TypeScript
JavaScript
MongoDB
MySQL
PostgreSQL
Prisma
REST API
Git
GitHub
```

### Interests

* Full-Stack Web Development
* Backend Development
* Software Architecture
* Database Design
* API Development
* Automation
* Developer Tools
* Open Source
* Software Engineering

---

# ⭐ Project

If you find this project useful or interesting, consider giving the repository a ⭐ on GitHub.

---

## Built With ❤️ Using

```text
Laravel 13
PHP 8.5
MySQL
Blade
Tailwind CSS
JavaScript
Vite
mPDF
PHPUnit
Composer
Git
GitHub
```

---

> A practical Laravel project demonstrating authentication, authorization, database-driven application processing, role-based administration, PDF generation, email notifications, file uploads, and automated testing.

