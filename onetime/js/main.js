$(function () {
    var block = false;
    var form = $("#wizard");
    $("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        // forceMoveForward: true,
        transitionEffect: "fade",
        enableAllSteps: false,
        enablePagination: true,
        transitionEffectSpeed: 300,
        labels: {
            next: "Continue",
            previous: "Back",
            finish: 'Proceed to Login'
        },
        onFinished: function (event, currentIndex) {
            url = window.location.origin + window.location.pathname
            url = url.slice(0, -1)
            var name = url.substring(0, url.lastIndexOf("/"));
            name = name + '/public/';
            window.location.href = name;
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            $("#wizard .actions a[href='#previous']").hide();

            form.validate({
                errorPlacement: function errorPlacement(error, element) {
                    element.after(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
            if (block) {

                return false;
            }
            if (newIndex >= 1) {
                $('.steps ul li:first-child a img').attr('src', 'images/step-1.png');
                $("#wizard .actions a[href='#previous']").show();
            } else {
                $('.steps ul li:first-child a img').attr('src', 'images/step-1-active.png');
                $("#wizard .actions a[href='#previous']").hide();
            }

            if (newIndex === 1) {
                console.log('index ', newIndex)
                $('.steps ul li:nth-child(2) a img').attr('src', 'images/step-2-active.png');
            } else {
                $('.steps ul li:nth-child(2) a img').attr('src', 'images/step-2.png');
            }

            if (newIndex === 2) {
                console.log('index ', newIndex)
                //var temp = submit()
                //console.log(temp);
                submit().then(function (result) {
                    result = JSON.parse(result)
                    if (result.status == 'success') {
                        $("#main_loader").hide();
                        $("#wizard .actions a[href='#previous']").hide();
                        $('.steps ul li:nth-child(3) a img').attr('src', 'images/step-3-active.png');
                        block = true
                        return true;
                    } else {
                        $("#main_loader").hide();
                        Swal({
                            type: 'error',
                            title: 'Oops...',
                            text: result.data,
                        })
                        $('.steps ul li:nth-child(2) a img').attr('src', 'images/step-2-active.png');
                        $("#wizard").steps('previous');
                        return false;
                    }

                }, function (err) {
                    Swal({
                        type: 'error',
                        title: 'Oops...',
                        text: JSON.parse(err),
                    })
                })
            } else {
                $('.steps ul li:nth-child(3) a img').attr('src', 'images/step-3.png');
            }

            form.validate().settings.ignore = ":disabled,:hidden";

            return form.valid();
            // return true;
        }
    });
    // Custom Button Jquery Steps
    $('.forward').click(function () {
        $("#wizard").steps('next');
    })
    $('.backward').click(function () {
        $("#wizard").steps('previous');
    })
    // Click to see password 
    $('.password i').click(function () {

        if ($('.password input').attr('type') === 'password') {
            $(this).next().attr('type', 'text');
        } else {
            $(this).next().attr('type', 'password');

        }
    })

    $('.password2 i').click(function () {

        if ($('.password2 input').attr('type') === 'password') {
            $(this).next().attr('type', 'text');
        } else {
            $(this).next().attr('type', 'password');

        }
    })
    // Create Steps Image
    $('.steps ul li:first-child').append('<img src="images/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="images/step-1-active.png" alt=""> ').append('<span class="step-order">Step 01</span>');
    $('.steps ul li:nth-child(2').append('<img src="images/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="images/step-2.png" alt="">').append('<span class="step-order">Step 02</span>');
    $('.steps ul li:nth-child(3)').append('<img src="images/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="images/step-3.png" alt="">').append('<span class="step-order">Step 03</span>');
    // Count input 

    function submit() {
        // $("#wizard").steps({
        //     forceMoveForward: true
        // });
        $("#main_loader").show();
        var temp = $('#wizard').serializeArray();
        var fd = new FormData();
        temp.forEach(element => {
            fd.append(element.name, element.value);
        });
        return $.ajax({
            url: $('#wizard').attr('action'),
            method: 'post',
            enctype: "multipart/form-data",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: fd,
            processData: false,
            contentType: false,
        });
    }
    $("#wizard .actions a[href='#previous']").hide();

    function disableStep() {
        $('a').attr('href');
    }
    $('a').on("click", function (event) {
        var data = $('a').attr('href');

    });
})
