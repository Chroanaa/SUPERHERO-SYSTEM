// Add new Side Menu here
const baseUrl = window.location.origin;
const currentPath = window.location.pathname.split('/').slice(0, -1).join('/');


// Add new Side Menu here
export const sidebarRoutes = [

    // BPSO Things

    { className: "main", path: `${baseUrl}${currentPath}/dashboard.php` },
    { className: "complaint-section", path: `${baseUrl}${currentPath}/complaints.php` },
    { className: "new-complaint", path: `${baseUrl}${currentPath}/newcomplaint.php` },
    { className: "create-report", path: `${baseUrl}${currentPath}/report.php` },
    { className: "team-schedule", path: `${baseUrl}${currentPath}/teamschedule.php` },
    { className: "vehicle-dispatch", path: `${baseUrl}${currentPath}/vehicle.php`},
    { className: "bpso-notify", path:`${baseUrl}${currentPath}/notification.php`}

    // LUPON Things


];
