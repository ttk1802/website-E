<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="<?=base_url();?>">
    <title><?=$title?></title>
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="frontend/css/price-range.css" rel="stylesheet">
    <link href="frontend/css/animate.css" rel="stylesheet">
    <link href="frontend/css/main.css" rel="stylesheet">
    <link href="frontend/css/responsive.css" rel="stylesheet">
    <link href="frontend/css/cssadd.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="frontend/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="frontend/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="frontend/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="frontend/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>

    <!-- head -->
    <?=$head?>
    <!-- slide -->
    <?=$slide?>
    <!-- content -->
    <?=$content?>
    <!-- footer -->
    <?=$footer?>


    <script src="frontend/js/jquery.js"></script>
    <script src="frontend/js/bootstrap.min.js"></script>
    <script src="frontend/js/jquery.scrollUp.min.js"></script>
    <script src="frontend/js/price-range.js"></script>
    <script src="frontend/js/jquery.prettyPhoto.js"></script>
    <script src="frontend/js/main.js"></script>
    <script src="frontend/js/jsadd.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
    $(document).ready(function() {
        var active = location.search; //?kytu=asc
        $('#select-filter option[value="' + active + '"]').attr('selected', 'selected');
    })

    $('.select-filter').change(function() {
        var value = $(this).find(':selected').val();

        // alert(value);
        if (value != 0) {
            var url = value;
            // alert(url);
            window.location.replace(window.location.pathname + url);
        } else {
            alert('Hãy lọc sản phẩm');
        }

    })
    </script>
    <script>
    $('.write-comment').click(function() {
        var comment_name = $('.comment_name').val();
        var comment_email = $('.comment_email').val();
        var comment = $('.comment_text').val();
        var product_id = $('.product_id_comment').val();
        if (comment_name == '' || comment_email == '' || comment == '') {
            alert('Điền đủ thông tin');
        } else {
            //	alert(comment_name);
            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>/comment/send',
                data: {
                    comment_name: comment_name,
                    comment_email: comment_email,
                    comment: comment,
                    product_id: product_id,
                },
                success: function() {
                    $('#comment_alert').html(
                        '<span class="text text-success"> Đánh giá đã được gửi, vui lòng chờ duyệt</span>'
                    );
                },
                error: function() {
                    alert('Error');
                }
            })
        }
    });
    </script>
    <script>
    $(function() {
        $("#slider-range").slider({
            range: true,
            min: <?=@$minprice?>,
            max: <?=@$maxprice?>,
            values: [<?=@$minprice?>, <?=@$maxprice?>],
            slide: function(event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                $('.price_from').val(ui.values[0]);
            $('.price_to').val(ui.values[1]);
            }
         
        });
        
        $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));
    });
    </script>
</body>

</html>