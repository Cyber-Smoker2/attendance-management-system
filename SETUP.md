# Student Attendance Management System - Setup Guide

## Quick Start (5 minutes)

### Step 1: Download & Place Files
1. Copy the entire PHP folder to your web server:
   - **XAMPP Users:** `C:\xampp\htdocs\PHP`
   - **WAMP Users:** `C:\wamp\www\PHP`
   - **Linux Users:** `/var/www/html/PHP`

### Step 2: Import Database Schema
1. Open **phpMyAdmin** (usually at `http://localhost/phpmyadmin`)
2. Click "Databases" → Create new database named `ams_system`
3. Select the new database → Click "Import" tab
4. Click "Choose File" and select `PHP/config/database.sql`
5. Click "Import"

**Alternative (MySQL Command Line):**
```bash
mysql -u root -p < PHP/config/database.sql
```

### Step 3: Configure Database
1. Open `PHP/config/config.php`
2. Update these lines if needed:
```php
define('DB_HOST', 'localhost');      // Change if not localhost
define('DB_USER', 'root');           // Your MySQL username
define('DB_PASS', '');               // Your MySQL password
define('DB_NAME', 'ams_system');     // Keep this as is
```

### Step 4: Access Application
Open your browser and go to:
```
http://localhost/PHP/
```

You'll be redirected to the login page automatically.

---

## Default Credentials

### Admin Access
```
Email:    admin@ams.local
Password: 123456
```

### Teacher Access (Multiple Accounts)
```
Email:    teacher1@ams.local
Password: 123456

Email:    teacher2@ams.local
Password: 123456
```

### Student Access (Multiple Accounts)
```
Email:    student1@ams.local
Password: 123456

Email:    student2@ams.local
Password: 123456

Email:    student3@ams.local
Password: 123456

Email:    student4@ams.local
Password: 123456
```

---

## First Time Usage

### For Admin
1. Login as `admin@ams.local`
2. Go to **Admin Dashboard**
3. Check pre-loaded data:
   - 2 Teachers already added
   - 3 Classes already configured
   - 4 Students already enrolled
4. View dashboard for overview

### For Teachers
1. Login as `teacher1@ams.local`
2. Go to **Mark Attendance**
3. Select a class and today's date
4. Mark attendance for students
5. Use **Mark All Present** button for quick marking

### For Students
1. Login as `student1@ams.local`
2. View dashboard with attendance percentage
3. Go to **View Attendance** to see details
4. Use **Attendance Calendar** for visual view
5. Apply for leave from **Apply Leave** section

---

## System Requirements

### Minimum Requirements
- PHP 7.4 or higher
- MySQL 5.7 or higher
- 50 MB disk space
- 512 MB RAM

### Recommended
- PHP 8.0+
- MySQL 8.0+
- 100 MB disk space
- 1 GB RAM

---

## Folder Permissions

For Linux/Mac, ensure proper permissions:

```bash
# Make uploads folder writable
chmod 755 public/uploads/profile_photos/

# Make config folder readable
chmod 644 config/config.php

# Make database file writable (if needed)
chmod 644 config/database.sql
```

---

## Key Features Overview

### 📊 Attendance Management
- Mark attendance as Present/Absent/Late
- Bulk operations (Mark All Present)
- Edit within 24 hours
- View statistics and trends

### 👥 User Management
- Create/manage teachers and students
- Assign teachers to classes
- Manage student details
- View user statistics

### 📚 Class Management
- Create and manage classes
- Assign subjects and teachers
- Track students per class

### 📋 Reporting
- Attendance reports with filters
- Export to CSV
- Defaulters list
- Monthly/yearly analytics

### 🛎️ Leave Management
- Apply for leave
- Approve/reject requests
- Track leave status
- Parent notifications

### 📅 Holiday Management
- Add school holidays
- Exclude from calculations
- View holiday calendar

---

## Important: Changing Passwords

### Change Your Password After First Login
1. Click your name in top-right corner
2. Go to Profile Settings
3. Enter new password
4. Confirm password
5. Save changes

### Change Minimum Attendance Threshold
Edit `config/config.php`:
```php
define('MIN_ATTENDANCE_PERCENTAGE', 75);  // Change to desired percentage
```

---

## Troubleshooting

### Issue: "Database Connection Error"
**Solution:**
1. Verify MySQL server is running
2. Check credentials in `config/config.php`
3. Ensure database `ams_system` exists
4. Restart web server

### Issue: "Login Not Working"
**Solution:**
1. Clear browser cookies (Ctrl+Shift+Delete)
2. Verify correct email/password
3. Try incognito/private browsing
4. Check if sessions are enabled

### Issue: "Blank Page After Login"
**Solution:**
1. Check PHP error log
2. Verify database connection
3. Ensure all files are uploaded
4. Check file permissions

### Issue: "Missing Stylesheet/Images"
**Solution:**
1. Verify `public/css/` folder exists
2. Check `public/js/` folder exists
3. Ensure BASE_URL in config.php is correct
4. Clear browser cache (Ctrl+F5)

### Issue: "Cannot Upload Profile Photos"
**Solution:**
1. Check if `public/uploads/profile_photos/` exists
2. Set folder permissions to 755
3. Check upload_max_filesize in php.ini
4. Verify file type is image

---

## Basic Operations

### Marking Daily Attendance
1. Login as teacher
2. Click "Mark Attendance"
3. Select class and date
4. Choose status for each student
5. Click "Mark All Present" to quick-fill
6. Click "Save Attendance"

### Viewing Attendance Reports
1. Login as admin/teacher
2. Click "Attendance Reports"
3. Apply filters:
   - Select student or class
   - Choose date range
   - Filter by status
4. Click "Search"
5. Click "Export CSV" to download

### Applying for Leave
1. Login as student
2. Click "Apply Leave"
3. Select from and to dates
4. Enter reason (min 10 characters)
5. Click "Submit Request"
6. Status shows as "Pending"

### Approving Leave Requests
1. Login as teacher
2. Click "Leave Requests"
3. Review pending requests
4. Click "Approve" or "Reject"
5. Add remarks (optional)
6. Confirm action

---

## Database Backup

### Manual Backup
```bash
# Backup entire database
mysqldump -u root -p ams_system > backup_ams.sql

# Backup specific table
mysqldump -u root -p ams_system attendance > attendance_backup.sql
```

### Restore from Backup
```bash
mysql -u root -p ams_system < backup_ams.sql
```

---

## Performance Tips

1. **Regular Backups:** Backup database weekly
2. **Clean Old Data:** Archive attendance older than 2 years
3. **Optimize Database:** Run optimization monthly
   ```sql
   OPTIMIZE TABLE attendance;
   OPTIMIZE TABLE students;
   ```
4. **Clear Logs:** Remove application logs periodically
5. **Use Indexes:** Ensure proper database indexing

---

## Security Best Practices

✅ **DO:**
- Change default passwords immediately
- Use strong passwords (mix of characters, numbers, symbols)
- Keep database credentials secure
- Regular backup of data
- Update PHP and MySQL regularly
- Monitor user activities

❌ **DON'T:**
- Share login credentials
- Use same password for all accounts
- Keep default database password
- Expose config.php publicly
- Store sensitive data in plain text
- Leave debug mode enabled

---

## Email Configuration (Optional)

To enable email notifications:

1. Install PHPMailer:
```bash
composer require phpmailer/phpmailer
```

2. Update `config/config.php`:
```php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'your-email@gmail.com');
define('SMTP_PASS', 'your-app-password');
```

3. For Gmail:
   - Enable 2-factor authentication
   - Generate "App Password"
   - Use generated password above

---

## Getting Help

1. **Check Browser Console:** Right-click → Inspect → Console tab
2. **Check PHP Errors:** Look in web server error log
3. **Review Code Comments:** Detailed comments in all files
4. **Test Sample Data:** Try with pre-loaded accounts first
5. **Verify Installation:** Ensure all steps completed

---

## Support Files Included

- `README.md` - Complete documentation
- `SETUP.md` - This setup guide
- `config/database.sql` - Schema and sample data
- `config/config.php` - Configuration file
- All source code with detailed comments

---

**Ready to Use!**

Your Student Attendance Management System is now ready. Start by logging in with admin account and exploring the features!

For detailed usage instructions, refer to README.md file.

---

**Version:** 1.0.0
**Last Updated:** April 2026
