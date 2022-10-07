(() => {
  const app = {
    initialize() {
      this.cacheElements();
      this.registerListeners();
    },
    cacheElements() {
      this.$menuToggler = document.querySelector('.menuToggler');
      this.$navbar = document.querySelector('.navbar');
    },
    registerListeners() {
      // Toggle hamburgermenu
      this.$menuToggler.addEventListener('click', () => {
        this.$navbar.classList.toggle('visible');
        this.$menuToggler.classList.toggle('visible');
      });
    }

  }
  app.initialize();
})()