# Mezon CLI Tool

[![Open Collective](https://img.shields.io/badge/Open%20Collective-sponsor-7eadf1?logo=open%20collective&logoColor=7eadf1&labelColor=555555)](https://opencollective.com/mezon-router)
[![Packagist](https://img.shields.io/packagist/v/mezon/cli)](https://packagist.org/packages/mezon/cli)
[![Twitter](https://img.shields.io/badge/twitter-follow-1DA1F2?logo=twitter&logoColor=1DA1F2&labelColor=555555?style=flat)](https://twitter.com/mezonphp)

## Installation

```bash
composer global require mezon/cli
```

## Command line pattern

Here is the most common pattern:

```bash
mezon <verb> <entity> [<options>]
```

Here &lt;verb&gt; is:

- `create`
- `help`
- `version`

And &lt;entity&gt; can be:

- `htaccess` (default .htaccess will be created);
- `fs` (default file structure will be created);
- `application` (default Application.php file with default class will be created).
- `project` (default .env will be created with settings for the project).
