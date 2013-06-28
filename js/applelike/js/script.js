$(document).ready(function(){

	/* This code is executed on the document ready event */

	var left	= 0,
		top		= 0,
		sizes	= { retina: { width:180, height:180 }, webpage:{ width:$(".leftxb22").eq(0).width(), height:$(".leftxb22").eq(0).height() } },
		webpage	= $('.webpage'),
		
		retina	= $('.retina');
		retinaLength = retina.length;

		if(retinaLength > 0){
			for(var i=0; i<retinaLength; i++){
				var src = retina.eq(i).parent().find('img').eq(0).attr('src');

				retina.eq(i).attr('style',"background:url('"+src+"') no-repeat center center white;");

				var retinaWidth = retina.eq(i).width();

				$("<img/>").attr("src", src).ready(function() {
					this.kuan = this.width;
					this.gao = this.height;
				});

			}
		}



	if(navigator.userAgent.indexOf('Chrome')!=-1)
	{
		/*	Applying a special chrome curosor,
			as it fails to render completely blank curosrs. */
			
		retina.addClass('chrome');
	}
	
	webpage.mousemove(function(e){
		if($(this).find('img').eq(0).width() < 520){
			return false;
		}
		offset	= { left: $(this).offset().left, top: $(this).offset().top },
		left = (e.pageX-offset.left);
		top = (e.pageY-offset.top);
		leftNo = e.pageX;
		topNo = e.pageY;

		retina	= $(this).find('.retina');

		if(retina.is(':not(:animated):hidden')){
			/* Fixes a bug where the retina div is not shown */
			$(this).trigger('mouseenter');
		}

		if(left<0 || top<0 || left > sizes.webpage.width || top > sizes.webpage.height)
		{
			/*	If we are out of the bondaries of the
				webpage screenshot, hide the retina div */

			if(!retina.is(':animated')){
				$(this).trigger('mouseleave');
			}
			return false;
		}

		/*	Moving the retina div with the mouse
			(and scrolling the background) */

		bili = 1400/(520+90);

		retina.css({
			left				: left - sizes.retina.width/2,
			top					: top - sizes.retina.height/2,
			backgroundPosition	: '-'+(bili*left)+'px -'+(bili*top)+'px'
		});
		
	}).mouseleave(function(){
		if($(this).width() < 520){
			return false;
		}
		retina	= $(this).find('.retina');
		retina.stop(true,true).fadeOut('fast');
	}).mouseenter(function(){
		if($(this).width() < 520){
			return false;
		}
		retina	= $(this).find('.retina');
		retina.stop(true,true).fadeIn('fast');
	});
});