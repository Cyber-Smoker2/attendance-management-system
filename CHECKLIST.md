# Installation Checklist

Copy and follow this checklist to verify your setup is complete.

## ✅ Pre-Installation Requirements
- [ ] PHP 7.4 or higher installed
- [ ] MySQL 5.7 or higher installed
- [ ] Web server (Apache/Nginx) running
- [ ] phpMyAdmin access available
- [ ] ~100 MB disk space available

## ✅ File Placement
- [ ] All files copied to web server directory
- [ ] `PHP/` folder in `htdocs` or `www` directory
- [ ] All folders and subfolders present
- [ ] All files have correct names (case-sensitive)

## ✅ Database Setup
- [ ] MySQL server running
- [ ] New database `ams_system` created
- [ ] `database.sql` imported successfully
- [ ] Tables created (verify in phpMyAdmin)
- [ ] Sample data loaded

## ✅ Configuration
- [ ] `config/config.php` opened
- [ ] DB_HOST set correctly (usually `localhost`)
- [ ] DB_USER updated (usually `root`)
- [ ] DB_PASS set correctly (empty for default)
- [ ] DB_NAME is `ams_system`
- [ ] BASE_URL matches your setup

## ✅ File Permissions
- [ ] `public/uploads/profile_photos/` directory writable
- [ ] `config/config.php` readable
- [ ] `config/database.sql` readable
- [ ] All PHP files readable

## ✅ Web Server Configuration
- [ ] Web server pointing to PHP folder
- [ ] URL rewriting enabled (if needed)
- [ ] PHP extensions enabled:
  - [ ] PDO
  - [ ] MySQLi
  - [ ] OpenSSL

## ✅ Initial Access Test
- [ ] Open `http://localhost/PHP/` in browser
- [ ] Redirected to login page
- [ ] No PHP errors shown
- [ ] CSS/styles loaded properly
- [ ] Images displayed correctly

## ✅ Login Testing
- [ ] Admin login works
  - Email: `admin@ams.local`
  - Password: `123456`
- [ ] Teacher login works
  - Email: `teacher1@ams.local`
  - Password: `123456`
- [ ] Student login works
  - Email: `student1@ams.local`
  - Password: `123456`

## ✅ Basic Feature Testing
- [ ] Admin can view dashboard
- [ ] Admin can view teachers list
- [ ] Admin can view students list
- [ ] Teacher can mark attendance
- [ ] Teacher can view attendance summary
- [ ] Student can view dashboard
- [ ] Student can view attendance
- [ ] Student can apply for leave

## ✅ Advanced Features
- [ ] Attendance reports generate
- [ ] CSV export works
- [ ] Leave approval/rejection works
- [ ] Calendar view loads
- [ ] Attendance percentage calculates
- [ ] Warnings display correctly

## ✅ Data Validation
- [ ] Form validation works
- [ ] Database constraints enforced
- [ ] Duplicate email prevention
- [ ] Invalid data rejected
- [ ] Error messages display

## ✅ Security
- [ ] Passwords hashed in database
- [ ] Session variables set correctly
- [ ] Logout clears session
- [ ] Unauthorized access blocked
- [ ] SQL injection prevented

## ✅ Browser Compatibility
- [ ] Works in Chrome
- [ ] Works in Firefox
- [ ] Works in Safari
- [ ] Works in Edge
- [ ] Mobile responsive

## ✅ Error Handling
- [ ] Database errors handled
- [ ] Missing database shows error
- [ ] Invalid routes redirect properly
- [ ] 404 errors displayed
- [ ] Error logs working

## ✅ Documentation
- [ ] README.md reviewed
- [ ] SETUP.md followed
- [ ] API_REFERENCE.md available
- [ ] STRUCTURE.md understood
- [ ] Comments in code clear

## ✅ Customization Complete
- [ ] Changed all default passwords (if production)
- [ ] Updated MIN_ATTENDANCE_PERCENTAGE if needed
- [ ] Configured email settings (optional)
- [ ] Set correct BASE_URL
- [ ] Reviewed all configuration

## ✅ Backup & Safety
- [ ] Database backed up
- [ ] Important passwords saved securely
- [ ] .sql file saved safely
- [ ] System documented
- [ ] Access credentials secured

## 🎉 Installation Complete!

If all checkboxes are checked, your system is ready to use!

### Quick Access Links
- **Application:** http://localhost/PHP/
- **phpMyAdmin:** http://localhost/phpmyadmin/
- **Documentation:** README.md in project folder

### Default Credentials (CHANGE IN PRODUCTION)
- **Admin:** admin@ams.local / 123456
- **Teacher:** teacher1@ams.local / 123456
- **Student:** student1@ams.local / 123456

### Next Steps
1. Create your own admin account
2. Delete sample data (optional)
3. Add your school's classes
4. Onboard real teachers and students
5. Start marking attendance
6. Monitor attendance reports

### Troubleshooting
If you encounter issues:
1. Check SETUP.md for common problems
2. Review error messages carefully
3. Check PHP error logs
4. Verify database connection
5. Clear browser cache
6. Restart web server

### Support
- Refer to documentation files
- Check code comments
- Review model classes
- Test with sample data

---

**Version:** 1.0.0
**Date:** April 2026
**Status:** Ready for Production
