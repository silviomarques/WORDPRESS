(function($) {
	$(document).ready(function($) {
		$('body').css('background-color',setting.style.colorEnd);
		getGradient(setting.style.colorStart, setting.style.colorEnd, setting.style.bgStyle);
		
		/* Counter */
		$('#dig-days, #dig-hours, #dig-mins, #dig-sec').each(function(indx){
			$(this).countdown({
				until: new Date(Date.parse(setting.lastDate)),
				compact: true,
				layout:$(this).html(),
				timezone:setting.timeZone
			});
		});

		$('#count-small').countdown({
			until: new Date(Date.parse(setting.lastDate)),
			compact: true,
			layout:$('#count-small').html(),
			timezone:setting.timeZone
		});

		

		setInterval(function () {
			//$('.dark').css('color',getContrast(setting.style.colorStart));
		}, 1000);

		$(window).resize(function(){
			vCenter();
			vAbsolute();
		});
	});



	function getHeight(el){
		el = jQuery(el), elem = el.clone().css({"height":"auto"}).appendTo("body");
	    height = elem.css("height"),
	    elem.remove();
	    return height;
	}

	function vAbsolute(){
		
	}

	function vCenter(){
		
	}

	function getContrast(hexcolor){
		var re = /^#((([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})){1,2})$/;
		if(re.test(hexcolor)){
			hexcolor = re.exec(hexcolor);
			if(hexcolor[1].length == 3){
				hex = hexcolor[3]+hexcolor[3]+hexcolor[4]+hexcolor[4]+hexcolor[5]+hexcolor[5];
			} else {
				hex = hexcolor[1];
			}

			var r = parseInt(hex.substr(0,2),16);
			var g = parseInt(hex.substr(2,2),16);
			var b = parseInt(hex.substr(4,2),16);
			var yiq = ((r*299)+(g*587)+(b*114))/1000;
			return (yiq > 60) ? 'black' : 'white';
		} else {
			alert('Color code is not yet valid');
		}
	}

	function getGradient(colorStart, colorEnd, orientation)
	{
		var bg = $('.bg');

		switch (orientation) {
			case 'linearBottomRight'     : style="linear"; w3c="to bottom right"; position="top left"; webkit="left top, right bottom"; break;
			case 'linearBottom'		     : style="linear"; w3c="to bottom"; position="top"; webkit="left top, left bottom"; break;
			case 'linearBottomLeft'	     : style="linear"; w3c="to bottom left"; position="top right"; webkit="right top, left bottom"; break;
			case 'linearRight'		     : style="linear"; w3c="to right"; position="left"; webkit="left top, right top"; break;
			case 'linearLeft'		     : style="linear"; w3c="to left"; position="right"; webkit="right top, left top"; break;
			case 'linearTopRight'	     : style="linear"; w3c="to top right"; position="bottom left"; webkit="left bottom, right top"; break;
			case 'linearTop'		     : style="linear"; w3c="to top"; position="bottom"; webkit="left bottom, left top"; break;
			case 'linearTopLeft'	     : style="linear"; w3c="to top left"; position="bottom right"; webkit="right bottom, left top"; break;
			case 'circularTopLeft'		 : style="radial"; w3c="circle farthest-corner at left top"; position="left top, circle farthest-corner"; webkit="left top, 0, left top, 973"; break;
			case 'circularTopCenter'	 : style="radial"; w3c="circle farthest-corner at center top"; position="center top, circle farthest-corner"; webkit="center top, 0, center top, 487"; break;
			case 'circularTopRight'		 : style="radial"; w3c="circle farthest-corner at right top"; position="right top, circle farthest-corner"; webkit="right top, 0, right top, 973"; break;
			case 'circularMiddleLeft'	 : style="radial"; w3c="circle farthest-corner at left center"; position="left center, circle farthest-corner"; webkit="left center, 0, left center, 973"; break;
			case 'circularMiddleCenter'	 : style="radial"; w3c="circle farthest-corner at center"; position="center, circle farthest-corner"; webkit="center center, 0, center center, 487"; break;
			case 'circularMiddleRight'	 : style="radial"; w3c="circle farthest-corner at right center"; position="right center, circle farthest-corner"; webkit="right center, 0, right center"; break;
			case 'circularBottomLeft'	 : style="radial"; w3c="circle farthest-corner at left bottom"; position="left bottom, circle farthest-corner"; webkit="left bottom, 0, left bottom, 973"; break;
			case 'circularBottomCenter'	 : style="radial"; w3c="circle farthest-corner at center bottom"; position="center bottom, circle farthest-corner"; webkit="center bottom, 0, center bottom, 549"; break;
			case 'circularBottomRight'	 : style="radial"; w3c="circle farthest-corner at right bottom"; position="right bottom, circle farthest-corner"; webkit="right bottom, 0, right bottom, 973"; break;
			case 'ellipticalTopLeft'     : style="radial"; w3c="ellipse farthest-corner at left top"; position="left top, ellipse farthest-corner"; webkit="left top, 0, left top, 973"; break;
			case 'ellipticalTopCenter'   : style="radial"; w3c="ellipse farthest-corner at center top"; position="center top, ellipse farthest-corner"; webkit="center top, 0, center top, 487"; break;
			case 'ellipticalTopRight'    : style="radial"; w3c="ellipse farthest-corner at right top"; position="right top, ellipse farthest-corner"; webkit="right top, 0, right top, 973"; break;
			case 'ellipticalMiddleLeft'	 : style="radial"; w3c="ellipse farthest-corner at left center"; position="left center, ellipse farthest-corner"; webkit="left center, 0, left center, 973"; break;
			case 'ellipticalMiddleCenter': style="radial"; w3c="ellipse farthest-corner at center"; position="center, ellipse farthest-corner"; webkit="center center, 0, center center, 487"; break;
			case 'ellipticalMiddleRight' : style="radial"; w3c="ellipse farthest-corner at right center"; position="right center, ellipse farthest-corner"; webkit="right center, 0, right center"; break;
			case 'ellipticalBottomLeft'  : style="radial"; w3c="ellipse farthest-corner at left bottom"; position="left bottom, ellipse farthest-corner"; webkit="left bottom, 0, left bottom, 973"; break;
			case 'ellipticalBottomCenter': style="radial"; w3c="ellipse farthest-corner at center bottom"; position="center bottom, ellipse farthest-corner"; webkit="center bottom, 0, center bottom, 487"; break;
			case 'ellipticalBottomRight' : style="radial"; w3c="ellipse farthest-corner at right bottom"; position="right bottom, ellipse farthest-corner"; webkit="right bottom, 0, right bottom, 973"; break;

			default: style="linear"; w3c="to right"; position="left"; webkit="left top, right top"; break;
		}
			
		bg.css({'background' : colorStart});
		bg.css({'background' : '-moz-' + style + '-gradient(' + position + ', ' + colorStart + ' 0%, ' + colorEnd + ' 100%)' });
		bg.css({'background' : '-webkit-gradient(' + style + ', ' + webkit + ', color-stop(0, ' + colorStart + '), color-stop(1, ' + colorEnd + '))'});
		bg.css({'background' : '-webkit-' + style + '-gradient(' + position + ', ' + colorStart + ' 0%, ' + colorEnd + ' 100%)'});
		bg.css({'background' : '-o-' + style + '-gradient(' + position + ', ' + colorStart + ' 0%, ' + colorEnd + ' 100%)'});
		bg.css({'background' : '-ms-' + style + '-gradient(' + position + ', ' + colorStart + ' 0%, ' + colorEnd + ' 100%)'});
		bg.css({'background' : style + '-gradient(' + w3c + ', ' + colorStart + ' 0%, ' + colorEnd + ' 100%)'});
		bg.css({'background' : 'filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'' + colorStart + '\', endColorstr=\'' + colorEnd + '\',Gradientstyle=1 )'});
	}

})(jQuery);