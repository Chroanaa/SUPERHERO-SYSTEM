// Add new Side Menu here
export const sidebarRoutes = [
  // Head Admin Thingy

  {
    className: "main",
    path: "/views/dashboard/head_admin/templates/pages/dashboard.php",
  },
  {
    className: "auth-req",
    path: "/views/dashboard/head_admin/templates/pages/view_authority.html",
  },
  {
    className: "view-authorize",
    path: "http:/localhost:3000/SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/head_admin/templates/pages/view_authority.php",
  },
  {
    className: "transactions",
    path: "http://localhost:3000/SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/head_admin/templates/pages/transction_logs.php",
  },

  //Admin 2

  {
    className: "main-admin2",
    path: "http://localhost:3000/SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/head_admin/templates/pages/departments/Admin2/overview.php",
  },
  {
    className: "admin2-view-pending",
    path: "http://localhost:3000/SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/head_admin/templates/pages/departments/Admin2/view-pending-request.php",
  },
  {
    className: "admin2-view-disregard",
    path: "http://localhost:3000/SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/head_admin/templates/pages/departments/Admin2/view-disregarded.php",
  },
  {
    className: "admin2-view-approval",
    path: "http://localhost:3000/SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/head_admin/templates/pages/departments/Admin2/view-pending-approval.php",
  },
  {
    className: "admin2-notify",
    path: "http://localhost:3000/SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/head_admin/templates/pages/departments/Admin2/notifications.php",
  },
  {
    className: "admin2-city-ordinance",
    path: "http://localhost:3000/SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/head_admin/templates/pages/departments/Admin2/city-ordinance.php",
  },
];
