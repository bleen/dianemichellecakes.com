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
      $('.field-slideshow-pager').before('<span class="field-slideshow-pager-toggle">〓〓</span>');
      $('.field-slideshow-pager-toggle').click(function(context) {
        $('.field-slideshow-pager').toggle("fast");
      });
    }
  };

})(jQuery);

