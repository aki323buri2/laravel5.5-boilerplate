# laravel5.5 boilerplate

`composer`の更新バージョン確認

```sh
$ composer self-update
// You are already using composer version 1.6.2 (stable channel).
$ composer global update
// Changed current directory to /home/shokuryu/.config/composer
// Loading composer repositories with package information
// Updating dependencies (including require-dev)
// Nothing to install or update
// Generating autoload files
//
```

`laravel/installer`でプロジェクト`alpha`を作成

```
$ ~/.config/composer/vendor/bin/laravel new alpha
// Crafting application...
// ```
//   - Installing league/flysystem (1.0.41): Loading from cache
//   - Installing laravel/framework (v5.5.28): Loading from cache
//   - Installing fideloper/proxy (3.3.4): Loading from cache
// ...
// Package manifest generated successfully.
// Application ready! Build something amazing.
```

プロジェクトディレクトリに移動して初期設定

```sh
$ cd alpha
$ php artisan preset react
// React scaffolding installed successfully.
// Please run "npm install && npm run dev" to compile your fresh scaffolding.
```

`nvm`で`node`と`npm`の更新バージョン確認

```sh
$ nvm ls-remote
//         v0.1.14
//         v0.1.15
// ... 
// ...
//          v8.9.4   (Latest LTS: Carbon)
//          v9.0.0
//          v9.1.0
//          v9.2.0
//          v9.2.1
// ->       v9.3.0
$ nvm install v9
v9.3.0 is already installed.
Now using node v9.3.0 (npm v5.5.1)
```

* [package.json](./package.json)の編集

`npm install`

```
$ npm install
// ...
// npm WARN optional SKIPPING OPTIONAL DEPENDENCY: fsevents@1.1.3 (node_modules/fsevents):
// npm WARN notsup SKIPPING OPTIONAL DEPENDENCY: Unsupported platform for fsevents@1.1.3: wanted {"os":"darwin","arch":"any"} (current: {"os":"linux","arch":"x64"})
// 
// added 1567 packages in 80.349s
```

`npm list`

```sh
$ npm list
// /home/share/web/alpha
// ├── @fortawesome/fontawesome-free-webfonts@1.0.1
// ├─┬ axios@0.17.1
// │ ├─┬ follow-redirects@1.3.0
// │ │ └─┬ debug@3.1.0
// │ │   └── ms@2.0.0
// │ └── is-buffer@1.1.6
// ├─┬ babel-preset-react@6.24.1
// │ ├── babel-plugin-syntax-jsx@6.18.0
// │ ├─┬ babel-plugin-transform-react-display-name@6.25.0
// │ │ └─┬ babel-runtime@6.26.0
// │ │   ├── core-js@2.5.3
// │ │   └── regenerator-runtime@0.11.1
// │ ├─┬ babel-plugin-transform-react-jsx@6.24.1
// │ │ ├─┬ babel-helper-builder-react-jsx@6.26.0
// │ │ │ ├── babel-runtime@6.26.0 deduped
// │ │ │ ├── babel-types@6.26.0 deduped
// │ │ │ └── esutils@2.0.2
// │ │ ├── babel-plugin-syntax-jsx@6.18.0 deduped
// │ │ └── babel-runtime@6.26.0 deduped
// ...
// │ ├── object-assign@4.1.1
// │ └─┬ prop-types@15.6.0
// │   ├── fbjs@0.8.16 deduped
// │   ├── loose-envify@1.3.1 deduped
// │   └── object-assign@4.1.1 deduped
// └─┬ react-dom@16.2.0
//   ├── fbjs@0.8.16 deduped
//   ├── loose-envify@1.3.1 deduped
//   ├── object-assign@4.1.1 deduped
//   └── prop-types@15.6.0 deduped
// 
```

`lib`ディレクトリの作成

```sh
$ mkdir -p lib/{classes/Main/Providers,mix,views}
$ tree lib
// lib
// ├── classes
// │   └── Main
// │       └── Providers
// ├── mix
// └── views
// 
// 5 directories, 0 files
```

* `Main`モデルと`MainServiceProvider`サービスプロバイダーを作成して`lib`に移動
* `node_modules/laravel-mix/webpack.config.js`と`webpack.mix.js`を`lib`に移動

```sh
$ php artisan make:model Main
// Model created successfully.
$ php artisan make:provider MainServiceProvider
// Provider created successfully.
$ mv app/Providers/MainServiceProvider.php lib/classes/Main/Providers/
$ cp node_modules/laravel-mix/setup/webpack.config.js lib/
$ cp webpack.mix.js lib/
$ tree lib
// lib
// ├── classes
// │   └── Main
// │       ├── Main.php
// │       └── Providers
// │           └── MainServiceProvider.php
// ├── mix
// ├── views
// ├── webpack.config.js
// └── webpack.mix.js
// 
// 5 directories, 4 files
```

配置したファイルと関連ファイルを編集

* [lib/classes/Main/Providers/MainServiceProvider.php](./lib/classes/Main/Providers/MainServiceProvider.php)
* [lib/classes/Main/Main.php](./lib/classes/Main/Main.php)
* [webpack.mix.js](./webpack.mix.js)
* [lib/webpack.mix.js](./lib/webpack.mix.js)
* [lib/webpack.config.js](./lib/webpack.config.js)

[composer.json](./composer.json)を編集

`composer dump-autoload`

```sh
$ composer  dump-autoload
// Generating optimized autoload files
// > Illuminate\Foundation\ComposerScripts::postAutoloadDump
// > @php artisan package:discover
// Discovered Package: fideloper/proxy
// Discovered Package: laravel/tinker
// Package manifest generated successfully.
```

`php artisan tinker`でPHPクラス探索の確認

```
$ php artisan tinker
// Psy Shell v0.8.17 (PHP 7.0.12 — cli) by Justin Hileman
// >>> class_exists(Main\Main::class)
// => true
// >>> class_exists(Main\Providers\MainServiceProvider::class)
// => true
// >>> exit
// Exit:  Goodbye.
```


サービスプロバイダーの登録

* [/config/app.php](./config/app.php)

CSSフレームワークを実装

* 今回実装するライブラリ
    - [material-design-icons](https://material.io/icons/)
    - [fontawesome v5](https://fontawesome.com/)
    - [bulma](https://bulma.io/)
    - [bulma-extension](https://bulma.io/extensions/)
* [lib/mix/main.scss](./lib/mix/main.scss)を編集

Reactテストコードを記述

* [lib/mix/main.js](./lib/mix/main.js)

`npm run watch`

```sh
$ npm run watch
// 
// > @ watch /home/share/web/alpha
// > cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --watch --progress --hide-modules --config=lib/webpack.config.js
// 
//  10% buildinggmodules 1/1 modules 0 active ...ome/share/web/alpha/lib/mix/main.scss
// Webpack is watching the files…
// 
//  95% emittingtimizationzationingcessingntivee...ome/share/web/alpha/lib/mix/main.scssf
// ...
// (Emitted value instead of an instance of Error)   resolve-url-loader cannot operate: CSS error
//   /home/share/web/alpha/lib/mix/main.scss:12207:3: @keyframes missing '}'
  at error (/home/share/web/alpha/node_modules/css/lib/parse/index.js:62:15)
//  @ ./lib/mix/main.scss 4:14-255
//  @ multi ./lib/mix/main.js ./lib/mix/main.scss39m22m
```

`/public`ディレクトリの内容確認

```sh
$ tree public
// public
// ├── css
// │   ├── app.css
// │   └── main.css
// ├── favicon.ico
// ├── fonts
// │   └── vendor
// │       ├── @fortawesome
// │       │   ├── fontawesome-free-webwebfa-brands-400.eot
// │       │   ├── fontawesome-free-webwebfa-brands-400.svg
// │       │   ├── fontawesome-free-webwebfa-brands-400.ttf
// │       │   ├── fontawesome-free-webwebfa-brands-400.woff
// │       │   ├── fontawesome-free-webwebfa-brands-400.woff2
// │       │   ├── fontawesome-free-webwebfa-regular-400.eot
// │       │   ├── fontawesome-free-webwebfa-regular-400.svg
// │       │   ├── fontawesome-free-webwebfa-regular-400.ttf
// │       │   ├── fontawesome-free-webwebfa-regular-400.woff
// │       │   ├── fontawesome-free-webwebfa-regular-400.woff2
// │       │   ├── fontawesome-free-webwebfa-solid-900.eot
// │       │   ├── fontawesome-free-webwebfa-solid-900.svg
// │       │   ├── fontawesome-free-webwebfa-solid-900.ttf
// │       │   ├── fontawesome-free-webwebfa-solid-900.woff
// │       │   └── fontawesome-free-webwebfa-solid-900.woff2
// │       └── material-design-icons
// │           ├── iconMaterialIcons-Regular.eot
// │           ├── iconMaterialIcons-Regular.ttf
// │           ├── iconMaterialIcons-Regular.woff
// │           └── iconMaterialIcons-Regular.woff2
// ├── index.php
// ├── js
// │   ├── app.js
// │   └── main.js
// ├── mix-manifest.json
// └── robots.txt
// 
// 6 directories, 27 files
```

![welcome](./documents/images/welcome.png)
![main-test1](./documents/images/main-test1.png)