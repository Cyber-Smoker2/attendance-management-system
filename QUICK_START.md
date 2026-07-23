# ⚡ Quick Start Guide (2 Minutes)

## Step 1: Import Database (30 seconds)
```bash
# Open phpMyAdmin or MySQL CLI
mysql -u root -p < config/database.sql
```

## Step 2: Update Configuration (30 seconds)
Edit `config/config.php`:
```php
define('DB_HOST', 'localhost');   // Change if needed
define('DB_USER', 'root');        // Your MySQL user
define('DB_PASS', '');            // Your MySQL password
define('DB_NAME', 'ams_system');  // Database name
```

## Step 3: Open in Browser (30 seconds)
```
http://localhost/PHP/
```

## 🎉 You're Done!

---

## Login with These Credentials

### As Admin
```
Email:    admin@ams.local
Password: 123456
```

### As Teacher
```
Email:    teacher1@ams.local
Password: 123456
```

### As Student
```
Email:    student1@ams.local
Password: 123456
```

---

## What to Try First

### As Admin
1. Go to "Manage Teachers" → see 2 teachers
2. Go to "Manage Students" → see 4 students
3. Go to "Attendance Reports" → filter and export to CSV
4. Go to "Defaulters" → see students below 75% attendance

### As Teacher
1. Select a class from dashboard
2. Go to "Mark Attendance" → mark students present/absent
3. Go to "Attendance Summary" → see class statistics
4. Go to "Leave Requests" → approve a leave

### As Student
1. See your attendance percentage on dashboard
2. Go to "View Attendance" → see all your records
3. Go to "Calendar" → visual monthly view
4. Go to "Apply Leave" → submit leave request

---

## Common Issues & Fixes

### "Connection Refused"
```
→ Check MySQL is running
→ Verify credentials in config.php
→ Check database exists
```

### "404 Page Not Found"
```
→ Check folder is at http://localhost/PHP/
→ Verify BASE_URL in config.php
→ Clear browser cache
```

### "Login Failed"
```
→ Check database imported successfully
→ Verify email is correct
→ Default password is 123456
→ Check DATABASE is selected in phpMyAdmin
```

### "Blank Pages"
```
→ Check PHP error logs
→ Enable error display in PHP
→ Verify all files are in place
→ Check file permissions
```

---

## File Structure Quick Reference

```
PHP/                              Main folder
├── config/config.php             ← Edit database settings here
├── config/database.sql           ← Import this to database
├── index.php                      ← Access through this file
├── controllers/                   ← Business logic
├── models/                        ← Database operations
├── views/                         ← HTML pages
└── public/                        ← CSS & JavaScript
```

---

## Key Paths to Remember

| Path | Purpose |
|------|---------|
| `http://localhost/PHP/` | Login page |
| `config/config.php` | Database settings |
| `config/database.sql` | Import this |
| `index.php` | Main entry point |

---

## Features Quick Test

✅ **Admin Panel**
- Manage users
- Manage classes
- View reports
- Export to CSV

✅ **Teacher Panel**
- Mark attendance
- View summary
- Approve leaves
- Send alerts

✅ **Student Panel**
- View attendance
- Apply for leave
- See calendar
- Check warnings

---

## Database Quick Info

| Table | Records | Purpose |
|-------|---------|---------|
| `users` | 7 | Admin, teachers, students |
| `classes` | 3 | School classes |
| `students` | 4 | Student records |
| `attendance` | 20+ | Daily attendance |
| `leaves` | Sample | Leave requests |
| `holidays` | 3 | School holidays |
| `settings` | 2 | System settings |

---

## Next Steps

1. ✅ Setup complete → Login with admin account
2. 📊 Explore → Test all features with sample data
3. 🎨 Customize → Change colors in `public/css/style.css`
4. 👥 Add Users → Create real teachers and students
5. 🚀 Go Live → Change passwords and backup database

---

## Support

- 📖 **Full Guide:** README.md
- 🛠️ **Setup Help:** SETUP.md
- 📚 **API Reference:** API_REFERENCE.md
- 📋 **Structure:** STRUCTURE.md
- ✅ **Checklist:** CHECKLIST.md

---

## Default Passwords

⚠️ **Important:** Change these after first login!

All accounts have password: **123456**

Set unique passwords for each user in production.

---

## That's It!

You now have a fully functional Student Attendance Management System.

### Enjoy! 🎓
