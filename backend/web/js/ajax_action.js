function AjaxDeleteAction(opts) {
    // default configuration properties
    this.options = {
        element : '.delete-action',
    }; 

    //constructor
    this.init = function (opts) {
        this.options = $.extend(this.options, opts);
    };


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
                    that.error(result);
                    return false;
                } else {
                    that.success(result);
                    that.callback(result);
                }
                
            },
            complete: function() {
                that.options.is_loading = false;
            }
        });
    }

    this.init(opts);
}