<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<html>
<html>
    <head>
        <meta charset="utf-8">
        <title>عن المكان</title>
        <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    </head>
    <body>
        <form action="../Controller/AboutUsController.php" method="post">
			<input type="hidden" name="ID" id="ID">
            <textarea name="editor1" id="editor1" rows="20" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
			<input type="submit" name="Save" value="حفظ التعديلات" style="float:right; height:50px;">
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                CKEDITOR.replace( 'editor1' );
            </script>
        </form>
    </body>
</html>
<?php
//$_SERVER['REQUEST_URI'] //output= /Software/SoftwareProject/Controller/UserController.php
?>
<script>
window.onload = function()
{
	xmlHttp = new XMLHttpRequest();
        xmlHttp.onload = function () {
            /*if(this.readyState==0)
            {
                console.log("request not initialized ");
            }
            else if(this.readyState==1)
            {
                console.log("server connection established ");
            }
            else if(this.readyState==2)
            {
                console.log("request received ");
            }
            else if(this.readyState==3)
            {
                console.log("processing request  ");
            }
            else*/
            if (this.readyState == 4 && this.status == 200) {
                //console.log("request finished and response is ready");
                if (this.responseText != "") {
                    var textArea=document.getElementById("editor1").innerHTML = this.responseText;
                }
                //console.log(this.responseText);
            }
        }
        xmlHttp.open('POST', '../Controller/AboutUsController.php', true);
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttp.send("Search");
};
</script>