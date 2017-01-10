# cakephp-push

[![Framework](https://img.shields.io/badge/Framework-CakePHP%203.x-orange.svg)](http://cakephp.org)
[![license](https://img.shields.io/github/license/LeWestopher/cakephp-monga.svg?maxAge=2592000)](https://github.com/LeWestopher/cakephp-monga/blob/master/LICENSE)
[![Github All Releases](https://img.shields.io/packagist/dt/lewestopher/cakephp-monga.svg?maxAge=2592000)](https://packagist.org/packages/lewestopher/cakephp-monga)
[![Travis](https://img.shields.io/travis/LeWestopher/cakephp-monga.svg?maxAge=2592000)](https://travis-ci.org/LeWestopher/cakephp-monga)
[![Coverage Status](https://coveralls.io/repos/github/LeWestopher/cakephp-monga/badge.svg)](https://coveralls.io/github/LeWestopher/cakephp-monga)


A plugin for adding "push notification" style integration with various push services.

### Requirements

* Composer
* CakePHP 3.x
* PHP 5.4+

### Installation

In your CakePHP root directory: run the following command:

```
composer require lewestopher/cakephp-push
```

Then in your config/bootstrap.php in your project root, add the following snippet:

```php
// In project_root/config/bootstrap.php:

Plugin::load('CakePush');
```

or you can use the following shell command to enable to plugin in your bootstrap.php automatically:

```
bin/cake plugin load CakePush
```

### Extended Documentation

For the extended docs, please visit our [Wiki](https://github.com/LeWestopher/cakephp-push/wiki).

### Roadmap

Here are some of the features that I plan on integrating into this project very soon:

- [ ] Basic PushComponent and PushBehavior mocked out
- [ ] Create PushRegistry.php singleton to hold various push service instances
- [ ] Define base PushEngine abstract class for various services to extend (Pusher, Socket.io, etc)
- [ ] Create PusherEngine extending PushEngine for the Pusher service 
- [ ] Define acceptable base configuration settings for push config in app.php 
- [ ] Instantiate config settings into PushRegistry class in plugin's bootstrap.php
- [ ] Integrate PushComponent with PushRegistry so that we can define the `push()` method:

```php
class PushComponent {
    public function push($config_service_name: string, $push_opts: IPushOptions): IPushResult;
}
```

- [ ] Integrate PushBehavior with PushRegistry so that we can define the `push()` method:

```php
class PushBehavior {
    public function push($config_service_name: string, $push_opts: IPushOptions): IPushResult;
}
```

- [ ] Create Node.js module for integrating Socket.io with CakePHP via REST interface
- [ ] Develop encryption scheme for setting a private key in Cake and a public key in Node for auth on REST interface 
- [ ] Create SocketIoEngine extending PushEngine for integrating with a Socket.io instance.

### Support

For bugs and feature requests, please use the [issues](https://github.com/LeWestopher/cakephp-push/issues) section of this repository.

### Contributing

To contribute to this plugin please follow a few basic rules.

* Contributions must follow the [CakePHP coding standard](http://book.cakephp.org/3.0/en/contributing/cakephp-coding-conventions.html).
* [Unit tests](http://book.cakephp.org/3.0/en/development/testing.html) are required.

### Change Log

Yes, we have one of [those](https://github.com/LeWestopher/cakephp-push/blob/master/CHANGELOG.md).

### Creators

[Wes King](http://www.github.com/lewestopher)

### License

Copyright 2016, Wes King

Licensed under The MIT License Redistributions of files must retain the above copyright notice.
