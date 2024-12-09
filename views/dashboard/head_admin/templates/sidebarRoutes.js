// Add new Side Menu here
const baseUrl = window.location.origin;
const currentPath = window.location.pathname.split("/").slice(0, -1).join("/");

export const sidebarRoutes = [
  // BADAC Things
  {
    className: "view-authorize",
    path: `SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/head_admin/templates/pages/view_authority.php`,
  },
  {
    className: "transactions",
    path: `SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/head_admin/templates/pages/transaction_logs.php`,
  },
  {
    className: "admin2-view-case-records",
    path: `SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/head_admin/templates/pages/departments/Admin2/view-case-records.php`,
  },
  {
    className: "admin2-city-ordinance",
    path: `SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/head_admin/templates/pages/departments/Admin2/city-ordinance.php`,
  },
];
