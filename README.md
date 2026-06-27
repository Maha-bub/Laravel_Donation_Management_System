# Donations Management System

A complete **Role-Based Donations Management System** built with **Laravel** from scratch for learning and portfolio purposes.

---

# 📖 About the Project

The **Donations Management System** is a web application that helps manage donations, donors, organizations, and fundraising campaigns efficiently.

This project is being developed **from scratch** without relying on AI-generated implementations. The primary goal is to gain a deep understanding of Laravel by building every feature manually while following best practices.

---

# 🎯 Project Goals

* Learn Laravel through a real-world application.
* Understand Authentication & Authorization.
* Implement Role-Based Access Control (RBAC).
* Practice CRUD Operations.
* Learn Laravel Middleware.
* Work with Eloquent ORM & Relationships.
* Build reusable and maintainable code.
* Create a portfolio-ready Laravel project.

---

# 👥 User Roles

## 🔹 Admin

### Responsibilities

* Manage all users
* Manage campaigns
* View all donations
* Approve or reject organizations
* Generate reports
* Manage system settings

---

## 🔹 Donor

### Responsibilities

* Register & Login
* Update profile
* Donate to campaigns
* View donation history
* Download donation receipts

---

## 🔹 Organization

### Responsibilities

* Register & Login
* Create fundraising campaigns
* Manage campaigns
* View received donations
* Track campaign progress

---

## 🔹 Volunteer *(Optional)*

### Responsibilities

* Join campaigns
* Update collection status
* View assigned tasks

---

# 🔐 Authentication Strategy

This application uses **a single `users` table**.

Each user is identified by a **role** column.

Example:

| Role         | Description                |
| ------------ | -------------------------- |
| admin        | System Administrator       |
| donor        | Donation Provider          |
| organization | NGO / Charity Organization |
| volunteer    | Campaign Volunteer         |

After successful login, users are redirected to their respective dashboards based on their role.

---

# 🛠 Tech Stack

* Laravel
* PHP
* MySQL
* Blade
* Bootstrap 5
* HTML5
* CSS3
* JavaScript
* Git & GitHub

---

# ✨ Features

## Authentication

* Login
* Registration
* Logout
* Forgot Password
* Change Password
* Role-Based Redirect

---

## User Management

* User Profile
* Edit Profile
* Change Password
* Manage Users (Admin)

---

## Campaign Management

* Create Campaign
* Edit Campaign
* Delete Campaign
* Campaign Status
* Campaign Details

---

## Donation Management

* Make Donation
* Donation History
* Donation Details
* Donation Receipt

---

## Dashboard

### Admin Dashboard

* Total Users
* Total Donations
* Active Campaigns
* Recent Donations

### Donor Dashboard

* Total Donations
* Donation History
* Active Campaigns

### Organization Dashboard

* Total Campaigns
* Total Received Donations
* Active Campaign Status

---

## Reports

* Monthly Donations
* Campaign Reports
* Donor Reports
* Organization Reports

---

# 🗄 Database Tables

```
users
campaigns
donations
categories
payment_methods
settings
activity_logs
```

---

# 📂 Suggested Project Structure

```
app/
│
├── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   ├── Donor/
│   │   ├── Organization/
│   │   └── Auth/
│   │
│   └── Middleware/
│
├── Models/
│
└── Services/

resources/
│
├── views/
│   ├── admin/
│   ├── donor/
│   ├── organization/
│   └── auth/

routes/
│
├── web.php
└── auth.php
```

---

# 🚀 Development Roadmap

## Phase 1 — Project Setup

* [ ] Create Laravel Project
* [ ] Configure Database
* [ ] Install Authentication
* [ ] Git Repository Setup

---

## Phase 2 — Authentication

* [ ] User Registration
* [ ] User Login
* [ ] Logout
* [ ] Role Column
* [ ] Role Middleware
* [ ] Dashboard Redirection

---

## Phase 3 — Admin Panel

* [ ] Admin Dashboard
* [ ] User Management
* [ ] Campaign Management
* [ ] Reports

---

## Phase 4 — User Profile

* [ ] View Profile
* [ ] Update Profile
* [ ] Change Password

---

## Phase 5 — Campaign Module

* [ ] Create Campaign
* [ ] Update Campaign
* [ ] Delete Campaign
* [ ] Campaign Details

---

## Phase 6 — Donation Module

* [ ] Make Donation
* [ ] Donation History
* [ ] Donation Details
* [ ] Donation Receipt

---

## Phase 7 — Reports

* [ ] Monthly Reports
* [ ] Campaign Reports
* [ ] Donation Statistics

---

## Phase 8 — Notifications *(Optional)*

* [ ] Email Notification
* [ ] Donation Confirmation
* [ ] Campaign Updates

---

## Phase 9 — Testing

* [ ] Validation Testing
* [ ] Authentication Testing
* [ ] Authorization Testing

---

## Phase 10 — Deployment

* [ ] Optimize Application
* [ ] Deploy to Hosting
* [ ] Final Documentation

---

# 📚 Laravel Concepts Covered

* Routing
* Controllers
* Middleware
* Authentication
* Authorization
* Role-Based Access Control
* Validation
* Eloquent ORM
* Relationships
* File Upload
* Pagination
* Search & Filtering
* Blade Components
* Sessions
* Flash Messages
* Database Migrations
* Seeders
* Factories
* Git Workflow

---

# 📌 Development Rules

* Build every feature manually.
* Avoid copying code from tutorials.
* Understand every line before writing it.
* Follow Laravel Coding Standards.
* Use meaningful commit messages.
* Keep controllers clean.
* Use reusable components whenever possible.
* Document completed features.

---

# 🎯 Learning Outcome

After completing this project, I will have practical experience with:

* Laravel Fundamentals
* Authentication System
* Authorization
* Role-Based Access Control
* CRUD Applications
* Database Design
* MVC Architecture
* Clean Code Practices
* Git & GitHub Workflow
* Real-world Project Development

---

# 📈 Future Improvements

* Online Payment Gateway Integration
* Email Verification
* Notification System
* REST API
* Mobile API Support
* Multi-language Support
* Dark Mode
* Activity Logs
* Dashboard Charts
* Export Reports (PDF/Excel)

---

# 🤝 Contributing

Contributions, suggestions, and improvements are welcome.

Feel free to fork the repository and submit a pull request.

---

# 📄 License

This project is open-source and available for educational purposes.

---

## 👨‍💻 Author

**Md Mahabubul Alam**

Learning Laravel by building real-world applications from scratch.
