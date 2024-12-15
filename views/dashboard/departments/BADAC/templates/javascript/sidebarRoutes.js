// Add new Side Menu here
const baseUrl = window.location.origin;
const currentPath = window.location.pathname.split('/').slice(0, -1).join('/');

export const sidebarRoutes = [
    // BADAC Things
    { className: "main", path: `${baseUrl}${currentPath}/home.php` },
    { className: "dashboard", path: `${baseUrl}${currentPath}/dashboard.php` },
    { className: "badac-form", path: `${baseUrl}${currentPath}/form.php` },
    { className: "badac-notify", path: `${baseUrl}${currentPath}/notification.php` },
    { className: "gov-contact", path: `${baseUrl}${currentPath}/contact.php` },
    { className: "forwarded-complaints", path: `${baseUrl}${currentPath}/forward-complaints.php`}
];
