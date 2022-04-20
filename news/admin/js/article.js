$(document).ready(function () {
    //file upload
    $('#testForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
                url: '../api/index-admin.php',
                type: 'POST',
                data: new FormData($('form')[0]),
                cache: false,
                contentType: false,
                processData: false,

                xhr: function () {
                    var myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload) {
                        // For handling the progress of the upload
                        myXhr.upload.addEventListener('progress', function (e) {
                            if (e.lengthComputable) {
                                $('progress').attr({
                                    value: e.loaded,
                                    max: e.total,
                                });
                            }
                        }, false);
                    }
                    return myXhr;
                }
            }).done(function (message) {
                console.log("RESPONSE", message);
                if (message.result.error) {
                    $("#responseHolder").html(message.result.error.message);
                } else {
                    $("#responseHolder").html(message.result);
                }
            })
            .fail(function (err) {
                console.log("ERROR", err);
                $("#responseHolder").html(JSON.stringify(err.responseText));
            });
    });

    $(".deleteRaw").on('click',function(){

        //alert($(this).attr('rowid'));

        var del = confirm("Are you sure to delete the record?");
        if(del){
            //alert('deleted');
            $.post( "../api/index-admin.php", { service: "deleteNews", id: $(this).attr('rowid') }, function( data ){
                location.reload();
            });
        }
    });

    //file info 
    $('#headImage').on('change', function () {
        var file = this.files[0];
        $('#fileInfo').html("File : "+file.name+" | Size : "+(file.size/1024)+" KB");
        //console.log(file);

        /*if (file.size > 1024) {
            alert('max upload size is 1k');
        }*/

        // Also see .name, .type
    });

});

//CK Editor
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });