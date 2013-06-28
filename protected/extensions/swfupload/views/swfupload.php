<script type="text/javascript">
		var swfu<?php echo $threadId?>;		
		$(function () {
			swfu<?php echo $threadId?> = new SWFUpload({
				// Backend Settings
				upload_url: '<?php echo $uploadUrl?>',
				post_params: <?php echo $postParams?>,				
			
				file_size_limit : '<?php echo $fileSizeLimit;?>MB',	
				file_types : "<?php echo  $fileTypes;?>",
				file_types_description : "<?php echo $fileTypes;?>文件",
				file_upload_limit : <?php echo $file_upload_limit; ?>,
				file_queue_limit : <?php echo $fileQuenueLimit;?>, 
			
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,

				// Button Settings
				button_image_url : "<?php echo $button_image_url; ?>",
				button_placeholder_id : "button_placeholder_<?php echo $threadId?>",
				button_width: <?php echo $button_width; ?>,
				button_height: <?php echo $button_height; ?>,
				button_text : '<?php echo $button_text; ?>',
				button_text_style : '.productImageUploadButton {font-family: Arial,Helvetica,sans-serif; font-size: 12px; }',
				button_text_top_padding: 0,
				button_text_left_padding: 0,
				button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
				button_cursor: SWFUpload.CURSOR.HAND,
				
				// Flash Settings
				flash_url : "<?php echo $baseUrl?>/swfupload.swf",

				custom_settings : {
					upload_target : "fileProgressContainer_<?php echo $threadId?>",
					thumbnails	: "thumbnails_<?php echo $threadId?>",
					thread_id   :"<?php echo $threadId?>"
				},
				
				// Debug Settings
				debug: <?php echo $debug?>
			});
		}
		);
		</script>	
	<div class="swfupload_button" style="padding:0; margin:0; width:<?php echo $button_width; ?>px;">
			<div id="button_placeholder_<?php echo $threadId?>"></div>
	</div>
	<div class="cl" style="display:none;"></div>
	<div id="fileProgressContainer_<?php echo $threadId?>" style="display:none;"></div>
	<div id="thumbnails_<?php echo $threadId?>" style="display:none;">   
	<?php foreach ($imgUrlList as $img):?>
		      		<img style="margin: 5px; opacity: 1;" width="100" height="100" src="<?php echo $img?>">
	<?php endforeach;?>
	</div>