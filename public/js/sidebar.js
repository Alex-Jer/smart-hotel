const setup = () => {
  return {
    loading: true,
    isSidebarOpen: true,
    toggleSidbarMenu() {
      this.isSidebarOpen = !this.isSidebarOpen;
    },
    isSettingsPanelOpen: false,
    isSearchBoxOpen: false,
  };
};
