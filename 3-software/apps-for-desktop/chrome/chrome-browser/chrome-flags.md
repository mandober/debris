Start chrome with enabled settings for inbuild extensions

start it with this appended:
`--show-component-extension-options`

1. disable chrome://flags/#enhanced-bookmarks-experiment and close Chrome
2. create Chrome shortcut to your desktop, right click > properties, add --show-component-extension-options to the target field, so that it looks like: "C:\<...>\chrome.exe" --show-component-extension-options
3. use that shortcut to launch Chrome, go to the extensions page and remove the removable "Bookmark Manager" (there are two)
4. will take effect immediately and it is a permanent change

So, at least the code for the old manager still exists. But for how long?