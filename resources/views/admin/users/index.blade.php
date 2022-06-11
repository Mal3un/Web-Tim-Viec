@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline" id="form-filter">
                        <div class="input-group mb-3 w-15 mr-3">
                            <div class="input-group-prepend ">
                                <label class="input-group-text" for="inputGroupSelect01">Role</label>
                            </div>
                            <select class="custom-select select-filter-role" id="inputGroupSelect01" name="role" >
                                <option selected>All...</option>
                                @foreach($roles as $role => $value)
                                    <option value="{{ $value }}"
                                            @if ((string)$value === $selectedRole) selected @endif>
                                        {{$role}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3 w-15 mr-3">
                            <div class="input-group-prepend ">
                                <label class="input-group-text" for="inputGroupSelect01">City</label>
                            </div>
                            <select class="custom-select select-filter-role" id="inputGroupSelect01" name="city" >
                                <option selected>All...</option>
                                @foreach($cities as $city )
                                    <option value="{{ $city }}"
                                            @if ($city === $selectedCity) selected @endif>
                                        {{$city}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3 w-15 mr-3">
                            <div class="input-group-prepend ">
                                <label class="input-group-text" for="inputGroupSelect01">Company</label>
                            </div>
                            <select class="custom-select select-filter-role" id="inputGroupSelect01" name="company" >
                                <option selected>All...</option>
                                @foreach($companies as $company )
                                    <option value="{{ $company->id }}"
                                            @if ($company->id == $selectedCompany) selected @endif>
                                        {{$company->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <nav class="pt-2">
                    <ul class="pagination pagination-rounded mb-0 float-right">
                        {{ $data->links() }}
                    </ul>
                </nav>
                <div class="card-body">
                    <table class="table table-hover table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Info</th>
                                <th>Role</th>
                                <th>Position</th>
                                <th>City</th>
                                <th>Company</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $each)
                                <tr>
                                    <td>
                                        <a href="{{route("admin.$table.show",$each)}}">
                                            {{ $each->id }}
                                        </a>
                                    </td>
                                    <td>
                                        <img src="{{$each->avatar}}" height="64" alt="avatar" class="t">
                                    </td>
                                    <td>
                                        @if($each->GenderName === 'Male')
                                            <span style="color:blue">
                                                {{ $each->GenderName }}
                                            </span>
                                        @endif
                                        @if($each->GenderName !== 'Male')
                                        <span style="color:deeppink">
                                            {{ $each->GenderName }}
                                        </span>
                                        @endif
                                        <br>
                                        <span style="color:black">Name:</span>
                                        {{ $each->name }}
                                        <br>
                                        <span style="color:black">Phone:</span>
                                        <a href="tell::{{$each->phone}}">
                                            {{ $each->phone }}
                                        </a>
                                        <br>
                                        <span style="color:black">Mail:</span>
                                        <a href="mailto::{{$each->email}}">
                                            {{ $each->email }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $each->RoleName }}
                                    </td>
                                    <td>
                                        {{ $each->position }}
                                    </td>
                                    <td>
                                        {{ $each->city }}
                                    </td>
                                    <td>
                                        {{ optional($each->company)->name }}
                                    </td>
                                    <td>
                                        <form method="post" action="{{route("admin.$table.destroy",$each)}}">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" name="delete" class="btn btn-danger">
                                                <i>Delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination pagination-rounded mb-0">
                            {{ $data->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('.select-filter-role').change(function(){
            $('#form-filter').submit();
        });
    });
</script>
@endpush
