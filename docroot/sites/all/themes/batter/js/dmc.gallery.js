/**
 * @file
 * Javascript functionality to enhance galleries.
 */

(function($) {
  'use strict';

  /**
   * Gallery enhancements.
   */
  Drupal.behaviors.dmc_gallery = {
    attach: function(context, settings) {
      // Create a toggle for the slideshow pager.
      $('.field-slideshow-pager').before('<span class="field-slideshow-pager-toggle">〓〓</span>');
      $('.field-slideshow-pager-toggle').click(function(context) {
        $('.field-slideshow-pager').toggle("fast");
      });
      $('.field-slideshow-pager li').click(function(context) {
        $('.field-slideshow-pager').hide("fast");
      });


      // Set the heights properly.
      $('.field-slideshow-slide').css('overflow', 'hidden');
      $('.field-slideshow').css('overflow', 'hidden');
      jQuery(document).bind('beforeTransition.fieldSlideshow', function (e) {
        // Make sure the next slide is visible.
        $(e.nextSlideElement).css('display', 'block').css('opacity', '.0000001');
        $('.field-slideshow').animate(
          {
            height:$(e.nextSlideElement).find('img').height() + 'px'
          },
          {
            queue:false,
            duration:500
          });
      });



    }
  };

})(jQuery);

