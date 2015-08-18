<?php
if (isset($_GET['cPath']) && $_GET['cPath'] != '' && defined(CAT_DESC_READMORE_ENABLED) && CAT_DESC_READMORE_ENABLED == 'True') {
    ?>
    <script>
        $(document).ready(function () {
            var showHeight = "<?php echo CAT_DESC_READMORE_HEIGHT; ?>";
            var moreText = "<?php echo CAT_DESC_READMORE_MORE_TEXT; ?>";
            var lessText = "<?php echo CAT_DESC_READMORE_LESS_TEXT; ?>";
            var descDiv = "<?php echo CAT_DESC_READMORE_LESS_DIV; ?>";
            $('#' + descDiv).after('<span id="readMoreLess"></span>');


            function readMore() {
                $("#readMoreLess").text(moreText);
                $('#' + descDiv).css('height', showHeight);
                $('#' + descDiv).css('overflow', 'hidden');
                $("#readMoreLess").removeClass("readMore").addClass("readLess");
            }
            function readLess() {
                $("#readMoreLess").text(lessText);
                $('#' + descDiv).css('height', '');
                $('#' + descDiv).css('overflow', '');
                $("#readMoreLess").removeClass("readLess").addClass("readMore");
            }

            $(document).on('click', ".readLess", function () {
                readLess()
            })
            $(document).on('click', ".readMore", function () {
                readMore()
            });
            readMore()

        });
    </script>
    <?php
}