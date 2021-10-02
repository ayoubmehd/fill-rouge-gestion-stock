<header>
    <div class="card shadow text-primary">
        <div class="card-body">

            <div class="row">
                <div class="col-md-8">
                    <h2>
                        <i class="mdi mdi-{{ $sectionIcon }}"></i>
                        {{ $sectionTitle }}
                    </h2>
                </div>

                <div class="col d-flex align-items-center justify-content-end">
                    <a href="{{ $sectionTo }}" class="btn btn-outline-primary">
                        See All
                        <i class="mdi mdi-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
