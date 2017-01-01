
$(document).ready(function(){


    'use strict';

    // UPLOAD CLASS DEFINITION
    // ======================

    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');

    var startUpload = function(files) {
        

        var filename = $("#js-upload-files").val();
        console.log(files[0]);
        console.log(filename)

        // $.ajax({
        //     type: "POST",
        //     url: "./uploadFile",
        //     enctype: 'multipart/form-data',
        //     data: {
        //         file: files[0]['name']
        //     },
        //     success: function () {
        //         alert("Data Uploaded: ");
        //     }
        // });
    }

    uploadForm.addEventListener('submit', function(e) {
        var uploadFiles = document.getElementById('js-upload-files').files;
        //e.preventDefault()

        startUpload(uploadFiles)
    })
    
    dropZone.dragover = function(e) {
        e.preventDefault();        
    }

    dropZone.ondrop = function(e) {
        e.stopPropagation(); // Stop stuff happening
        e.preventDefault();
        this.className = 'upload-drop-zone';

        //startUpload(e.dataTransfer.files)

            var data = new FormData(document.forms.namedItem("myform"));
           // $.each(e.dataTransfer.files, function(key, value)
           // {
                data.append('file', e.dataTransfer.files[0]);
                 data.append('MAX_FILE_SIZE' , '5000000000');
            //});      
            console.log(data);
            $.ajax({

                 xhr: function() {
                    var xhr = new window.XMLHttpRequest();

                    xhr.upload.addEventListener("progress", function(evt) {
                      if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        console.log(percentComplete);
                        $(".progress-bar").css("width", percentComplete + "%");
                        if (percentComplete === 100) {
                        }

                      }
                    }, false);

                    return xhr;
                  },

                url: './uploadFile',
                type: 'POST',
                data: data,
                custom:e.dataTransfer.files[0],
                cache: false,
                dataType: 'html',
                processData: false, // Don't process the files
                contentType: false, // Set content type to false as jQuery will tell the server its a query string request
                success: function(data)
                { 
                    //console.log("AJAX : Successfully Uploaded File" + data);
                    if(data == "SUCCESS")
                    {
                        $(".file-list").append("<a href=\"#\" class=\"list-group-item list-group-item-success\"><span class=\"badge alert-success pull-right\">Success</span> File : " + this.custom['name'] + "</a>");
                    }
                    else{
                        //$(".file-list").append("<a href=\"#\" class=\"list-group-item list-group-item-danger\"><span class=\"badge alert-danger pull-right\">Error</span> File : " + this.custom['name'] + "</a>");
                        location.reload();

                    }
                    
                },
                error: function()
                { 
                    //console.log("AJAX : Failed to Upload File ");
                }
            });
       // console.log( e.dataTransfer.files[0]);        
    }

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    }

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
    }

});