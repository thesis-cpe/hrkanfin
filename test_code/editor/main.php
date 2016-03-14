<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />

        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.min.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/blackboard.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.min.css">

        <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
    </head>
    <body>

        <div class="container">
            <div class="row">
                <form class="span12" id="postForm" action="main2.php" method="POST" enctype="multipart/form-data" >
                    <fieldset>
                        <legend>MyCodde.Blogspot.com Editor</legend>
                        <p class="container">
                            <textarea class="input-block-level" id="summernote" name="content" rows="18">
                            </textarea>
                            
                            
                        </p>
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>






        <script src="//code.jquery.com/jquery-1.9.1.js"></script> 
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
        <script>
            /*http://mycodde.blogspot.com/2014/09/summernote-wyswig-editor-php-tutorial.html*/
            
            $(document).ready(function () {
                $('#summernote').summernote({
                    height: 500,
                    onImageUpload: function (files, editor, welEditable) {
                        sendFile(files[0], editor, welEditable);
                    }
                });
                function sendFile(file, editor, welEditable) {
                    data = new FormData();
                    data.append("file", file);//You can append as many data as you want. Check mozilla docs for this
                    $.ajax({
                        data: data,
                        type: "POST",
                        url: 'savetheuploadedfile.php',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (url) {
                            editor.insertImage(welEditable, url);
                        }
                    });
                }
            });
        </script>
    </body>
</html>
