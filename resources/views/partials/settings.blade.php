<hr class="mt-0" />
<h6 class="text-center mb-0">Choose Layouts</h6>

<div class="p-4">
    <div class="mb-2">
        <img src="{{asset('images/layouts/layout-1.jpg')}}" class="img-fluid img-thumbnail" alt="">
    </div>
    <div class="custom-control custom-switch mb-3">
        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
    </div>

    <div class="mb-2">
        <img src="{{asset('images/layouts/layout-2.jpg')}}" class="img-fluid img-thumbnail" alt="">
    </div>
    <div class="custom-control custom-switch mb-3">
        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
    </div>

    <div class="mb-2">
        <img src="{{asset('images/layouts/layout-3.jpg')}}" class="img-fluid img-thumbnail" alt="">
    </div>
    <div class="custom-control custom-switch mb-5">
        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
    </div>


</div>
