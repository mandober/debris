# Docker and WSL 2

WSL 2 is available in Windows 10 **build 18917**.

To make sure you are using build 18917 or higher join the Windows Insider Program in *the Fast ring*.

Status (2019-11-27)
- Build 19028 *latest*
- Build 19018
- Build 19013
- Build 19002
- Build 18995
- Build 18990
- Build 18980
- Build 18975
- Build 18970
- Build 18945
- Build 18917 *wsl2*
- Build 18890
- Build 18362 *my* (2019-11-27)
- Build 18342
- Build 18334
- Build 18305


Docker **Client** in WSL connectingt docker server in Windows

Install docker linux client
```
cd ~
wget https://get.docker.com/builds/Linux/x86_64/docker-1.13.0.tgz
tar -xzvf docker-1.12.1.tgz
```

Build a docker image from garbage random data
```
echo FROM alpine:latest > Dockerfile
dd if=/dev/urandom of=file.txt bs=1048576 count=20
~/docker/docker -H tcp://0.0.0.0:2375 build .
```
