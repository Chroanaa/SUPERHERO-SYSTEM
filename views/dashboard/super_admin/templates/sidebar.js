// Import sidebar routes
import { sidebarRoutes } from './sidebarRoutes.js';

const header = document.querySelector(".header");

if (header) {
    header.innerHTML = `
        <nav class="sidebar">
            <div class="sidebar-content">
                <div class="sidebar-header">Brgy. Sta. Lucia</div>

                <div class="sidebar-category">
                    <div class="sidebar-category-header">
                        <span><i class="fas fa-tachometer-alt category-icon"></i>Super Admin</span>
                        <i class="fas fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="sidebar-submenu show">
                        <div class="sidebar-submenu-item main">Overview</div>
                        <div class="sidebar-submenu-item account-management">Account Management</div>
                        <div class="sidebar-submenu-item document-process">Document Processing</div>
                        <div class="sidebar-submenu-item document-records">Document Records</div>
                    </div>
                </div>

                <div class="sidebar-category">
                    <div class="sidebar-category-header">
                        <span><i class="fas fa-user-shield category-icon"></i>Document Services</span>
                        <i class="fas fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="sidebar-submenu">
                        <div class="sidebar-submenu-item admin1-overview">Overview</div>
                        <div class="sidebar-submenu-item staff-record">Staff Records</div>
                        <div class="sidebar-submenu-item resident-record">Resident Records</div>
                        <div class="sidebar-submenu-item e-forms">E-Forms (Resident)</div>
                        <div class="sidebar-submenu-item">Inquiries</div>
                        <div class="sidebar-submenu-item">Notify Residents</div>
                    </div>
                </div>

                <div class="sidebar-category">
                    <div class="sidebar-category-header">
                        <span><i class="fas fa-users category-icon"></i>Secretary Portal</span>
                        <i class="fas fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="sidebar-submenu">
                        <div class="sidebar-submenu-item main-admin2">Overview</div>
                        <div class="sidebar-submenu-item admin2-view-pending">View Pending Request</div>
                        <div class="sidebar-submenu-item admin2-view-approval">View Approval Process</div>
                        <div class="sidebar-submenu-item">View Disregarded Process</div>
                        <div class="sidebar-submenu-item">Committees Tab</div>
                        <div class="sidebar-submenu-item">E-Forms (Secretary)</div>
                    </div>
                </div>

                <div class="sidebar-category">
                    <div class="sidebar-category-header">
                        <span><i class="fas fa-shield-alt category-icon"></i>Brgy. Public Safety Officer</span>
                        <i class="fas fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="sidebar-submenu">
                        <div class="sidebar-submenu-item bpso-main">Overview</div>
                        <div class="sidebar-submenu-item bpso-blotter">Blotter Management</div>
                        <div class="sidebar-submenu-item bpso-patawag">Patawag Records</div>
                        <div class="sidebar-submenu-item">View Complaints</div>
                        <div class="sidebar-submenu-item">Complaint Management</div>
                        <div class="sidebar-submenu-item">Incident Case Reports</div>
                    </div>
                </div>

                <div class="sidebar-category">
                    <div class="sidebar-category-header">
                        <span><i class="fas fa-user-friends category-icon"></i>Brgy. Anti Drug Abuse Council</span>
                        <i class="fas fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="sidebar-submenu">
                        <div class="sidebar-submenu-item badac-overview">Overview</div>
                        <div class="sidebar-submenu-item">Incident Case Reports</div>
                        <div class="sidebar-submenu-item">View Complaints</div>
                        <div class="sidebar-submenu-item">View Monitoring</div>
                        <div class="sidebar-submenu-item">Patawag (Summon)</div>
                        <div class="sidebar-submenu-item">Rehabilitation</div>
                    </div>
                </div>

                <div class="sidebar-category">
                    <div class="sidebar-category-header">
                        <span><i class="fas fa-child category-icon"></i>Brgy. Council for the Protection of Children</span>
                        <i class="fas fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="sidebar-submenu">
                        <div class="sidebar-submenu-item bcpc-overview">Overview</div>
                        <div class="sidebar-submenu-item">Incident Case Reports</div>
                        <div class="sidebar-submenu-item">View Complaints</div>
                        <div class="sidebar-submenu-item">View Monitoring</div>
                        <div class="sidebar-submenu-item">Patawag (Summon)</div>
                        <div class="sidebar-submenu-item">Rehabilitation</div>
                    </div>
                </div>

                <div class="sidebar-category">
                    <div class="sidebar-category-header">
                        <span><i class="fas fa-gavel category-icon"></i>LUPON Tagapamayapa</span>
                        <i class="fas fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="sidebar-submenu">
                        <div class="sidebar-submenu-item lupon-overview">Overview</div>
                        <div class="sidebar-submenu-item">Patawag Records</div>
                        <div class="sidebar-submenu-item">View Turnover Slips</div>
                    </div>
                </div>

                <div class="sidebar-category">
                    <div class="sidebar-category-header">
                        <span><i class="fa-solid fa-id-card category-icon"></i>User Profile</span>
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

    const sidebarContent = document.querySelector('.sidebar-content');
    const ps = new PerfectScrollbar(sidebarContent);

    // Event listener for submenu toggling
    sidebarContent.addEventListener('click', (event) => {
        const categoryHeader = event.target.closest('.sidebar-category-header');
        if (categoryHeader) {
            const category = categoryHeader.parentElement;
            const submenu = category.querySelector('.sidebar-submenu');
            const toggleIcon = categoryHeader.querySelector('.toggle-icon');

            if (submenu) {
                submenu.classList.toggle('show'); // Change from sidebar-submenu-show to show
                toggleIcon.classList.toggle('rotate', submenu.classList.contains('show'));
            }
        }
    });


    // Ripple effect on hover
    document.querySelectorAll('.sidebar-submenu-item').forEach(item => {
        item.addEventListener('mouseenter', createRipple);
    });

    // Event listener for sidebar redirection based on class matching in sidebarRoutes
    document.addEventListener("click", (e) => {
        const targetClass = [...e.target.classList].find(className =>
            sidebarRoutes.some(route => route.className === className)
        );

        if (targetClass) {
            const route = sidebarRoutes.find(route => route.className === targetClass);
            if (route) {
                window.location.pathname = route.path;
            }
        }
    });
}

function createRipple(event) {
    const button = event.currentTarget;
    const ripple = document.createElement('span');
    const rect = button.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;

    ripple.style.width = ripple.style.height = `${size}px`;
    ripple.style.left = `${x}px`;
    ripple.style.top = `${y}px`;
    ripple.classList.add('ripple');

    button.appendChild(ripple);

    ripple.addEventListener('animationend', () => {
        ripple.remove();
    });
}

document.getElementById('confirmSignOutBtn').addEventListener('click', function () {
    // Redirect to signout.php to handle session destruction and redirection
    window.location.href = '../../../../../../../index.php';
});
