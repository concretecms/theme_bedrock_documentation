import '@concretecms/bedrock/assets/bedrock/js/frontend';

import 'magnific-popup'
import '@concretecms/bedrock/assets/imagery/js/frontend/lightbox'
import '@concretecms/bedrock/assets/imagery/js/frontend/gallery'

// Add Owl Carousel
import 'owl.carousel'
$(".owl-carousel").owlCarousel({
    autoHeight: true,
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    items: 1,
    margin: 30,
    stagePadding: 30,
    smartSpeed: 450
});

// Add Simple Parallax to Hero Image
import simpleParallax from 'simple-parallax-js';

// Add parallax support to all Hero Image blocks
var images = document.querySelectorAll('.ccm-block-hero-image-image');
new simpleParallax(images, {scale: 1.5});

