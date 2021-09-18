# gulp-scss-starter (modified)

## Особенности
* оптимизировано под [WordPress](https://wordpress.org/)
* именование классов по [БЭМ](https://ru.bem.info/)
* используется БЭМ-структура
* используется препроцессор [SCSS](https://sass-lang.com/)
* используется транспайлер [Babel](https://babeljs.io/) для поддержки современного JavaScript (ES6) в браузерах
* используется [Webpack](https://webpack.js.org/) для сборки JavaScript-модулей
* используется строгий кодгайд

## Установка
* установите [NodeJS](https://nodejs.org/en/) (если требуется)
* установите `gulp` глобально: `npm install -g gulp-cli`
* перейдите в скачанную папку со сборкой: `cd gulp-scss-starter`
* скачайте необходимые зависимости: `npm i`
* задайте переменные, для этого необходимо:
  * настроить файл `gulpfile.babel.js` (переменные константы URL, frontPath)
  * перейти в папку `gulp-tasks`
  * настроить под себя задачу `serve.js`
* чтобы начать работу, введите команду: `npm run dev` (режим разработки)
* чтобы собрать проект, введите команду `npm run build` (режим сборки)

Если вы всё сделали правильно, у вас должен открыться браузер с локальным сервером. Режим сборки предполагает оптимизацию проекта: сжатие изображений, минифицирование CSS и JS-файлов для загрузки на сервер.

## Файловая структура

```
gulp-scss-starter
├── gulp-tasks
├── ...wptheme
│     ├── dist
│     ├── src
│     │   ├── fonts
│     │   ├── img
│     │   ├── js
│     │   └── styles
│     ├── includes
│     ├── languages
│     ├── page-parts
│     ├── page-templates
│     ├── plugins
│     └── woocommerce
├── gulpfile.babel.js
├── package.json
├── webpack.config.js
├── .babelrc.js
├── .eslintrc.json
├── .gitignore
└── .htaccess
```

* Корень папки:
    * `.babelrc.js` — настройки Babel
    * `.eslintrc.json` — настройки ESLint
    * `.gitignore` – запрет на отслеживание файлов Git'ом
    * `.htaccess` - конфигурационный файл веб-сервера Apache с настройками [gzip](https://habr.com/ru/post/221849/) (сжатие без потерь)
    * `gulpfile.babel.js` — настройки Gulp
    * `webpack.config.js` — настройки Webpack
    * `package.json` — список зависимостей
* Папка `...wptheme/` - используется во время разработки:
    * шрифты: `src/fonts`
    * изображения: `src/img`
    * JS-файлы: `src/js`
    * SCSS-файлы: `src/styles`
    * HTML/PHP-файлы: `./`
* Папка `dist` - папка, из которой запускается локальный сервер для разработки (при запуске `npm run dev`)
* Папка `gulp-tasks` - папка с Gulp-тасками

## Команды
* `npm run dev` - запуск сервера для разработки проекта
* `npm run build` - собрать проект с оптимизацией без запуска сервера
* `npm run build views` - скомпилировать Pug-файлы
* `npm run build styles` - скомпилировать SCSS-файлы
* `npm run build scripts` - собрать JS-файлы
* `npm run build images` - собрать изображения
* `npm run build webp` - сконвертировать изображения в формат `.webp`
* `npm run build sprites`- собрать спрайты
* `npm run build fonts` - собрать шрифты
* `npm run build favicons` - собрать фавиконки
* `npm run build gzip` - собрать конфигурацию Apache

## Рекомендации по использованию

### Шрифты
* шрифты находятся в папке `src/fonts`
    * используйте [форматы](https://caniuse.com/#search=woff) `.woff` и `.woff2`
    * шрифты подключаются в файл `src/styles/base/_fonts.scss`
    * сконвертировать локальные шрифты можно с помощью [данного сервиса](https://onlinefontconverter.com/)

### Изображения
* изображения находятся в папке `src/img`
    * изображение для генерации фавиконок должно находиться в папке `src/img/favicon` и иметь размер не менее `1024px x 1024px`
    * изображения автоматически конвертируются в формат `.webp`. Подробная информация по использованию [тут](https://vk.com/@vk_it-webp).

### Сторонние библиотеки
* все сторонние библиотеки устанавливаются в папку `node_modules`
    * для их загрузки воспользуйтеcь командой `npm install package_name`
    * для подключения JS-файлов библиотек импортируйте их в самом начале JS-файла БЭМ-блока (то есть тот БЭМ-блок, который использует скрипт), например:
    `javascript
    import $ from "jquery";
    `
    * для подключения стилевых файлов библиотек импортируйте их в файл `src/styles/vendor/_libs.scss`
    * JS-файлы и стилевые файлы библиотек самостоятельно изменять нельзя

⛔ Если в вашем проекте используется несколько библиотек, которые необходимо подключать на нескольких страницах, во избежании ошибок нужно:
* по пути `src/js/import` создать папку `pages`
* в папке `pages` создать js-файл для страницы, например, `pageA.js`, и импортировать туда библиотеку, которая будет использоваться только на этой странице
    * аналогично проделать шаг для дополнительных страниц
* в файле `webpack.config.js` в точку входа добавить js-файлы страниц, пример:
`javascript
entry: {
    main: "./src/js/index.js",
    pageA: "./src/js/import/pages/pageA.js",
    pageB: "./src/js/import/pages/pageB.js"
}
`
* подключить скомпилированные js-файлы на необходимых страницах

## Контакты
* Telegram: [@savvoff](https://t.me/savvoff)
* Facebook: [savvoff](https://fb.me/savvoff)
