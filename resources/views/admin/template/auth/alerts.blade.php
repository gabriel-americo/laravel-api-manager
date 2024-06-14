@if ($errors->any())
    <div role="alert" aria-live="polite" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div role="alert" aria-live="polite" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
