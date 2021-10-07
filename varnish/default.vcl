vcl 4.0;

backend default {
  .host = "service2";
  .port = "80";
  .connect_timeout = 500s;
  .first_byte_timeout = 500s;
}

sub vcl_recv {
  if (req.url == "/create") {
      ban("req.http.host ~ .*");
      return (pass);
  }
}