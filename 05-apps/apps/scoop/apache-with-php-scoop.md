---
downloaded:       2022-01-22
page-url:         https://scoop-docs.vercel.app/docs/guides/Apache-with-PHP.html
page-title:       Apache with PHP | Scoop
article-title:    Apache with PHP | Scoop
---
# Apache with PHP | Scoop

A command-line installer for Windows
Install PHP and Apache:

Register the PHP handler with Apache:

**To start Apache on the command line**, run:

Apache will continue running until you press `Ctrl-C` to terminate it.

If you open `http://localhost` in your browser, you should see a page saying that “It works!”.

## The document root directory

Scoop configures Apache to serve web pages from the `htdocs` directory inside the Scoop install directory.

You can get to this directory by running:

If you would like to serve documents from somewhere else, you need to change the DocumentRoot inside the `conf/httpd.conf` file. You can find `httpd.conf` at

## Installing Apache as a service

Run:

If you don't have `sudo`, you can install it with `scoop install sudo`.

To uninstall the Apache service

For more information, see [Using Apache HTTP Server on Windows][1].

[1]: https://httpd.apache.org/docs/current/platform/windows.html
