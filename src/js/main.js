/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Site, Modernizr */

Site = {
  mobileThreshold: 601,
  init: function() {
    var _this = this;

    $(window).resize(function(){
      _this.onResize();
    });

    $(document).ready(function () {
      Site.Header.init();
    });

  },

  onResize: function() {
    var _this = this;
    var windowWidth = $(window).width();

    if (windowWidth >= 1024 && $('#mobile-menu').hasClass('active')) {
      $('#mobile-menu').removeClass('active')
    }
  },

  fixWidows: function() {
    // utility class mainly for use on headines to avoid widows [single words on a new line]
    $('.js-fix-widows').each(function(){
      var string = $(this).html();
      string = string.replace(/ ([^ ]*)$/,'&nbsp;$1');
      $(this).html(string);
    });
  },
};

Site.Header = {
  init: function() {
    var _this = this;

    if ($('.splash-header').length) {
      // bind stickyheader and scrollto shop
      _this.getSplashHeight();
      _this.bindScroll();
    }

    _this.bindMobileMenu();
  },

  handleColor: function() {
    var _this = this;
    var scrollPos = $(window).scrollTop();

    // stick header
    if (scrollPos >= _this.splashHeight){
      $('#header').removeClass('splash-header');
    }
    // unstick header
    if (scrollPos < _this.splashHeight){
      $('#header').addClass('splash-header');
    }
  },

  getSplashHeight: function() {
    var _this = this;

    _this.splashHeight = $('.splash-with-image').outerHeight();

    _this.handleColor();
  },

  bindScroll: function() {
    var _this = this;

    $(window).on('scroll', function() {
      _this.handleColor();
    });
  },

  bindMobileMenu: function() {
    var _this = this;

    $('#mobile-open-menu').on('click', function() {
      _this.openMobileMenu();
    });

    $('#mobile-close-menu').on('click', function() {
      _this.closeMobileMenu();
    });
  },

  openMobileMenu: function() {
    $('#mobile-menu').addClass('active');
  },

  closeMobileMenu: function() {
    $('#mobile-menu').removeClass('active');
  },
};

Site.init();
