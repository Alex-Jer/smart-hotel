// Sidebar
const sidebarItems = document.querySelectorAll('.sidebar-item');
const sidebarSubmenu = document.querySelectorAll('.dropdown-content');

const openSidebar = () => {
    document.getElementById('sidebar').style.width = '270px';
    document.getElementById('title').classList.remove('invisible');
    document.getElementById('logout').classList.remove('hidden');

    sidebarItems.forEach((el) => {
        el.classList.remove('invisible');
    });
};

const closeSidebar = () => {
    document.getElementById('sidebar').style.width = '60px';
    document.getElementById('title').classList.add('invisible');
    document.getElementById('logout').classList.add('hidden');

    sidebarItems.forEach((el) => {
        el.classList.add('invisible');
        el.classList.remove('dark:bg-ocean-700');
        console.log(el.classList);
    });
};

const openSidebarMobile = () => {
    document.getElementById('sidebar').style.width = '270px';
    document.getElementById('title').classList.remove('invisible');
    document.querySelector('.sidebar-backdrop').classList.remove('invisible');
    document.getElementById('logout').classList.remove('hidden');
    sidebarItems.forEach((el) => {
        el.classList.remove('invisible');
    });
};

const closeSidebarMobile = () => {
    document.getElementById('sidebar').style.width = '0';
    document.querySelector('.sidebar-backdrop').classList.add('invisible');
};

if (window.screen.availWidth >= 1024) {
    closeSidebar();
} else {
    closeSidebarMobile();
}

// Modo Escuro
const sunIcon = document.getElementById('sun-icon');
const moonIcon = document.getElementById('moon-icon');

if (
    localStorage.theme === 'dark' ||
    (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
    sunIcon.classList.remove('hidden');
    moonIcon.classList.add('hidden');
}

const toggleDark = () => {
    if (localStorage.theme === 'dark') {
        localStorage.theme = 'light';
        document.documentElement.classList.remove('dark');
        sunIcon.classList.remove('hidden');
        moonIcon.classList.add('hidden');
    } else {
        localStorage.theme = 'dark';
        document.documentElement.classList.add('dark');
        sunIcon.classList.add('hidden');
        moonIcon.classList.remove('hidden');
    }
};

const sidebarToggleSubmenu = () => {
    sidebarSubmenu.forEach((el) => {
        const element = el;
        if (!element.style.display) {
            element.style.display = 'block';
        } else {
            element.style.display = null;
        }
    });
};
