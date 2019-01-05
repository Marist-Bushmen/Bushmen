FROM python:3.6
MAINTAINER Daniel Gisolfi
EXPOSE 80
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update -y
RUN apt-get install -y \
    build-essential \
    && pip install --upgrade pip

COPY ./server /site

WORKDIR /site
COPY requirements.txt .

RUN pip3 install -r requirements.txt
# ENV SECRET_KEY=c_x14&&t6+-49!3954ty5xbm!b+g(ajg&wr(1vf4_5jsy1*ljz

ENTRYPOINT [ "python3" ]
# CMD ["./manage.py", "runserver", "--insecure", "0.0.0.0:80"]
CMD ["run.py"]