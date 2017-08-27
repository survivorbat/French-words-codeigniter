<script src="js/jquery.js"></script>
<input type="text" id="title">
<textarea name="test">
</textarea>
<input type="submit" onclick="doen()">
<div id="tst">
</div>
<script>
function doen() {
  $("#tst").html("");
  $text = $("textarea").val();
  $text = $text.split("\n");
  $("#tst").append("&nbsp;&nbsp;&lt;hoofdstuk h='"+$("#title").val()+"'&gt;<br>");
  for(var i=0;i<$text.length;i++){
    $split = $text[i].split("=");
    $split[0]=$split[0].replace("{f}","");
    $("#tst").append("&nbsp;&nbsp;&nbsp;&nbsp;");
    $("#tst").append("&lt;woord id='"+(i+1)+"' &gt;");
    $("#tst").append("&lt;frans&gt;");
    $("#tst").append($split[0]);
    $("#tst").append("&lt;/frans&gt;&lt;nederlands&gt;");
    $("#tst").append($split[1]);
    $("#tst").append("&lt;/nederlands&gt;");
    $("#tst").append("&lt;/woord&gt;");
    $("#tst").append('<br>');
  }
  $("#tst").append("&nbsp;&nbsp;&lt;/hoofdstuk&gt;<br>");
}
</script>
