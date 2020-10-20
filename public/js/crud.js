
var fullImage = 0;
var coverFullImage = 0;
function delete1(id, reqUrl) {
    var table = $('#table').DataTable();
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "DELETE",
                url: reqUrl + '/' + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    table.row('.' + id).remove().draw(false);
                    showNotification('bg-green', data.msg, 'top', 'right', 'animated lightSpeedIn', 'animated lightSpeedOut');
                },
        error: function (xhr) {
            if (xhr.status == 400) {
                showNotification('bg-red', xhr.responseText, 'top', 'right', 'animated lightSpeedIn', 'animated lightSpeedOut');
            }
            //alert(error);
        }
            });
        }
    });
}
function update1(id, reqUrl) {
    $.ajax({
        url: reqUrl + '/' + id + '/edit',
        success: function (xhr) {
            $("#display").toggleClass("hide");
            $("#update").toggleClass("hide");
            $("#uf1").attr("action", reqUrl + '/' + id);
            var key = Array.from(Object.keys(xhr));
            var value = Object.values(xhr);
            var i;
            setTimeout(() => {
                for (i = 0; i < value.length; i++) {
                    $('#' + key[i]).val(value[i]);
                    $('#' + key[i]).focus();
                }
                $("#name").focus();
            }, 500);
        },
        error: function (error) {
            alert(error);
        }
    });
}
function insertFormSubmit(reqUrl) {
    var temp = $('#f1').serializeArray();
    if (coverFullImage != 0) {
        var obj = {};
        obj['name'] = 'cover_image';
        obj['value'] = coverFullImage;
        coverFullImage = 0;
        temp.push(obj);
    }
    if (fullImage != 0) {
        var obj = {};
        obj['name'] = 'image';
        obj['value'] = fullImage;
        temp.push(obj);
    }
    var fd = new FormData();
    temp.forEach(element => {
        fd.append(element.name, element.value);
    });
    $.ajax({
        url: reqUrl,
        method: 'post',
        enctype: "multipart/form-data",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: fd,
        processData: false,
        contentType: false,
        success: function (result) {
           
    url=window.location.origin+window.location.pathname
    url = url.slice(0, -1)
    var name   = url.substring(0, url.lastIndexOf("/"));
    window.location.href = name+'/'+ reqUrl;
        },
        error: function (xhr) {
            $.each(xhr.responseJSON.errors, function (key, value) {
                showNotification('bg-red', value, 'top', 'right', 'animated lightSpeedIn', 'animated lightSpeedOut');
            });
        }
    });
}
function updateFormSubmit(reqUrl) {
    var temp = $('#uf1').serializeArray();
    var obj = {};
    obj['name'] = 'image';
    obj['value'] = fullImage;
    if (coverFullImage != 0) {
        var obj = {};
        obj['name'] = 'cover_image';
        obj['value'] = coverFullImage;
        coverFullImage = 0;
        temp.push(obj);
    }
    if (fullImage != 0) {
        var obj = {};
        obj['name'] = 'image';
        obj['value'] = fullImage;
        temp.push(obj);
    }
    var fd = new FormData();
    temp.forEach(element => {
        fd.append(element.name, element.value);
    });

    $.ajax({
        url: $('#uf1').attr('action'),
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: fd,
        processData: false,
        contentType: false,
        success: function (result) {
    url=window.location.origin+window.location.pathname
    url = url.slice(0, -1)
    var name   = url.substring(0, url.lastIndexOf("/"));
    window.location.href = name+'/'+ reqUrl;
            setTimeout(() => {
                showNotification('bg-green', result.msg, 'top', 'right', 'animated lightSpeedIn', 'animated lightSpeedOut');
            }, 1000);
        },
        error: function (xhr) {
            $.each(xhr.responseJSON.errors, function (key, value) {
                showNotification('bg-red', value, 'top', 'right', 'animated lightSpeedIn', 'animated lightSpeedOut');
            });
        }
    });
}
function imageStore(forWhat) {
    if (forWhat == "insert") {

        fullImage = $('#inImage')[0].files[0];
    } else {
        fullImage = $('#upImage')[0].files[0];
    }
}
function coverImageStore(forWhat) {
    if (forWhat == "insert") {

        coverFullImage = $('#coinImage')[0].files[0];
    } else {
        coverFullImage = $('#coupImage')[0].files[0];
    }
}


