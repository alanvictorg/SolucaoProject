<!doctype html>
<html class="no-js" lang="en">
@include('layouts.head')
<body>
<div class="app blank sidebar-opened">
    <article class="content">
        <div class="error-card global">
            <div class="error-title-block">
                <h1 class="error-title">403</h1>
                <h2 class="error-sub-title">
                    Desculpe, {{ $exception->getMessage() }}
                </h2>
            </div>
            <div class="error-container">
                <p></p>
                <div class="row">
                </div> <br>
                <a class="btn btn-primary" href="{{ url()->previous() }}"> <i class="fa fa-angle-left"></i>Voltar </a>
            </div>
        </div>
    </article>
</div>
<!-- Reference block for JS -->
<div class="ref" id="ref">
    <div class="color-primary"></div>
    <div class="chart">
        <div class="color-primary"></div>
        <div class="color-secondary"></div>
    </div>
</div>

@include('layouts.scripts')
</body>

</html>