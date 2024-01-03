@extends('sistema.template.master')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Dashboard</h1>

                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary">Home</a>
                            </li>

                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>

                            <li class="breadcrumb-item text-muted">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="row g-5 g-xl-10 mb-xl-10">
                        <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
                            <div class="card card-flush overflow-hidden h-md-100">
                                <div class="card-header py-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold text-dark">Sales This Months</span>
                                        <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span>
                                    </h3>
                                </div>

                                <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                                    <div class="px-9 mb-5">
                                        <div class="d-flex mb-2">
                                            <span class="fs-4 fw-semibold text-gray-400 me-1">$</span>
                                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">14,094</span>
                                        </div>

                                        <span class="fs-6 fw-semibold text-gray-400">Another $48,346 to Goal</span>
                                    </div>

                                    <div id="kt_charts_widget_3" class="min-h-auto ps-4 pe-6" style="height: 300px"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
                            <div class="card h-md-100">
                                <div class="card-header align-items-center border-0">
                                    <h3 class="fw-bold text-gray-900 m-0">Recent Orders</h3>
                                </div>

                                <div class="card-body pt-2">
                                    <ul class="nav nav-pills nav-pills-custom mb-3">
                                        <li class="nav-item mb-3 me-3 me-lg-6">
                                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden active w-80px h-85px py-4"
                                                data-bs-toggle="pill" href="#kt_stats_widget_2_tab_1">
                                                <div class="nav-icon">
                                                    <img alt=""
                                                        src="assets/media/svg/products-categories/t-shirt.svg"
                                                        class="" />
                                                </div>

                                                <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">T-shirt</span>

                                                <span
                                                    class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            </a>
                                        </li>

                                        <li class="nav-item mb-3 me-3 me-lg-6">
                                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4"
                                                data-bs-toggle="pill" href="#kt_stats_widget_2_tab_2">
                                                <div class="nav-icon">
                                                    <img alt=""
                                                        src="assets/media/svg/products-categories/gaming.svg"
                                                        class="" />
                                                </div>

                                                <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">Gaming</span>

                                                <span
                                                    class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            </a>
                                        </li>

                                        <li class="nav-item mb-3 me-3 me-lg-6">
                                            <!--begin::Link-->
                                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4"
                                                data-bs-toggle="pill" href="#kt_stats_widget_2_tab_3">
                                                <!--begin::Icon-->
                                                <div class="nav-icon">
                                                    <img alt="" src="assets/media/svg/products-categories/watch.svg"
                                                        class="" />
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Subtitle-->
                                                <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">Watch</span>
                                                <!--end::Subtitle-->
                                                <!--begin::Bullet-->
                                                <span
                                                    class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                                <!--end::Bullet-->
                                            </a>
                                            <!--end::Link-->
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="nav-item mb-3 me-3 me-lg-6">
                                            <!--begin::Link-->
                                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4"
                                                data-bs-toggle="pill" href="#kt_stats_widget_2_tab_4">
                                                <!--begin::Icon-->
                                                <div class="nav-icon">
                                                    <img alt=""
                                                        src="assets/media/svg/products-categories/gloves.svg"
                                                        class="nav-icon" />
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Subtitle-->
                                                <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">Gloves</span>
                                                <!--end::Subtitle-->
                                                <!--begin::Bullet-->
                                                <span
                                                    class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                                <!--end::Bullet-->
                                            </a>
                                            <!--end::Link-->
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="nav-item mb-3">
                                            <!--begin::Link-->
                                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4"
                                                data-bs-toggle="pill" href="#kt_stats_widget_2_tab_5">
                                                <!--begin::Icon-->
                                                <div class="nav-icon">
                                                    <img alt="" src="assets/media/svg/products-categories/shoes.svg"
                                                        class="nav-icon" />
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Subtitle-->
                                                <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">Shoes</span>
                                                <!--end::Subtitle-->
                                                <!--begin::Bullet-->
                                                <span
                                                    class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                                <!--end::Bullet-->
                                            </a>
                                            <!--end::Link-->
                                        </li>
                                        <!--end::Item-->
                                    </ul>
                                    <!--end::Nav-->
                                    <!--begin::Tab Content-->
                                    <div class="tab-content">
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade show active" id="kt_stats_widget_2_tab_1">
                                            <!--begin::Table container-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                            <th class="ps-0 w-50px">ITEM</th>
                                                            <th class="min-w-125px"></th>
                                                            <th class="text-end min-w-100px">QTY</th>
                                                            <th class="pe-0 text-end min-w-100px">PRICE</th>
                                                            <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <img src="assets/media/stock/ecommerce/210.png"
                                                                    class="w-50px ms-n1" alt="" />
                                                            </td>
                                                            <td class="ps-0">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant
                                                                    1802</a>
                                                                <span
                                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                                    #XDG-2347</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$72.00</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$126.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <img src="assets/media/stock/ecommerce/215.png"
                                                                    class="w-50px ms-n1" alt="" />
                                                            </td>
                                                            <td class="ps-0">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red
                                                                    Laga</a>
                                                                <span
                                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                                    #XDG-1321</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$45.00</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$76.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <img src="assets/media/stock/ecommerce/209.png"
                                                                    class="w-50px ms-n1" alt="" />
                                                            </td>
                                                            <td class="ps-0">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                                <span
                                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                                    #XDG-4312</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$84.00</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$168.00</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="kt_stats_widget_2_tab_2">
                                            <div class="table-responsive">
                                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                    <thead>
                                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                            <th class="ps-0 w-50px">ITEM</th>
                                                            <th class="min-w-125px"></th>
                                                            <th class="text-end min-w-100px">QTY</th>
                                                            <th class="pe-0 text-end min-w-100px">PRICE</th>
                                                            <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <img src="assets/media/stock/ecommerce/197.png"
                                                                    class="w-50px ms-n1" alt="" />
                                                            </td>
                                                            <td class="ps-0">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant
                                                                    1802</a>
                                                                <span
                                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                                    #XDG-4312</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$32.00</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$312.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <img src="assets/media/stock/ecommerce/178.png"
                                                                    class="w-50px ms-n1" alt="" />
                                                            </td>
                                                            <td class="ps-0">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red
                                                                    Laga</a>
                                                                <span
                                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                                    #XDG-3122</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$53.00</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$62.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <img src="assets/media/stock/ecommerce/22.png"
                                                                    class="w-50px ms-n1" alt="" />
                                                            </td>
                                                            <td class="ps-0">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                                <span
                                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                                    #XDG-1142</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$74.00</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$139.00</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="kt_stats_widget_2_tab_3">
                                            <div class="table-responsive">
                                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                    <thead>
                                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                            <th class="ps-0 w-50px">ITEM</th>
                                                            <th class="min-w-125px"></th>
                                                            <th class="text-end min-w-100px">QTY</th>
                                                            <th class="pe-0 text-end min-w-100px">PRICE</th>
                                                            <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <img src="assets/media/stock/ecommerce/1.png"
                                                                    class="w-50px ms-n1" alt="" />
                                                            </td>
                                                            <td class="ps-0">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant
                                                                    1324</a>
                                                                <span
                                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                                    #XDG-1523</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$43.00</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$231.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <img src="assets/media/stock/ecommerce/24.png"
                                                                    class="w-50px ms-n1" alt="" />
                                                            </td>
                                                            <td class="ps-0">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red
                                                                    Laga</a>
                                                                <span
                                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                                    #XDG-5314</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$71.00</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$53.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <img src="assets/media/stock/ecommerce/71.png"
                                                                    class="w-50px ms-n1" alt="" />
                                                            </td>
                                                            <td class="ps-0">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                                <span
                                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                                    #XDG-4222</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$23.00</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$213.00</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="kt_stats_widget_2_tab_4">
                                            <div class="table-responsive">
                                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                    <thead>
                                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                            <th class="ps-0 w-50px">ITEM</th>
                                                            <th class="min-w-125px"></th>
                                                            <th class="text-end min-w-100px">QTY</th>
                                                            <th class="pe-0 text-end min-w-100px">PRICE</th>
                                                            <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <img src="assets/media/stock/ecommerce/41.png"
                                                                    class="w-50px ms-n1" alt="" />
                                                            </td>
                                                            <td class="ps-0">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant
                                                                    2635</a>
                                                                <span
                                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                                    #XDG-1523</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$65.00</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$163.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <img src="assets/media/stock/ecommerce/63.png"
                                                                    class="w-50px ms-n1" alt="" />
                                                            </td>
                                                            <td class="ps-0">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red
                                                                    Laga</a>
                                                                <span
                                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                                    #XDG-2745</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$64.00</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$73.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <img src="assets/media/stock/ecommerce/59.png"
                                                                    class="w-50px ms-n1" alt="" />
                                                            </td>
                                                            <td class="ps-0">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                                <span
                                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                                    #XDG-5173</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$54.00</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$173.00</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="kt_stats_widget_2_tab_5">
                                            <div class="table-responsive">
                                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                    <thead>
                                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                            <th class="ps-0 w-50px">ITEM</th>
                                                            <th class="min-w-125px"></th>
                                                            <th class="text-end min-w-100px">QTY</th>
                                                            <th class="pe-0 text-end min-w-100px">PRICE</th>
                                                            <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <img src="{{ asset('assets/media/stock/ecommerce/10.png') }}"
                                                                    class="w-50px ms-n1" alt="" />
                                                            </td>
                                                            <td class="ps-0">
                                                                <a href="#"
                                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Nike</a>
                                                                <span
                                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                                    #XDG-2163</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$64.00</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$287.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <img src="assets/media/stock/ecommerce/96.png"
                                                                    class="w-50px ms-n1" alt="" />
                                                            </td>
                                                            <td class="ps-0">
                                                                <a href="#"
                                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Adidas</a>
                                                                <span
                                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                                    #XDG-2162</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$76.00</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$51.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <img src="assets/media/stock/ecommerce/13.png"
                                                                    class="w-50px ms-n1" alt="" />
                                                            </td>
                                                            <td class="ps-0">
                                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Puma</a>
                                                                <span
                                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                                    #XDG-1537</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$27.00</span>
                                                            </td>
                                                            <td class="text-end pe-0">
                                                                <span
                                                                    class="text-gray-800 fw-bold d-block fs-6">$167.00</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
