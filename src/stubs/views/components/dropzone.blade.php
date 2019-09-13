<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <div class="dropzone-container">
        <div id="{{ $name }}" class="dropzone" data-toggle="tooltip" title="{{ $hint }}"></div>
    </div>
    <div class="dropzone-button-container">
        <button type="button" class="btn btn-secondary hint" data-toggle="tooltip" title="{{ $hint }}">
            <i class="fa fa-info-circle"></i>
        </button>
        <button type="button" id="{{ $name }}_button" class="btn btn-primary upload">
            <i class="fa fa-upload"></i> Upload
        </button>
    </div>
</div>

@push('component_scripts')
    <script>
        $(function () {
            window['{{ $name }}'] = {
                files: {
                    content: [],
                    create(attachment) {
                        this.content.push(attachment);

                        return this;
                    },
                    find(id) {
                        return this.content.find(item => item.id === id);
                    },
                    delete(id) {
                        this.content.forEach((item, index, arr) => {
                            if (item.id === id) {
                                arr.splice(index, 1);
                            }
                        });

                        return this;
                    },
                    store() {
                        sessionStorage.setItem('{{ $name }}', JSON.stringify(this.content));
                    },
                    fetch() {
                        return JSON.parse(sessionStorage.getItem('{{ $name }}'));
                    }
                },
                button: {
                    el: $('#{{ $name }}_button'),
                    set(el) {
                        this.el = el;
                    },
                    show() {
                        this.el.show()
                    },
                    hide() {
                        this.el.hide()
                    },
                    registerConfirmation(dropzone) {
                        let el = this.el;

                        el.on('click', function () {
                            // if confirmed upload all files in queue
                            dropzone.processQueue();

                            // hide button
                            el.hide();
                        });
                    }
                },
                inputs: {
                    dropzoneEl: $('#{{ $name }}'),
                    create(value) {
                        this.dropzoneEl.append(
                            $('<input>', {
                                type: 'hidden',
                                name: '{{ $name }}_ids[]',
                                value: value
                            })
                        );
                    },
                    delete(id) {
                        this.dropzoneEl.find('input').each(function () {
                            // remove input if file id equals to input value
                            if (parseInt($(this).val()) === id) {
                                $(this).remove();
                            }
                        });
                    }
                }
            };

            ApiToken
                .load()
                .then(apiToken => {
                    window['{{ $name }}'].dropzone = new Dropzone('#{{ $name }}', {
                        url: '/api/attachments',
                        addRemoveLinks: true,
                        acceptedFiles: @json($extensions), // allowed file extensions with comma as delimiter
                        maxFilesize: @json($maxFileSize ?? 2), // in mb
                        maxFiles: @json($maxFiles ?? 1),
                        parallelUploads: @json($maxFiles ?? 1),
                        autoProcessQueue: false,
                        paramName: 'attachment', // request key for uploaded file
                        params: {
                            attachable_type: @json($attachable_type),
                            attachable_id: @json($attachable_id),
                            file_attachment: @json($file_attachment)
                        },
                        headers: {
                            accept: 'application/json',
                            'X-CSRF-Token': document.head.querySelector('meta[name="csrf-token"]').content,
                            Authorization: `Bearer ${apiToken}`
                        },
                        init() {
                            const self = this;

                            // running on request validation error
                            if (@json($errors->any())) {
                                // fetch uploaded files from session storage
                                const attachments = window['{{ $name }}'].files.fetch();

                                if (attachments !== null) {
                                    // if attachments exists then sets it to uploaded files
                                    window['{{ $name }}'].files.content = attachments;

                                    attachmentManager.update(self, window['{{ $name }}'].files, window['{{ $name }}'].inputs);
                                }
                            } else if (@json($attachments)) {
                                // fill attachments
                                window['{{ $name }}'].files.content = @json($attachments);

                                window['{{ $name }}'].files.store();

                                attachmentManager.update(self, window['{{ $name }}'].files, window['{{ $name }}'].inputs);
                            }

                            window['{{ $name }}'].button.registerConfirmation(self);

                            this.on('addedfile', function (file) {
                                // attach thumbnail to file's preview element's image
                                $(file.previewElement).find('.dz-image img').attr('src', attachmentManager.getIcon(file));

                                attachmentManager.bindOpenInNewTab(file, URL.createObjectURL(file));

                                window['{{ $name }}'].button.show();
                            });

                            this.on('success', function (file, response) {
                                // this line is needed to delete file by id purpose
                                file.id = response.id;

                                // fill uploaded files arr with response's attribute
                                const attachment = {
                                    id: response.id,
                                    name: response.name,
                                    size: response.size,
                                    type: response.type,
                                    dataURL: response.url
                                };

                                // append a new input hidden with value is response's id
                                window['{{ $name }}'].inputs.create(response.id);

                                window['{{ $name }}'].files.create(attachment).store();

                                attachmentManager.bindOpenInNewTab(file, response.url);
                            });

                            this.on('removedfile', function (file) {
                                const id = file.id;

                                // get uploaded file from uploaded files arr
                                const attachment = window['{{ $name }}'].files.find(id);

                                // if file exists in uploaded files arr
                                // then deletes it from server
                                if (attachment) {
                                    axios
                                        .delete(`/api/attachments/${id}`)
                                        .then(response => {

                                            window['{{ $name }}'].files.delete(id).store();

                                            window['{{ $name }}'].inputs.delete(id);
                                        })
                                        .catch(error => {
                                            alertErrorMessage(error);
                                        });
                                }

                                if (!self.files.filter(file => !file.accepted).length) {
                                    window['{{ $name }}'].button.show();
                                } else {
                                    window['{{ $name }}'].button.hide();
                                }

                                // if this doesnt have queued files hide upload button
                                if (!self.getQueuedFiles().length) {
                                    window['{{ $name }}'].button.hide();
                                }
                            });

                            this.on('error', function (file, error) {
                                let message = error.message;

                                // get laravel's errors message bag
                                const errors = error.errors;

                                // if errors isn't undefined process it
                                if (errors) {
                                    // if exists then looping foreach errors properties
                                    for (let property in errors) {
                                        // determine whether errors has the following property
                                        if (errors.hasOwnProperty(property)) {
                                            // get the first errors message by property then set it to message
                                            message = errors[property][0];
                                            // break the looping on first errors message encounters
                                            break;
                                        }
                                    }
                                }

                                // display error message on dropzone
                                $(file.previewElement).find('.dz-error-message').text(message);

                                window['{{ $name }}'].button.hide();
                            });
                        }
                    });
                });
        });
    </script>
@endpush
