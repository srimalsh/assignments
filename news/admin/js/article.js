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

});

//CK Editor
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });