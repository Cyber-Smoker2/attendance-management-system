# Student Attendance Management System (SAMS)

A complete PHP-based Student Attendance Management System with role-based access control for Admin, Teachers, and Students.

## Features

### 🔴 Admin Panel
- Manage teachers, students, classes & subjects
- View attendance across all classes
- Generate attendance reports (by student, class, date range)
- Export reports to CSV/PDF
- Configure minimum attendance percentage threshold
- Manage holidays (excluded from attendance calculation)
- View defaulters list (students below minimum attendance)

### 🟡 Teacher Panel
- Mark daily attendance for assigned class (Present/Absent/Late)
- Bulk attendance marking (Mark All Present)
- Edit attendance within 24 hours
- View class-wise attendance summary
- Approve/reject student leave requests
- Send low attendance alerts to students/parents
- Download attendance reports

### 🟢 Student Panel
- View own attendance record by subject
- See attendance percentage with visual progress bar
- Apply for leave with reason
- Get warned if attendance falls below threshold
- View attendance calendar (color-coded: green=present, red=absent, yellow=late)
- View leave application status

## Technical Stack

- **Backend:** PHP 7.4+ with PDO
- **Database:** MySQL 5.7+
- **Frontend:** Bootstrap 5, Chart.js, JavaScript
- **Security:** Password hashing, prepared statements, session management
- **Architecture:** MVC-like structure

## Project Structure

```
PHP/
├── config/
│   ├── config.php                 # Database & app configuration
│   └── database.sql               # Database schema & seed data
├── controllers/
│   ├── AuthController.php         # Login/Register/Logout
│   ├── AdminController.php        # Admin operations
│   ├── TeacherController.php      # Teacher operations
│   └── StudentController.php      # Student operations
├── models/
│   ├── User.php                   # User model
│   ├── ClassModel.php             # Class model
│   ├── Student.php                # Student model
│   ├── Attendance.php             # Attendance model
│   ├── Leave.php                  # Leave model
│   └── Holiday.php                # Holiday model
├── views/
│   ├── layouts/
│   │   ├── header.php             # Common header
│   │   └── footer.php             # Common footer
│   ├── auth/
│   │   ├── login.php              # Login page
│   │   └── register.php           # Registration page
│   ├── admin/
│   │   ├── dashboard.php
│   │   ├── manage_teachers.php
│   │   ├── manage_students.php
│   │   ├── manage_classes.php
│   │   ├── attendance_reports.php
│   │   ├── defaulters.php
│   │   └── holidays.php
│   ├── teacher/
│   │   ├── dashboard.php
│   │   ├── mark_attendance.php
│   │   ├── attendance_summary.php
│   │   ├── leave_requests.php
│   │   └── low_attendance_alerts.php
│   └── student/
│       ├── dashboard.php
│       ├── attendance_view.php
│       ├── apply_leave.php
│       ├── attendance_calendar.php
│       └── warnings.php
├── public/
│   ├── css/
│   │   └── style.css              # Custom styles
│   ├── js/
│   │   └── script.js              # JavaScript utilities
│   └── uploads/
│       └── profile_photos/        # Student profile photos
└── index.php                      # Main router

```

## Installation & Setup

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Composer (optional, for dependencies)

### Step-by-Step Setup

1. **Download/Clone Project**
   ```bash
   # Copy the PHP folder to your web server directory
   # For XAMPP: C:\xampp\htdocs\
   # For WAMP: C:\wamp\www\
   # For Linux: /var/www/html/
   ```

2. **Create Database**
   - Open phpMyAdmin or MySQL command line
   - Execute the SQL schema:
   ```sql
   -- Option 1: Using phpMyAdmin
   1. Create new database named "ams_system"
   2. Go to Import tab
   3. Select config/database.sql file
   4. Click Import
   
   -- Option 2: Using MySQL Command Line
   mysql -u root -p < config/database.sql
   ```

3. **Configure Database Connection**
   - Edit `config/config.php`
   - Update database credentials:
   ```php
   define('DB_HOST', 'localhost');      // Your database host
   define('DB_USER', 'root');           // Your database user
   define('DB_PASS', '');               // Your database password
   define('DB_NAME', 'ams_system');     // Database name
   ```

4. **Set Web Server Document Root**
   - For XAMPP: Point to `C:\xampp\htdocs\PHP`
   - Update `BASE_URL` in config.php if needed

5. **Verify Permissions**
   - Ensure `public/uploads/profile_photos/` directory is writable
   ```bash
   # Linux/Mac
   chmod 755 public/uploads/profile_photos/
   ```

6. **Access the Application**
   - Open browser and navigate to: `http://localhost/PHP/`
   - You'll be redirected to login page

## Default Login Credentials

### Admin Account
- Email: `admin@ams.local`
- Password: `123456`

### Teacher Accounts
- Email: `teacher1@ams.local`
- Password: `123456`

- Email: `teacher2@ams.local`
- Password: `123456`

### Student Accounts
- Email: `student1@ams.local`
- Password: `123456`

- Email: `student2@ams.local`
- Password: `123456`

- Email: `student3@ams.local`
- Password: `123456`

- Email: `student4@ams.local`
- Password: `123456`

**Note:** Change these credentials in production!

## Key Features Explained

### Attendance Calculation
- Present: 1 point
- Late: 0.5 point
- Absent: 0 points
- Percentage = (Present Days + Late Days × 0.5) / Total Days × 100

### Minimum Attendance Threshold
- Default: 75%
- Can be changed in `config/config.php`
- Adjust `MIN_ATTENDANCE_PERCENTAGE` constant

### Holiday Management
- Admin can add school holidays
- Holidays are excluded from attendance calculations
- Useful for vacation periods and special days

### Leave System
- Students apply for leave with reason
- Teachers can approve/reject requests
- Approved leaves don't count as absence

### Defaulters List
- Auto-generated list of students below minimum threshold
- Helps identify at-risk students
- Can send notifications to parents

### Attendance Reports
- Filter by student, class, subject, date range
- Export to CSV for further analysis
- View detailed attendance history

## Database Schema

### users Table
Stores all system users (admins, teachers, students)

### classes Table
Stores class information with teacher assignment

### students Table
Links user accounts with student details (roll number, class, parent email)

### attendance Table
Records daily attendance with status and remarks

### leaves Table
Tracks leave applications and approvals

### holidays Table
Stores school holidays for exclusion from calculations

### settings Table
Stores system configuration values

## Security Features

✅ **PDO Prepared Statements** - Protection against SQL injection
✅ **Password Hashing** - Using password_hash() with BCRYPT
✅ **Session Management** - Secure session handling with role-based access
✅ **Form Validation** - Client-side and server-side validation
✅ **CSRF Protection** - Can be added with tokens if needed
✅ **Error Handling** - Proper error logging and display

## Usage Guide

### For Admin
1. Login with admin credentials
2. Go to Dashboard to see overview
3. Manage Teachers, Students, Classes from navigation
4. View attendance reports and defaulters
5. Set holidays and configure system settings

### For Teachers
1. Login with teacher credentials
2. View assigned classes on dashboard
3. Mark daily attendance for each class
4. Review attendance summary
5. Approve/reject student leave requests
6. Send alerts for low attendance

### For Students
1. Login with student credentials
2. View personal attendance on dashboard
3. See detailed attendance with filters
4. View calendar-based attendance
5. Apply for leave with proper reason
6. Check warnings if attendance is low

## Customization & Extension

### Adding New Features
1. Create model class in `models/` folder
2. Create controller in `controllers/` folder
3. Create views in `views/` folder
4. Add routes in `index.php`

### Modifying Styles
- Edit `public/css/style.css`
- Uses Bootstrap 5 classes
- Responsive design for mobile/tablet

### Email Notifications
To enable email alerts (for absences, leave notifications):
1. Install PHPMailer: `composer require phpmailer/phpmailer`
2. Configure SMTP settings in `config.php`
3. Implement email sending in models

## Troubleshooting

### Database Connection Error
- Check database credentials in `config/config.php`
- Verify MySQL server is running
- Ensure database `ams_system` exists

### Login Not Working
- Clear browser cookies
- Verify password is correct (default: 123456)
- Check session is enabled in php.ini

### File Upload Issues
- Verify `public/uploads/profile_photos/` exists
- Check folder permissions (755 on Linux)
- Verify upload_max_filesize in php.ini

### Charts Not Displaying
- Ensure Chart.js is loaded from CDN
- Check browser console for JS errors
- Verify JavaScript is enabled

## Performance Tips

1. Add database indexes on frequently queried columns
2. Cache attendance calculations
3. Implement pagination for large datasets
4. Use CDN for static assets
5. Optimize images before upload

## Backup & Maintenance

### Regular Backups
```bash
# Backup database
mysqldump -u root -p ams_system > backup.sql

# Restore from backup
mysql -u root -p ams_system < backup.sql
```

### Clean Up Old Data
- Archive attendance older than 1 year
- Delete test/dummy records
- Remove unused student profiles

## Future Enhancements

- [ ] SMS notifications for absences
- [ ] Mobile app version
- [ ] Biometric attendance integration
- [ ] QR code-based marking
- [ ] Advanced analytics dashboard
- [ ] Multi-language support
- [ ] Two-factor authentication
- [ ] Automated report generation
- [ ] Parent portal with access
- [ ] Integration with other ERP systems

## Support & Contact

For issues, suggestions, or contributions:
- Check the troubleshooting section
- Review code comments
- Test with sample data first
- Ensure all prerequisites are installed

## License

This project is open-source and free to use for educational purposes.

## Author

Created as a comprehensive attendance management solution for educational institutions.

---

**Version:** 1.0.0
**Last Updated:** April 2026
