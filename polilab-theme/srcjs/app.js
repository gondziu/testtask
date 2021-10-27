/* eslint-disable no-undef */
'use strict';

function preloader() {
	const preload = document.getElementById( 'polilab-preloader' );
	window.addEventListener( 'load', function() {
		preload.classList.remove( 'polilab-preloader--show' );
	} );
}

preloader();

function ready( fn ) {
	if ( document.readyState !== 'loading' ) {
		fn();
	} else if ( document.addEventListener ) {
		document.addEventListener( 'DOMContentLoaded', fn );
	} else {
		document.attachEvent( 'onreadystatechange', function() {
			if ( document.readyState !== 'loading' ) {
				fn();
			}
		} );
	}
}

function mobileMenuInit() {
	const mobileMenuItems = document.querySelectorAll( '.site-navbar--mobile li a' );
	for ( let i = 0; i < mobileMenuItems.length; i++ ) {
		mobileMenuItems[ i ].addEventListener( 'click', function() {
			siteNavbar.close();
			document.getElementById( 'page' ).style.transform = 'unset';
		}, false );
	}

	const siteNavbar = new Canvi( {
		openButton: '.site-hamburger',
		pushContent: false,
		position: 'left',
		width: '100%',
	} );

	document.querySelector( '.site-hamburger-close' ).addEventListener( 'click', function() {
		siteNavbar.close();
		document.getElementById( 'page' ).style.transform = 'unset';
	}, false );

	window.onresize = function() {
		siteNavbar.close();
	};
}

function fixedMenu() {
	const scrollTop = window.pageYOffset;

	if ( scrollTop > 50 ) {
		document.querySelector( '.site-header' ).classList.add( 'site-header--fixed' );
	} else {
		document.querySelector( '.site-header' ).classList.remove( 'site-header--fixed' );
	}
}

ready( function() {
	mobileMenuInit();
	window.onscroll = function() {
		fixedMenu();
	};
} );

