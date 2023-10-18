# Glossary

https://docs.docker.com/glossary/


## Docker


## Docker Hub | Docker Cloud
https://cloud.docker.com/
Docker Hub is a service provided by Docker for finding and sharing container images with your team. It provides the following major features:
- Repositories: Push and pull container images.
- Teams & Orgs: Manage access to private repositories of container images.
- Official Images: Pull and use hq provided by Docker
- Publisher Images: use hq containers provided by external vendors.
- Builds: Automatically build containers and push them to Docker Hub.
- Webhooks: Trigger actions after a push for Docker Hub integrations.

## Images
The file system and configuration of our application which are used to create containers. To find out more about a Docker image, run docker inspect alpine. In the demo above, you used the docker pull command to download the alpine image. When you executed the command docker run hello-world, it also did a docker pull behind the scenes to download the hello-world image.

## Containers
Running instances of Docker images - containers run the actual applications. A container includes an application and all of its dependencies. It shares the kernel with other containers, and runs as an isolated process in user space on the host OS. You created a container using docker run which you did using the alpine image that you downloaded. A list of running containers can be seen using the docker ps command.

## Docker daemon
The background service running on the host that manages building, running and distributing Docker containers.

## Docker client
The command line tool that allows the user to interact with the Docker daemon.

## Docker Store
A registry of Docker images, where you can find trusted and enterprise ready containers, plugins, and Docker editions. You'll be using this later in this tutorial.

## Official Images
https://hub.docker.com/search/?q=&type=image&image_filter=official
The Docker Official Images are a curated set of Docker repositories hosted on Docker Hub. They are designed to:
- Provide essential base OS repositories (for example, ubuntu, centos) that serve as the starting point for the majority of users.
- Provide drop-in solutions for popular programming language runtimes, data stores, and other services, similar to what a Platform as a Service (PAAS) would offer.
- Exemplify Dockerfile best practices and provide clear documentation to serve as a reference for other Dockerfile authors.
- Ensure that security updates are applied in a timely manner. This is particularly important as many Official Images are some of the most popular on Docker Hub.


## Docker Swarm


## Swarm mode
https://docs.docker.com/engine/swarm/
is the cluster management and orchestration features embedded in the Docker engine. You can easily deploy to a swarm using a file that declares your desired state for the app. Swarm allows you to run your containers on more than one machine. In this tutorial, you can run on just one machine, or you can use something like Docker for AWS or Docker for Azure to quickly create a multiple node machine. Alternately, you can use Docker Machine to create a number of local nodes on your development machine. See the Swarm Mode lab for more information.

## Kitematic
https://github.com/docker/kitematic

## Kubernetes


## Docker Compose
https://docs.docker.com/compose/
