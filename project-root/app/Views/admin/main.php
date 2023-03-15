<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title><?=$title?></title>
    <!-- Simple bar CSS -->
    <base href="<?=base_url();?>">
    <link rel="stylesheet" href="backend/css/simplebar.css">
    <!-- Fonts CSS -->

    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="backend/css/feather.css">
    <link rel="stylesheet" href="backend/css/select2.css">
    <link rel="stylesheet" href="backend/css/dropzone.css">
    <link rel="stylesheet" href="backend/css/uppy.min.css">
    <link rel="stylesheet" href="backend/css/jquery.steps.css">
    <link rel="stylesheet" href="backend/css/jquery.timepicker.css">
    <link rel="stylesheet" href="backend/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="backend/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="backend/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="backend/css/app-dark.css" id="darkTheme" disabled>
    <link rel="stylesheet" href="backend/css/dataTables.bootstrap4.css">




</head>

<body class="vertical  light  ">
    <div class="wrapper">


        <!-- topnav -->
        <?=$left?>

        <!-- sidebar-left -->
        <?=$head?>

        <!-- main -->
        <?=$content?>
    </div> <!-- .wrapper -->






    <script src="backend/js/jquery.min.js"></script>
    <script src="backend/js/popper.min.js"></script>
    <script src="backend/js/moment.min.js"></script>
    <script src="backend/js/bootstrap.min.js"></script>
    <script src="backend/js/simplebar.min.js"></script>
    <script src='backend/js/daterangepicker.js'></script>
    <script src='backend/js/jquery.stickOnScroll.js'></script>
    <script src="backend/js/tinycolor-min.js"></script>
    <script src="backend/js/config.js"></script>
    <script src="backend/js/d3.min.js"></script>
    <script src="backend/js/topojson.min.js"></script>
    <script src="backend/js/datamaps.all.min.js"></script>
    <script src="backend/js/datamaps-zoomto.js"></script>
    <script src="backend/js/datamaps.custom.js"></script>
    <script src="backend/js/Chart.min.js"></script>
    <script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="backend/js/gauge.min.js"></script>
    <script src="backend/js/jquery.sparkline.min.js"></script>
    <script src="backend/js/apexcharts.min.js"></script>
    <script src="backend/js/apexcharts.custom.js"></script>
    <script src='backend/js/jquery.mask.min.js'></script>
    <script src='backend/js/select2.min.js'></script>
    <script src='backend/js/jquery.steps.min.js'></script>
    <script src='backend/js/jquery.validate.min.js'></script>
    <script src='backend/js/jquery.timepicker.js'></script>
    <script src='backend/js/dropzone.min.js'></script>
    <script src='backend/js/uppy.min.js'></script>
    <script src='backend/js/quill.min.js'></script>
    <script>
    $('.select2').select2({
        theme: 'bootstrap4',
    });
    $('.select2-multi').select2({
        multiple: true,
        theme: 'bootstrap4',
    });
    $('.drgpicker').daterangepicker({
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale: {
            format: 'MM/DD/YYYY'
        }
    });
    $('.time-input').timepicker({
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
    });
    /** date range picker */
    if ($('.datetimes').length) {
        $('.datetimes').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'M/DD hh:mm A'
            }
        });
    }
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                'month')]
        }
    }, cb);
    cb(start, end);
    $('.input-placeholder').mask("00/00/0000", {
        placeholder: "__/__/____"
    });
    $('.input-zip').mask('00000-000', {
        placeholder: "____-___"
    });
    $('.input-money').mask("#.##0,00", {
        reverse: true
    });
    $('.input-phoneus').mask('(000) 000-0000');
    $('.input-mixed').mask('AAA 000-S0S');
    $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
            'Z': {
                pattern: /[0-9]/,
                optional: true
            }
        },
        placeholder: "___.___.___.___"
    });
    // editor
    var editor = document.getElementById('editor');
    if (editor) {
        var toolbarOptions = [
            [{
                'font': []
            }],
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{
                    'header': 1
                },
                {
                    'header': 2
                }
            ],
            [{
                    'list': 'ordered'
                },
                {
                    'list': 'bullet'
                }
            ],
            [{
                    'script': 'sub'
                },
                {
                    'script': 'super'
                }
            ],
            [{
                    'indent': '-1'
                },
                {
                    'indent': '+1'
                }
            ], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction
            [{
                    'color': []
                },
                {
                    'background': []
                }
            ], // dropdown with defaults from theme
            [{
                'align': []
            }],
            ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor, {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
    }
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
    <script>
    var uptarg = document.getElementById('drag-drop-area');
    if (uptarg) {
        var uppy = Uppy.Core().use(Uppy.Dashboard, {
            inline: true,
            target: uptarg,
            proudlyDisplayPoweredByUppy: false,
            theme: 'dark',
            width: 770,
            height: 210,
            plugins: ['Webcam']
        }).use(Uppy.Tus, {
            endpoint: 'https://master.tus.io/files/'
        });
        uppy.on('complete', (result) => {
            console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
    }
    </script>
    <script src="backend/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
    </script>

    <!-- table -->
    <script src='backend/js/jquery.dataTables.min.js'></script>
    <script src='backend/js/dataTables.bootstrap4.min.js'></script>

    <script>
    $('#dataTable-1').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [16, 32, 64, -1],
            [16, 32, 64, "All"]
        ]
    });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
    </script>

    <script>
    $('#xuly').change(function() {
        var value = $(this).val();
        var order_code = $(this).find(':selected').attr('id');
        if (value == 0) {
            alert('Hãy xư lý đơn hàng');
        } else {
            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>/admin/order/process',
                data: {
                    value: value,
                    id: order_code
                },
                success: function() {
                    alert('Thay đổi trạng thái đơn hàng thành công');
                },
                error: function() {
                    alert('Error');
                }
            })
        }
    })
    </script>
    <script language="javascript">
    function ChangeToSlug(id) {
        var title, slug;

        //Lấy text từ thẻ input title 
        title = document.getElementById("title-" + id).value;
        //  alert('1');
        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug-' + id).value = slug;
    }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="backend/Export/src/jquery.table2excel.js"></script>
    <script>
    function exportXlm() {
        $(".table2excel").table2excel({
            exclude: ".noExl",
            name: "Worksheet Name",
            filename: "HoaDon",
            fileext: ".xls",
            exclude_img: false,
            exclude_links: false,
            exclude_inputs: false
        });
    }
    </script>

</body>

</html>