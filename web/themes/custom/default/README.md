# Default custom theme given by Niji socles
https://gitlab.niji.fr/dsf/php/drupal/forge/socles/app-drupal-docker/-/issues/21

Feel free to update it to meet your project requirements.

## Stack definition

- The theme is based on the recommended `stable9` core theme.
- The theme uses [ViteJs](https://vitejs.dev/) to build all assets.
- [TypeScript](https://www.typescriptlang.org/docs/) is usable by default and should be used (even in minor JS development).
- This theme needs a nodeJS container to work.

## How to build

### Server (development)

The development server solution have been used in order to add [HMR](https://vitejs.dev/guide/api-hmr.html#hmr-api) support.

```shell
npm run dev
```

> Now no need to reload your webpage to see changes.

#### Checker

The [vite-plugin-checker](https://vite-plugin-checker.netlify.app/introduction/introduction.html)
is installed in order to perform style and javascript/typescript verifications.
By default, it is using [stylelint](https://www.npmjs.com/package/stylelint) for style assets
and [ESLint](https://www.npmjs.com/package/eslint) for javascript assets.

> This plugin will display errors and bad practices directly in your web application.
> This plugin allow faster lint with javascript workers. (~17sec -> ~2,5s for basic app).

The theme comme with predefined and customised ESLint and Stylelint rules. If you want to
change it for your project, you need to update `.eslintrc.json` and `.stylelintrc.json`.
It is a good idea to use contributed recipes like this :
- https://github.com/stylelint/awesome-stylelint#readme
- https://www.npmjs.com/package/eslint-config-standard-with-typescript
- ...

Checkers also have auto fix functionalities for common mistakes who doesn't
require human choice. To use it use :
```shell
npm run fix
```

> Due to how `vite-plugin-checker` is working it is not recommended to
> use `--fix` in this plugin. This is why the command is separated.

### Build (production)

When you are ready to build for production use this mode.

```shell
npm run build
```

## Where is my build

All built files will be outputted in the `dist` folder of this theme.

> The `global` library already uses built files as dependencies of this theme.

## How to use browsersync

[Browsersync](https://browsersync.io/) is a free sync tool to navigate on
different browser only with interactivity on one.
This is verry useful to see browser compatibility on all browser at the same
time.

### Environment

Browsersync is only configured in development environment, it will not
work on others.

Only pages rendered within the default theme will be in sync, not pages in
the admin theme.

### Start browsersync server

Start the browsersync server with (it will run in deamon mode) :

```shell
make browsersync-start
```

Then you just have to open a window of all your target browser on the same page
and it will be in sync. Next you can click, scroll, fill out forms etc...

To see Browsersync is running you can go on
https://browsersync-ui-app-drupal.docker.localhost you will see the admin UI panel.

### Stop browsersync

Browsersync is working with websocket and can be resource consuming.
If you have multiple projects running at simultaneously on your computer,
it is recommended to stop unnecessary browsersync server.

As soon as you kill the terminal session running the Browsersync server,
the server is closed.
