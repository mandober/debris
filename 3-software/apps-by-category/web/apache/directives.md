# Directives

Alphabetical list of all Apache HTTP Server directives:
http://httpd.apache.org/docs/2.4/mod/directives.html

quick reference
https://httpd.apache.org/docs/2.4/mod/quickreference.html


## Include

This directive allows inclusion of other configuration files from within the server configuration files.

`Include`
- Desc:	Includes other conf files from within the server configuration files
- Syntax: `Include <file-path | directory-path | wildcard>`
- Context: server config, virtual host, directory
- Status: `Core`
- Module: `core`
- Compatibility: Directory wildcard matching available in *2.3.6+*

Shell-style wildcard can be used in the filename or directory parts of the path to include several files at once, in alphabetical order.

In addition, if `Include` points to a directory, rather than a file, Apache httpd will read all files in that directory and any subdirectory.

However, including entire directories is not recommended, because it is easy to accidentally leave temporary files in a directory that can cause httpd to fail.

Instead, we encourage you to use the wildcard syntax shown below, to include files that match a particular pattern, such as `*.conf`.

The `Include` directive will fail with an error if a wildcard expression does not match any file. The `IncludeOptional` directive can be used if non-matching wildcards should be ignored.


The file path specified may be an absolute path, or relative to `ServerRoot`.

Examples:
```conf
Include /usr/local/apache2/conf/ssl.conf
Include /usr/local/apache2/conf/vhosts/*.conf
```

Or, providing paths relative to your ServerRoot directory:

```apache
Include conf/ssl.conf
Include conf/vhosts/*.conf
```

Wildcards may be included in the directory or file portion of the path.
This example will fail if there is no subdirectory in `conf/vhosts` that contains at least one `*.conf` file:

```conf
Include conf/vhosts/*/*.conf
```

Alternatively, the following command will just be ignored in case of missing files or directories:

```config
IncludeOptional conf/vhosts/*/*.conf
```


## Include Optional

This directive allows inclusion of other configuration files from within the server configuration files.

`IncludeOptional`
Description:	Includes other configuration files from within the server configuration files
Syntax: `IncludeOptional file-path | directory-path | wildcard`
Context: server config, virtual host, directory
Status: Core
Module: core
Compatibility: Available in 2.3.6 and later. Not existent file paths without wildcards do not cause SyntaxError after 2.4.30

It works identically to the `Include` directive, but it will be silently ignored (instead of causing an error) if wildcards are used and they do not match any file or directory or if a file path does not exist on the file system.
