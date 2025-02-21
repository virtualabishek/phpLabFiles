/*
 |--------------------------------------------------------------------------
 | Browser-sync config file
 |--------------------------------------------------------------------------
 |
 | For up-to-date information about the options:
 |   http://www.browsersync.io/docs/options/
 |
 | There are more options than you see here, these are just the ones that are
 | set internally. See the website for more info.
 |
 |
 */

const path = require("path");
const resolve = (...segments) => path.join(__dirname, ...segments);

const PATHS = {
  // File patterns to monitor for changes (relative to project root)
  files: ["/var/www/html/phpLab/day4/**/*.php"],

  // Legacy watch patterns (use only for special cases)
  watch: [],

  // Directories/files to ignore
  ignore: ["src/vendor/**"],
};

module.exports = {
  ui: {
    port: 3001,
  },
  files: [...PATHS.files].map((pattern) => resolve(pattern)),
  watchEvents: ["change"],
  watch: [...PATHS.watch].map(resolve),
  ignore: [...PATHS.ignore].map((pattern) => resolve(pattern)),
  single: false,
  watchOptions: {
    ignoreInitial: true,
  },
  server: false,
  proxy: "localhost:80",
  port: 3000,
  middleware: false,
  serveStatic: [],
  ghostMode: {
    clicks: true,
    scroll: true,
    location: true,
    forms: {
      submit: true,
      inputs: true,
      toggles: true,
    },
  },
  logLevel: "info",
  logPrefix: "Browsersync",
  logConnections: true,
  logFileChanges: true,
  logSnippet: true,
  rewriteRules: [],
  open: "local",
  browser: "default",
  cors: true,
  hostnameSuffix: false,
  reloadOnRestart: false,
  notify: false,
  scrollProportionally: true,
  scrollThrottle: 0,
  scrollRestoreTechnique: "window.name",
  scrollElements: [],
  scrollElementMapping: [],
  reloadDelay: 0,
  reloadDebounce: 500,
  reloadThrottle: 0,
  plugins: [],
  injectChanges: true,
  startPath: null,
  minify: true,
  host: null,
  localOnly: false,
  codeSync: true,
  timestamps: true,
  clientEvents: [
    "scroll",
    "scroll:element",
    "input:text",
    "input:toggles",
    "form:submit",
    "form:reset",
    "click",
  ],
  socket: {
    socketIoOptions: {
      log: false,
    },
    socketIoClientConfig: {
      reconnectionAttempts: 50,
    },
    path: "/browser-sync/socket.io",
    clientPath: "/browser-sync",
    namespace: "/browser-sync",
    clients: {
      heartbeatTimeout: 5000,
    },
  },
  tagNames: {
    less: "link",
    scss: "link",
    css: "link",
    jpg: "img",
    jpeg: "img",
    png: "img",
    svg: "img",
    gif: "img",
    js: "script",
  },
  injectNotification: false,
};
