<x-app-layout>
    <div id="layout-wrapper">

        @include('layouts.header-navigation')

        @include('layouts.sidebar')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <x-breadcrumb />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update Drug Class Information</h4>
                                    <p class="card-title-desc">You can update here you drug class information.</p>

                                    @if(count($errors))
                                        @foreach ($errors->all() as $error)
                                        <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                                        @endforeach
                                    @endif

                                    <form method="POST" action="{{ route('admin.update.drug.class', ['id' => $drugclass->id]) }}" enctype="multipart/form-data" id="myForm">
                                        @csrf

                                        <h4 class="card-title">General Information</h4><br>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Classification</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="classification_id" aria-label="Default select example" id="classification_id">
                                                    <option value="{{ $drugclass->classification_id }}" selected>{{ $drugclass->classification->classification }}</option>
                                                    @if (empty($classifications))
                                                        <option value="" disabled>No data found</option>
                                                    @else
                                                        @foreach ($classifications as $classificationId => $name)
                                                            <option value="{{ $classificationId }}" style="text-transform: capitalize">{{ $name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Drug Classification Name</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="text" name="name" value="{{ $drugclass->name }}" placeholder="Drug Classification Name" id="drug_classification_name">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Description</label>
                                            <div class="form-group col-sm-10">
                                                <textarea name="description" id="description" cols="10" rows="5" class="form-control" placeholder="Description">{{ $drugclass->description }}</textarea>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            Edit Drug Class
                                            <i class="ri-user-add-line align-middle ms-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>

                </div>
            </div>

            <x-footer />

        </div>

    </div>

    <x-right-sidebar />

    <div class="rightbar-overlay"></div>

</x-app-layout>
