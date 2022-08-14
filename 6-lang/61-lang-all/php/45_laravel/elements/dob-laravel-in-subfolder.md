# Laravel in subfolder

Place laravel's privates above the document root (usual) but into a subfolder (unusual). Above the *document root* are other Servage's fixed folders (cannot be moved or rename), so mixing the laravel's privates with these folder seems suboptimal (e.g. for verion control). It would be better to crete and place all laravel's privates in a subfolder there.

dbs.dobermann-review     *website root*
├─── data
├─── logs
├─── sessions
├─── upload_tmp_dir
│
├─── `public_html`        *doc root*
│   ├─── .htaccess
│   └─── index.php
│
└─── `lar62`              *laravel privates in subdir*
    ├─── app
    ├─── bootstrap
    ├─── config
    ├─── database
    ├─── resources
    ├─── routes
    ├─── storage
    ├─── tests
    └─── vendor


https://developers.google.com/web/fundamentals/design-and-ux/responsive/patterns
https://www7.putlockertv.to/watch/vikings-2.412m/3rr8r38
https://laravel.com/docs/master/cache
https://medium.com/@lucabecchetti/configure-laravel-to-work-in-a-subdirectory-and-with-artisan-serve-at-the-same-time-654ba0c1fd0b
https://github.com/lucabecchetti/laravel_subdir
https://laravel-news.com/subfolder-install
https://developerhowto.com/2018/11/12/how-to-change-the-laravel-public-folder/
https://www.google.com/search?q=laravel+6+rename+public+to+public_html&oq=laravel+6+rename+public+to+public_html&aqs=chrome..69i57.12255j0j7&sourceid=chrome&ie=UTF-8
https://www.dvdheiden.nl/2015/06/laravel-5-quick-tip-change-the-public-directory/
https://stackoverflow.com/questions/30198669/how-to-change-public-folder-to-public-html-in-laravel-5
https://stackoverflow.com/questions/52358418/access-images-in-public-html-from-a-subdirectory-admin-laravel?rq=1
https://stackoverflow.com/questions/55094509/how-to-point-laravel-project-to-a-public-folder-under-public-html-in-shared-host?rq=1
https://stackoverflow.com/questions/41599014/how-to-install-laravel-in-only-the-shared-hosts-public-folder?rq=1
https://stackoverflow.com/questions/40870385/how-to-changed-default-path-public-name-in-laravel?rq=1
https://laracasts.com/discuss/channels/general-discussion/where-do-you-set-public-directory-laravel-5
https://laracasts.com/discuss/channels/general-discussion/where-do-you-set-public-directory-laravel-5
http://127.0.0.1:8000/


https://developers.google.com/web/fundamentals/design-and-ux/responsive/patterns
https://laravel.com/docs/master/cache
https://medium.com/@lucabecchetti/configure-laravel-to-work-in-a-subdirectory-and-with-artisan-serve-at-the-same-time-654ba0c1fd0b
https://github.com/lucabecchetti/laravel_subdir
https://laravel-news.com/subfolder-install
https://developerhowto.com/2018/11/12/how-to-change-the-laravel-public-folder/



https://developers.google.com/web/fundamentals/design-and-ux/responsive/patterns
https://medium.com/@lucabecchetti/configure-laravel-to-work-in-a-subdirectory-and-with-artisan-serve-at-the-same-time-654ba0c1fd0b
https://laracasts.com/discuss/channels/general-discussion/where-do-you-set-public-directory-laravel-5
https://gist.github.com/cbj4074/9bb210706f8f2fdd61b0
https://stackoverflow.com/questions/31758901/laravel-5-change-public-path
https://stackoverflow.com/questions/47342920/laravel-5-5-shared-hosting-changing-from-public-to-public-html-partially-wor
https://www.google.com/search?newwindow=1&biw=1920&bih=916&tbs=qdr%3Ay&sxsrf=ACYBGNTj1uvztY_lm9aH4k30crEKPWj8xw%3A1575980974275&ei=ro_vXf-sEOb3qwHW2rCwAg&q=laravel+6+in+subfolder+rename+document+root&oq=laravel+6+in+subfolder+rename+document+root&gs_l=psy-ab.3...14770.15129..15727...0.0..0.172.622.0j5......0....1..gws-wiz.4YO3AepIFMU&ved=0ahUKEwj_u5PRiqvmAhXm-yoKHVYtDCYQ4dUDCAs&uact=5
https://stackoverflow.com/questions/57337056/remove-public-in-laravel-on-apache-server-and-webuzo-panel
https://stackoverflow.com/questions/27873147/setting-the-root-to-public-folder-in-laravel-apache2-server-ubuntu-14-04-lts?rq=1
https://developerhowto.com/2018/11/12/how-to-change-the-laravel-public-folder/
https://laravel.com/docs/master/structure
