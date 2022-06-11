@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header m-2">
                    <a href="{{route('admin.posts.create')}}" class="btn btn-primary">
                        Create New Post
                    </a>
                    <label for="csv" class="btn btn-info m-0 ml-2">
                        Import CSV
                    </label>
                    <input class="d-none" type="file" name="csv" id="csv" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                    <nav>
                        <ul class="pagination pagination-rounded mb-0 float-right paginationId" id="paginationId">

                        </ul>
                    </nav>

                </div>
                <div class="card-body">
                    <table class="table table-striped " id="table-data">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Job Title</th>
                                <th>Location</th>
                                <th>Remotable</th>
                                <th>Is Part-time</th>
                                <th>Range Salary</th>
                                <th>Date Range</th>
                                <th>Status</th>
                                <th>Is Pinned</th>
                                <th>Create At</th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <nav>
                        <ul class="pagination pagination-rounded mb-0 float-left" id="paginationId2">

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            // draw data
            $.ajax({
                url:'{{ route('api.posts') }}',
                dataType:'json',
                data: {page: {{request()->get('page') ?? 1}} },
                success:(function(response){
                    response.data.data.forEach(function (each,index){
                        $('#table-data').append($('<tr>')
                            .append($('<td>').append(each.id))
                            .append($('<td>').append(each.job_title))
                            .append($('<td>').append(each.district + ' - ' + each.city))
                            .append($('<td>').append(each.remotable ? 'Yes' : 'No'))
                            .append($('<td>').append(each.is_partime ? 'Yes' : 'No'))
                            .append($('<td>').append(each.min_salary + ' - ' + each.max_salary))
                            .append($('<td>').append(each.start_date + ' - ' + each.end_date))
                            .append($('<td>').append(each.status))
                            .append($('<td>').append(each.is_pinned ? 'Yes' : 'No'))
                            .append($('<td>').append(new Date(each.created_at).toLocaleString('en-US')))
                        );
                    })
                    renderPagination(response.data.pagination);
                }),
                error:(function(error){
                    $.toast({
                        heading: 'Import Error',
                        text: 'Your data have not been imported.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                    })
                })
            })
            $(document).on('click', '#paginationId > li > a', function (event){
                event.preventDefault();
                let page = $(this).text().trim();
                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('page',page)
                window.location.search = urlParams;
            });
            $(document).on('click', '#paginationId2 > li > a', function (event){
                event.preventDefault();
                let page = $(this).text().trim();
                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('page',page)
                window.location.search = urlParams;
            });
            // import csv
            $("#csv").change(function(event){
                var formData = new FormData();
                formData.append('file', $(this)[0].files[0]);
                $.ajax({
                    url:'{{ route('admin.posts.import_csv') }}',
                    dataType:'json',
                    encrypt:'multipart/form-data',
                    data: formData,
                    async:false,
                    cache:false,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success:function(response){
                        $.toast({
                            heading: 'Import success !',
                            text: 'Your data have been imported.',
                            showHideTransition: 'fade',
                            icon: 'success',
                            position: 'top-right',
                        })
                    },
                    error: function(response){
                        console.log(response);
                    }
                })
            });

        })
    </script>
@endpush
