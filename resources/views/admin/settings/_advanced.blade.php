<div class="sub-section">
    <div class="row">
        <div class="col-md-12">
            <div class="scrollbar-boxx dim-box">
                <div class="ui-sortable">
                    <div class="pml-table-container">
                        <table class="table table-trans tbody-white">
                            <thead>
                                <tr>
                                    <th class="trans-upcase text-semibold">{{ trans('messages.setting.name') }}</th>
                                    <th class="trans-upcase text-semibold">{{ trans('messages.setting.value') }}</th>
                                    <th class="trans-upcase text-semibold"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($settings as $name => $setting)
                                    <tr>
                                        <td width="30%">
                                            <span class="list-status pull-left">
                                                <span class="text-semibold">{{ $name }}</span>
                                            </span>
                                        </td>
                                        <td width="20%">
                                            <div class="c-inline-edit">
                                                <a href="javascript:;"
                                                data-url="{{ action('Admin\SettingController@advancedUpdate', ['name' => $name]) }}"
                                                class="inline-value inline-editable editable editable-click">
                                                    @if ($setting['value'])
                                                        <div style="max-height: 100px;overflow:hidden">{{ $setting['value'] }}</div>
                                                    @else
                                                        <span class="text-danger">NULL</span>
                                                    @endif
                                                </a>
                                                <div class="inline-form" style="display:none">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-1">
                                                            @include('helpers.form_control', [
                                                                'type' => 'text',
                                                                'label' => '',
                                                                'name' => 'value',
                                                                'value' => $setting['value']
                                                            ])
                                                        </div>
                                                        <button type="button" class="btn btn-primary inline-save me-1 text-nowrap">{{ trans('messages.save') }}</button>
                                                        <button type="button" class="btn btn-primary inline-cancel text-nowrap" data-bs-dismiss="modal">{{ trans('messages.cancel') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-muted2">
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>                
            </div>
        </div>
    
    </div>
</div>

<script>
    var InlineEditItem = class {
        constructor(box, url) {
            this.box = box;
            this.url = url;
        }

        init() {
            var _this = this;
            
            this.box.find('.inline-save').on('click', function() {
                _this.save();
            });

            this.box.find('.inline-form input').keyup(function(e){
                if(e.keyCode == 13)
                {
                    _this.save();
                }
            });
            
            this.box.find('.inline-cancel').on('click', function() {
                _this.hide();
            });
        }

        showForm() {
            this.box.find('.inline-form').show();
            this.box.find('.inline-value').hide();
        }

        hide() {
            this.box.find('.inline-form').hide();
            this.box.find('.inline-value').show();
        }

        getValue() {
            return this.box.find('[name=value]').val().trim();
        }

        save() {
            var _this = this;
            addButtonMask(this.box.find('.inline-save'));

            // copy
            $.ajax({
                url: _this.url,
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    value: _this.getValue()
                },
                globalError: false
            }).done(function(response) {
                notify({
                    type: 'success',
                    message: response,
                });

                _this.hide();
                _this.updateValue();
            }).fail(function(jqXHR, textStatus, errorThrown){

            }).always(function() {
                removeButtonMask(_this.box.find('.inline-save'));
            });
        }

        updateValue() {
            if (this.getValue() == '') {
                this.box.find('.inline-value').html('<span class="text-danger">NULL</span>');
            } else {
                this.box.find('.inline-value').html(this.getValue());
            }
        }
    };

    $(function() {
        $('.inline-value').on('click', function() {
            var inlineEditItem = new InlineEditItem(
                $(this).closest('.c-inline-edit'),
                $(this).attr('data-url')
            );
            
            inlineEditItem.init();

            inlineEditItem.showForm();
        });

        
    });
</script>