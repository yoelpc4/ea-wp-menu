(function ($, DataTable) {
    "use strict";

    let _buildParams = function (dt, action) {
        let params = dt.ajax.params();
        params.action = action;
        params._token = $('meta[name="csrf-token"]').attr('content');

        return params;
    };

    let _downloadFromUrl = function (url, params) {
        let postUrl = url + '/export';
        let xhr = new XMLHttpRequest();
        xhr.open('POST', postUrl, true);
        xhr.responseType = 'arraybuffer';
        xhr.onload = function () {
            if (this.status === 200) {
                let filename = "";
                let disposition = xhr.getResponseHeader('FacebookPost-Disposition');
                if (disposition && disposition.indexOf('attachment') !== -1) {
                    let filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                    let matches = filenameRegex.exec(disposition);
                    if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                }
                let type = xhr.getResponseHeader('Content-Type');

                let blob = new Blob([this.response], {type: type});
                if (typeof window.navigator.msSaveBlob !== 'undefined') {
                    // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
                    window.navigator.msSaveBlob(blob, filename);
                } else {
                    let URL = window.URL || window.webkitURL;
                    let downloadUrl = URL.createObjectURL(blob);

                    if (filename) {
                        // use HTML5 a[download] attribute to specify filename
                        let a = document.createElement("a");
                        // safari doesn't support this yet
                        if (typeof a.download === 'undefined') {
                            window.location = downloadUrl;
                        } else {
                            a.href = downloadUrl;
                            a.download = filename;
                            document.body.appendChild(a);
                            a.click();
                        }
                    } else {
                        window.location = downloadUrl;
                    }

                    setTimeout(function () {
                        URL.revokeObjectURL(downloadUrl);
                    }, 100); // cleanup
                }
            }
        };
        xhr.setRequestHeader('FacebookPost-type', 'application/x-www-form-urlencoded');
        xhr.send($.param(params));
    };

    let _buildUrl = function (dt, action) {
        let url = dt.ajax.url() || '';
        let params = dt.ajax.params();
        params.action = action;

        if (url.indexOf('?') > -1) {
            return url + '&' + $.param(params);
        }

        return url + '?' + $.param(params);
    };

    DataTable.ext.buttons.excel = {
        className: 'buttons-excel',
        text: function (dt) {
            return '<i class="fa fa-file-excel"></i> ' + dt.i18n('buttons.excel', 'Excel');
        },
        action: function (e, dt, button, config) {
            let url = _buildUrl(dt, 'excel');
            window.location = url;
        }
    };

    DataTable.ext.buttons.postExcel = {
        className: 'buttons-excel',
        text: function (dt) {
            return '<i class="fa fa-file-excel"></i> ' + dt.i18n('buttons.excel', 'Excel');
        },
        action: function (e, dt, button, config) {
            let url = dt.ajax.url() || window.location.href;
            let params = _buildParams(dt, 'excel');

            _downloadFromUrl(url, params);
        }
    };

    DataTable.ext.buttons.export = {
        extend: 'collection',
        className: 'buttons-export',
        text: function (dt) {
            return '<i class="fa fa-file-download"></i> ' + dt.i18n('buttons.export', 'Export') + '&nbsp;<span class="caret"/>';
        },
        buttons: ['csv', 'excel', 'pdf']
    };

    DataTable.ext.buttons.csv = {
        className: 'buttons-csv',
        text: function (dt) {
            return '<i class="fa fa-file-csv"></i> ' + dt.i18n('buttons.csv', 'CSV');
        },
        action: function (e, dt, button, config) {
            let url = _buildUrl(dt, 'csv');
            window.location = url;
        }
    };

    DataTable.ext.buttons.postCsv = {
        className: 'buttons-csv',
        text: function (dt) {
            return '<i class="fa fa-file-csv"></i> ' + dt.i18n('buttons.csv', 'CSV');
        },
        action: function (e, dt, button, config) {
            let url = dt.ajax.url() || window.location.href;
            let params = _buildParams(dt, 'csv');

            _downloadFromUrl(url, params);
        }
    };

    DataTable.ext.buttons.pdf = {
        className: 'buttons-pdf',
        text: function (dt) {
            return '<i class="fa fa-file-pdf"></i> ' + dt.i18n('buttons.pdf', 'PDF');
        },
        action: function (e, dt, button, config) {
            let url = _buildUrl(dt, 'pdf');
            window.location = url;
        }
    };

    DataTable.ext.buttons.postPdf = {
        className: 'buttons-pdf',
        text: function (dt) {
            return '<i class="fa fa-file-pdf"></i> ' + dt.i18n('buttons.pdf', 'PDF');
        },
        action: function (e, dt, button, config) {
            let url = dt.ajax.url() || window.location.href;
            let params = _buildParams(dt, 'pdf');

            _downloadFromUrl(url, params);
        }
    };

    DataTable.ext.buttons.print = {
        className: 'buttons-print',
        text: function (dt) {
            return '<i class="fa fa-print"></i> ' + dt.i18n('buttons.print', 'Print');
        },
        action: function (e, dt, button, config) {
            let url = _buildUrl(dt, 'print');
            window.open(url);
        }
    };

    DataTable.ext.buttons.reset = {
        className: 'buttons-reset',
        text: function (dt) {
            return '<i class="fa fa-recycle"></i> ' + dt.i18n('buttons.reset', 'Reset');
        },
        action: function (e, dt, button, config) {
            dt.search('');
            dt.columns().search('');
            dt.draw();
        }
    };

    DataTable.ext.buttons.reload = {
        className: 'buttons-reload',
        text: function (dt) {
            return '<i class="fa fa-sync"></i> ' + dt.i18n('buttons.reload', 'Reload');
        },
        action: function (e, dt, button, config) {
            dt.draw(false);
        }
    };

    DataTable.ext.buttons.create = {
        className: 'buttons-create',
        text: function (dt) {
            return '<i class="fa fa-plus"></i> ' + dt.i18n('buttons.create', 'Create');
        },
        action: function (e, dt, button, config) {
            window.location = window.location.href.replace(/\/+$/, "") + '/create';
        }
    };

    DataTable.ext.buttons.filter = {
        className: 'buttons-filter',
        text: function (dt) {
            return '<i class="fa fa-filter"></i>' + dt.i18n('buttons.filter', 'Filter');
        },
        action: function (e, dt, button, config) {
            $('#filter_modal').modal('show');
        }
    };

    if (typeof DataTable.ext.buttons.copyHtml5 !== 'undefined') {
        $.extend(DataTable.ext.buttons.copyHtml5, {
            text: function (dt) {
                return '<i class="fa fa-copy"></i> ' + dt.i18n('buttons.copy', 'Copy');
            }
        });
    }

    if (typeof DataTable.ext.buttons.colvis !== 'undefined') {
        $.extend(DataTable.ext.buttons.colvis, {
            text: function (dt) {
                return '<i class="fa fa-eye"></i> ' + dt.i18n('buttons.colvis', 'Column visibility');
            }
        });
    }
})(jQuery, jQuery.fn.dataTable);
