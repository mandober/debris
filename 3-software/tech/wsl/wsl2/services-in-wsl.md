# Services in WSL2

Many of the cruical linux services do not work under WSL2. However, some, like `systemd` and other daemons, can be made to work with a bit of tinkering.

```shell
# get the status of all available services
sudo service --status-all
```

Available services

- [] [?] alsa-utils
- [] [-] apparmor
- [] [?] apport
- [] [-] atd
- [] [-] console-setup.sh
- [] [-] cron
- [] [?] cryptdisks
- [] [?] cryptdisks-early
- [] [-] dbus
- [] [?] hwclock.sh
- [] [+] irqbalance
- [] [-] iscsid
- [] [-] keyboard-setup.sh
- [] [?] kmod
- [] [-] lvm2
- [] [-] lvm2-lvmpolld
- [] [-] multipath-tools
- [] [+] open-iscsi
- [] [-] open-vm-tools
- [] [?] plymouth
- [] [?] plymouth-log
- [] [-] procps
- [] [-] rsync
- [] [-] rsyslog
- [] [-] screen-cleanup
- [] [-] ssh
- [] [-] udev
- [] [-] ufw
- [] [-] unattended-upgrades
- [] [-] uuidd
- [] [-] x11-common
