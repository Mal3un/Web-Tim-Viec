@extends('layout.master')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .error {
            color: red;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card p-4">
                <div id="div-error" class="alert alert-danger d-none">

                </div>
                <div class="card-body">
                    <form action="{{route('admin.posts.store')}}" id="form-create-post" method="post" class="d-flex flex-column">
                        @csrf
                        <div class="form-group d-flex mb-3">
                            <div class="col-md-4  ">
                                <label for="select-company">Company (*)</label>
                                <select name="company" id="select-company" class="form-control"></select>
                            </div>
                            <div class="col-md-4">
                                <label for="select-language">Language (*)</label>
                                <select name="languages[]" multiple id="select-language" class="form-control "></select>
                            </div>
                        </div>
                        <div class="form-group d-flex ">
                            <div class="col-md-4">
                                <label for="select-city">City (*)</label>
                                <select name="city" id="select-city" class="form-control"></select>
                            </div>
                            <div class="col-md-4">
                                <label for="select-district">District </label>
                                <select name="district" id="select-district" class="form-control"></select>
                            </div>
                        </div>
                        <div class="form-group d-flex col">
                            <div class="form-group ">
                                <label class="" for="workingLocate">Job request</label>
                                <div id="workingLocate" class="d-flex col-md-12">
                                    <div class="mr-2 mb-0">
                                        <label class="container">
                                            <span style="padding-left:16px">At work</span>
                                            <input type="checkbox" id="at_work" checked="checked" value="0">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="mr-4 mb-0">
                                        <label class="container">
                                            <span style="padding-left:16px">At home</span>
                                            <input type="checkbox" id="at_home" value="1">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="d-flex mb-0">
                                        <label for="part_time" style="font-size:16px; margin-right:10px; margin-bottom:0;">Part time</label>
                                        <input type="checkbox" id="part_time" checked data-switch="info"/>
                                        <label for="part_time" data-off-label="No" data-on-label="Yes"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-flex col-8">
                            <div class="col-sm-4 pl-0">
                                <label for="min_salary">Min Salary</label>
                                <input type="number" name="min_salary" id="min_salary" class="form-control"></input>
                            </div>
                            <div class="col-md-4">
                                <label for="max_salary">Max Salary</label>
                                <input type="number" name="max_salary" id="max_salary" class="form-control"></input>
                            </div>
                            <div class="col-md-4 pr-0">
                                <label for="currency_salary">Currency</label>
                                <select name="currency_salary" id="currency_salary" class="form-control">
                                @foreach ($currencies as $index => $value)
                                        <option value="{{ $value }}">{{ $index }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group d-flex ">
                            <div class="col-sm-8">
                                <label for="requirement">Requirement</label>
                                <textarea style="min-height:100px" class="form-control" name="requirement" id="requirement" placeholder="Requirement"> </textarea>
                            </div>
                        </div>
                        <div class="form-group d-flex ">
                            <div class="col-md-3">
                                <label for="start_date">Start date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="end_date">End date </label>
                                <input type="date" name="end_date" id="end_date" class="form-control"></input>
                            </div>
                            <div class="col-md-2">
                                <label for="number_applicant">Number Applicant</label>
                                <input type="number" name="number_applicant" id="number_applicant" class="form-control"></input>
                            </div>
                        </div>
                        <div class="form-group d-flex ">
                            <div class="col-md-4">
                                <label for="job_title">Job title</label>
                                <input name="job_title" id="job_title" class="form-control"></input>
                            </div>
                            <div class="col-md-4">
                                <label for="slug">Slug</label>
                                <input name="slug" id="slug" class="form-control"></input>
                            </div>
                        </div>
                        <button class="mt-2 btn btn-primary w-15" id="btnCreatePost" >Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
        <script>
            function generateTitle() {
                const languages = $('#select-language option:selected');
                let language = (languages.map(function(index, value) {
                    return $(value).text();
                }).toArray().join(', '));
                const city = $('#select-city option:selected').text();
                const company = $('#select-company option:selected').text();
                let title = `(${city.trim()}) | (${language.trim()}) | (${company.trim()})`
                $('#job_title').val(title);
                generateSlug(title);
            }

            function generateSlug(title) {
                $.ajax({
                    url: '{{ route('api.posts.generateSlug') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        title
                    },
                    success: function(response) {
                        $("#slug").val(response.data);
                        $('#slug').trigger('change');
                    },
                    error: function(data) {
                        $.toast({
                            heading: 'Error !',
                            text: 'Your slug have not been imported.',
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                        })
                    }
                });
            }

            function checkCompany() {
                $.ajax({
                    url: '{{ route('api.companies.check') }}/' + $("#select-company").val(),
                    type: 'GET',
                    dataType: 'json',
                    success: async function (response) {
                        if (response.data) {
                            submitForm('post');
                        } else {
                            $("#modal-company").modal("show");
                            $("#company").val($("#select-company").val());
                            $("#city").val($("#select-city").val()).trigger('change');
                        }
                    }
                });
            }

            async function loadDistrict(){
                $('#select-district').empty();
                const path = $("#select-city option:selected").data('path');
                const response = await fetch('{{ asset('location/') }}' + path);
                const districts = await response.json();
                $.each(districts.district, function(index, each) {
                        $('#select-district').append(`
                            <option >
                                 ${each.pre} ${each.name}
                            </option>`
                        );
                });
            }
            $(document).ready(async function() {
                // $('#currency_salary').select2();
                $('#currency_salary').select2();
                $('#select-city').select2();
                $('#select-district').select2();
                const response = await fetch(`{{ asset('location/index.json') }}`);
                const cities = await response.json();
                $.each(cities, function (index, each) {
                    $('#select-city').append(`
                        <option data-path='${each.file_path}'>
                            ${index}
                        </option>`
                    );
                });
                $('#select-city').change(function () {
                    loadDistrict();
                });
                loadDistrict();
                $("#select-company").select2({
                    tags: true,
                    ajax: {
                        delay: 250,
                        url: '{{ route('api.companies') }}',
                        data: function (params) {
                            var queryParameters = {
                                q: params.term
                            }

                            return queryParameters;
                        },
                        processResults: function (data) {
                            return {
                                results: $.map(data.data, function (item) {
                                    return {
                                        text: item.name,
                                        id: item.name
                                    }
                                })
                            };
                        }
                    }
                });
                $("#select-language").select2({
                    tags: true,
                    ajax: {
                        delay: 250,
                        url: '{{ route('api.languages') }}',
                        data: function (params) {
                            var queryParameters = {
                                q: params.term
                            }

                            return queryParameters;
                        },
                        processResults: function (data) {
                            return {
                                results: $.map(data.data, function (item) {
                                    return {
                                        text: item.name,
                                        id: item.name
                                    }
                                })
                            };
                        }
                    }
                });
                $('#select-company , #select-language , #select-city').change(function () {
                    generateTitle();
                });
                $('#slug').change(function () {
                    $("#btnCreatePost").attr("disabled");
                    $.ajax({
                        url: '{{ route('api.posts.checkSlug') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            slug: $(this).val()
                        },
                        success: function (response) {
                            if (response.success) {
                                $("#btnCreatePost").removeAttribute("disabled");
                            }
                        },
                        error: function (data) {
                            $.toast({
                                heading: 'Error !',
                                text: 'Your slug have not been imported.',
                                showHideTransition: 'fade',
                                icon: 'error',
                                position: 'top-right',
                            })
                        }
                    });
                });
            });
            $('#form-create-post').validate({
                rules: {
                    company: {
                        required: true,
                    },
                },
                submitHandler: function(form) {
                    checkCompany();
                }
            });
        </script>
    @endpush
@endsection()
