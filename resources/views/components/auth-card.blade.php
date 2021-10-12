<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        {{ $logo }}
    </div>
    <div class="row justify-content-center align-items-center" style="height: 100vh">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
