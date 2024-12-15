// Add new Side Menu here
const baseUrl = window.location.origin;
const currentPath = window.location.pathname.split('/').slice(0, -1).join('/');

const header = document.querySelector(".header");
header.innerHTML = `
<nav class="sidebar">
      <div class="sidebar-content">
        <div class="sidebar-header">Brgy. Sta. Lucia</div>

        <div class="sidebar-category">
          <div class="sidebar-category-header">
            <span><i class="fas fa-money-bill-wave category-icon"></i>Administrator 2</span>
            <i class="fas fa-chevron-down toggle-icon"></i>
          </div>
          <div class="sidebar-submenu-show">
            <div class="sidebar-submenu-item dashboard">Incoming Payments</div>
            <div class="sidebar-submenu-item expense">Expense</div>
          </div>
        </div>

        <div class="sidebar-category">
          <div class="sidebar-category-header" data-bs-toggle="modal" data-bs-target="#signOutModal">
            <span><i class="fa-solid fa-door-open category-icon"></i>Sign Out</span>
          </div>
        </div>
      </div>
    </nav>
`;
document.addEventListener("click", (e) => {
  if (e.target.classList.contains("dashboard")) {
    window.location.href =
      `${baseUrl}${currentPath}/dashboard.php`;
  } else if (e.target.classList.contains("expense")) {
    window.location.href =
      `${baseUrl}${currentPath}/Expense.php`;
  }
});
