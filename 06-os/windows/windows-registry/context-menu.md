# Windows :: Registry :: Context Menu

The items populating your context menu are not all located in the same place in the Registry. You can find most of those used for files and folders by drilling down to the following keys:
- `HKEY_CLASSES_ROOT\*\shell`
- `HKEY_CLASSES_ROOT\*\shellex\ContextMenuHandlers`
- `HKEY_CLASSES_ROOT\AllFileSystemObjects\ShellEx`

The context menu entries specific to folders are here:
- `HKEY_CLASSES_ROOT\Directory\shell`
- `HKEY_CLASSES_ROOT\Directory\shellex\ContextMenuHandlers`
