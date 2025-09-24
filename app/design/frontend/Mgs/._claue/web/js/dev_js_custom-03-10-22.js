require(['jquery', 'mgs/owlcarousel'], function(jQuery) {
    (function($) {
        hideWithStitch();
        customFormHide();
        $('#sizemsg').hide();
        $('#readless').css('display', 'none');
        $('#readmore').css('display', 'block');
        $('#more').css('display', 'none');

        function showWithStitch() {
            $('.select_size').show();
            $('.select_body_height').show();
            $('#sizemsg').show();
        }

        function hideWithStitch() {
            $('.select_size').hide();
            $('.select_body_height').hide();
        }

        function customFormHide() {
            $('.body_measurment').hide();
            $('.garment_measurment').hide();
            $('.around_under_bust').hide();
            $('.shoulder').hide();
            $('.top_length').hide();
            $('.around_belly_button').hide();
            $('.around_waist_line').hide();
            $('.around_hip_size').hide();
            $('.around_arm_hole').hide();
            $('.around_arm').hide();
            $('.sleeve_length').hide();
            $('.top_length').hide();
            $('.bottom_length').hide();
            $('.body_height').hide();
            $('.heel_height').hide();
            $('.chest_size').hide();
            $('.waist').hide();
            $('.sherwani_kurta').hide();
            $('.trouser_length').hide();
            $('.around_arm').hide();
            $('.arm_hole').hide();
            $('.thigh').hide();
            $('.mori').hide();
        }

        function customFormShow() {
            $('.body_measurment').show();
            $('.garment_measurment').show();
            $('.around_under_bust').show();
            $('.shoulder').show();
            $('.top_length').hide();
            $('.around_belly_button').show();
            $('.around_waist_line').show();
            $('.around_hip_size').show();
            $('.around_arm_hole').show();
            $('.around_arm').show();
            $('.sleeve_length').show();
            $('.top_length').show();
            $('.bottom_length').show();
            $('.body_height').show();
            $('.heel_height').show();
            $('.chest_size').show();
            $('.top_length').show();
            $('.waist').show();
            $('.sherwani_kurta').show();
            $('.trouser_length').show();
            $('.around_arm').show();
            $('.arm_hole').show();
            $('.thigh').show();
            $('.mori').show();
        }
        $('.custom-testimonial-owl').owlCarousel({ loop: true, margin: 20, nav: false, dots: false, autoplay: true, autoplayTimeout: 2400, autoplayHoverPause: true, responsive: { 0: { items: 1 }, 600: { items: 3 }, 1000: { items: 4 } } });
        $('.ct-category-wrap').owlCarousel({ loop: false, margin: 20, nav: false, dots: false, autoplay: false, autoplayTimeout: 2400, autoplayHoverPause: true, responsive: { 0: { items: 2, loop: true, autoplay: true, touchDrag: true, }, 480: { items: 3, loop: true, autoplay: true, touchDrag: true, }, 991: { items: 3, loop: true, autoplay: true, touchDrag: true, }, 1000: { items: 5, touchDrag: false, mouseDrag: false, } } });
        $('.without_stitching').click(function() {
            hideWithStitch();
            $('#sizemsg').hide();
            customFormHide();
        });
        $('.ready_size').click(function() {
            showWithStitch();
            customFormHide();
            $('#sizemsg').show();
        });
        $('.custom_tailored').click(function() {
            hideWithStitch();
            $('#sizemsg').show();
            customFormShow();
        });
        $('#readmore').click(function() {
            $('#readless').css('display', 'block');
            $('#readmore').css('display', 'none');
            $('#more').slideToggle('slow');
        });
        $('#readless').click(function() {
            $('#readless').css('display', 'none');
            $('#readmore').css('display', 'block');
            $('#more').slideToggle('slow');
        });

    })(jQuery);
});