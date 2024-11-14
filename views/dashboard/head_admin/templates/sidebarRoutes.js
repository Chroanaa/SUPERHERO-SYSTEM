// Add new Side Menu here
export const sidebarRoutes = [

    // Head Admin Thingy

    { className: "main", path: "/views/dashboard/head_admin/templates/pages/dashboard.php" },
    { className: "auth-req", path: "/views/dashboard/head_admin/templates/pages/view_authority.html" },
    { className: "view-authorize", path: "/views/dashboard/head_admin/templates/pages/view_authority.php" },
    { className: "transactions", path: "/views/dashboard/head_admin/templates/pages/transaction_logs.php" },

    //Admin 2

    { className: "main-admin2", path: "/views/dashboard/head_admin/templates/pages/departments/Admin2/overview.php" },
    { className: "admin2-view-pending", path: "/views/dashboard/head_admin/templates/pages/departments/Admin2/view-pending-request.php" },
    { className: "admin2-view-disregard", path: "/views/dashboard/head_admin/templates/pages/departments/Admin2/view-disregarded.php" },
    { className: "admin2-view-approval", path: "/views/dashboard/head_admin/templates/pages/departments/Admin2/view-pending-approval.php" },
    { className: "admin2-notify", path: "/views/dashboard/head_admin/templates/pages/departments/Admin2/notifications.php" },
    { className: "admin2-city-ordinance", path: "/views/dashboard/head_admin/templates/pages/departments/Admin2/city-ordinance.php" }

];
