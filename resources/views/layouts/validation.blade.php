<script>
    $(document).ready(function() {
		
		@if(Route::currentRouteName() == 'admin.login')
        // Login Validation
        $('#login_form').formValidation({
        //  live: 'disabled',
            message: 'This value is not valid',
            excluded: ':disabled', 
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'UserID is required'
                        },
                        
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Password is required'
                        }
                    }
                },
            }
        });
		@endif
		
		@if(Route::currentRouteName() == 'admin.forget_password')
        // Forgot Password Validation
        $('#fg_form').formValidation({
        //  live: 'disabled',
            message: 'This value is not valid',
            excluded: ':disabled', 
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Email is required'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'Enter valid email address'
                        }
                    }
                },              
            }
        });
		@endif
		
		@if(Route::currentRouteName() == 'admin.users')
        // User Validation
        $('#account_form').formValidation({
        //  live: 'disabled',
            message: 'This value is not valid',
            excluded: ':disabled', 
            fields: {
                account_role_id: {
                    validators: {
                        notEmpty: {
                            message: 'Role is required'
                        },
                    }
                },
                account_fullname: {
                    validators: {
                        notEmpty: {
                            message: 'Fullname is required'
                        },
                    }
                },
                account_email: {
                    validators: {
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'Enter valid email address'
                        },
                        remote: {
                            type: 'POST' ,
                            url: "{{ route('common.ajax.is_single') }}" ,
                            message: '{{ trans('master.users.account_email') }} already exists',
                            delay: 500,
                            data: function(validator) {
                            return { 
                                name: validator.getFieldElements('account_email').val(),
                                table: '{{ trans('db_table.db_users') }}',
                                column: 'account_email',
                                _token: currentToken()
                            };
                            }
                        }
                    }
                },
                account_mobile_no: {
                    validators: {
                        numeric: {
                            message: 'Mobile number should be numeric'
                        }
                    }
                },
                account_password: {
                    validators: {
                        notEmpty: {
                            message: 'Password is required'
                        },
                        stringLength: {
                            min: 8,
                            message: 'Password must be more than 8 characters long'
                        },
                    }
                },
                account_cpassword: {
                    validators: {
                        identical: {
                            field: 'account_password',
                            message: 'Password and its confirm are not the same'
                        },
                    }
                },	
            }
        });
		@endif

        @if(Route::currentRouteName() == 'admin.roleRule')
        // Role rule Validation
        $('#rr_form').formValidation({
        //  live: 'disabled',
            message: 'This value is not valid',
            excluded: ':disabled', 
            fields: {
                rr_name: {
                validators: {
                        notEmpty: {
                            message: '{{ trans('master.role_rule.rr_name') }} is required'
                        },
                        remote: {
                            type: 'POST' ,
                            url: "{{ route('common.ajax.is_single') }}" ,
                            message: '{{ trans('master.role_rule.rr_name') }} already exists',
                            delay: 500,
                            data: function(validator) {
                            return { 
                                name: validator.getFieldElements('rr_name').val(),
                                table: '{{ trans('db_table.db_role_rule') }}',
                                column: 'rr_name',
                                _token: currentToken()
                            };
                            }
                        }
                    }
                },
				
                rr_abbr: {
                    validators: {
                        notEmpty: {
                            message: '{{ trans('master.role_rule.rr_abbr') }} is required'
                        },
                        stringLength: {
                            max: 3,
                            message: '{{ trans('master.role_rule.rr_abbr') }} must be less than 3 characters long'
                        },
                        remote: {
                            type: 'POST' ,
                            url: "{{ route('common.ajax.is_single') }}" ,
                            message: '{{ trans('master.role_rule.rr_abbr') }} already exists',
                            delay: 500,
                            data: function(validator) {
                            return {
                                name: validator.getFieldElements('rr_abbr').val(),
                                table: '{{ trans('db_table.db_role_rule') }}',
                                column: 'rr_abbr',
                                _token: currentToken()
                            };
                            }
                        }
                    }
                },
                rr_description: {
                    validators: {
                        stringLength: {
                            min: 6,
                            message: '{{ trans('master.role_rule.rr_description') }} must be more than 6 characters long'
                        }
                    }
                }
            }
        });
        @endif

        @if(Route::currentRouteName() == 'admin.role_rule_edit')
        // Edit Role rule Validation
        $('#rr_form').formValidation({
        //  live: 'disabled',
            message: 'This value is not valid',
            excluded: ':disabled', 
            fields: {
                rr_name: {
                validators: {
                        notEmpty: {
                            message: '{{ trans('master.role_rule.rr_name') }} is required'
                        },
                        remote: {
                            type: 'POST' ,
                            url: "{{ route('common.ajax.is_single_only') }}" ,
                            message: '{{ trans('master.role_rule.rr_name') }} already exists',
                            delay: 500,
                            data: function(validator) {
                            return {
                                id: validator.getFieldElements('rr_id').val(),
                                name: validator.getFieldElements('rr_name').val(),
                                table: '{{ trans('db_table.db_role_rule') }}',
                                column1: 'rr_id',
                                column2: 'rr_name',
                                _token: currentToken()
                            };
                            }
                        }
                    }
                },
                rr_abbr: {
                    validators: {
                        notEmpty: {
                            message: '{{ trans('master.role_rule.rr_abbr') }} is required'
                        },
                        stringLength: {
                            max: 3,
                            message: '{{ trans('master.role_rule.rr_abbr') }} must be less than 3 characters long'
                        },
                        remote: {
                            type: 'POST' ,
                            url: "{{ route('common.ajax.is_single_only') }}" ,
                            message: '{{ trans('master.role_rule.rr_abbr') }} already exists',
                            delay: 500,
                            data: function(validator) {
                            return {
                                id: validator.getFieldElements('rr_id').val(),
                                name: validator.getFieldElements('rr_abbr').val(),
                                table: '{{ trans('db_table.db_role_rule') }}',
                                column1: 'rr_id',
                                column2: 'rr_abbr',
                                _token: currentToken()
                            };
                            }
                        }
                    }
                },
                rr_description: {
                    validators: {
                        stringLength: {
                            min: 6,
                            message: '{{ trans('master.role_rule.rr_description') }} must be more than 6 characters long'
                        }
                    }
                }
            }
        });
        @endif

        @if(Route::currentRouteName() == 'admin.role')
        // Role Validation
        $('#role_form').formValidation({
        //  live: 'disabled',
            message: 'This value is not valid',
            excluded: ':disabled', 
            fields: {
                role_rr_id: {
                    validators: {
                        notEmpty: {
                            message: '{{ trans('master.role.role_rr_id') }} is required'
                        }
                    }
                },
                
                role_name: {
                    validators: {
                        notEmpty: {
                            message: '{{ trans('master.role.role_name') }} is required'
                        },
                        remote: {
                            type: 'POST' ,
                            url: "{{ route('common.ajax.is_single') }}" ,
                            message: '{{ trans('master.role.role_name') }} already exists',
                            delay: 500,
                            data: function(validator) {
                            return {
                                name: validator.getFieldElements('role_name').val(),
                                table: '{{ trans('db_table.db_role') }}',
                                column: 'role_name',
                                _token: currentToken()
                            };
                            }
                        }
                    }
                },
                role_abbr: {
                    validators: {
                        notEmpty: {
                            message: '{{ trans('master.role.role_abbr') }} is required'
                        },
                        stringLength: {
                            max: 3,
                            message: '{{ trans('master.role.role_abbr') }} must be less than 3 characters long'
                        },
                        remote: {
                            type: 'POST' ,
                            url: "{{ route('common.ajax.is_single') }}" ,
                            message: '{{ trans('master.role.role_abbr') }} already exists',
                            delay: 500,
                            data: function(validator) {
                            return {
                                name: validator.getFieldElements('role_abbr').val(),
                                table: '{{ trans('db_table.db_role') }}',
                                column: 'role_abbr',
                                _token: currentToken()
                            };
                            }
                        }
                    }
                },
                role_description: {
                    validators: {
                        stringLength: {
                            min: 6,
                            message: '{{ trans('master.role.role_description') }} must be more than 6 characters long'
                        }
                    }
                }
            }
    });
   
    @endif

    @if(Route::currentRouteName() == 'admin.role_edit')
    // Edit Role Validation
    $('#role_form').formValidation({
        //  live: 'disabled',
            message: 'This value is not valid',
            excluded: ':disabled', 
            fields: {
                role_rr_id: {
                    validators: {
                        notEmpty: {
                            message: '{{ trans('master.role.role_rr_id') }} is required'
                        }
                    }
                },
                role_name: {
                validators: {
                        notEmpty: {
                            message: '{{ trans('master.role.role_name') }} is required'
                        },
                        remote: {
                            type: 'POST' ,
                            url: "{{ route('common.ajax.is_single_only') }}" ,
                            message: '{{ trans('master.role.role_name') }} already exists',
                            delay: 500,
                            data: function(validator) {
                            return {
                                id: validator.getFieldElements('role_id').val(),
                                name: validator.getFieldElements('role_name').val(),
                                table: '{{ trans('db_table.db_role') }}',
                                column1: 'role_id',
                                column2: 'role_name',
                                _token: currentToken()
                            };
                            }
                        }
                    }
                },
                role_abbr: {
                    validators: {
                        notEmpty: {
                            message: '{{ trans('master.role.role_abbr') }} is required'
                        },
                        stringLength: {
                            max: 3,
                            message: '{{ trans('master.role.role_abbr') }} must be less than 3 characters long'
                        },
                        remote: {
                            type: 'POST' ,
                            url: "{{ route('common.ajax.is_single_only') }}" ,
                            message: '{{ trans('master.role.role_abbr') }} already exists',
                            delay: 500,
                            data: function(validator) {
                            return {
                                id: validator.getFieldElements('role_id').val(),
                                name: validator.getFieldElements('role_abbr').val(),
                                table: '{{ trans('db_table.db_role') }}',
                                column1: 'role_id',
                                column2: 'role_abbr',
                                _token: currentToken()
                            };
                            }
                        }
                    }
                },
                role_description: {
                    validators: {
                        stringLength: {
                            min: 6,
                            message: '{{ trans('master.role.role_description') }} must be more than 6 characters long'
                        }
                    }
                }
            }
        });
        @endif

        @if(Route::currentRouteName() == 'admin.permission')
        // Permission Validation
        $('#permission_form').formValidation({
        //  live: 'disabled',
            message: 'This value is not valid',
            excluded: ':disabled', 
            fields: {
                permission_name: {
                validators: {
                        notEmpty: {
                            message: '{{ trans('master.permission.permission_name') }} is required'
                        },
                        remote: {
                            type: 'POST' ,
                            url: "{{ route('common.ajax.is_single') }}" ,
                            message: '{{ trans('master.permission.permission_name') }} already exists',
                            delay: 500,
                            data: function(validator) {
                            return {
                                name: validator.getFieldElements('permission_name').val(),
                                table: '{{ trans('db_table.db_permission') }}',
                                column: 'permission_name',
                                _token: currentToken()
                            };
                            }
                        }
                    }
                },
                permission_abbr: {
                    validators: {
                        notEmpty: {
                            message: '{{ trans('master.permission.permission_abbr') }} is required'
                        },
                        stringLength: {
                            max: 3,
                            message: '{{ trans('master.permission.permission_abbr') }} must be less than 3 characters long'
                        },
                        remote: {
                            type: 'POST' ,
                            url: "{{ route('common.ajax.is_single') }}" ,
                            message: '{{ trans('master.permission.permission_abbr') }} already exists',
                            delay: 500,
                            data: function(validator) {
                            return {
                                name: validator.getFieldElements('permission_abbr').val(),
                                table: '{{ trans('db_table.db_permission') }}',
                                column: 'permission_abbr',
                                _token: currentToken()
                            };
                            }
                        }
                    }
                },
                permission_description: {
                    validators: {
                        stringLength: {
                            min: 6,
                            message: '{{ trans('master.permission.permission_description') }} must be more than 6 characters long'
                        }
                    }
                }
            }
        });
        @endif
        
        @if(Route::currentRouteName() == 'admin.permission_edit')
        // Edit Permission Validation
        $('#permission_form').formValidation({
        //  live: 'disabled',
            message: 'This value is not valid',
            excluded: ':disabled', 
            fields: {
                permission_name: {
                validators: {
                        notEmpty: {
                            message: '{{ trans('master.permission.permission_name') }} is required'
                        },
                        remote: {
                            type: 'POST' ,
                            url: "{{ route('common.ajax.is_single_only') }}" ,
                            message: '{{ trans('master.permission.permission_name') }} already exists',
                            delay: 500,
                            data: function(validator) {
                            return {
                                id: validator.getFieldElements('permission_id').val(),
                                name: validator.getFieldElements('permission_name').val(),
                                table: '{{ trans('db_table.db_permission') }}',
                                column1: 'permission_id',
                                column2: 'permission_name',
                                _token: currentToken()
                            };
                            }
                        }
                    }
                },
                permission_abbr: {
                    validators: {
                        notEmpty: {
                            message: '{{ trans('master.permission.permission_abbr') }} is required'
                        },
                        stringLength: {
                            max: 3,
                            message: '{{ trans('master.permission.permission_abbr') }} must be less than 3 characters long'
                        },
                        remote: {
                            type: 'POST' ,
                            url: "{{ route('common.ajax.is_single_only') }}" ,
                            message: '{{ trans('master.permission.permission_abbr') }} already exists',
                            delay: 500,
                            data: function(validator) {
                            return {
                                id: validator.getFieldElements('permission_id').val(),
                                name: validator.getFieldElements('permission_abbr').val(),
                                table: '{{ trans('db_table.db_permission') }}',
                                column1: 'permission_id',
                                column2: 'permission_abbr',
                                _token: currentToken()
                            };
                            }
                        }
                    }
                },
                permission_description: {
                    validators: {
                        stringLength: {
                            min: 6,
                            message: '{{ trans('master.permission.permission_description') }} must be more than 6 characters long'
                        }
                    }
                }
            }
        });
        @endif

        @if(Route::currentRouteName() == 'admin.role_permission')
        // Role Permission Validation 
        $('#rrp_form').formValidation({
        //  live: 'disabled',
            message: 'This value is not valid',
            excluded: ':disabled', 
            fields: {
                rrp_role_id: {
                    validators: {
                        notEmpty: {
                            message: '{{ trans('master.role_permission.rrp_role_id') }} is required'
                        }
                    }
                },
                'rrp_permission_id[]': {
                    validators: {
                        notEmpty: {
                            message: '{{ trans('master.role_permission.rrp_permission_id') }} is required'
                        }
                    }
                }
            }
        });
        @endif
		
		@if(Route::currentRouteName() == 'admin.message_template')
        // MessageTemplate Validation
        $('#mt_form').formValidation({
        //  live: 'disabled',
            message: 'This value is not valid',
            excluded: ':disabled', 
            fields: {
                mt_title: {
                validators: {
                        notEmpty: {
                            message: '{{ trans('master.message_template.mt_title') }} is required'
                        },
                        remote: {
                            type: 'POST' ,
                            url: "{{ route('common.ajax.is_single') }}" ,
                            message: '{{ trans('master.message_template.mt_title') }} already exists',
                            delay: 500,
                            data: function(validator) {
                            return { 
                                name: validator.getFieldElements('mt_title').val(),
                                table: '{{ trans('db_table.db_message_template') }}',
                                column: 'mt_title',
                                _token: currentToken()
                            };
                            }
                        }
                    }
                },              
            }
        });
        @endif

        @if(Route::currentRouteName() == 'admin.message_template_edit')
        // Edit MessageTemplate Validation
        $('#mt_form').formValidation({
        //  live: 'disabled',
            message: 'This value is not valid',
            excluded: ':disabled', 
            fields: {
                mt_title: {
                validators: {
                        notEmpty: {
                            message: '{{ trans('master.message_template.mt_title') }} is required'
                        },                     
                    }
                },               
            }
        });
        @endif
		
		
		@if(Route::currentRouteName() == 'admin.settings')
        // Settings Validation
        $('#setting_form').formValidation({
        //  live: 'disabled',
            message: 'This value is not valid',
            excluded: ':disabled', 
            fields: {
                setting_name: {
                validators: {
                        notEmpty: {
                            message: '{{ trans('master.settings.setting_name') }} is required'
                        },
                        remote: {
                            type: 'POST' ,
                            url: "{{ route('common.ajax.is_single') }}" ,
                            message: '{{ trans('master.settings.setting_name') }} already exists',
                            delay: 500,
                            data: function(validator) {
                            return { 
                                name: validator.getFieldElements('setting_name').val(),
                                table: '{{ trans('db_table.db_settings') }}',
                                column: 'setting_name',
                                _token: currentToken()
                            };
                            }
                        }
                    }
                },
                setting_content: {
                    validators: {
                        notEmpty: {
                            message: '{{ trans('master.settings.setting_content') }} is required'
                        },                                        
                    }
                },
                setting_description: {
                    validators: {
                        stringLength: {
                            min: 6,
                            message: '{{ trans('master.settings.setting_description') }} must be more than 6 characters long'
                        }
                    }
                }
            }
        });
        @endif

        @if(Route::currentRouteName() == 'admin.settings_edit')
        // Edit Settings Validation
        $('#setting_form').formValidation({
        //  live: 'disabled',
            message: 'This value is not valid',
            excluded: ':disabled', 
            fields: {
                setting_name: {
                validators: {
                        notEmpty: {
                            message: '{{ trans('master.settings.setting_name') }} is required'
                        },
                        
                    }
                },
                setting_content: {
                    validators: {
                        notEmpty: {
                            message: '{{ trans('master.settings.setting_content') }} is required'
                        },                                           
                    }
                },
                setting_description: {
                    validators: {
                        stringLength: {
                            min: 6,
                            message: '{{ trans('master.settings.setting_description') }} must be more than 6 characters long'
                        }
                    }
                }
            }
        });
        @endif
		
		


});
</script>