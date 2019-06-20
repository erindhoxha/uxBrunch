
	
	var arrayOfButtons = [];
	var pathname = window.location.pathname; // Returns path only (/path/example.html)
	var p = pathname.split('/');
	var l = p.length;
	for (var i = 0; i < jQuery("a[title]").length; i++) {
		if (jQuery("a[title]")[i].title.toLowerCase() == p[l-2].toLowerCase()) {
			jQuery("a[title=" + "'" + jQuery("a[title]")[i].title + "'" + "]").closest('li').addClass('active');
		}
	}
	console.log("THIS");

	jQuery(".navbar-toggler").on('click', function(){
		jQuery('.navbar_side').css('right', '0');
		jQuery('.exit_site_navbar').on('click', function() {
			var w = jQuery('.navbar_side').width();
			jQuery('.navbar_side').css('right', '-' + w + 'px');
		})
	})

	jQuery(".navbar-search").on('click', function(){
		jQuery('.search-form').toggle();
	})

	jQuery(document).ready(function(){
		jQuery(".loader").fadeOut(300);
	})

	for (var i = 0; i < jQuery(".secondary-nav li a").length; i++) {
		jQuery(".secondary-nav li a")[jQuery(".secondary-nav li a").length - 1].style.backgroundColor = '#ea5353';
		jQuery(".secondary-nav li a")[jQuery(".secondary-nav li a").length - 1].style.color = '#fff';
		jQuery(".secondary-nav li a")[jQuery(".secondary-nav li a").length - 1].style.paddingRight = '5px';
	}

	jQuery('select').focus(
		function(){
			jQuery(this).css('border-style','solid');
			jQuery(this).css('border','3px solid #92ffd7');
		}).blur(
		function(){
			jQuery(this).css('border-style','dashed');
			jQuery(this).css('border','3px solid #92ffd7');
	});

	function refreshPage () {
		var page_y = document.getElementsByTagName("body")[0].scrollTop;
		window.location.href = window.location.href.split('?')[0] + '?page_y=' + page_y;
	}
	window.onload = function () {
		if ( window.location.href.indexOf('page_y') != -1 ) {
			var match = window.location.href.split('?')[1].split("&")[0].split("=");
			document.getElementsByTagName("body")[0].scrollTop = match[1];
		}
	}

	var btns = document.getElementsByClassName("add_to_cart_button");

	for (var i = 0; i < btns.length; i++) {
		btns[i].addEventListener("click", function(){
			var count = document.getElementById('cart-count').innerText;
			count = parseInt(count) + 1;
			document.getElementById('cart-count').innerText = count;
		});
	}
