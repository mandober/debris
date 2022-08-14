---
downloaded:       2022-02-21
page-url:         https://loadforge.com/blog/41/reduce-wsl2-disk-usage
page-title:       Reduce WSL2 Disk Usage - Blog - LoadForge
article-title:    Why is PHP such a popular language?
---
# Reduce WSL2 Disk Usage - Blog - LoadForge

WSL2 on Windows is amazing for developers, but it constantly grows in size and ultimately winds up using a lot more disk space than necessary. Especially if you are a Docker user.
WSL2 on Windows is amazing for developers, but it constantly grows in size and ultimately winds up using a lot more disk space than necessary. Especially if you are a Docker user.

This guide covers reducing your actual Linux install size (typically Ubuntu) as well as freeing up space the WSL2 virtual hard disks use.

## Part 1: Cleaning Up Ubuntu

Here we will be covering reducing your general Ubuntu install size. Most of these apply to any Linux install.

### Clean up apt-get caches and old packages

To delete downloaded packages (.deb) already installed, clean up the cache and remove any used packages run the following commands.

```
sudo apt-get clean
sudo apt-get autoclean
sudo apt-get autoremove
```

### Remove unused locales, logs, manpages, documentation, etc

This will remove manpages and documentation from WSL, which in my opinion is not needed. It will also purge unused locales.

```
sudo apt install localepurge
sudo journalctl --vacuum-size 10M
sudo find /usr/share/doc -depth -type f -delete
sudo rm -rf /usr/share/man/* /usr/share/groff/* /usr/share/info/* /usr/share/lintian/* /var/cache/man/*
```

### Check for large packages and files

The below query will show you your largest installed packages which you can then remove (the ones you no longer need).

```
dpkg-query -W --showformat='${Installed-Size} ${Package}\n' | sort -nr | less
```

And this command will find files larger than 10MB

```
find / -type f -size +10M
```

### Empty the trash

Clean up the trash if there is any.

```
rm -r ~/.local/share/Trash/info/ && rm -r ~/.local/share/Trash/files/    
```

## Part 2: Cleaning Up Docker

Docker has a way of consuming disk space and not releasing it. My commands below will remove all non-running containers, networks, images and more. I recommend doing this once in a while as a "full purge" to clean up but be careful if it's not easy for you do recreate your docker environments.

```
docker system prune
docker volume prune
docker network prune
docker container prune
docker image prune -a
```

If this is too much for you, look into some other options like Docker Desktop's clean function etc. In our case it just means recreating my docker-compose environment which is very quick.

## Part 3: Freeing up disk space used by WSL2

Now comes the reclaiming of the disk space used by your WSL2 partition which is now much smaller. We recommend taking a backup of any critical files in your WSL2 install, but this has never caused an issue for us.

### Step 1: Stop all WSL distributions

Run the following to stop WSL, and make sure nothing is using the WSL folders etc.

```
wsl --shutdown
```

You can now check it's stopped by running

```
wsl --list --running
```

### Step 2: Reclaim Disk Space

At this point you need to run **PowerShell as Administrator**. We are going to shrink the vhdx files used by Docker and Ubuntu (or other) on your system.

You will need to replace the path in this example with your actual path, which will be similar but like the user-pc folder is different and the CanonicalGroupLimited.\* folder.

```
Optimize-VHD -Path C:\Users\user-pc\AppData\Local\Packages\CanonicalGroupLimited.UbuntuonWindows_79rhkp1fndgsc\LocalState\ext4.vhdx -Mode Full
Optimize-VHD -Path C:\Users\user-pc\AppData\Local\Docker\wsl\data\ext4.vhdx -Mode Full
```

If you do not use Docker Desktop you can ignore the second line.

## Final Notes

That should be it - you can often reclaim tens of GB of storage this way, and we generally optimize like this every month or two.
