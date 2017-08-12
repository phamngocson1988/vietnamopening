function AjaxDeleteAction(opts) {
    // default configuration properties
    this.options = {
        element : '.delete-action',
    }; 

    //constructor
    this.init = function (opts) {
        this.options = $.extend(this.options, opts);
        var that = this;
        $('body').on('click', $(this.options.element), function(e){
            e.preventDefault();
            
            var _url = $(this).attr('href');
            $.ajax({
                url: _url,
                type: "GET",
                dataType: 'json',
                success: function (result, textStatus, jqXHR) {
                    if (result.status == false) {
                        that.error(result.errors);
                        return false;
                    } else {
                        that.success(result.data);
                    }
                    
                },
            });
        })
    };

    this.error = function (errors) {
        alert('Fail');
        console.log(errors);
        return false;
    }

    this.success = function (data) {
        alert('Success');
        console.log(data);
        return false;
    }
    this.init(opts);
}

function AjaxFormSubmit(opts) {
    // default configuration properties
    this.options = {
        element : 'form.ajax-form-submit',
    }; 

    //constructor
    this.init = function (opts) {
        this.options = $.extend(this.options, opts);
        $(this.options.element).unbind('submit');
        $(this.options.element).on('submit', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                dataType : 'json',
                data: form.serialize(),
                success: function (result, textStatus, jqXHR) {
                    if (result.status == false) {
                        that.error(result.errors);
                        return false;
                    } else {
                        that.success(result.data);
                    }
                },
            });
            return false;
        });
    }

    this.error = function (errors) {
        alert('Fail');
        console.log(errors);
        return false;
    }

    this.success = function (data) {
        alert('Success');
        console.log(data);
        return false;
    }
    this.init(opts);
}


function AjaxPaging(opts) {
    // default configuration properties
    this.options = {
        request_url : '',
        container : '#items',
        append_type: 'append', //replace
        auto_first_load: false,
        is_loading: false,
        
        // Condition
        query_time: null,
        total: null,
        offset: 0,
        limit: 10,
        condition: null,

    }; 

    //constructor
    this.init = function (opts) {
        this.options = $.extend(this.options, opts);
        if (this.options.auto_first_load === true) {
            this.load();
        }
    };

    //callback
    this.callback = function(result) {
        console.log('callback: over-write me');
    };

    //loading
    this.loading = function() {
        console.log('loading: over-write me');
    }

    //stop_loading
    this.stop_loading = function() {
        console.log('stop_loading: over-write me');
    }

    //error
    this.error = function(result) {
        console.log(result);
        console.log('error: over-write me');
    }

    //no data
    this.no_data = function() {
        console.log('no_data: over-write me');
    }

    //success
    this.success = function(result) {
        
        //Update Total
        if (typeof result.total != 'undefined') {
            this.options.total = result.total;
        }
        
        if (this.options.total === 0) {
            this.no_data();
        }

        //Update offset
        this.options.offset += this.options.limit;
        if (this.options.total != null) {
            this.options.offset = Math.min(this.options.offset, this.options.total);
        }
        
        //Add html to view
        if (this.options.append_type == 'append') {
            $(result.items).appendTo($(this.options.container));
        } else {
            $(this.options.container).html(result.items);
        }

        //Stop loading
        this.stop_loading();

        console.log('success: over-write me');
    }

    //stop_search
    this.stop_search = function() {
        console.log('stop_search: over-write me');
    }

    //load more
    this.load = function () {
        if (this.options.is_loading === true) {
            return;
        }
        
        this.options.is_loading = true;
        if (this.options.total != null && this.options.total == this.options.offset) {
            this.stop_search();
            return false;
        }
        var options = this.options;

        request_data = {
            offset: options.offset,
            limit: options.limit,
        }

        if (options.query_time != null) {
            request_data = $.extend(request_data, {'query_time': options.query_time});
        }

        if (options.condition != null) {
            request_data = $.extend(request_data, options.condition);
        }

        var that = this;
        
        $.ajax({
            url: options.request_url,
            type: "GET",
            data: request_data,
            dataType: 'json',
            beforeSend: that.loading,
            success: function (result, textStatus, jqXHR) {
                if (result.status == false) {
                    that.error(result.data);
                    return false;
                } else {
                    that.success(result.data);
                    that.callback(result.data);
                }
                
            },
            complete: function() {
                that.options.is_loading = false;
            }
        });
    }

    this.init(opts);
}

function PopupImage(opts) {
    this.options = {
        request_url : 'http://admin.vietnamopening.com/image/test', 
        trigger_element: null,
        file_element: '#file', // seletor of the file element
        review_width: '150',
        review_height: '150',
    }; 

    this.init = function (opts) {
        this.options = $.extend(this.options, opts);
        var that = this;
    };
    this.init(opts);
}

function AjaxUploadImage(opts) {
    // default configuration properties
    this.options = {
        request_url : 'http://admin.vnopening.com/image/ajax-upload', //image/ajax-upload-image
        trigger_element: null,
        file_element: '#file', // seletor of the file element
        review_width: '150',
        review_height: '150',
    }; 
    // form to push data to server
    this.form = new FormData();
 
    //constructor
    this.init = function (opts) {
        this.options = $.extend(this.options, opts);
        var that = this;
        if (this.options.trigger_element !== null) {
            $(that.options.trigger_element).click(function(){
                $(that.options.file_element).trigger('click');
            });
        }
        $(this.options.file_element).on('change', function(){
            var element_name = $(this).attr('name');
            $.each(this.files, function( index, value ) {
                var file = value;
                var imagefile = file.type;
                var match= ["image/jpeg","image/png","image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                    return false;
                } else {
                    that.form.append(element_name, file);
                }
            });
            element_name = element_name.replace(/[ \[\] ]/g, "");
            that.form.append('name', element_name);
            that.form.append('review_width', that.options.review_width);
            that.form.append('review_height', that.options.review_height);
            that.upload();
        });
    };


    this.upload = function() {
        var that = this;
        $.ajax({
            url: this.options.request_url,
            type: 'POST',
            processData: false, // important
            contentType: false, // important
            dataType : 'json',
            data: this.form,
            success: function (result, textStatus, jqXHR) {
                if (result.status == false) {
                    alert('false');
                    return false;
                } else {
                    that.callback(result.data);
                }
                 
            },
            complete: function() {
                that.reset();
            }
        });
    }

    //reset
    this.reset = function() {
        this.form = new FormData();
        $(this.options.file_element).val('');
    }

    this.callback = function(result) {
        console.log('callback');
    }

    this.init(opts);
};






//***********
function ImageManager(opts) {
    // default configuration properties
    this.options = {
        id: '#image-popup-form',
        request_url : 'popup', //image/popup

    }; 
    // form to push data to server
    this.form = new FormData();
    this.is_exist = false;
    this.observer = null;

    var that;
    //constructor
    this.init = function (opts) {
        that = this;
        that.options = $.extend(that.options, opts);
        
        // $(document).on('click', '#modal-form li', function(){
        //     $("#modal-form li").removeClass('selected');
        //     $(this).addClass('selected');
        // });

        // $(document).on('click', '#avatar', function(){
        //     that.open_popup();    
        // });
        
    };

    this.open_popup = function() {
        $(this.options.id).modal(); 
    }

    this.load_popup = function() {
        $.ajax({
            url: that.options.request_url,
            type: 'GET',
            dataType : 'html',
            success: function (result, textStatus, jqXHR) {
                that.success(result);
                that.is_exist = true;
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
    }

    //success
    this.success = function(result) {
        $('body').append(result);  

        $(this.options.id).on('hide.bs.modal', function() {
            that.observer = null;
        });
        $(this.options.id).on('click', '[function="ok"]', function() {
            if (that.observer != null) {
                var size = $(that.options.id).find("[role='menu'] a.selected").attr('value');console.log(size);
                var is = $(that.options.id).find('.thumbnail.selected');

                that.observer.callback();
            }
            $(that.options.id).modal('hide');
        });
        $(this.options.id).on("click", "[role='menu'] a", function() {
            $(this).closest('ul').find('a').removeClass('selected');
            $(this).addClass('selected'); 
        });
        $(this.options.id).on("click", ".thumbnail", function() {
            $(this).closest('.modal-body').find('.thumbnail').removeClass('selected');
            $(this).addClass('selected'); 
        });

    }

    this.attach = function(observer) {
        this.observer = observer;
    }

    this.init(opts);
};

$.fn.selectImage = function(manager, opts) {
    if (!manager) {
        return false;
    }

    that = this;

    options = {
        type: 'single', //single | multiple
        size: '150x150',
        name: 'image',
        image: that,
        callback: function() {
            console.log('callback');
            var img = $(manager.options.id).find('.modal-body').find('.selected').find('img');
            var thumb = img.attr('src');
            var src = img.attr('data-original');
            var id = img.attr('data-id');
            $(this.image).attr('src', thumb);

            var e_name = this.type == 'multiple' ? this.name + '[]' : this.name;
            var e_name_src = this.type == 'multiple' ? this.name + '_src[]' : this.name + '_src';
            $(this.image).parent().find('[name="' + e_name + '"]').val(id);
            $(this.image).parent().find('[name="' + e_name_src + '"]').val(src);
        }

    };
    options = $.extend(options, opts);
    var e_name = options.type == 'multiple' ? options.name + '[]' : options.name;
    var e_name_src = options.type == 'multiple' ? options.name + '_src[]' : options.name + '_src';
    $('<input>').attr({type: 'hidden', name: e_name}).insertAfter(options.image);
    $('<input>').attr({type: 'hidden', name: e_name_src}).insertAfter(options.image);

    $(this).on('click', function() {
        manager.attach(options);
        manager.open_popup();
    });
}

