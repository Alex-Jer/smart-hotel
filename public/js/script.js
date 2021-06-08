// Sidebar
const sidebarItems = document.querySelectorAll('.sidebar-item');

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
