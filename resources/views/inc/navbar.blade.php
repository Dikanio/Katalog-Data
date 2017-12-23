<!-- Static navbar -->
<nav class="navbar navbar-default">
<div class="container-fluid">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">{{ config('app.name', 'Katalog') }}</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <li class="link"><a href="/data/create">Create</a></li>
        <li class="link"><a href="/data/view">View</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#">KATALOG DATA KOTA BANDUNG</a></li>
    </ul>
    </div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</nav>