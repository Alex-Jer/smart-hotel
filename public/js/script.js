// Sidebar
const setup = () => {
  return {
    loading: true,
    isSidebarOpen: false,
    toggleSidebarMenu() {
      this.isSidebarOpen = !this.isSidebarOpen;
    },
    isSettingsPanelOpen: false,
    isSearchBoxOpen: false,
  };
};

// Modo Escuro
if (
  localStorage.theme === 'dark' ||
  (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
) {
  document.documentElement.classList.add('dark');
  document.getElementById('dark-theme-toggle').checked = true;
  document.getElementById('dark-theme-toggle').style.setProperty('--content-url', 'url(/public/svg/moon.svg)');
} else {
  document.documentElement.classList.remove('dark');
  document.getElementById('dark-theme-toggle').checked = false;
  document.getElementById('dark-theme-toggle').style.setProperty('--content-url', 'url(/public/svg/star.svg)');
}

// Interruptor/Botão do Modo Escuro
const toggleTheme = () => {
  if (localStorage.theme === 'dark') {
    localStorage.theme = 'light';
    document.documentElement.classList.remove('dark');
    document.getElementById('dark-theme-toggle').style.setProperty('--content-url', 'url(/public/svg/star.svg)');
  } else {
    localStorage.theme = 'dark';
    document.documentElement.classList.add('dark');
    document.getElementById('dark-theme-toggle').style.setProperty('--content-url', 'url(/public/svg/moon.svg)');
  }
};
