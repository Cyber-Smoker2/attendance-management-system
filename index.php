<?php
/**
 * Student Attendance Management System
 * Main Router File
 */

// Start session and load configuration
require_once __DIR__ . '/config/config.php';

// Auto-load classes
spl_autoload_register(function($class) {
    $paths = [
        __DIR__ . '/models/' . $class . '.php',
        __DIR__ . '/controllers/' . $class . '.php'
    ];
    
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

// Get the requested URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/PHP/', '', $uri);
$uri = trim($uri, '/');

// Default route
if (empty($uri)) {
    if (isset($_SESSION['user_id'])) {
        switch ($_SESSION['user_role']) {
            case 'admin':
                $uri = 'admin/dashboard';
                break;
            case 'teacher':
                $uri = 'teacher/dashboard';
                break;
            case 'student':
                $uri = 'student/dashboard';
                break;
            default:
                $uri = 'login';
        }
    } else {
        $uri = 'login';
    }
}

// Route handler
$routeParts = explode('/', $uri);
$action = $routeParts[0] ?? 'login';
$method = $routeParts[1] ?? 'index';

try {
    switch ($action) {
        // Authentication Routes
        case 'login':
            $controller = new AuthController($pdo);
            $controller->login();
            break;

        case 'register':
            $controller = new AuthController($pdo);
            $controller->register();
            break;

        case 'logout':
            $controller = new AuthController($pdo);
            $controller->logout();
            break;

        // Admin Routes
        case 'admin':
            $controller = new AdminController($pdo);
            switch ($method) {
                case 'dashboard':
                    $controller->dashboard();
                    break;
                case 'manage-teachers':
                    $controller->manageTeachers();
                    break;
                case 'manage-students':
                    $controller->manageStudents();
                    break;
                case 'manage-classes':
                    $controller->manageClasses();
                    break;
                case 'attendance-reports':
                    $controller->attendanceReports();
                    break;
                case 'defaulters':
                    $controller->defaulters();
                    break;
                case 'manage-holidays':
                    $controller->manageHolidays();
                    break;
                case 'export-csv':
                    $controller->exportCSV();
                    break;
                default:
                    $controller->dashboard();
            }
            break;

        // Teacher Routes
        case 'teacher':
            $controller = new TeacherController($pdo);
            switch ($method) {
                case 'dashboard':
                    $controller->dashboard();
                    break;
                case 'mark-attendance':
                    $controller->markAttendance();
                    break;
                case 'attendance-summary':
                    $controller->attendanceSummary();
                    break;
                case 'leave-requests':
                    $controller->leaveRequests();
                    break;
                case 'low-attendance-alerts':
                    $controller->sendLowAttendanceAlert();
                    break;
                default:
                    $controller->dashboard();
            }
            break;

        // Student Routes
        case 'student':
            $controller = new StudentController($pdo);
            switch ($method) {
                case 'dashboard':
                    $controller->dashboard();
                    break;
                case 'view-attendance':
                    $controller->viewAttendance();
                    break;
                case 'apply-leave':
                    $controller->applyLeave();
                    break;
                case 'attendance-calendar':
                    $controller->attendanceCalendar();
                    break;
                case 'check-warnings':
                    $controller->checkWarnings();
                    break;
                default:
                    $controller->dashboard();
            }
            break;

        // Default: Login
        default:
            $controller = new AuthController($pdo);
            $controller->login();
            break;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    error_log($e->getMessage());
}
?>
