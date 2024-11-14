FROM gitlab/gitlab-runner:latest
RUN apt-get update -qy
RUN apt-get -y install curl gnupg
RUN apt-get install iputils-ping -y
RUN apt-get -y install \
    sudo \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg-agent \
    software-properties-common
RUN curl -fsSL https://download.docker.com/linux/debian/gpg | apt-key add -
RUN apt-key fingerprint 0EBFCD88
RUN add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
RUN apt-get update
RUN apt-get -y install docker-ce-cli
RUN curl https://cli-assets.heroku.com/install-ubuntu.sh | sh
RUN echo "gitlab-runner ALL=(ALL) NOPASSWD:ALL" >> etc/sudoers
