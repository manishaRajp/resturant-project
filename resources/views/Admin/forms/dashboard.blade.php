@extends('admin.layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <!--Start Dashboard Content-->
        <h1>Welcome,Admin</h1>
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header">Recent Order Tables
                        <div class="card-action">
                            <div class="dropdown">
                                <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                                    <i class="icon-options"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void();">Action</a>
                                    <a class="dropdown-item" href="javascript:void();">Another action</a>
                                    <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-borderless">
                            <thead>
                                <tr>
                                    <th>Resturant</th>
                                    <th>Photo</th>
                                    <th>Resturant ID</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pizza</td>
                                    <td><img src="https://via.placeholder.com/110x110" class="product-img" alt="product img"></td>
                                    <td>#9405822</td>
                                    <td>$ 1250.00</td>
                                    <td>03 Aug 2017</td>
                                    <td>
                                        <div class="progress shadow" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" style="width: 90%"></div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Sandwich</td>
                                    <td><img src="https://via.placeholder.com/110x110" class="product-img" alt="product img"></td>
                                    <td>#9405820</td>
                                    <td>$ 1500.00</td>
                                    <td>03 Aug 2017</td>
                                    <td>
                                        <div class="progress shadow" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" style="width: 60%"></div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Manchurian</td>
                                    <td><img src="https://via.placeholder.com/110x110" class="product-img" alt="product img"></td>
                                    <td>#9405830</td>
                                    <td>$ 1400.00</td>
                                    <td>03 Aug 2017</td>
                                    <td>
                                        <div class="progress shadow" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" style="width: 70%"></div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Noodles</td>
                                    <td><img src="https://via.placeholder.com/110x110" class="product-img" alt="product img"></td>
                                    <td>#9405825</td>
                                    <td>$ 1200.00</td>
                                    <td>03 Aug 2017</td>
                                    <td>
                                        <div class="progress shadow" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" style="width: 100%"></div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Maggi</td>
                                    <td><img src="https://via.placeholder.com/110x110" class="product-img" alt="product img"></td>
                                    <td>#9405840</td>
                                    <td>$ 1800.00</td>
                                    <td>03 Aug 2017</td>
                                    <td>
                                        <div class="progress shadow" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" style="width: 40%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Time-Pass</td>
                                    <td><img src="https://via.placeholder.com/110x110" class="product-img" alt="product img"></td>
                                    <td>#9405825</td>
                                    <td>$ 1200.00</td>
                                    <td>03 Aug 2017</td>
                                    <td>
                                        <div class="progress shadow" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" style="width: 100%"></div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--End Row-->
        <!--End Dashboard Content-->
        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->
    </div>
    <!-- End container-fluid-->
</div>
<!--End content-wrapper-->
<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->
<!--start color switcher-->
<div class="right-sidebar">
    <div class="switcher-icon">
        <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">
        <p class="mb-0">Gaussion Texture</p>
        <hr>
        <ul class="switcher">
            <li id="theme1"></li>
            <li id="theme2"></li>
            <li id="theme3"></li>
            <li id="theme4"></li>
            <li id="theme5"></li>
            <li id="theme6"></li>
        </ul>
        <p class="mb-0">Gradient Background</p>
        <hr>
        <ul class="switcher">
            <li id="theme7"></li>
            <li id="theme8"></li>
            <li id="theme9"></li>
            <li id="theme10"></li>
            <li id="theme11"></li>
            <li id="theme12"></li>
            <li id="theme13"></li>
            <li id="theme14"></li>
            <li id="theme15"></li>
        </ul>
    </div>
</div>
<!--end color switcher-->
</div>
<!--End wrapper-->
@endsection