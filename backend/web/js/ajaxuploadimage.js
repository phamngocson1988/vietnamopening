function AjaxUploadImage(opts) {
    // default configuration properties
    this.options = {
        request_url : 'ajax-upload-image', //image/ajax-upload-image
        element: '#file', // seletor of the element
        element_name: 'imageFiles',
        callback: null,

        review_container: '#image_review',
        review_width: 150,
        review_height: 150,
        review: false,
        review_from: 'server', // server, local
        default_image: '',
        condition: null,
 
    }; 
    // form to push data to server
    this.form = new FormData();
 
    //constructor
    this.init = function (opts) {
        this.options = $.extend(this.options, opts);
        that = this;
	    $(this.options.element).on('change', function(){
			that.form.append('name', that.options.element_name);
			that.form.append('review_width', that.options.review_width);
			that.form.append('review_height', that.options.review_height);
			$.each(this.files, function( index, value ) {
				var file = value;
				var imagefile = file.type;
				var match= ["image/jpeg","image/png","image/jpg"];
				if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
					return false;
				} else {
					// var reader = new FileReader();
					// reader.onload = that.loadImageFromLocal;
					// reader.readAsDataURL(file);
					that.form.append('imageFiles', file);
				}
			});
			
			that.upload();
		});
    };


    this.upload = function() {
  //   	if (Object.keys(this.form).length == 0) {
		// 	return;
		// }
		that = this;
    	$.ajax({
			url: this.options.request_url,
			type: 'POST',
			beforeSend: this.loading,
			processData: false, // important
			contentType: false, // important
			dataType : 'json',
			data: this.form,
			success: function (result, textStatus, jqXHR) {
                if (result.status == false) {
                    that.error(result);
                    return false;
                } else {
                    that.success(result);
                    that.callback(result);
                }
                 
            },
            complete: function() {
                //Stop loading
        		that.stop_loading();
        		that.reset();
            }
		});
    }

 //    this.loadReviewFromLocal = function(e) {
	// 	$('#image_review').css("display", "block");
	// 	var img = document.createElement( "img" );
	// 	$(img).attr('src', e.target.result);
	// 	$(img).attr('width', '150px');
	// 	$(img).attr('height', '150px');
	// 	$('#image_review').append( img );
	// };
 
    //success
    this.success = function(result) {
        console.log('success: over-write me');
        this.loadReviewFromServer(result);
    }

    this.loadReviewFromServer = function(result) {
    	$(this.options.review_container).css("display", "block");
    	$.each(result.images, function( index, value ) {
			var img = document.createElement( "img" );
			$(img).attr('src', value);
			$(img).attr('width', that.options.review_width + 'px');
			$(img).attr('height', that.options.review_height + 'px');
			$(that.options.review_container).append( img );
		});
    }

    //error
    this.error = function(result) {
        console.log(result);
        console.log('error: over-write me');
    }

    //callback
    this.callback = function(result) {
        console.log('callback: over-write me');
    };

    //reset
    this.reset = function() {
    	this.form = new FormData();
    	$(this.options.element).val('');
    }

    //loading
    this.loading = function() {
        console.log('loading: over-write me');
    }

    //stop_loading
    this.stop_loading = function() {
        console.log('stop_loading: over-write me');
    }

    this.init(opts);
};
