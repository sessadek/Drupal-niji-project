module.exports = {
  open: false,
  codeSync: false,
  online: true,
  cors: true,
  notify: true,
  logLevel: 'debug',
  https: false,
  // tunnel: true,
  ui: {
    port: 3000,
  },
  middleware: [
    function (req, res, next) {
      res.setHeader('Access-Control-Allow-Origin', '*');
      next();
    }
  ],
  server: false,
  port: 80,
  script: {
    domain: 'https://browsersync-' + process.env.APP_DOMAIN,
  },
  socket: {
    domain: 'https://browsersync-' + process.env.APP_DOMAIN,
  }
}
