module.exports = {
  proxy: "localhost/phpLab/day4",
  files: ["./**/*.php", "./**/*.css", "./**/*.js"],
  watchOptions: {
    usePolling: true,
    interval: 1000,
  },
  ghostMode: false,
  open: false,
  reloadDely: 500,
  injectChanges: true,
};
