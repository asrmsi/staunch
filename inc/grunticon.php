<?php
/* Grunticon */
function grunticon_scripts() {
	?>
	<script>
		/* grunticon Stylesheet Loader | https://github.com/filamentgroup/grunticon | (c) 2012 Scott Jehl, Filament Group, Inc. | MIT license. */
		window.grunticon=function(e){if(e&&3===e.length){var t=window,n=!(!t.document.createElementNS||!t.document.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect||!document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image","1.1")||window.opera&&-1===navigator.userAgent.indexOf("Chrome")),o=function(o){var r=t.document.createElement("link"),a=t.document.getElementsByTagName("script")[0];r.rel="stylesheet",r.href=e[o&&n?0:o?1:2],a.parentNode.insertBefore(r,a)},r=new t.Image;r.onerror=function(){o(!1)},r.onload=function(){o(1===r.width&&1===r.height)},r.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="}};
		grunticon(["<?php echo get_template_directory_uri(); ?>/icon/icons.data.svg.css", "<?php echo get_template_directory_uri(); ?>/icon/icons.data.png.css", "<?php echo get_template_directory_uri(); ?>/icon/icons.fallback.css"]);
	</script>
	<noscript><link href="<?php echo get_template_directory_uri(); ?>/icon/icons.fallback.css" rel="stylesheet"></noscript>
	<?php
}
add_action( 'wp_head', 'grunticon_scripts' );