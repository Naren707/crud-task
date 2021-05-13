<script>
    var appPlugins = {
        // Initialize
        _init: function() {
            //this.select2_picker();
            //this.select2_tags();
            //this.duallistbox();
            //this.future_date_picker();
            //this.date_picker();
			//this.pickadate();
            //this.year_picker();
            //this.future_datetime_picker();
            //this.datetime_picker();
            //this.time_picker();
            //this.multi_select();
            //this.summer_note();
            //this.datatable_extend();
            //this.data_table();
            //this.data_table_export();
            //this.native_data_table();
            //this.custom_datatable();
            //this.datatable_tools();
            //this.switchery();
           // this.bootstrapSwitch();
           // this.uniformRadioCheckbox();
           // this.daterange_picker();
        },

		// Date Range Picker
		daterange_picker: function(selector = '.daterange_picker') {
			$(selector).daterangepicker({
				locale: {
					format: 'DD-MM-YYYY'
				},
				ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				}
			});
		},

        //Switchery
        switchery: function() {
            // Initialize multiple switches
            if (Array.prototype.forEach) {
                var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
                elems.forEach(function(html) {
                    var switchery = new Switchery(html);
                });
            }
            else {
                var elems = document.querySelectorAll('.switchery');
                for (var i = 0; i < elems.length; i++) {
                    var switchery = new Switchery(elems[i]);
                }
            }
        },



        // Select2 Picker
        select2_picker: function(selector = '.select2_picker') {
            $(selector).select2({
				allowClear: true
			});
        },

		// Select2 Picker
        select2_picker_refresh: function(selector = '.select2_picker') {
            $(selector).select2('destroy');
			appPlugins.select2_picker(selector);
        },

        // Bootstrap switch
        bootstrapSwitch: function(selector = '.switch') {
            $(selector).bootstrapSwitch();
        },

        uniformRadioCheckbox: function(selector = '.styled, .multiselect-container input') {
            $(selector).uniform({
                radioClass: 'choice'
            });
        },

        // Select2 Tags
        select2_tags: function(selector = '.select2_tags') {
            $(selector).select2({ tags: true, allowClear: true,  tokenSeparators: ['/',',',';'," "] });
        },

        // Duallistbox
        duallistbox: function(selector = '.duallistbox') {
            $(selector).bootstrapDualListbox({
                nonSelectedListLabel: 'Non-selected',
                selectedListLabel: 'Selected',
                preserveSelectionOnMove: 'moved',
                moveOnSelect: false,
            });
        },

        // Yearpicker
        year_picker: function(selector = '.year_picker') {
            $(selector).datepicker({ autoclose: true, format: 'yyyy', viewMode: 'years', minViewMode: "years",startDate: "1900", endDate: "today" });
        },

        // Datepicker
        date_picker: function(selector = '.date_picker') {
            $(selector).datepicker({ autoclose: true, format: 'dd-mm-yyyy', clearBtn: true });
        },

        // Datepicker
        pickadate: function(selector = '.pickadate') {
            $(selector).pickadate({
				format: 'dd-mm-yyyy',
			});
        },

        // Datepicker
        future_date_picker: function(selector = '.future_date_picker') {
            $(selector).datepicker({ autoclose: true, format: 'dd-mm-yyyy', endDate: "today", clearBtn: true });
        },

		// Future Datetime Picker
        future_datetime_picker: function(selector = '.future_datetime_picker') {
            $(selector).datetimepicker({ format: 'DD-MM-YYYY hh:mm A', minDate: moment(), stepping: 5, showClear: true, widgetPositioning:{ horizontal: 'auto',
            vertical: 'bottom' }  });

			$(selector).on('dp.change', function(e){
				if( !e.oldDate || !e.date.isSame(e.oldDate, 'day')){
					$(this).data('DateTimePicker').hide();
				}
			});
        },

        // Datetime Picker
        datetime_picker: function(selector = '.datetime_picker') {
            $(selector).datetimepicker({ format: 'DD-MM-YYYY hh:mm A', showClear: true, widgetPositioning:{ horizontal: 'auto',
            vertical: 'bottom' }  });
        },

        // Time Picker
        time_picker: function(selector = '.time_picker') {
            $(selector).datetimepicker({ format: 'hh:mm A' });
        },

        // Multiselect
        multi_select: function(selector = '.multi_select') {
            $(selector).multiSelect({
                selectableOptgroup: true,
                selectableHeader: "<div class=''>Selectable items</div>",
                selectionHeader: "<div class=''>Selection items</div>",
            });
        },

        datatable_extend: function() {
            // Setting datatable defaults
            $.extend( $.fn.dataTable.defaults, {
                autoWidth: false,
                columnDefs: [{
                    orderable: false,
                    width: '100px',
                    targets: [ 5 ]
                }],
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                },
                drawCallback: function () {
                    $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
                },
                preDrawCallback: function() {
                    $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
                }
            });
        },

        // Custom DataTable
        native_data_table: function(selector = '.native_data_table') {
            $(selector).dataTable({
				"paging": true,
               // "order": [[ 1, "asc" ]],
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ 0 ] }
                ]
			});
        },

        // Custom DataTable
        custom_datatable: function(selector = '.datatable') {
            $(selector).dataTable({
                "paging": false,
               // "order": [[ 1, "asc" ]],
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ 0 ] }
                ]
            });
        },

        // DataTable
        data_table: function(selector = '.data_table') {

            $(selector).dataTable({
                "paging": false,
                //"order": [[ 1, "asc" ]],
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ 0 ] }
                ]
            });
        },

        // DataTable Export
        data_table_export: function(selector = '.data_table_export') {

            $(selector).dataTable({
                "paging": false,
				dom: 'Bfrtip',
				buttons: [
					'excel',
					{
						extend: 'pdfHtml5',
						orientation: 'landscape',
						pageSize: 'LEGAL'
					}
				]
            });

			$("div.dt-buttons a").prepend('Download as ');
        },

        // Datatable tools
        datatable_tools: function() {
             // Add placeholder to the datatable filter option
            $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');

            // Enable Select2 select for the length option
            $('.dataTables_length select').select2({
                minimumResultsForSearch: "-1"
            });
        },

        // Summernote
        summer_note: function(selector = '.summer_note') {
            $(selector).summernote({
                height: 200,
                onfocus: function(e) {
                    $('body').addClass('overlay-disabled');
                },
                onblur: function(e) {
                    $('body').removeClass('overlay-disabled');
                }
            });
        },

		// Summernote Picker
        summer_note_refresh: function(selector = '.summer_note') {
            $(selector).summernote('destroy');
			appPlugins.summer_note(selector);
        },
    };

    // Initialize Plugins
    appPlugins._init();

	// Base64 Encode & Decode
	var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9+/=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/rn/g,"n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}

    /** Start : Check is Number **/
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    $('.is_number_greaterthan_zero').keypress(function(e) {
        if (this.value.length == 0 && e.which == 48 ){
            return false;
        }
        else if (e.which != 46 && e.which > 31
        && (e.which < 48 || e.which > 57))
        {
            return false;
        }
        return true;
    });

    function isNumber_isDecimalKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }

    function isNumber_isDecimalKey_both(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 45 && charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
    /** End : Check is Number **/

	function notify(ntype = 'info', ntitle = '', ntext = '') {
		new PNotify({
            title: ntitle,
            text: ntext,
            type: ntype
        });
	}

	function createCookie(name, value, days) {
		var expires;

		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toGMTString();
		} else {
			expires = "";
		}
		document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
	}

	function readCookie(name) {
		var nameEQ = encodeURIComponent(name) + "=";
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) === ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
		}
		return null;
	}

	function eraseCookie(name) {
		createCookie(name, "", -1);
	}

    $('[type="reset"]').click(function(){
        $('form').data('formValidation').resetForm();
    });

	/* smooth scroll */
	$('a[href^="#"]').on('click',function (e) {
		e.preventDefault();

		var target = this.hash;
		var $target = $(target);
		if($target.length > 0)
		{
			$('html, body').stop().animate({
				'scrollTop': ($target.offset().top - 70)
			}, 500, 'swing');
		}
	});



	$('img').on('dragstart', function(event) { event.preventDefault(); });

	String.prototype.ucFirst = function() {
		return this.charAt(0).toUpperCase() + this.slice(1);
	}

	String.prototype.ucWords = function() {
		return (this + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
			return $1.toUpperCase();
		});
	}

</script>

<script>
	$(document).ready(function() {
        // Fields Dynamic Form Elements & Task Request Resource
		$('.commonFieldAddButton').on('click', function() {
			var block_id = $(this).data("parent");
            var index = $(this).data('index');
			var parent_form_id = $(this).closest("form").attr("id");
			var form_id = parent_form_id+' #'+block_id;

			/* Get custom fields for form validation */
			var field1 = $('#'+form_id+' #field1').val();
			var field2 = $('#'+form_id+' #field2').val();
			var field3 = $('#'+form_id+' #field3').val();
			var field4 = $('#'+form_id+' #field4').val();
			var field5 = $('#'+form_id+' #field5').val();
			var field6 = $('#'+form_id+' #field6').val();
			var field7 = $('#'+form_id+' #field7').val();
			var field8 = $('#'+form_id+' #field8').val();
			var field9 = $('#'+form_id+' #field9').val();
			var field10 = $('#'+form_id+' #field10').val();
			/* Get custom fields for form validation */

            index = parseInt(index) + 1;

            $(this).data('index', index);

			var template     = $(this).attr('data-template'),
                $templateEle = $('#' + template + 'Template'),
                $row         = $templateEle.clone().removeAttr('id').insertBefore($templateEle).removeClass('hide').addClass('dyn_grid').attr('id','dyn_grid_'+index).attr('data-sno',index),
				check		 = $row.find('div.form-group').each(function() {
					if($(this).hasClass('has-error') || $(this).hasClass('has-success')) { $(this).removeClass('has-error'); $(this).removeClass('has-success'); } }),
				$id1         = $row.find('[id="'+field1+'"]').eq(0).attr({'id': field1 + '_' + index, 'name': field1 + '[]'}),
				$id2         = $row.find('[id="'+field2+'"]').eq(0).attr({'id': field2 + '_' + index, 'name': field2 + '[]'}),
				$id3         = $row.find('[id="'+field3+'"]').eq(0).attr({'id': field3 + '_' + index, 'name': field3 + '[]'}),
				$id4         = $row.find('[id="'+field4+'"]').eq(0).attr({'id': field4 + '_' + index, 'name': field4 + '[]'}),
				$id5         = $row.find('[id="'+field5+'"]').eq(0).attr({'id': field5 + '_' + index, 'name': field5 + '[]'}),
				$id6         = $row.find('[id="'+field6+'"]').eq(0).attr({'id': field6 + '_' + index, 'name': field6 + '[]'}),
				$id7         = $row.find('[id="'+field7+'"]').eq(0).attr({'id': field7 + '_' + index, 'name': field7 + '[]'}),
				$id8         = $row.find('[id="'+field8+'"]').eq(0).attr({'id': field8 + '_' + index, 'name': field8 + '[]'}),
				$id9         = $row.find('[id="'+field9+'"]').eq(0).attr({'id': field9 + '_' + index, 'name': field9 + '[]'}),
				$id10        = $row.find('[id="'+field10+'"]').eq(0).attr({'id': field10 + '_' + index, 'name': field10 + '[]'}),
				setIndex     = $row.find('[id="'+field1+'_'+index+'"]').eq(0).attr('value', index);

				/* $select2_picker  = $row.find('[data-plugin="select2_picker"]').select2({

				});
				$select2_tags  = $row.find('[data-plugin="select2_tags"]').select2({ tags: true });
				$datepicker  = $row.find('[data-plugin="datepicker"]').datepicker({ format: 'dd-mm-yyyy', clearBtn: true, autoclose: true, keyboardNavigation: true }).on('changeDate', function(e) { // Revalidate the date field
					$('form').formValidation('revalidateField', field5+'[]');
				}); */
				var sno = parseInt(index) - 1;

				$.each($row.find('[data-isMultipleIndex="1"]'), function(k,v) {
					$(this).val(sno);
				});
				$.each($row.find('[data-isMultiple="1"]'), function(k,v) {
					var cur_name = $(v).attr('name');
					cur_name = cur_name.replace("[]", "["+sno+"]");
					$(this).attr('name',cur_name+"[]");
				});

				if($("#"+field1).attr('type') != 'hidden')
				{
					$('#'+parent_form_id).formValidation('addField', field1 + '[]' );
				}
				$('#'+parent_form_id).formValidation('addField', field2 + '[]' );
				$('#'+parent_form_id).formValidation('addField', field3 + '[]' );
				$('#'+parent_form_id).formValidation('addField', field4 + '[]' );
				$('#'+parent_form_id).formValidation('addField', field5 + '[]' );
				$('#'+parent_form_id).formValidation('addField', field6 + '[]' );
				$('#'+parent_form_id).formValidation('addField', field7 + '[]' );
				$('#'+parent_form_id).formValidation('addField', field8 + '[]' );
				$('#'+parent_form_id).formValidation('addField', field9 + '[]' );
				$('#'+parent_form_id).formValidation('addField', field10 + '[]' );

				$("body").tooltip({ selector: '[data-toggle=tooltip]' });

            $row.on('click', '.commonFieldRemoveButton', function(e) {
				if($("#"+field1).attr('type') != 'hidden')
				{
					$('#'+parent_form_id).formValidation('removeField', field1 + '[]' );
				}
				$('#'+parent_form_id).formValidation('removeField', field2 + '[]' );
				$('#'+parent_form_id).formValidation('removeField', field3 + '[]' );
				if($("#"+field4).attr('type') != 'hidden')
				{
					$('#'+parent_form_id).formValidation('removeField', field4 + '[]' );
				}
				if($("#"+field5).attr('type') != 'hidden')
				{
					$('#'+parent_form_id).formValidation('removeField', field5 + '[]' );
				}
				$('#'+parent_form_id).formValidation('removeField', field6 + '[]' );
				$('#'+parent_form_id).formValidation('removeField', field7 + '[]' );
				$('#'+parent_form_id).formValidation('removeField', field8 + '[]' );
				$('#'+parent_form_id).formValidation('removeField', field9 + '[]' );
				$('#'+parent_form_id).formValidation('removeField', field10 + '[]' );

				$row.remove();
            });
        });


		// Remove @ Edit
		$('.eCommonFieldRemoveButton').on('click',function() {

			var parent_form_id = $(this).closest("form").attr("id"),
				$row = $(this).closest("div.row.dyn_grid"),
				block_id = $(this).closest("div.row.dyn_grid").parent().attr('id');
			var form_id = parent_form_id+' #'+block_id;

			/* Get custom fields for form validation */
			var field1 = $('#'+form_id+' #field1').val();
			var field2 = $('#'+form_id+' #field2').val();
			var field3 = $('#'+form_id+' #field3').val();
			var field4 = $('#'+form_id+' #field4').val();
			var field5 = $('#'+form_id+' #field5').val();
			var field6 = $('#'+form_id+' #field6').val();
			var field7 = $('#'+form_id+' #field7').val();
			var field8 = $('#'+form_id+' #field8').val();
			var field9 = $('#'+form_id+' #field9').val();
			var field10 = $('#'+form_id+' #field10').val();
			/* Get custom fields for form validation */

			if($("#"+field1).attr('type') != 'hidden')
			{
				$('form').formValidation('addField', $row.find('[name="'+ field1 + '[]"]' ));
				$('form').formValidation('removeField', $row.find('[name="'+ field1 + '[]"]' ));
			}
			if($("#"+field2).attr('type') != 'hidden')
			{
				$('form').formValidation('addField', $row.find('[name="'+ field2 + '[]"]' ));
				$('form').formValidation('removeField', $row.find('[name="'+ field2 + '[]"]' ));
			}
			if($("#"+field3).attr('type') != 'hidden')
			{
				$('form').formValidation('addField', $row.find('[name="'+ field3 + '[]"]' ));
				$('form').formValidation('removeField', $row.find('[name="'+ field3 + '[]"]' ));
			}
			if($("#"+field4).attr('type') != 'hidden')
			{
				$('form').formValidation('addField', $row.find('[name="'+ field4 + '[]"]' ));
				$('form').formValidation('removeField', $row.find('[name="'+ field4 + '[]"]' ));
			}
			if($("#"+field5).attr('type') != 'hidden')
			{
				$('form').formValidation('addField', $row.find('[name="'+ field5 + '[]"]' ));
				$('form').formValidation('removeField', $row.find('[name="'+ field5 + '[]"]' ));
			}
			if($("#"+field6).attr('type') != 'hidden')
			{
				$('form').formValidation('addField', $row.find('[name="'+ field6 + '[]"]' ));
				$('form').formValidation('removeField', $row.find('[name="'+ field6 + '[]"]' ));
			}
			if($("#"+field7).attr('type') != 'hidden')
			{
				$('form').formValidation('addField', $row.find('[name="'+ field7 + '[]"]' ));
				$('form').formValidation('removeField', $row.find('[name="'+ field7 + '[]"]' ));
			}
			if($("#"+field8).attr('type') != 'hidden')
			{
				$('form').formValidation('addField', $row.find('[name="'+ field8 + '[]"]' ));
				$('form').formValidation('removeField', $row.find('[name="'+ field8 + '[]"]' ));
			}
			if($("#"+field9).attr('type') != 'hidden')
			{
				$('form').formValidation('addField', $row.find('[name="'+ field9 + '[]"]' ));
				$('form').formValidation('removeField', $row.find('[name="'+ field9 + '[]"]' ));
			}
			if($("#"+field10).attr('type') != 'hidden')
			{
				$('form').formValidation('addField', $row.find('[name="'+ field10 + '[]"]' ));
				$('form').formValidation('removeField', $row.find('[name="'+ field10 + '[]"]' ));
			}

			$row.remove();
		});
    });
</script>



<script>

	function load_product_specification(cat_id, target_id)
        {
            if(cat_id && target_id)
            {
                //call ajax request
                $.ajax({
				type: "POST",
				url: "{{ route('admin.load_product_spec') }}",
				data: { _token:currentToken(), cat_id:cat_id },
				beforeSend: function() {
				},
				success: function(response) {
					if(response.error == '')
					{
						//do when success AJAX called successfully
						$(target_id).html(response.message);
                        $(".select2_picker").select2();


					}
					else
					{
						$.growl.error({
							message:  response.error,
							location: 'tr'
						});
					}
				},
				complete: function() {
					//call function to hide loading image indicator here
				}
			});
            }
            else{
                notify('error', '' , 'Select Any Category');
            }
        }



</script>
<!-- Custom Scripts -->
