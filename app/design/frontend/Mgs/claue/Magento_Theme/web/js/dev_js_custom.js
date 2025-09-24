require(['jquery', 'mgs/owlcarousel'], function(jQuery) {
    (function($) {
        jQuery(".without_stitching").prop("checked", true); 
        jQuery('.body_garment_measurement').prop('title', 'Garments will be tailored with 2-3 inch (5.08-7.62 Cm) loosening.');
        jQuery('.body_garment_measurement').tooltip();
        jQuery('.around_bust_size').prop('title', 'How To Measure - Around Bust Size: Wrap the measuring tape around the fullest part of your bust and straight across your back, keeping the tape over bust apex and parallel to the ground.');
        jQuery('.around_bust_size').tooltip();
        jQuery('.around_under_bust').prop('title', 'Around Under Bust: To measure under bust, lift your arm and Wrap your measuring tape just under the bust where the underwire of bra would normally sit.');
        jQuery('.around_under_bust').tooltip();
        jQuery('.shoulder').prop('title', 'How To Measure - Shoulder: Place measuring tape across top of the shoulder and measure from one edge to other edge of the shoulder. Take into account the curved ridge along the top of the back.');
        jQuery('.shoulder').tooltip();
        jQuery('.around_waist_line').prop('title', 'How To Measure - Around Pant Waist: Wrap the measuring tape to the point where you comfortably wear the pants. Keep the measure tape parallel to the ground and note down the measurement.');
        jQuery('.around_waist_line').tooltip();
        jQuery('.around_hip_size').prop('title', 'How To Measure - Around Hips: Wrap the measuring tape around the widest part of the hip and note down themeasurement.');
        jQuery('.around_hip_size').tooltip();
        jQuery('.around_arm_hole').prop('title', 'How To Measure - Around Arm Hole: Place the measuring tape around the shoulder tip to the bottom of the arm hole and back to the shoulder tip. Note down the ');
        jQuery('.around_arm_hole').tooltip();
        jQuery('.around_arm').prop('title', 'How To Measure - Around Arm (Biceps): Wrap the measuring tape around the widest part of the arm and note down the measurement.');
        jQuery('.around_arm').tooltip();
        jQuery('.sleeve_length').prop('title', 'How To Measure - Sleeve Length: Locate the shoulder point and measure from this point down the top of the arm pass the bent elbow and slightly round the lower arm to the wrist bone.');
        jQuery('.sleeve_length').tooltip();
        jQuery('.lehenga___skirt_length').prop('title', 'How To Measure - Skirt Length: Lay the garment flat on a surface. Place the measuring tape on the waistline of the garment, take it vertically straight till the end of the garment.');
        jQuery('.lehenga___skirt_length').tooltip();
        jQuery('.blouse___top_length').prop('title', 'How To Measure - Blouse / Top Length: Lay the garment flat. Place a measuring tape at the highest part of the shoulder, take it vertically downwards till the middle point of the bust, pinch and pull to give elevation. Now continue to take it downwards till the end of the blouse.');
        jQuery('.blouse___top_length').tooltip();
        jQuery('.body_height').prop('title', 'How To Measure - Stand against a wall, place a pencil at the highest point of the head and mark it on a wall. Now place a measuring tape on the mark and take it downwards till the floor.');
        jQuery('.body_height').tooltip();
        jQuery('.heel_height').prop('title', 'How To Measure - Heel Height: Place the heels on a flat surface. Take a measuring tape and hang it freely till the heel tip, touching the floor; now take the measuring tape upto where heel and sole come together. Note the measurement.');
        jQuery('.heel_height').tooltip();
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
            $('.around_belly_button').hide();
            $('.around_waist_line').hide();
            $('.around_hip_size').hide();
            $('.around_arm_hole').hide();
            $('.around_arm').hide();
            $('.sleeve_length').hide();
            $('.lehenga___skirt_lengt').hide();
            $('.blouse___top_length').hide();
            $('.lehenga___skirt_length').hide();
            $('.select_select_measurement').hide();
            $('.top_length').hide();
            $('.bottom_length').hide();
            $('.body_height').hide();
            $('.heel_height').hide();
            $('.chest_size').hide();
            $('.waist').hide();
            $('.chest').hide();
            $('.hip').hide();
            $('.sleeve').hide();
            $('.sherwani_kurta_length').hide();
            $('.sherwani_kurta').hide();
            $('.trouser_length').hide();
            $('.around_arm').hide();
            $('.arm_hole').hide();
            $('.thigh').hide();
            $('.mori').hide();
            $('.select_select_measurements_type').hide();
            $('.shoulder').hide();
            $('.body_garment_measurement').hide();
            $('.around_bust_size').hide();
            $('.lehenga_length').hide();
            $('.blouse_length').hide();

            
        }

        function customFormShow() {
            $('.body_measurment').show();
            $('.garment_measurment').show();
            $('.around_under_bust').show();
            $('.shoulder').show();
            $('.top_length').show();
            $('.around_belly_button').show();
            $('.around_waist_line').show();
            $('.around_hip_size').show();
            $('.around_arm_hole').show();
            $('.around_arm').show();
            $('.sleeve_length').show();
            $('.bottom_length').show();
            $('.body_height').show();
            $('.heel_height').show();
            $('.chest_size').show();
            $('.waist').show();
            $('.chest').show();
            $('.hip').show();
            $('.sleeve').show();
            $('.sherwani_kurta_length').show();
            $('.sherwani_kurta').show();
            $('.trouser_length').show();
            $('.around_arm').show();
            $('.arm_hole').show();
            $('.thigh').show();
            $('.mori').show();
            $('.select_select_measurements_type').show();
            $('.shoulder').show();
            $('.body_garment_measurement').show();
            $('.around_bust_size').show();
            $('.lehenga_length').show();
            $('.blouse_length').show();
             $('.lehenga___skirt_lengt').show();
            $('.blouse___top_length').show();
            $('.lehenga___skirt_length').show();
            $('.select_select_measurement').show();
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