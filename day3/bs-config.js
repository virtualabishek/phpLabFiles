module.exports = {
  proxy: "localhost/phpLab/day3",
  files: ["./**/*.php", "./**/*.css", "./**/*.js"],
  watchOptions: {
    usePolling: true,
    interval: 500,
  },
  ghostMode: false,
  open: false,
  reloadDelay: 500,
  injectChanges: true,
};
