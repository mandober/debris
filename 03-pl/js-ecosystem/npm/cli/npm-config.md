npm-config(1) -- Manage the npm configuration files
===================================================

## SYNOPSIS

    npm config set <key> <value> [-g|--global]
    npm config get <key>
    npm config delete <key>
    npm config list [-l] [--json]
    npm config edit
    npm get <key>
    npm set <key> <value> [-g|--global]

    aliases: `c`


npm gets its config settings from:
- the command line
- environment variables
- `npmrc` files
- `package.json` (in some cases)

See npmrc(5) for more information about the npmrc files.
See `npm-config(7)` for a more thorough discussion of the mechanisms involved.
The `npm config` command can be used to update and edit the contents of the user and global npmrc files.

Config supports the following sub-commands

### set
`npm config set KEY VALUE`
Sets the config key to the value.
If value is omitted, then it sets it to "true".

### get
`npm config get KEY`
Echo the config value to stdout.

### list
`npm config list`
Show all the config settings.
Use `-l` to also show defaults.
Use `--json` to show the settings in json format.

### delete
npm config delete key
Deletes the key from all configuration files.

### edit
npm config edit
Opens the config file in an editor.
Use the `--global` flag to edit the global config.

## SEE ALSO
* npm-folders(5)
* npm-config(7)
* package.json(5)
* npmrc(5)
* npm(1)
