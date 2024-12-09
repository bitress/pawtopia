<!-- resources/views/categories/index.blade.php -->

<div class="col-12">
    <div class="lh-1 fs-1 text-center mb-2 p-2">
        <h3 class="text-center">Categories</h3>
    </div>

    <div class="row g-0">
        <div class="splide">
            <div class="splide__track">
                <div class="splide__list">
                    @foreach ($categories as $category)
                        <div class="col-sm-2 splide__slide m-2">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('assets/images/category/' . $category->category_image) }}" width="100px" class="float-end">
                                    <h5 class="card-title">{{ $category->category_name }}</h5>
                                    <a class="btn btn-outline btn-sm" href="{{ route('category.show', $category->category_id) }}">Show Products</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
