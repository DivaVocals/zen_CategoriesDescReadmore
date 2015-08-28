<?php
if (isset($_GET['cPath']) && $_GET['cPath'] != '' && defined(CAT_DESC_READMORE_ENABLED) && CAT_DESC_READMORE_ENABLED == 'True') {
    ?>
    <script>
        $(document).ready(function () {
            var showWords = "<?php echo CAT_DESC_READMORE_WORDS; ?>";
            var moreText = "<?php echo CAT_DESC_READMORE_MORE_TEXT; ?>";
            var lessText = "<?php echo CAT_DESC_READMORE_LESS_TEXT; ?>";
            var descDiv = "<?php echo CAT_DESC_READMORE_LESS_DIV; ?>";
            var descText = $('#' + descDiv).text();
            var sliceEnd = showWords + 1;
            var countedWord = descText.split(' ').slice(showWords, sliceEnd);
            var html = $('#' + descDiv).html().split(' ' + countedWord[0] + ' ');
            html = html.slice(0, 1).join(" ") + '<span id="STOPHERE"></span>' + html.slice(1).join(' ' + countedWord[0] + ' ');
            $('#' + descDiv).html(html);
            var startHeight = $('#' + descDiv).offset().top - $(window).scrollTop();
            var stopHeight = $("#STOPHERE").offset().top - $(window).scrollTop();
            var stopHereHeight = $("#STOPHERE").height();
            var showHeight = stopHeight - startHeight + stopHereHeight;
            $('#' + descDiv).after('<span id="readMoreLess"></span>');
            var allOfDesc = $("#categoryDescription").html();


            function readMore() {
                $("#readMoreLess").text(moreText);
                $('#' + descDiv).css('height', showHeight);
                $('#' + descDiv).css('overflow', 'hidden');
                $("#readMoreLess").removeClass("readMore").addClass("readLess");
                $('#' + descDiv).removeClass("readLessDesc").addClass("readMoreDesc");
                $('#' + descDiv + " img").hide();
            }

            function readLess() {
                $("#readMoreLess").text(lessText);
                $('#' + descDiv).css('height', '');
                $('#' + descDiv).css('overflow', '');
                $("#readMoreLess").removeClass("readLess").addClass("readMore");
                $('#' + descDiv).removeClass("readMoreDesc").addClass("readLessDesc");
                $('#' + descDiv + " img").show();
            }

            $(document).on('click', ".readLess", function () {
                readLess();
            })
            $(document).on('click', ".readMore", function () {
                readMore();
            });
            readMore();

        });
    </script>
    <?php
}