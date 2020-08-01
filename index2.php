<?
//EDIT THIS PORTION!!
$articleTitle = "Date Range Picker using jQuery UI 1.6 and jQuery UI CSS Framework";
$articleUrl = "/lab/date_range_picker_using_jquery_ui_16_and_jquery_ui_css_framework/";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title><?php echo "Filament Group Lab Example From Page from: $articleTitle"; ?></title>
		<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.7.1.custom.min.js"></script>
		<script type="text/javascript" src="js/daterangepicker.jQuery.js"></script>
		<link rel="stylesheet" href="css/ui.daterangepicker.css" type="text/css" />
		<link rel="stylesheet" href="css/redmond/jquery-ui-1.7.1.custom.css" type="text/css" title="ui-theme" />
		<script type="text/javascript">	
			$(function(){
				if($(window.parent.document).find('iframe').size()){
					var inframe = true;
				}
				 $('input').daterangepicker({
				 	presetRanges: [
						{text: 'Ad Campaign', dateStart: 'Today', dateEnd: '03/07/09' },
						{text: 'Spring Vacation', dateStart: '03/04/09', dateEnd: '03/08/09' },
						{text: 'Office Closed', dateStart: '04/04/09', dateEnd: '04/08/09' }
					], 
					posX: null,
				 	posY: null,
				 	arrows: true, 
				 	dateFormat: 'M d, yy',
				 	rangeSplitter: 'to',
				 	datepickerOptions: {
				 		changeMonth: true,
				 		changeYear: true
				 	},
				 	onOpen:function(){ if(inframe){ $(window.parent.document).find('iframe:eq(1)').width(700).height('35em');} }, 
				  	onClose: function(){ if(inframe){ $(window.parent.document).find('iframe:eq(1)').width('100%').height('5em');} }
				 }); 
			 });
		</script>
		
		<!-- from here down, demo-related styles and scripts -->
		<link rel="shortcut icon" href="/images/favicon2.ico" type="image/x-icon" />
		<link href="/style/demoPages" media="screen" rel="Stylesheet" type="text/css" />
		
		<script type="text/javascript" src="http://ui.jquery.com/applications/themeroller/themeswitchertool/"></script>
<script type="text/javascript"> $(function(){ $('<div style="position: absolute; left: 300px;" />').insertAfter('#demoHeader').themeswitcher({height: 100, onOpen:function(){ $(window.parent.document).find('iframe').height('15em'); $(document).trigger('click');}, onClose:function(){ $(window.parent.document).find('iframe').height('5em');} }); }); </script>
		
		
		<style type="text/css">
			body { font-size: 62.5%;background: transparent;  }
			input {width: 196px; height: 1.1em;}
		</style>
	</head>
	<body>
<?php /* Examples Header */ include ("http://72.47.209.59/examples/_examplesIncludes/_examplesHeader.inc"); ?>	

		<input type="text" value="Choose a Date" id="dateRange" />	


	</body>
</html>


