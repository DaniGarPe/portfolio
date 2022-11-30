<%EnableSessionState=False
host = Request.ServerVariables("HTTP_HOST")

if host = "danielweb.es" or host = "www.danielweb.es" then
response.redirect("https://www.danielweb.es/")

else
response.redirect("https://www.danielweb.es/error/error.html")

end if
%>