<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="field" align="left">
            <span>
                <h3>Upload your images</h3>
                <input type="file" id="files" name="files[]" multiple />
            </span>
        </div>
</body>
	
		<style>
    input[type="file"] {

     display:block;
    }
    .imageThumb {
     max-height: 75px;
     border: 2px solid;
     margin: 10px 10px 0 0;
     padding: 1px;
     }
    </style>
    <script type="text/javascript">
    $(document).ready(function() {

     if(window.File && window.FileList && window.FileReader) {
        $("#files").on("change",function(e) {
            var files = e.target.files ,
            filesLength = files.length ;
            for (var i = 0; i < filesLength ; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<img></img>",{
                        class : "imageThumb",
                        src : e.target.result,
                        title : file.name
                    }).insertAfter("#files");
               });
               fileReader.readAsDataURL(f);
           }
      });
     } else { alert("Your browser doesn't support to File API") }
    });

    </script>
</html>