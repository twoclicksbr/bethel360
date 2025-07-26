@extends('admin.layouts.app')

@section('title', 'Central de Vidas | ' . config('app.title'))

@php
    $pageTitle = 'Central de Vidas > Novo Registro'; // para o breadcrumb
    $pageHeading = ''; // para o título da página
    $pageDescription = ''; // para o título da página
@endphp


@section('content')

    <div id="kt_app_content" class="app-content flex-column-fluid">

        <div id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row">

            {{-- Esquerda --}}
            

            {{-- Direita --}}
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">


                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_product_dados">
                            Dados
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_product_advanced">Advanced</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_product_reviews">Reviews</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="kt_ecommerce_add_product_dados" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">


                            <form action="{{ route('person.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="active" value="1" />

                                <div class="card card-flush py-4">

                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Dados</h2>
                                        </div>
                                    </div>

                                    <div class="card-body pt-0 pb-0">

                                        @include('admin.person.partials.form-fields')

                                        @include('admin.layouts.partials.form-btn-footer', [
                                            'routeCancel' => route('person.index'),
                                        ])

                                    </div>
                                </div>
                            </form>


                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Media</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="fv-row mb-2">
                                        <div class="dropzone" id="kt_ecommerce_add_product_media">
                                            <div class="dz-message needsclick">
                                                <i class="ki-outline ki-file-up text-primary fs-3x"></i>
                                                <div class="ms-4">
                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to
                                                        upload.</h3>
                                                    <span class="fs-7 fw-semibold text-gray-500">Upload up to 10
                                                        files</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-muted fs-7">Set the product media gallery.</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Inventory</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">SKU</label>
                                        <input type="text" name="sku" class="form-control mb-2"
                                            placeholder="SKU Number" value="011985001" />
                                        <div class="text-muted fs-7">Enter the product SKU.</div>
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Barcode</label>
                                        <input type="text" name="barcode" class="form-control mb-2"
                                            placeholder="Barcode Number" value="45874521458" />
                                        <div class="text-muted fs-7">Enter the product barcode number.</div>
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Quantity</label>
                                        <div class="d-flex gap-3">
                                            <input type="number" name="shelf" class="form-control mb-2"
                                                placeholder="On shelf" value="24" />
                                            <input type="number" name="warehouse" class="form-control mb-2"
                                                placeholder="In warehouse" />
                                        </div>
                                        <div class="text-muted fs-7">Enter the product quantity.</div>
                                    </div>
                                    <div class="fv-row">
                                        <label class="form-label">Allow Backorders</label>
                                        <div class="form-check form-check-custom form-check-solid mb-2">
                                            <input class="form-check-input" type="checkbox" value="" />
                                            <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="text-muted fs-7">Allow customers to purchase products that are out of
                                            stock.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Variations</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                                        <label class="form-label">Add Product Variations</label>
                                        <div id="kt_ecommerce_add_product_options">
                                            <div class="form-group">
                                                <div data-repeater-list="kt_ecommerce_add_product_options"
                                                    class="d-flex flex-column gap-3">
                                                    <div data-repeater-item=""
                                                        class="form-group d-flex flex-wrap align-items-center gap-5">
                                                        <div class="w-100 w-md-200px">
                                                            <select class="form-select" name="product_option"
                                                                data-placeholder="Select a variation"
                                                                data-kt-ecommerce-catalog-add-product="product_option">
                                                                <option></option>
                                                                <option value="color">Color</option>
                                                                <option value="size">Size</option>
                                                                <option value="material">Material</option>
                                                                <option value="style">Style</option>
                                                            </select>
                                                        </div>
                                                        <input type="text" class="form-control mw-100 w-200px"
                                                            name="product_option_value" placeholder="Variation" />
                                                        <button type="button" data-repeater-delete=""
                                                            class="btn btn-sm btn-icon btn-light-danger">
                                                            <i class="ki-outline ki-cross fs-1"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-5">
                                                <button type="button" data-repeater-create=""
                                                    class="btn btn-sm btn-light-primary">
                                                    <i class="ki-outline ki-plus fs-2"></i>Add another variation</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Shipping</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="fv-row">
                                        <div class="form-check form-check-custom form-check-solid mb-2">
                                            <input class="form-check-input" type="checkbox"
                                                id="kt_ecommerce_add_product_shipping_checkbox" value="1"
                                                checked="checked" />
                                            <label class="form-check-label">This is a physical product</label>
                                        </div>
                                        <div class="text-muted fs-7">Set if the product is a physical or digital item.
                                            Physical products may require shipping.</div>
                                    </div>
                                    <div id="kt_ecommerce_add_product_shipping" class="mt-10">
                                        <div class="mb-10 fv-row">
                                            <label class="form-label">Weight</label>
                                            <input type="text" name="weight" class="form-control mb-2"
                                                placeholder="Product weight" value="4.3" />
                                            <div class="text-muted fs-7">Set a product weight in kilograms (kg).</div>
                                        </div>
                                        <div class="fv-row">
                                            <label class="form-label">Dimension</label>
                                            <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                                                <input type="number" name="width" class="form-control mb-2"
                                                    placeholder="Width (w)" value="12" />
                                                <input type="number" name="height" class="form-control mb-2"
                                                    placeholder="Height (h)" value="4" />
                                                <input type="number" name="length" class="form-control mb-2"
                                                    placeholder="Lengtn (l)" value="8.5" />
                                            </div>
                                            <div class="text-muted fs-7">Enter the product dimensions in centimeters (cm).
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Meta Options</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="mb-10">
                                        <label class="form-label">Meta Tag Title</label>
                                        <input type="text" class="form-control mb-2" name="meta_title"
                                            placeholder="Meta tag name" />
                                        <div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and
                                            precise keywords.</div>
                                    </div>
                                    <div class="mb-10">
                                        <label class="form-label">Meta Tag Description</label>
                                        <div id="kt_ecommerce_add_product_meta_description"
                                            name="kt_ecommerce_add_product_meta_description" class="min-h-100px mb-2">
                                        </div>
                                        <div class="text-muted fs-7">Set a meta tag description to the product for
                                            increased SEO ranking.</div>
                                    </div>
                                    <div>
                                        <label class="form-label">Meta Tag Keywords</label>
                                        <input id="kt_ecommerce_add_product_meta_keywords"
                                            name="kt_ecommerce_add_product_meta_keywords" class="form-control mb-2" />
                                        <div class="text-muted fs-7">Set a list of keywords that the product is related to.
                                            Separate the keywords by adding a comma
                                            <code>,</code>between each keyword.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kt_ecommerce_add_product_reviews" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Customer Reviews</h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <span class="fw-bold me-5">Overall Rating:</span>
                                        <div class="rating">
                                            <div class="rating-label checked">
                                                <i class="ki-outline ki-star fs-2"></i>
                                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-outline ki-star fs-2"></i>
                                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-outline ki-star fs-2"></i>
                                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-outline ki-star fs-2"></i>
                                            </div>
                                            <div class="rating-label">
                                                <i class="ki-outline ki-star fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <table class="table table-row-dashed fs-6 gy-5 my-0"
                                        id="kt_ecommerce_add_product_reviews">
                                        <thead>
                                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox"
                                                            data-kt-check="true"
                                                            data-kt-check-target="#kt_ecommerce_add_product_reviews .form-check-input"
                                                            value="1" />
                                                    </div>
                                                </th>
                                                <th class="min-w-125px">Rating</th>
                                                <th class="min-w-175px">Customer</th>
                                                <th class="min-w-175px">Comment</th>
                                                <th class="min-w-100px text-end fs-7">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <td data-order="rating-5">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="apps/inbox/reply.html"
                                                        class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                        <div class="symbol symbol-circle symbol-25px me-3">
                                                            <div class="symbol-label bg-light-danger">
                                                                <span class="text-danger">M</span>
                                                            </div>
                                                        </div>
                                                        <span class="fw-bold">Melody Macy</span>
                                                    </a>
                                                </td>
                                                <td class="text-gray-600 fw-bold">I like this design</td>
                                                <td class="text-end">
                                                    <span class="fw-semibold text-muted">Today</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <td data-order="rating-5">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="apps/inbox/reply.html"
                                                        class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                        <div class="symbol symbol-circle symbol-25px me-3">
                                                            <span class="symbol-label"
                                                                style="background-image:url(assets/media/avatars/300-1.jpg)"></span>
                                                        </div>
                                                        <span class="fw-bold">Max Smith</span>
                                                    </a>
                                                </td>
                                                <td class="text-gray-600 fw-bold">Good product for outdoors or indoors</td>
                                                <td class="text-end">
                                                    <span class="fw-semibold text-muted">day ago</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <td data-order="rating-4">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="apps/inbox/reply.html"
                                                        class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                        <div class="symbol symbol-circle symbol-25px me-3">
                                                            <span class="symbol-label"
                                                                style="background-image:url(assets/media/avatars/300-5.jpg)"></span>
                                                        </div>
                                                        <span class="fw-bold">Sean Bean</span>
                                                    </a>
                                                </td>
                                                <td class="text-gray-600 fw-bold">Awesome quality with great materials
                                                    used, but could be more comfortable</td>
                                                <td class="text-end">
                                                    <span class="fw-semibold text-muted">11:20 PM</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <td data-order="rating-5">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="apps/inbox/reply.html"
                                                        class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                        <div class="symbol symbol-circle symbol-25px me-3">
                                                            <span class="symbol-label"
                                                                style="background-image:url(assets/media/avatars/300-25.jpg)"></span>
                                                        </div>
                                                        <span class="fw-bold">Brian Cox</span>
                                                    </a>
                                                </td>
                                                <td class="text-gray-600 fw-bold">This is the best product I've ever used.
                                                </td>
                                                <td class="text-end">
                                                    <span class="fw-semibold text-muted">2 days ago</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <td data-order="rating-3">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="apps/inbox/reply.html"
                                                        class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                        <div class="symbol symbol-circle symbol-25px me-3">
                                                            <div class="symbol-label bg-light-warning">
                                                                <span class="text-warning">C</span>
                                                            </div>
                                                        </div>
                                                        <span class="fw-bold">Mikaela Collins</span>
                                                    </a>
                                                </td>
                                                <td class="text-gray-600 fw-bold">I thought it was just average, I prefer
                                                    other brands</td>
                                                <td class="text-end">
                                                    <span class="fw-semibold text-muted">July 25</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <td data-order="rating-5">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="apps/inbox/reply.html"
                                                        class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                        <div class="symbol symbol-circle symbol-25px me-3">
                                                            <span class="symbol-label"
                                                                style="background-image:url(assets/media/avatars/300-9.jpg)"></span>
                                                        </div>
                                                        <span class="fw-bold">Francis Mitcham</span>
                                                    </a>
                                                </td>
                                                <td class="text-gray-600 fw-bold">Beautifully crafted. Worth every penny.
                                                </td>
                                                <td class="text-end">
                                                    <span class="fw-semibold text-muted">July 24</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <td data-order="rating-4">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="apps/inbox/reply.html"
                                                        class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                        <div class="symbol symbol-circle symbol-25px me-3">
                                                            <div class="symbol-label bg-light-danger">
                                                                <span class="text-danger">O</span>
                                                            </div>
                                                        </div>
                                                        <span class="fw-bold">Olivia Wild</span>
                                                    </a>
                                                </td>
                                                <td class="text-gray-600 fw-bold">Awesome value for money. Shipping could
                                                    be faster tho.</td>
                                                <td class="text-end">
                                                    <span class="fw-semibold text-muted">July 13</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <td data-order="rating-5">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="apps/inbox/reply.html"
                                                        class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                        <div class="symbol symbol-circle symbol-25px me-3">
                                                            <div class="symbol-label bg-light-primary">
                                                                <span class="text-primary">N</span>
                                                            </div>
                                                        </div>
                                                        <span class="fw-bold">Neil Owen</span>
                                                    </a>
                                                </td>
                                                <td class="text-gray-600 fw-bold">Excellent quality, I got it for my son's
                                                    birthday and he loved it!</td>
                                                <td class="text-end">
                                                    <span class="fw-semibold text-muted">May 25</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <td data-order="rating-5">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="apps/inbox/reply.html"
                                                        class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                        <div class="symbol symbol-circle symbol-25px me-3">
                                                            <span class="symbol-label"
                                                                style="background-image:url(assets/media/avatars/300-23.jpg)"></span>
                                                        </div>
                                                        <span class="fw-bold">Dan Wilson</span>
                                                    </a>
                                                </td>
                                                <td class="text-gray-600 fw-bold">I got this for Christmas last year, and
                                                    it's still the best product I've ever used!</td>
                                                <td class="text-end">
                                                    <span class="fw-semibold text-muted">April 15</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <td data-order="rating-5">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="apps/inbox/reply.html"
                                                        class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                        <div class="symbol symbol-circle symbol-25px me-3">
                                                            <div class="symbol-label bg-light-danger">
                                                                <span class="text-danger">E</span>
                                                            </div>
                                                        </div>
                                                        <span class="fw-bold">Emma Bold</span>
                                                    </a>
                                                </td>
                                                <td class="text-gray-600 fw-bold">Was skeptical at first, but after using
                                                    it for 3 months, I'm hooked! Will definately buy another!</td>
                                                <td class="text-end">
                                                    <span class="fw-semibold text-muted">April 3</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <td data-order="rating-4">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="apps/inbox/reply.html"
                                                        class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                        <div class="symbol symbol-circle symbol-25px me-3">
                                                            <span class="symbol-label"
                                                                style="background-image:url(assets/media/avatars/300-12.jpg)"></span>
                                                        </div>
                                                        <span class="fw-bold">Ana Crown</span>
                                                    </a>
                                                </td>
                                                <td class="text-gray-600 fw-bold">Great product, too bad I missed out on
                                                    the sale.</td>
                                                <td class="text-end">
                                                    <span class="fw-semibold text-muted">March 17</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <td data-order="rating-5">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="apps/inbox/reply.html"
                                                        class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                        <div class="symbol symbol-circle symbol-25px me-3">
                                                            <div class="symbol-label bg-light-info">
                                                                <span class="text-info">A</span>
                                                            </div>
                                                        </div>
                                                        <span class="fw-bold">Robert Doe</span>
                                                    </a>
                                                </td>
                                                <td class="text-gray-600 fw-bold">Got this on sale! Best decision ever!
                                                </td>
                                                <td class="text-end">
                                                    <span class="fw-semibold text-muted">March 12</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <td data-order="rating-5">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-outline ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="apps/inbox/reply.html"
                                                        class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                        <div class="symbol symbol-circle symbol-25px me-3">
                                                            <span class="symbol-label"
                                                                style="background-image:url(assets/media/avatars/300-13.jpg)"></span>
                                                        </div>
                                                        <span class="fw-bold">John Miller</span>
                                                    </a>
                                                </td>
                                                <td class="text-gray-600 fw-bold">Firesale is on! Buy now! Totally worth
                                                    it!</td>
                                                <td class="text-end">
                                                    <span class="fw-semibold text-muted">March 11</span>
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

@endsection
