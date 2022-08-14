/*

elm.json for applications

https://github.com/elm/compiler/blob/master/docs/elm.json/application.md

This is a decent baseline for pretty much any apps made with Elm.
*/
{
    "type": "application",
    "source-directories": [
        "src"
    ],
    "elm-version": "0.19.1",
    "dependencies": {
        "direct": {
            "elm/browser": "1.0.0",
            "elm/core": "1.0.0",
            "elm/html": "1.0.0",
            "elm/json": "1.0.0"
        },
        "indirect": {
            "elm/time": "1.0.0",
            "elm/url": "1.0.0",
            "elm/virtual-dom": "1.0.0"
        }
    },
    "test-dependencies": {
        "direct": {},
        "indirect": {}
    }
}
/*

"type"
    Either: "application" or "package"
    All the other fields are based on this choice

"source-directories"
    A list of directories where Elm code lives.
    Most projects just use "src" for everything.

"elm-version"
    The exact version of Elm this builds with.
    (Should be "0.19.1" as of May 2020)

"dependencies"
    All the packages you depend upon.
    We use exact versions, so elm.json doubles as a lock file.
    You can use modules from any DIRECT dependency in your code.
    
    Some direct deps have own deps that you may not care about.
    These are the INDIRECT deps, which are listed explicitly so that:
    1. builds are reproducible
    2. you can review their quantity and quality

"test-dependencies"
    All the packages that you use in tests/ with elm-test
    but not in the app you actually want to ship.
    This also uses exact versions to make tests more reliable.

*/
