/*
 * jQuery DP Social Timeline v1.4.2
 *
 * Copyright 2012, Diego Pereyra
 *
 * @Web: http://www.dpereyra.com
 * @Email: info@dpereyra.com
 *
 * Depends:
 * jquery.js
 */

(function ($) {
	function SocialTimeline(element, options) {
		this.timeline = $(element);
		
		/* Setting vars*/
		this.settings = $.extend({}, $.fn.dpSocialTimeline.defaults, options);  
		var feeds = this.settings.feeds;
		var custom = this.settings.custom;
		this.feeds = new Array();
		this.custom = new Array();
		this.social= new Array();
		
		for (x in this.settings.feeds)
		{
			this.feeds[x+'_arr'] = feeds[x].data.split(',');
			if(typeof feeds[x].limit !== 'undefined') {
				try{ if(isNaN(feeds[x].limit)) {this.feeds[x+'_limit'] = feeds[x].limit.split(',');} else { this.feeds[x+'_limit'] = feeds[x].limit; } }catch(err){}
			}
			if(typeof this.feeds[x+'_limit'] === 'undefined') { this.feeds[x+'_limit'] = 0; }
			this.feeds[x+'_url'] = new Array();
		}
		
		for (x in this.settings.custom)
		{
			this.custom[x+'_url'] = new Array(custom[x].url);
			this.custom[x+'_name'] = new Array(custom[x].name);
			this.custom[x+'_icon'] = new Array(custom[x].icon);
			this.custom[x+'_limit'] = custom[x].limit;
			
			this.social.push({ 	
				name: this.custom[x+'_name'],
				url: this.custom[x+'_url'],
				id: x,
				icon: this.custom[x+'_icon'],
				limit: this.custom[x+'_limit']
			});
		}
		
		this.totalFeeds = 0;
		this.nameFeeds = new Array();
		this.iconFeeds = new Array();
		this.limitFeeds = new Array();
		this.entry = new Array();
		this.settings.itemWidthOrig = this.settings.itemWidth;
		
		var loc = new String(window.document.location); 
		if (loc.indexOf("https://")!= -1) 
			this.prefix = "https://"; 
		else 
			this.prefix = "http://";
		
		switch(this.settings.layoutMode) {
			case 'timeline':
				this.settings.layoutMode = 'spineAlign';
				if(this.settings.timelineItemWidth != "") {
					this.settings.itemWidth = this.settings.timelineItemWidth;
				}
				break;	
			case 'columns':
				this.settings.layoutMode = 'masonry';
				if(this.settings.columnsItemWidth != "") {
					this.settings.itemWidth = this.settings.columnsItemWidth;
				}
				break;	
			case 'one_column':
				this.settings.layoutMode = 'straightDown';
				if(this.settings.oneColumnItemWidth != "") {
					this.settings.itemWidth = this.settings.oneColumnItemWidth;
				}
				break;	
		}
		
		this.timeline.addClass(this.settings.skin);
		
		this.init();
	}
	
	SocialTimeline.prototype = {
		init : function(){ 
			
			if(this.feeds['twitter_arr']) {

				for(var i = 0; i < this.feeds['twitter_arr'].length; i++) {
					this.feeds['twitter_url'][i] = 'http://api.twitter.com/1/statuses/user_timeline.rss?screen_name='+$.trim(this.feeds['twitter_arr'][i]);
				}
				
				this.social.push({ 	name: this.feeds['twitter_arr'],
					url: this.feeds['twitter_url'],
					id: 'twitter',
					icon: '',
					limit: this.feeds['twitter_limit']
				});
			}
			
			if(this.feeds['twitter_hash_arr']) {
				for(var i = 0; i < this.feeds['twitter_hash_arr'].length; i++) {
					this.feeds['twitter_hash_url'][i] = 'https://search.twitter.com/search.atom?q=%23'+$.trim(this.feeds['twitter_hash_arr'][i]);
				}
				this.social.push({ 	name: this.feeds['twitter_hash_arr'],
					url: this.feeds['twitter_hash_url'],
					id: 'twitter',
					icon: '',
					limit: this.feeds['twitter_hash_limit']
				});
			}
			
			if(this.feeds['facebook_page_arr']) {
				for(var i = 0; i < this.feeds['facebook_page_arr'].length; i++) {
					this.feeds['facebook_page_url'][i] = 'http://www.facebook.com/feeds/page.php?id='+$.trim(this.feeds['facebook_page_arr'][i])+'&format=atom10';
				}
				
				this.social.push({ 	name: this.feeds['facebook_page_arr'],
					url: this.feeds['facebook_page_url'],
					id: 'facebook',
					icon: '',
					limit: this.feeds['facebook_page_limit']
				});
			}
			
			if(this.feeds['delicious_arr']) {
				for(var i = 0; i < this.feeds['delicious_arr'].length; i++) {
					this.feeds['delicious_url'][i] = 'http://feeds.delicious.com/v2/rss/'+$.trim(this.feeds['delicious_arr'][i]);
				}
				
				this.social.push({ 	name: this.feeds['delicious_arr'],
					url: this.feeds['delicious_url'],
					id: 'delicious',
					icon: '',
					limit: this.feeds['delicious_limit']
				});
			}
			
			if(this.feeds['flickr_arr']) {
				for(var i = 0; i < this.feeds['flickr_arr'].length; i++) {
					this.feeds['flickr_url'][i] = 'http://api.flickr.com/services/feeds/photos_public.gne?id='+$.trim(this.feeds['flickr_arr'][i])+'&format=rss_200';
				}
				
				this.social.push({ 	name: this.feeds['flickr_arr'],
					url: this.feeds['flickr_url'],
					id: 'flickr',
					icon: '',
					limit: this.feeds['flickr_limit']
				});
			}
			
			if(this.feeds['tumblr_arr']) {
				for(var i = 0; i < this.feeds['tumblr_arr'].length; i++) {
					this.feeds['tumblr_url'][i] = 'http://'+$.trim(this.feeds['tumblr_arr'][i])+'.tumblr.com/rss';
				}
				
				this.social.push({ 	name: this.feeds['tumblr_arr'],
					url: this.feeds['tumblr_url'],
					id: 'tumblr',
					icon: '',
					limit: this.feeds['tumblr_limit']
				});
			}
			
			if(this.feeds['youtube_arr']) {
				for(var i = 0; i < this.feeds['youtube_arr'].length; i++) {
					this.feeds['youtube_url'][i] = 'http://gdata.youtube.com/feeds/base/users/'+$.trim(this.feeds['youtube_arr'][i])+'/uploads';
				}
				
				this.social.push({ 	name: this.feeds['youtube_arr'],
					url: this.feeds['youtube_url'],
					id: 'youtube',
					icon: '',
					limit: this.feeds['youtube_limit']
				});
			}
			
			if(this.feeds['youtube_search_arr']) {
				for(var i = 0; i < this.feeds['youtube_search_arr'].length; i++) {
					this.feeds['youtube_search_url'][i] = 'http://gdata.youtube.com/feeds/api/videos?alt=atom&racy=include&vq='+$.trim(this.feeds['youtube_search_arr'][i]);
				}
				
				this.social.push({ 	name: this.feeds['youtube_search_arr'],
					url: this.feeds['youtube_search_url'],
					id: 'youtube',
					icon: '',
					limit: this.feeds['youtube_search_limit']
				});
			}
			
			if(this.feeds['dribbble_arr']) {
				for(var i = 0; i < this.feeds['dribbble_arr'].length; i++) {
					this.feeds['dribbble_url'][i] = 'http://dribbble.com/players/'+$.trim(this.feeds['dribbble_arr'][i])+'/shots.rss';
				}
				
				this.social.push({ 	name: this.feeds['dribbble_arr'],
					url: this.feeds['dribbble_url'],
					id: 'dribbble',
					icon: '',
					limit: this.feeds['dribbble_limit']
				});
			}
			
			if(this.feeds['digg_arr']) {
				for(var i = 0; i < this.feeds['digg_arr'].length; i++) {
					this.feeds['digg_url'][i] = 'http://digg.com/users/'+$.trim(this.feeds['digg_arr'][i])+'/history.rss';
				}
				
				this.social.push({ 	name: this.feeds['digg_arr'],
					url: this.feeds['digg_url'],
					id: 'digg',
					icon: '',
					limit: this.feeds['digg_limit']
				});
			}
			
			if(this.feeds['pinterest_arr']) {
				for(var i = 0; i < this.feeds['pinterest_arr'].length; i++) {
					this.feeds['pinterest_url'][i] = 'http://www.pinterest.com/'+$.trim(this.feeds['pinterest_arr'][i])+'/feed.rss';
				}
				
				this.social.push({ 	name: this.feeds['pinterest_arr'],
					url: this.feeds['pinterest_url'],
					id: 'pinterest',
					icon: '',
					limit: this.feeds['pinterest_limit']
				});
			}
			
			if(this.feeds['vimeo_arr']) {
				for(var i = 0; i < this.feeds['vimeo_arr'].length; i++) {
					this.feeds['vimeo_url'][i] = 'http://vimeo.com/'+$.trim(this.feeds['vimeo_arr'][i])+'/videos/rss';
				}
				
				this.social.push({ 	name: this.feeds['vimeo_arr'],
					url: this.feeds['vimeo_url'],
					id: 'vimeo',
					icon: '',
					limit: this.feeds['vimeo_limit']
				});	
			}
			
			this.timeline.addClass('dpSocialTimelineLoading');
			
			this._parseFeeds();
		},
		
		_addSocial : function(num) {
			var me = this;
			if(this.social[num].name != "") {
				this.nameFeeds[this.totalFeeds] = this.social[num].id;
				this.iconFeeds[this.totalFeeds] = this.social[num].icon;
				this.limitFeeds[this.totalFeeds] = this.social[num].limit;
				this.totalFeeds++;
				for(var y = 0; y < this.social[num].url.length; y++) {

					this._parseRSS(this.social[num].url[y], this.social[num].limit, y,
					function(feeds, id){
						if(!feeds){	return false; }
						
						for(var i=0; i<feeds.entries.length; i++){
							feeds.entries[i].name = me.social[num].id;
							feeds.entries[i].icon = me.social[num].icon;
							feeds.entries[i].limit = me.social[num].limit;
							if( feeds.entries[i].author == "") { feeds.entries[i].author = me.social[num].name[id]; }
							
							if(feeds.entries[i].title != "") {
								me.entry.push(feeds.entries[i]);
							}
							
						}
						
						if( id == (me.social[num].url.length - 1) ) {
							if(parseInt(num, 10) == (me.social.length - 1)) {
								me._output();	
							} else {
								me._addSocial(num + 1);
							}
						}
					},
					this.settings.total
					);
				}
			} else {
				if(parseInt(num, 10) == (this.social.length - 1)) {
					this._output();	
				} else {
					this._addSocial(num + 1);
				}
			}
		},
			
		_parseFeeds : function(){
		
			this._addSocial(0);
					
		},
			
		_output : function(){
			var me = this,
				is_youtube = false,
				is_vimeo = false,
				$li, 
				$favicon, 
				outputOptions = {
					$dpSocialTimelineLine : '',
					$dpSocialTimelineFilter : '',
					$dpSocialTimelineLayout : '',
					$dpSocialTimelineLineWrap : '',
					$dpSocialTimelineContent : '',
					$div : '',
					showDivider : false,
					appendFilter : false,
					appendLayout : false
				},
				$stContentHead, 
				$stContentFoot, 
				$time, 
				$permalink, 
				$video_icon,
				$get_image,
				$img_link,
				oldNameFeeds = new Array();
			
			outputOptions.$div = $('<div>').addClass('dpSocialTimeline');
			
			outputOptions.$dpSocialTimelineLine = $('<div />').addClass('dpSocialTimeline_line');
			
			outputOptions.$dpSocialTimelineLineWrap = $('<div />').addClass('dpSocialTimeline_lineWrap')
								.append($(outputOptions.$dpSocialTimelineLine));
								
			$(outputOptions.$div).append(outputOptions.$dpSocialTimelineLineWrap);
			
			this.entry.sort(function(a,b) {
	
				a = new Date(a["publishedDate"]).getTime();
				b = new Date(b["publishedDate"]).getTime();
				return a == b ? 0 : (a > b ? -1 : 1)
			});
						
			this._createMarkup(outputOptions, 0, false);
			
			$('.dpSocialTimeline_item', outputOptions.$div).width(this.settings.itemWidth);
			
			if(this.settings.showFilter && this.totalFeeds > 1) {
				outputOptions.$dpSocialTimelineFilter = $('<div />').addClass('dpSocialTimeline_filter');
				
				for(var i = 0; i <= this.totalFeeds; i++) {
					if(typeof this.nameFeeds[i] !== "undefined" && $.inArray(this.nameFeeds[i], oldNameFeeds) === -1) {
						
						outputOptions.$dpSocialTimelineFilter.append(
							$('<button />').attr({'data-filter': '.'+(this.nameFeeds[i])})
										   .append($('<span />').addClass('favicon '+(this.nameFeeds[i])))
						);

						if(typeof this.iconFeeds[i] != "undefined" && this.iconFeeds[i] != "") { $('.'+(this.nameFeeds[i]), outputOptions.$dpSocialTimelineFilter).css('background-image', 'url('+this.iconFeeds[i]+')') }
						
						oldNameFeeds[i] = this.nameFeeds[i];
					}
				}
				
				if( oldNameFeeds.length > 1 ) {
					outputOptions.appendFilter = true;
					
					outputOptions.showDivider = true;
				}
			}
			
			if(this.settings.showLayout) {
				outputOptions.$dpSocialTimelineLayout = $('<div />').addClass('dpSocialTimeline_layout');
				
				if(this.settings.showLayoutTimeline) {
					outputOptions.$dpSocialTimelineLayout.append($('<button />').attr({'data-style': 'spineAlign'}).addClass('spineAlign').append($('<span />')));
				}
				
				if(this.settings.showLayoutColumns) {
					outputOptions.$dpSocialTimelineLayout.append($('<button />').attr({'data-style': 'masonry'}).addClass('masonry').append($('<span />')));
				}
				
				if(this.settings.showLayoutOneColumn) {
					outputOptions.$dpSocialTimelineLayout.append($('<button />').attr({'data-style': 'straightDown'}).addClass('straightDown').append($('<span />')));
				}
				
				outputOptions.appendLayout = true;
				
				outputOptions.showDivider = true;
			}
			
			// IE Images load fix.
			if($.browser.msie || $.browser.opera) {
				$(document).ready(function() {me._onLoadHook(outputOptions); });
			} else {
				$(window).load(function() {me._onLoadHook(outputOptions); });
			}
			
			// filter items when filter link is clicked
			$('button', outputOptions.$dpSocialTimelineFilter).click(function(){
			  
			  if(!$(this).hasClass('active')) { $(this).addClass('active'); } else { $(this).removeClass('active'); }

			  var selector = '';
			  
			  $('.dpSocialTimeline_item.filtered', outputOptions.$div).removeClass('filtered');
			  
			  $('button.active', outputOptions.$dpSocialTimelineFilter).each(function(i){
				  if($(this).attr('data-filter') != "" && typeof $(this).attr('data-filter') !== "undefined") {
					  if(i > 0) { selector += ","; }
					  selector += $(this).attr('data-filter');
					  
					  $('.dpSocialTimeline_item'+$(this).attr('data-filter'), outputOptions.$div).addClass('filtered');
				  }
			  });
			  
			  if(selector == '') { 
			  
			  	  selector = '.dpSocialTimeline_item:lt('+( me.settings.total )+')';  
				  outputOptions.$div.isotope({ filter: selector });
				  $('.dpSocialTimeline_item:gt('+( me.settings.total - 1 )+')', outputOptions.$div).css({opacity : 0, scale : 0.001, display: 'block'});
			  } else { 
			  	
				  selector = '.filtered:lt('+( me.settings.total )+')'; 
				  outputOptions.$div.isotope({ filter: selector });
			      $('.dpSocialTimeline_item.filtered:gt('+( me.settings.total - 1 )+')', outputOptions.$div).css({opacity : 0, scale : 0.001, display: 'none'});

				  $('.dpSocialTimeline_item.filtered:lt('+( me.settings.total )+')', outputOptions.$div).css({opacity : 1, scale : 1, display: 'block'});
			  }

			  return false;
			});
			
			// filter items when layout link is clicked
			if(this.settings.showLayout) {
				$('button', outputOptions.$dpSocialTimelineLayout).click(function(){
				  
				  $('button', outputOptions.$dpSocialTimelineLayout).removeClass('active'); $(this).addClass('active'); 
				  
				  if($(this).attr('data-style') != "" && typeof $(this).attr('data-style') !== "undefined") {
					  
					  switch($(this).attr('data-style')) {
						  case "spineAlign":
							outputOptions.$dpSocialTimelineLineWrap.fadeIn('fast');
							if(me.settings.timelineItemWidth != "") {
								$('.dpSocialTimeline_item', outputOptions.$div).width(me.settings.timelineItemWidth);
							} else {
								$('.dpSocialTimeline_item', outputOptions.$div).width(me.settings.itemWidthOrig);
							}
							break;
						  case "masonry":
							outputOptions.$dpSocialTimelineLineWrap.fadeOut('fast');
							if(me.settings.columnsItemWidth != "") {
								$('.dpSocialTimeline_item', outputOptions.$div).width(me.settings.columnsItemWidth);
							} else {
								$('.dpSocialTimeline_item', outputOptions.$div).width(me.settings.itemWidthOrig);
							}
							break;
						  case "straightDown":
							outputOptions.$dpSocialTimelineLineWrap.fadeOut('fast');
							if(me.settings.oneColumnItemWidth != "") {
								$('.dpSocialTimeline_item', outputOptions.$div).width(me.settings.oneColumnItemWidth);
							} else {
								$('.dpSocialTimeline_item', outputOptions.$div).width(me.settings.itemWidthOrig);
							}
							break;
					  }
						
					  outputOptions.$div.isotope({ layoutMode: $(this).attr('data-style') });
					  
					  if($('.dpSocialTimeline_item.filtered', outputOptions.$div).length){
						$('.dpSocialTimeline_item.filtered:gt('+( me.settings.total - 1 )+')', outputOptions.$div).css({opacity : 0, scale : 0.001, display: 'none'});
						$('.dpSocialTimeline_item.filtered:lt('+( me.settings.total )+')', outputOptions.$div).css({opacity : 1, scale : 1, display: 'block'});
					  } else {
						$('.dpSocialTimeline_item:gt('+( me.settings.total - 1 )+')', outputOptions.$div).css({opacity : 0, scale : 0.001, display: 'none'});
					  }
				  }
				  
				  return false;
				});
			}
		},
		
		_createMarkup : function(outputOptions, num, afterLoad) {
			for (x = num; x < this.entry.length; x++)
			{
				
				//if(x >= this.settings.total && !afterLoad) break;
				
				if(this.settings.showSocialIcons) {
					$favicon = $('<span />').addClass('favicon '+this.entry[x].name);
					
					if(typeof this.entry[x].icon[num] != "undefined" && this.entry[x].icon[num] != "") { $($favicon).css('background-image', 'url('+this.entry[x].icon[num]+')') }
				} else {
					$favicon = '';
				}
				date_published = new Date( this.entry[x].publishedDate );
				published_parse = Date.UTC( date_published.getFullYear(), date_published.getMonth(), date_published.getDate(), date_published.getHours(), date_published.getMinutes() );

				$time = $('<span />').addClass('time').html( this._relativeTime( published_parse ));
				$permalink = $('<a />').addClass('permalink').attr({href: this.entry[x].link, target: '_blank'});
				if(this.entry[x].link.substr(0,28) == 'http://www.youtube.com/watch') {
					is_youtube = true;
					this.entry[x].thumbnail = 'http://i.ytimg.com/vi/'+this._getYoutubeId(this.entry[x].link)+'/0.jpg';
					is_vimeo = false;
					$video_icon = $('<div />').addClass('video_icon');
				} else if(this.entry[x].link.substr(0,16) == 'http://vimeo.com') {
					is_youtube = false;
					is_vimeo = true;
					$video_icon = $('<div />').addClass('video_icon');
				} else {
					is_youtube = false;
					is_vimeo = false;
					$video_icon = '';
				}
				
				var author = this.entry[x].author;
				
				if(this.entry[x].name == 'flickr') {
					author = this.entry[x].author.match(/\((.*?)\)/g)[0];
				} else {
					author = author.replace( /\((.*?)\)/g, "" );
				}
				
				if(this.entry[x].name == 'twitter') {
					author = "@"+author
				}
				
				$stContentHead = $('<div />').addClass('dpSocialTimelineContentHead')
									.append($($favicon))
									.append($('<span />').addClass('user').html(author).text())
									.append($($permalink))
									.append($("<div />").css('clear', 'both'));
				
				$stContentFoot = $('<div />').addClass('dpSocialTimelineContentFoot')
									.append($($time))
				
				if(this.entry[x].link.indexOf('twitter.com') !== -1) {
					title = this._linkify(this.entry[x].title.replace(author.replace("@", "")+": ", ""));
				} else {
					title = this._linkify(this.entry[x].title);
				}
				
				outputOptions.$dpSocialTimelineContent = $('<div />').addClass('dpSocialTimelineContent')
													.append(title);
				if(this._getImage(this.entry[x], false) != '') {
					
					$get_image = this._getImage(this.entry[x], false);
					$img_link = $('<a />').attr({href: this.entry[x].link, target: '_blank'}).addClass('img_link'+(is_youtube || is_vimeo ? ' youtube' : ''));
					
					$($img_link).append($get_image).append($video_icon);
					
					if(this.settings.addColorbox) {
						$($img_link).addClass('addColorbox');
						
						if(is_youtube) {
							$($img_link).attr({href: this._getYoutubeVideo(this.entry[x].link)});
						} else if(is_vimeo) {
							$($img_link).attr({href: this._getVimeoVideo(this.entry[x].link)});
						} else {
							$($img_link).attr({href: this._getImage(this.entry[x], true)});
						}
						
					}
					
					outputOptions.$dpSocialTimelineContent.append($('<br />')).append($img_link);
					
				}
				
				outputOptions.$dpSocialTimelineContent.append($("<div />").css('clear', 'both'));
				
				$li = $('<div>').addClass((afterLoad ? 'dpSocialTimeline_hideMe ' : '') +'dpSocialTimeline_item').addClass(this.entry[x].name)
								.append($($stContentHead))
								.append($(outputOptions.$dpSocialTimelineContent))
								.append($($stContentFoot))
								.attr({'data-timeline-time': new Date( this.entry[x].publishedDate ).getTime()});
								
				$(outputOptions.$div).append($li);
				
			}	
		},
		
		_onLoadHook : function(outputOptions){
			var me = this;
			if(outputOptions.appendFilter) {
				$(me.timeline).append(outputOptions.$dpSocialTimelineFilter);
			}
			
			if(outputOptions.appendLayout) {
				$(me.timeline).append(outputOptions.$dpSocialTimelineLayout);
			}
			
			if(outputOptions.showDivider) {
				// Clearfix
				$(me.timeline).append($('<div />').addClass('dpSocialTimeline_divider'));
			}
			
			$(me.timeline).append(outputOptions.$div);
			$(me.timeline).removeClass('dpSocialTimelineLoading');
						
			if(me.settings.layoutMode == "spineAlign")
				$(outputOptions.$dpSocialTimelineLineWrap).show();
			
			$(outputOptions.$div).isotope({
			  // options
			  itemSelector : '.dpSocialTimeline_item',
			  layoutMode: me.settings.layoutMode,
			  itemPositionDataEnabled: true,
			  getSortData : {
				  time : function ( $elem ) {
				  	return $elem.attr('data-timeline-time');
				  }
			  },
			  sortBy : 'time',
			  sortAscending : false,
			  spineAlign: {
				gutterWidth: 20
			  },
			  onLayout: function( $elems, instance ) {
				  
				  $(outputOptions.$dpSocialTimelineLayout).find("button[data-style='"+instance.options.layoutMode+"']").addClass('active');

				  $('span', outputOptions.$dpSocialTimelineLine).fadeOut('fast', function() { $(this).remove(); } );
				  $elems.each(function(i) {
					  var spanPointer = $('<span />');
					  outputOptions.$dpSocialTimelineLine.append( spanPointer.css({top: ($(this).data('isotope-item-position').y + 18)}) );
				  });
			  }
			});
			$(outputOptions.$div).isotope({ filter: '.dpSocialTimeline_item:lt('+( me.settings.total )+')' });
			
			$('.dpSocialTimeline_item:gt('+( me.settings.total - 1 )+')', outputOptions.$div).css({opacity : 0, scale : 0.001});
			
			$('.dpSocialTimeline_item', outputOptions.$div).width(this.settings.itemWidth);
			
			if(me.settings.addColorbox) {
				$(outputOptions.$div).find(".addColorbox").colorbox();
				$(outputOptions.$div).find(".addColorbox.youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
			}	
		},
			
		_parseRSS : function(url, limit, int, fnk, num){
			if(url == null) return false;
			
			//encodeURIComponent
			var gurl = this.prefix+"ajax.googleapis.com/ajax/services/feed/load?v=1.0&callback=?&q="+encodeURIComponent(url);
			if(limit != null && limit > 0 && typeof limit != 'undefined') gurl += "&num="+limit;
			else if(num != null) gurl += "&num="+num;

			$.getJSON(gurl, function(data){
			if(typeof fnk == 'function')
				fnk.call(this, data.responseData.feed, int);
			else
				return false;
			});
		},
			
		// Convert Timestamp to "Time Ago"
		_relativeTime : function(time_value) {
	
			var parsed_date = time_value;
			var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
			var delta = parseInt((Date.UTC( relative_to.getFullYear(), relative_to.getMonth(), relative_to.getDate(), relative_to.getHours(), relative_to.getMinutes() ) - parsed_date) / 1000);
			//delta = delta + (relative_to.getTimezoneOffset() * 60);
			
			var r = '';
			if (delta < 60) { //60 sec
				r = 'less than minute ago';
			} else if(delta < 120) { //2 min
				r = 'about a minute ago';
			} else if(delta < (60*60)) { //60 min
				r = 'about ' + (parseInt(delta / 60)).toString() + ' minutes ago';
			} else if(delta < (120*60)) { //2 hours
				r = 'about an hour ago';
			} else if(delta < (24*60*60)) { //1 day
				r = 'about ' + (parseInt(delta / 3600)).toString() + ' hours ago';
			} else if(delta < (48*60*60)) { //2 days
				r = '1 day ago';
			} else { // > 2 days
				r = (parseInt(delta / 86400)).toString() + ' days ago';
			}
			
			return r;
		},
			
		_getImage : function(entry, returnSrc){
		
			var backRefs = new Array();
			var re = /<img .*src=["\']([^ ^"^\']*)["\']/gi;
			var matches;
			var width = "";
			var html = entry.content;
			var alt = entry.title;
			
			if(entry.thumbnail != "" && typeof entry.thumbnail !== "undefined") {
				backRefs[0] = entry.thumbnail;
			} else {
				while (matches = re.exec(html)) {
					backRefs.push(matches[1]);
				}
			}
			
			if(backRefs.length > 0) {
				var image = backRefs[0];
				
				image = image.replace("_m.jpg", ".jpg");
				image = image.replace("_b.jpg", "_f.jpg");
				image = image.replace("_s.jpg", "_b.jpg");
				if(image.indexOf('safe_image.php') != -1) {
					image = unescape(image.match(/url=([^&]+)/)[1]);
				}
				if(image.indexOf('app_full_proxy.php') != -1) {
					image = unescape(image.match(/src=([^&]+)/)[1]);
				}
				
				width = (this.settings.itemWidth - 40);
				
				if(returnSrc) {
					return image;
				} else {
					return $('<img />').attr({ src: image, alt: alt }).addClass('item_thumb').width(width);
				}
			} else {
				return false
			}
		
		},
			
		_getYoutubeVideo : function(html){
		
			return html.replace(/http:\/\/(www.)?(youtu.be\/|youtube.com\/watch\?v=)([a-zA-Z0-9?%.;:\\/=+_-]+)([&]*([a-zA-Z0-9?&%.;:\\/=+_-]*))/i, 'http://www.youtube.com/v/$3?fs=1&amp;hl=en_US');
		
		},
		
		_getYoutubeId: function(url){
			var regExp = /.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/;
			var match = url.match(regExp);
			if (match&&match[1].length==11){
				return match[1];
			}
			
			return false;
		},
		
		_getVimeoVideo : function(html){
		
			return html.replace(/http:\/\/(www.)?(vimeo.com\/)([a-zA-Z0-9?%.;:\\/=+_-]+)([&]*([a-zA-Z0-9?&%.;:\\/=+_-]*))/i, 'http://player.vimeo.com/video/$3');
		
		},
		
		_linkify : function(html){
		
			return html.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+/, function(m) {
				return m.link(m);
			});
		
		}
	}
	$.fn.dpSocialTimeline = function(options){  

		var dpSocialTimeline;
		this.each(function(){

			dpSocialTimeline = new SocialTimeline($(this), options);
			$(this).data("dpSocialTimeline", dpSocialTimeline);
			
		});
		
		return this;

	}
	
  	/* Default Parameters and Events */
	$.fn.dpSocialTimeline.defaults = {  
		feeds: null, // Feeds
		twitter: '', // Twitter Username
		twitter_hash: '', //Twitter Hashtag
		facebook_page: '', // Facebook Page ID
		delicious: '', // Delicious Username
		flickr: '', // Flickr ID
		tumblr: '', // Tumblr Username
		youtube: '', // Youtube Username
		youtube_search: '', // Youtube Search
		dribbble: '', // Dribbble Username
		digg: '', // Digg Username
		pinterest: '', // Pinterest Username
		vimeo: '', //Vimeo Username
		layoutMode: 'timeline',
		addColorbox: false,
		showSocialIcons: true,
		showFilter: true,
		showLayout: true,
		showLayoutTimeline: true,
		showLayoutColumns: true,
		showLayoutOneColumn: true,
		itemWidth: 200,
		timelineItemWidth: '',
		columnsItemWidth: '',
		oneColumnItemWidth: '',
		skin: 'light',
		total: 10 // Total items to retrieve
	};  
	
	$.fn.dpSocialTimeline.settings = {}

	// custom layout mode spineAlign
	$.Isotope.prototype._spineAlignReset = function() {
		this.spineAlign = {
			colA: 0,
			colB: 10
		};
	};
	
	$.Isotope.prototype._spineAlignLayout = function( $elems ) {
		var instance = this,
		props = this.spineAlign,
		gutterWidth = Math.round( this.options.spineAlign && this.options.spineAlign.gutterWidth ) || 0,
		centerX = Math.round(this.element.width() / 2);
		
		$elems.each(function(){
			var $this = $(this),
			isColA = props.colB > props.colA,
			x = isColA ?
			centerX - ( $this.outerWidth(true) + gutterWidth / 2 ) : // left side
			centerX + gutterWidth / 2, // right side
			y = isColA ? props.colA : props.colB;
			instance._pushPosition( $this, x, y );
			
			if(isColA) { $this.removeClass('colB').addClass('colA'); } else { $this.removeClass('colA').addClass('colB'); }
			props[( isColA ? 'colA' : 'colB' )] += $this.outerHeight(true);
		});
	};
	
	$.Isotope.prototype._spineAlignGetContainerSize = function() {
		var size = {};
		size.height = this.spineAlign[( this.spineAlign.colB > this.spineAlign.colA ? 'colB' : 'colA' )];
		return size;
	};
	
	$.Isotope.prototype._spineAlignResizeChanged = function() {
		return true;
	};
  
})(jQuery);