var base = {
    init: function () {

    },
    alert_error: function (message) {
        return '<div class="alert alert-danger alert-dismissible alert-label-icon rounded-label shadow fade show mb-xl-0" role="alert"><i class="ri-error-warning-line label-icon"></i>' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    },
    alert_success: function (message) {
        return '<div class="alert alert-success alert-dismissible alert-label-icon rounded-label shadow fade show mb-xl-0" role="alert"><i class="ri-check-double-line label-icon"></i>' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
};
$(document).ready(function () {
    base.init();
});