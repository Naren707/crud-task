<script>

	/* Check all checkbox in the grid list */
	function check_all(mid,cid,count,tid)
	{
		var d = document.getElementById(cid);
		var c = d.checked;
		if(c)   
		{
			for(var i=1; i<=count; i++)
			{
				$('#'+tid+i).prop('checked', true); 
			}
		}
		else
		{
			for(var i=1; i<=count; i++)
			{
				$('#'+tid+i).prop('checked', false);
			}
		}
		$.uniform.update();
	}

	/* Change all checked status at once */
	function change_status_all(name,count,t_id,status,table,column1,column2)
	{  
		console.log(name,count,t_id,status,table,column1,column2);
		var words = "Are you sure want to change all checked "+name+" status, are you sure want to continue";
		bootbox.confirm(words, function(result) {
					
		if(result) 
			{
			var k=1;
			var all_id = new Array();
			
			for(var j=1;j<=count;j++)
			{
				var checkid = t_id+j;
				var d_all = document.getElementById(checkid);
				var c_all = d_all.checked;
				if(c_all)
				{
					all_id[k] = document.getElementById(checkid).value;
					k++;
				}
				else
				{

				}
			}
			var log;
			for(var p=1;p<=k;p++)
			{
				if(all_id[p] == "")
					{
						log = "1";
					}
			}
			if(log == "1")
			{
				//notify('error', '', "Something went wrong");
				$.growl.notice({
							message:  'Something went wrong',
							location: 'tr'
						});
			}
			else if(k == 1)
			{
				//notify('warning', '', "No "+name+" Selected");
				$.growl.error({
					message:  "No "+name+" Selected",
					location: 'tr'
				});
			}
			else
			{
				// call an AJAX request
				$.ajax({
					type: "POST",
					url: "{{ route('common.ajax.status_all') }}",
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },	
					data: {_token:currentToken(), k:k, all_id:all_id, status:status, table:table, column1:column1, column2:column2},
					beforeSend: function() {
					},
					success: function(msg) {
						if(msg)
						{
							//notify('success', '', name + " " + msg);
							$.growl.notice({
								message:  name + " " + msg,
								location: 'tr'
							});
						}
						else
						{
							//notify('error', '', "No Changes Made for " + name);
							$.growl.error({
								message:  "No Changes Made for " + name,
								location: 'tr'
							});
						}
					},
					complete: function() {
						setTimeout(function(){location.reload();},1500);
					}
				});
			}
		}
		});
	}
	/* Change all checked status at once */

	/* Delete all details at once */
	function delete_all(name,count,t_id,table,column)

	{ 
		var words = "Delete checked "+name+" will delete all the related details, are you sure want to continue";
		bootbox.confirm(words, function(result) {
			if(result)
			{
				var k=1;
				var all_id = new Array();

				for(var j=1;j<=count;j++)
				{
					var checkid = t_id+j;
					var d_all = document.getElementById(checkid);
					var c_all = d_all.checked;
					if(c_all)
					{
						all_id[k] = document.getElementById(checkid).value;
						k++;
					}
				}

				var log;
				for(var p=1;p<=k;p++)
				{
					if(all_id[p] == "")
					{
						log = "1";
					}
				}

				if(log == "1")
				{
					//notify('error', '', "Something went wrong");
					$.growl.error({
						message:  "Something went wrong",
						location: 'tr'
					});
				}
				else if(k == 1)
				{
					//notify('warning', '', "No "+name+" Selected");
					$.growl.error({
						message:  "No "+name+" Selected",
						location: 'tr'
					});
				}
				else
				{
					// call an AJAX request
					$.ajax({
						type: "POST",
						url: "{{ route('common.ajax.delete_all') }}",	
						data: { _token:currentToken(), k:k, all_id:all_id, table:table, column:column},
						beforeSend: function() {
						},
						success: function(msg) {
							if(msg)
							{
								//notify('success', '', name+" "+msg);
								$.growl.notice({
									message:  name + " " + msg,
									location: 'tr'
								});
							}
							else
							{
								//notify('error', '', "Failed to delete "+name);
								$.growl.notice({
									message:  "Failed to delete "+name,
									location: 'tr'
								});
							}
						},
						complete: function() {
							setTimeout(function(){location.reload();},1500);
						}
					});
				}
			}
		});
	}
	/* Delete all details at once */

	/* Change Status */
	function change_status(e, table, ajax_column, ajax_id, ajax_status, row_no)
	{
		if(table != '' && ajax_column != '' && ajax_id != '' && ajax_status != '')
		{
			var check = $(e).is(":checked");
			check = (check) ? 1 : 0;
			var status = $(e).data("status");
			if(status != check) {
				// call an AJAX request
				$.ajax({
					type: "POST",
					url: '{{ route('common.ajax.status') }}',	
					data: { _token:currentToken(), table:table, ajax_column:ajax_column, ajax_id:ajax_id, ajax_status:ajax_status, check:check},
					dataType: 'json',
					beforeSend: function() {
					},
					success: function(response) {
						$(e).data("status", check);
						$("#edit_btn"+row_no).data("status", check);
						$.growl.notice({
							message:  'Status Changed Successfully',
							location: 'tr'
						});
					},
					complete: function() {
					}
				});
			}
		}
	}
	/* End of Change Status */

	/* Delete Master */
	function master_delete(table_name,column,value,title)
	{ 
		if(table_name != '' && column != '' && value != '' && title != '')
		{
			var words = "Delete "+title+" will delete all the related details, are you sure want to continue";
			bootbox.confirm(words, function(result) {		
				if(result)
				{
					// call an AJAX request
					$.ajax({
					type: "POST",
					url: '{{ route('common.ajax.delete') }}',	
					data: { _token:currentToken(), table_name:table_name, column:column, value:value, title:title},
					dataType: 'json',
					beforeSend: function() {
					},
					success: function(response) {
						if(response.errors == '')
						{
							//notify('success', '', title + " " + response.message);
							$.growl.notice({
							message:  title + " " + response.message,
							location: 'tr'
							});
						}
						else
						{

							//notify('error', '', "Failed to delete " + title);
							$.growl.error({
								message:  "Failed to delete " + title,
								location: 'tr'
							});
						}
					},
					complete: function() {
						setTimeout(function(){location.reload();},1500);
					}
					});
				}
			});
		}
	}
	/* End of Delete Master */

	/* View Master */
	/* Modal ID, Controller function URL, WHere Column name, Where Column value */
	function master_view(modal_id,controller_url,value)
	{	 console.log(modal_id,controller_url,value);
		try 
		{
			if(modal_id && controller_url &&  value)
			{
				// call an AJAX request
				$.ajax({
					type: 'POST',
					url: controller_url,
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },        
					data: { column_value:value},
					dataType: 'json',
					beforeSend: function() {
						//call loading image indicator here 
						$.blockUI({ message: 'Please Wait !!', css: { padding: '15px' }});
					},
					success: function(response) {
						if(response.error == '') 
						{ 
							//do when success AJAX called successfully
							$(modal_id+' .modal-body').html(response.message);
							$(modal_id).modal('show');
							$('.view_datatable').DataTable({
								"dom": 'lCfrtip',
								"order": [[1, 'asc']],
								"colVis": {
									"buttonText": "Columns",
									"overlayFade": 0,
									"align": "right"
								},
								"paging":         false,
								"language": {
									"lengthMenu": '_MENU_ entries per page',
									"search": '<i class="fa fa-search"></i>',
									"paginate": {
										"previous": '<i class="fa fa-angle-left"></i>',
										"next": '<i class="fa fa-angle-right"></i>'
									}
								},
								"tableTools": {
								"sSwfPath": $('.view_datatable').data('swftools')
								}
							});
							
							$('.checkbox-styled input, .radio-styled input').each(function () {
								if ($(this).next('span').length === 0) {
									$(this).after('<span></span>');
								}
							});
							
							$('[data-toggle="tooltip"]').tooltip({container: 'body'});
						}
						else
						{
							notify(response.error);
							$.unblockUI();
						}
					},
					complete: function() {
						//call function to hide loading image indicator here
						$.unblockUI();
					}
				});
			}
			else
			{
				notify("Enough values required!");
				throw "Enough values required!";
			}
		}
		catch(e)
		{
			console.log(e);
		}
	}
	/* End of View Master */

	@if(Route::currentRouteName() == 'admin.role_permission')
		function load_unassigned_list(role_id) 
		{
			if(role_id)
			{
				// call an AJAX request
				$.ajax({
					type: "POST",
					url: "{{ route('admin.role_permission.load_unassigned_permission_list') }}",	
					data: { _token:currentToken(), role_id:role_id },
					beforeSend: function() {
					},
					success: function(response) {
						if(response.error == '')
						{
							//do when success AJAX called successfully
							$("#rrp_permission_id").html(response.message);
							$("#rrp_permission_id").select2();
						}
						else
						{
							//notify('error', '' ,response.error);
							$.growl.error({
								message:  response.error,
								location: 'tr'
							});
							$("#rrp_permission_id").html('');
							$("#rrp_permission_id").select2();
						}
					},
					complete: function() {
						//call function to hide loading image indicator here
					}
				});
			}
		}
	@endif

	function change_order_status(value, order_id) 
	{  
		if(value && order_id)
		{
			// call an AJAX request
			$.ajax({
				type: "POST",
				url: "{{ route('admin.change_order_status') }}",	
				data: { _token:currentToken(), value:value, order_id:order_id },
				beforeSend: function() {
				},
				success: function(response) {
					if(response.error == '') 
					{
						//do when success AJAX called successfully
						//notify('success', '' ,'Order status changed successfully');
						$.growl.notice({
							message:  "Order status changed successfully",
							location: 'tr'
						});
					}
					else
					{
						//notify('error', '' ,response.error);
						$.growl.error({
							message:  response.error,
							location: 'tr'
						});
					}
				},
				complete: function() {
					//call function to hide loading image indicator here
                    // setTimeout(function(){// wait for 5 secs(2)
                    //     location.reload(); // then reload the page.(3)
                    // }, 1500); 
				}
			});
		}
		else{
			//notify('error', '' , 'Select any Order Status');
			$.growl.error({
				message:  'Select any order status',
				location: 'tr'
			});
		}
	}
	


</script>