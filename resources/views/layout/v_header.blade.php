<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">SiPusDi</a> 
    </div>
    <div style="color: white;
    padding: 15px 50px 5px 50px;
    float: right;
    font-size: 16px;">
        <a href="/user/detail/{{session('id')}}">{{session('nama')}}&nbsp;<i class="fa fa-user-o"></i></a> &nbsp; <a href="/logout" class="btn btn-danger square-btn-adjust">Logout</a> 
    </div>
</nav>   