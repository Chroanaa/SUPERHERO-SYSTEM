// Import sidebar routes
import { sidebarRoutes } from './sidebarRoutes.js';

const header = document.querySelector(".header");

if (header) {
    header.innerHTML = `
        <nav class="sidebar" style="z-index: 1000;">
            <div class="sidebar-content">
                <div class="sidebar-header">Brgy. Sta. Lucia</div>

                <div class="sidebar-category">
                    <div class="sidebar-category-header" onclick="toggleSubMenu()">
                        <span><i class="fas fa-shield-alt category-icon"></i>Brgy. Public Safety Officer</span>
                        <i class="fas fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="sidebar-submenu show">
                        <div class="sidebar-submenu-item main">Home</div>
                        <div class="sidebar-submenu-item complaint-section">Complaint Management</div>
                        <div class="sidebar-submenu-item new-complaint">File New Complaint</div>
                        <div class="sidebar-submenu-item create-report">Create Report</div>
                        <div class="sidebar-submenu-item team-schedule">Team Schedule</div>
                        <div class="sidebar-submenu-item vehicle-dispatch">Vehicle Dispatchment</div>
                        <div class="sidebar-submenu-item bpso-notify">Notifications</div>
                    </div>
                </div>
                
                <!-- <div class="sidebar-category">
            <div class="sidebar-category-header">
                <span><i class="fa-solid fa-id-card category-icon"></i>User Profile</span>
            </div>
            </div> -->
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
    window.location.href = '../../../../../../../signout.php';
});