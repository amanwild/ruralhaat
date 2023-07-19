Dropzone.autoDiscover = false;
jQuery(document).ready(function(jQuery){
	"use strict";
	jQuery.noConflict();
	if(jQuery('div').is('#classiera_dropzone')){
		Dropzone.autoDiscover = false;
	}
	if(jQuery('div').is('#classiera_dropzone')){
		var classieraDropZone = jQuery("#classiera_dropzone");
		var maxfile = classieraDropZone.data("max-file");
		var maxsize = classieraDropZone.data("max-size");
		var filemsg = jQuery(".dz-max-file-msg");
		var removemsg = jQuery(".dz-remove").html();
		var ourIDS = '';
		classieraDropZone.dropzone ({
			url: classiera.ajaxurl,
			acceptedFiles: "image/*",			
			maxFiles: maxfile,
			parallelUploads: 1,
			uploadMultiple: true,					
			addRemoveLinks: true,
			maxFilesize: maxsize,
			dictRemoveFile: removemsg,
			init: function() {
				this.on("error", function(file, response) {
					jQuery('.dropzoneAlert').html(response);
					jQuery('.dz-max-file-msg').show();
					this.removeFile(file);
				});
				this.on("sending", function(file, xhr, formData) {
					formData.append("action", "classiera_media_upload");
				});
				this.on("success", function(file, response) {					
					jQuery(file.previewElement).append('<input name="attachedids[]" type="hidden" value="'+ response +'">');
					jQuery(file.previewElement).attr("id", response);
				});
				this.on("complete", function(file, response) {
					jQuery('#classiera_dropzone').sortable();
				});
				this.on("removedfile", function(file) {
					var attachedID = jQuery(file.previewElement).attr("id");
					var attachedData = {
						'action': 'classiera_media_upload',			
						'delete_attached': attachedID
					};
					jQuery.ajax({
						type : 'POST',
						dataType : 'json',
						url : classiera.ajaxurl,
						data : attachedData,						
					});
				});
			},
		});
	}
});