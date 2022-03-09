FROM gitpod/workspace-mysql

RUN sudo apt-get update -q \
    && sudo apt install php-mysql -y