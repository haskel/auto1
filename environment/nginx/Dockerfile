FROM nginx

RUN apt-get update && apt-get install --no-install-recommends -y net-tools iproute2 xauth iputils-ping telnet

RUN rm /etc/nginx/conf.d/default.conf
RUN mkdir /etc/nginx/sites-enabled/
COPY nginx.conf /etc/nginx/
COPY api.conf /etc/nginx/sites-available/
RUN ln -s /etc/nginx/sites-available/api.conf /etc/nginx/sites-enabled/

RUN echo "upstream api-upstream { server php:9000; }\n" > /etc/nginx/conf.d/upstream.conf

CMD ["nginx"]