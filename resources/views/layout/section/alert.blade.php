@if (session()->has('success'))
    <div class="card-body">
        <div class="alert alert-success dark alert-dismissible fade show" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-thumbs-up">
                <path
                    d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
            </svg>
            <p> {{ session()->get('success') }}</p>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"
                    data-bs-original-title=""
                    title=""></button>
        </div>
    </div>
@endif
@if (session()->has('info'))
    <div class="card-body">
        <div class="alert alert-primary dark alert-dismissible fade show" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-clock">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
            </svg>
            <p> {{ session()->get('info') }}</p>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"
                    data-bs-original-title=""
                    title=""></button>
        </div>
    </div>
@endif
@if (session()->has('warning'))
    <div class="card-body">
        <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-thumbs-down">
                <path
                    d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17"></path>
            </svg>
            <p> {{ session()->get('warning') }}</p>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"
                    data-bs-original-title=""
                    title=""></button>
        </div>
    </div>
@endif

