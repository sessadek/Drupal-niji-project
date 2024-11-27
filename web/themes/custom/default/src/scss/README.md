# Use the sass build

## Use fonts

In order to use custom fonts you will have to `import` the font
in the `fonts.ts`, and load the font in `@font-face` in a Sass file.

Example (`_fonts.scss`) :
```scss
@font-face {
  font-family: 'Font Awesome 6 Brands';
  src: url('../fonts/fa-brands-400.woff2') format('woff2'),
  url('../fonts/fa-brands-400.ttf') format('ttf');
  font-weight: 900;
  font-style: normal;
}
```

## Use images

By default, ViteJs will load images on usage. So simply use it in a Sass
file and it will work. ViteJs will include images as `base64` binary.

If for some reason you want to load images statically without binary (perf., usability...)
you can create a public folder as described in the documentation https://vitejs.dev/guide/assets.html#the-public-directory.
