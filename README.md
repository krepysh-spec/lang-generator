# Laravel generator translations from php [array] to {json}

[![Build Status](https://circleci.com/gh/krepysh-spec/lang-generator.svg?style=shield)](https://circleci.com/gh/krepysh-spec/lang-generator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/krepysh-spec/lang-generator/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/krepysh-spec/lang-generator/?branch=main)
[![Code Coverage](https://scrutinizer-ci.com/g/krepysh-spec/lang-generator/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/krepysh-spec/lang-generator/?branch=main)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/krepysh-spec/lang-generator/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/code-intelligence)
[![Latest Stable Version](http://poser.pugx.org/krepysh-spec/lang-generator/v)](https://packagist.org/packages/krepysh-spec/lang-generator)
[![Total Downloads](http://poser.pugx.org/krepysh-spec/lang-generator/downloads)](https://packagist.org/packages/krepysh-spec/lang-generator)
[![Latest Unstable Version](http://poser.pugx.org/krepysh-spec/lang-generator/v/unstable)](https://packagist.org/packages/krepysh-spec/lang-generator)
[![License](http://poser.pugx.org/krepysh-spec/lang-generator/license)](https://packagist.org/packages/krepysh-spec/lang-generator)
[![PHP Version Require](http://poser.pugx.org/krepysh-spec/lang-generator/require/php)](https://packagist.org/packages/krepysh-spec/lang-generator)

### Install
 ```bash
 composer require krepysh-spec/lang-generator
 ```
 In the **config/app.php** file add the service provider
 ```php
'providers' => [
    //
    KrepyshSpec\LangGenerator\TranslationServiceProvider::class,
    //
  ];
 ```
 Publish the package assets by running the command
 ```bash
 php artisan vendor:publish --provider="KrepyshSpec\LangGenerator\TranslationServiceProvider"
 ```
 > This will publish the **Translation.js** file in **resources/js/VueTranslation** directory  
 
 Run the artisan command
 ```bash
 php artisan VueTranslation:generate --watch=1
 ```
  > This will compile down all the translation files in the **resources/lang** directory in the file **resources/js/VueTranslation/translations.json** 
 
 Open the file **resources/js/app.js** and add the Translation helper
 ```js
window.Vue = require('vue');
// If you want to add to window object
window.translate=require('./VueTranslation/Translation').default.translate;

// If you want to use it in your vue components
Vue.prototype.translate=require('./VueTranslation/Translation').default.translate;
```  
Compile the assets by running the command
```bash
npm run development
// or watch or production
```

### How to switch the languages?
This will get the current language form the document **lang** attribute
```html
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Document</title>
    </head>
    <body>
    
    </body>
</html>
```
### How to use?
Imagine this is the directory structure of **resources/lang** 
<pre>
|--en
   |--auth.php
   |--pagination.php
   |--passwords.php
   |--validation.php
   |--messages.php
|--fr
   |--auth.php
   |--pagination.php
   |--passwords.php
   |--validation.php
   |--messages.php  
</pre>
And the **messages.php** file is something like
```php
return [
    'foo'=>[
        'bar'=>'Some message'
    ]
];
```
You can get the value by calling the **translate** method
```js
translate('messages.foo.bar')
```
Example in Vue component
```vue
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="card-body">
                        {{translate('messages.foo.bar')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      
    }
</script>
```
### Uses Fallback Locale
> To interact same like **Laravel**   trans() insert in your layout 
```html
<meta name="fallback_locale" content="{{ config('app.fallback_locale') }}">
```

### Replace attributes
> It's not recommended to use this package for showing validation errors but if you want you can replace :attribute, :size
etc by passing the second argument as an object.
```js
translate('validation.required',{
    attribute:translate('validation.attributes.title')
});
```
> **Notice:** if it could not find the value for the key you passed it will return the exact key

### Support

For support, email evgeniymykhalichenko@gmail.com or telegram @krep1sh

### License

MIT
