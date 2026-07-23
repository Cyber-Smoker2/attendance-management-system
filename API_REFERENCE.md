# API/Routes Reference Guide

## Authentication Routes

### Login
- **Route:** `/login`
- **Method:** GET/POST
- **Access:** Public
- **Description:** User login page and authentication
- **Redirects to:** Admin/Teacher/Student dashboard based on role

### Register
- **Route:** `/register`
- **Method:** GET/POST
- **Access:** Public
- **Description:** New user registration (defaults to student role)

### Logout
- **Route:** `/logout`
- **Method:** GET
- **Access:** Authenticated Users
- **Description:** Destroy session and redirect to login

---

## Admin Routes (Role: admin)

### Dashboard
- **Route:** `/admin/dashboard`
- **Method:** GET
- **Access:** Admin only
- **Display:** Overview cards, quick actions, statistics

### Manage Teachers
- **Route:** `/admin/manage-teachers`
- **Method:** GET/POST
- **Access:** Admin only
- **Features:** Add, view, delete teachers

### Manage Students
- **Route:** `/admin/manage-students`
- **Method:** GET/POST
- **Access:** Admin only
- **Features:** Add, view, delete students with class assignment

### Manage Classes
- **Route:** `/admin/manage-classes`
- **Method:** GET/POST
- **Access:** Admin only
- **Features:** Create, view, delete classes and assign teachers

### Manage Holidays
- **Route:** `/admin/manage-holidays`
- **Method:** GET/POST
- **Access:** Admin only
- **Features:** Add, view, delete holidays

### Attendance Reports
- **Route:** `/admin/attendance-reports`
- **Method:** GET
- **Access:** Admin only
- **Features:** Filter and view attendance data

### Defaulters List
- **Route:** `/admin/defaulters`
- **Method:** GET
- **Access:** Admin only
- **Features:** View students below minimum attendance

### Export CSV
- **Route:** `/admin/export-csv`
- **Method:** GET
- **Access:** Admin only
- **Features:** Download attendance reports as CSV

---

## Teacher Routes (Role: teacher)

### Dashboard
- **Route:** `/teacher/dashboard`
- **Method:** GET
- **Access:** Teacher only
- **Display:** Teacher's classes, quick actions, statistics

### Mark Attendance
- **Route:** `/teacher/mark-attendance`
- **Method:** GET/POST
- **Access:** Teacher only
- **Parameters:** class_id, date
- **Features:** Mark attendance, bulk operations, save records

### Attendance Summary
- **Route:** `/teacher/attendance-summary`
- **Method:** GET
- **Access:** Teacher only
- **Parameters:** class_id, from_date, to_date
- **Features:** View class attendance statistics

### Leave Requests
- **Route:** `/teacher/leave-requests`
- **Method:** GET/POST
- **Access:** Teacher only
- **Features:** View pending requests, approve, reject

### Low Attendance Alerts
- **Route:** `/teacher/low-attendance-alerts`
- **Method:** GET
- **Access:** Teacher only
- **Features:** List students below threshold, send alerts

---

## Student Routes (Role: student)

### Dashboard
- **Route:** `/student/dashboard`
- **Method:** GET
- **Access:** Student only
- **Display:** Attendance percentage, class info, stats

### View Attendance
- **Route:** `/student/view-attendance`
- **Method:** GET
- **Access:** Student only
- **Parameters:** from_date, to_date
- **Features:** Filter and view attendance records

### Apply Leave
- **Route:** `/student/apply-leave`
- **Method:** GET/POST
- **Access:** Student only
- **Features:** Submit leave request, view history

### Attendance Calendar
- **Route:** `/student/attendance-calendar`
- **Method:** GET
- **Access:** Student only
- **Parameters:** year, month
- **Features:** Visual monthly attendance calendar

### Check Warnings
- **Route:** `/student/check-warnings`
- **Method:** GET
- **Access:** Student only
- **Features:** View low attendance warnings and actions

---

## Database Models

### User Model
**Methods:**
- `register()` - Create new user
- `login()` - Authenticate user
- `getUserById()` - Get user details
- `getUserByEmail()` - Find user by email
- `updateProfile()` - Update user info
- `updatePassword()` - Change password
- `getAllTeachers()` - Get all teachers
- `getAllStudents()` - Get all students
- `deactivateUser()` - Disable user
- `deleteUser()` - Remove user

### ClassModel
**Methods:**
- `createClass()` - Add new class
- `getAllClasses()` - Get all classes
- `getClassById()` - Get specific class
- `getClassesByTeacher()` - Get teacher's classes
- `updateClass()` - Update class details
- `getStudentsInClass()` - Get class students
- `getStudentCountInClass()` - Count students
- `deleteClass()` - Remove class

### Student
**Methods:**
- `createStudent()` - Register student
- `getStudentByUserId()` - Get student info
- `getStudentById()` - Get student by ID
- `updateStudent()` - Update student details
- `updateProfilePhoto()` - Change photo
- `getStudentsByClass()` - Get class students
- `getAttendancePercentage()` - Calculate percentage
- `getDefaulters()` - Get low attendance students
- `deleteStudent()` - Remove student

### Attendance
**Methods:**
- `markAttendance()` - Record single attendance
- `markClassAttendance()` - Record bulk attendance
- `getAttendanceRecord()` - Get single record
- `getAttendanceByDateRange()` - Filter by dates
- `getClassAttendanceByDate()` - Get class on date
- `getMonthlyAttendance()` - Get month data
- `getClassAttendanceSummary()` - Class statistics
- `getAttendanceReport()` - Filtered report
- `canEditAttendance()` - Check 24-hour window
- `updateAttendance()` - Edit record
- `deleteAttendance()` - Remove record

### Leave
**Methods:**
- `applyLeave()` - Submit request
- `getLeavesByStudent()` - Get student's requests
- `getPendingLeavesByClass()` - Get pending for class
- `getAllPendingLeaves()` - Get all pending
- `approveLeave()` - Approve request
- `rejectLeave()` - Reject request
- `getApprovedLeavesForDate()` - Check approved for date
- `deleteLeave()` - Remove request
- `getLeaveById()` - Get request details

### Holiday
**Methods:**
- `addHoliday()` - Create holiday
- `getAllHolidays()` - Get all holidays
- `getHolidaysByDateRange()` - Filter by dates
- `isHoliday()` - Check if date is holiday
- `getHolidayById()` - Get holiday details
- `updateHoliday()` - Update holiday
- `deleteHoliday()` - Remove holiday

---

## Request Parameters

### Mark Attendance (POST)
```
class_id: integer
date: date (YYYY-MM-DD)
status_[student_id]: string (present|absent|late)
```

### Apply Leave (POST)
```
from_date: date (YYYY-MM-DD)
to_date: date (YYYY-MM-DD)
reason: string (min 10 chars)
```

### Create User (POST)
```
name: string
email: email
password: string (min 6 chars)
role: string (admin|teacher|student)
```

### Create Class (POST)
```
class_name: string
section: string
subject: string
teacher_id: integer
```

### Create Student (POST)
```
user_id: integer
roll_number: string
class_id: integer
parent_email: email (optional)
```

---

## Session Variables

After login, these are available:
```php
$_SESSION['user_id']       // User ID
$_SESSION['user_name']     // User name
$_SESSION['user_email']    // User email
$_SESSION['user_role']     // Role: admin|teacher|student
```

---

## Error Handling

All controllers return:
- Success: Redirect or display page
- Error: Alert with message on same page
- Validation: Show errors array at top

Error messages stored in:
```php
$_SESSION['success']  // Success message
$_SESSION['error']    // Error message
$errors              // Array of errors
```

---

## Constants (from config.php)

```php
BASE_URL                      // Base URL for links
DB_HOST, DB_USER, DB_PASS    // Database credentials
DB_NAME                        // Database name
MIN_ATTENDANCE_PERCENTAGE      // Default 75%
UPLOAD_PATH                    // Upload directory
MAX_UPLOAD_SIZE               // Default 5MB
SMTP_HOST, SMTP_PORT          // Email settings (optional)
```

---

## Security Notes

✅ All database queries use PDO prepared statements
✅ Passwords hashed with password_hash()
✅ Session-based authentication
✅ Role-based access control
✅ Input validation and sanitization
✅ HTTPS recommended for production

---

## Common Operations

### Check User Role
```php
if ($_SESSION['user_role'] === 'admin') { }
if ($_SESSION['user_role'] === 'teacher') { }
if ($_SESSION['user_role'] === 'student') { }
```

### Get User Info
```php
$userId = $_SESSION['user_id'];
$user = $userModel->getUserById($userId);
```

### Calculate Attendance %
```php
$stats = $studentModel->getAttendancePercentage($studentId);
echo $stats['percentage']; // 85.5
```

### Mark Bulk Attendance
```php
$attendanceData = [
    1 => 'present',
    2 => 'absent',
    3 => 'late'
];
$attendanceModel->markClassAttendance($classId, $date, $attendanceData, $teacherId);
```

---

## API Response Codes

| Code | Status | Meaning |
|------|--------|---------|
| 200 | OK | Operation successful |
| 302 | Redirect | Page redirect after operation |
| 400 | Bad Request | Invalid input data |
| 401 | Unauthorized | Login required |
| 403 | Forbidden | Insufficient permissions |
| 404 | Not Found | Resource not found |
| 500 | Server Error | Database/system error |

---

**Last Updated:** April 2026
**Version:** 1.0.0
