require(['jquery', 'owlcarousel', 'jquery/ui'], function ($) {
    $(document).ready(function () {
        $('#sizemsg').hide();
        $('#readless').hide();
        $('#readmore').show();
        $('#more').hide();

        $('#readmore').click(function () {
            $('#readless').show();
            $('#readmore').hide();
            $('#more').slideToggle('slow');
        });

        $('#readless').click(function () {
            $('#readless').hide();
            $('#readmore').show();
            $('#more').slideToggle('slow');
        });

        $(".without_stitching").prop("checked", true);
        $('.body_garment_measurement').prop('title', 'Garments will be tailored with 2-3 inch (5.08-7.62 Cm) loosening.').tooltip();
        $('.around_bust_size').prop('title', 'How To Measure - Around Bust Size: Wrap the measuring tape around the fullest part of your bust and straight across your back, keeping the tape over bust apex and parallel to the ground.').tooltip();
        $('.around_under_bust').prop('title', 'Around Under Bust: To measure under bust, lift your arm and Wrap your measuring tape just under the bust where the underwire of bra would normally sit.').tooltip();
        $('.shoulder').prop('title', 'How To Measure - Shoulder: Place measuring tape across top of the shoulder and measure from one edge to other edge of the shoulder. Take into account the curved ridge along the top of the back.').tooltip();
        $('.around_waist_line').prop('title', 'How To Measure - Around Pant Waist: Wrap the measuring tape to the point where you comfortably wear the pants. Keep the measure tape parallel to the ground and note down the measurement.').tooltip();
        $('.around_hip_size').prop('title', 'How To Measure - Around Hips: Wrap the measuring tape around the widest part of the hip and note down themeasurement.').tooltip();
        $('.around_arm_hole').prop('title', 'How To Measure - Around Arm Hole: Place the measuring tape around the shoulder tip to the bottom of the arm hole and back to the shoulder tip. Note down the ').tooltip();
        $('.around_arm').prop('title', 'How To Measure - Around Arm (Biceps): Wrap the measuring tape around the widest part of the arm and note down the measurement.').tooltip();
        $('.sleeve_length').prop('title', 'How To Measure - Sleeve Length: Locate the shoulder point and measure from this point down the top of the arm pass the bent elbow and slightly round the lower arm to the wrist bone.').tooltip();
        $('.lehenga___skirt_length').prop('title', 'How To Measure - Skirt Length: Lay the garment flat on a surface. Place the measuring tape on the waistline of the garment, take it vertically straight till the end of the garment.').tooltip();
        $('.blouse___top_length').prop('title', 'How To Measure - Blouse / Top Length: Lay the garment flat. Place a measuring tape at the highest part of the shoulder, take it vertically downwards till the middle point of the bust, pinch and pull to give elevation. Now continue to take it downwards till the end of the blouse.').tooltip();
        $('.body_height').prop('title', 'How To Measure - Stand against a wall, place a pencil at the highest point of the head and mark it on a wall. Now place a measuring tape on the mark and take it downwards till the floor.').tooltip();
        $('.heel_height').prop('title', 'How To Measure - Heel Height: Place the heels on a flat surface. Take a measuring tape and hang it freely till the heel tip, touching the floor; now take the measuring tape up to where heel and sole come together. Note the measurement.').tooltip();

        hideWithStitch();
        customFormHide();

        // Owl Carousel initializations (ensure Owl is loaded)
        $(".custom-testimonial-owl").owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2400,
            autoplayHoverPause: true,
            responsive: {
                0: { items: 1 },
                600: { items: 3 },
                1000: { items: 4 }
            }
        });

        $(".ct-category-wrap").owlCarousel({
            loop: false,
            margin: 20,
            nav: false,
            dots: false,
            autoplay: false,
            autoplayTimeout: 2400,
            autoplayHoverPause: true,
            responsive: {
                0: { items: 2, loop: true, autoplay: true, touchDrag: true },
                480: { items: 3, loop: true, autoplay: true, touchDrag: true },
                991: { items: 3, loop: true, autoplay: true, touchDrag: true },
                1000: { items: 5, touchDrag: false, mouseDrag: false }
            }
        });

        $('.without_stitching').click(function () {
            hideWithStitch();
            $('#sizemsg').hide();
            customFormHide();
        });

        $('.ready_size').click(function () {
            showWithStitch();
            customFormHide();
            $('#sizemsg').show();
        });

        $('.custom_tailored').click(function () {
            hideWithStitch();
            $('#sizemsg').show();
            customFormShow();
        });

        function showWithStitch() {
            $('.select_size, .select_body_height').show();
            $('#sizemsg').show();
        }

        function hideWithStitch() {
            $('.select_size, .select_body_height').hide();
        }

        function customFormHide() {
            $('.body_measurment, .garment_measurment, .around_under_bust, .shoulder, .around_belly_button, .around_waist_line, .around_hip_size, .around_arm_hole, .around_arm, .sleeve_length, .lehenga___skirt_lengt, .blouse___top_length, .lehenga___skirt_length, .select_select_measurement, .top_length, .bottom_length, .body_height, .heel_height, .chest_size, .waist, .chest, .hip, .sleeve, .sherwani_kurta_length, .sherwani_kurta, .trouser_length, .around_arm, .arm_hole, .thigh, .mori, .select_select_measurements_type, .body_garment_measurement, .around_bust_size, .lehenga_length, .blouse_length').hide();
        }

        function customFormShow() {
            $('.body_measurment, .garment_measurment, .around_under_bust, .shoulder, .top_length, .around_belly_button, .around_waist_line, .around_hip_size, .around_arm_hole, .around_arm, .sleeve_length, .bottom_length, .body_height, .heel_height, .chest_size, .waist, .chest, .hip, .sleeve, .sherwani_kurta_length, .sherwani_kurta, .trouser_length, .around_arm, .arm_hole, .thigh, .mori, .select_select_measurements_type, .shoulder, .body_garment_measurement, .around_bust_size, .lehenga_length, .blouse_length, .lehenga___skirt_lengt, .blouse___top_length, .lehenga___skirt_length, .select_select_measurement').show();
        }
    });
});
// End of custom JavaScript for Claue theme
