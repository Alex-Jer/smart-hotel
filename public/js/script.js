// Sidebar
const sidebarItems = document.querySelectorAll(".sidebar-item");

const openSidebar = () => {
    document.getElementById("sidebar").style.width = "270px";
    document.getElementById("title").classList.remove("invisible");
    document.getElementById("logout").classList.remove("hidden");

    sidebarItems.forEach((el) => {
        const element = el;
        el.classList.remove("invisible");
    });
};

const closeSidebar = () => {
    document.getElementById("sidebar").style.width = "60px";
    document.getElementById("title").classList.add("invisible");
    document.getElementById("logout").classList.add("hidden");

    sidebarItems.forEach((el) => {
        const element = el;
        el.classList.add("invisible");
    });
};

const openSidebarMobile = () => {
    document.getElementById("sidebar").style.width = "270px";
    document.getElementById("title").classList.remove("invisible");
    document.querySelector(".sidebar-backdrop").classList.remove("invisible");
    document.getElementById("logout").classList.remove("hidden");

    sidebarItems.forEach((el) => {
        const element = el;
        el.classList.remove("invisible");
    });
};

const closeSidebarMobile = () => {
    document.getElementById("sidebar").style.width = "0";
    document.querySelector(".sidebar-backdrop").classList.add("invisible");
};

if (window.screen.availWidth >= 1024) {
    closeSidebar();
} else {
    closeSidebarMobile();
}

// Modo Escuro
const toggle = document.getElementById("dark-theme-toggle");
const toggleMobile = document.getElementById("dark-theme-toggle-mobile");
if (
    localStorage.theme === "dark" ||
    (!("theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark");
    // Responsável por tornar o interruptor do modo escuro responsive
    toggle.checked = true;
    toggleMobile.checked = true;
    toggle.style.setProperty("--content-url", "url(../svg/moon.svg)");
    toggleMobile.style.setProperty("--content-url", "url(../svg/moon.svg)");
} else {
    document.documentElement.classList.remove("dark");
    // Responsável por tornar o interruptor do modo escuro responsive
    toggle.checked = false;
    toggleMobile.checked = false;
    toggle.style.setProperty("--content-url", "url(../svg/star.svg)");
    toggleMobile.style.setProperty("--content-url", "url(../svg/star.svg)");
}

// Interruptor/Botão do Modo Escuro
const toggleTheme = () => {
    if (localStorage.theme === "dark") {
        localStorage.theme = "light";
        document.documentElement.classList.remove("dark");
        toggle.style.setProperty("--content-url", "url(../svg/star.svg)");
        toggleMobile.style.setProperty("--content-url", "url(../svg/star.svg)");
    } else {
        localStorage.theme = "dark";
        document.documentElement.classList.add("dark");
        toggle.style.setProperty("--content-url", "url(../svg/moon.svg)");
        toggleMobile.style.setProperty("--content-url", "url(../svg/moon.svg)");
    }
};
