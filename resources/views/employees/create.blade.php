@extends('layouts.app')

@section('title', 'Create Employee')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Create Employee</div>
            <div class="card-body">
                <form action="{{ route('employee.store') }}" method="post" id="create-form">
                    @csrf
                    <div class="row justify-content-between bg-light mb-3 mt-3">
                        <div class="col-6">
                            <div class="form-outline mb-5">
                                <input type="text" name="employee_id" class="form-control form-control-lg" />
                                <label class="form-label" for="typeText">Employee ID</label>
                            </div>

                            <div class="form-outline mb-5">
                                <input type="text" name="name" class="form-control form-control-lg" />
                                <label class="form-label" for="typeText">Name</label>
                            </div>

                            <div class="form-outline mb-5">
                                <input type="email" name="email" class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmail">Email</label>
                            </div>

                            <div class="form-outline mb-5">
                                <input type="tel" name="phone" class="form-control form-control-lg" />
                                <label class="form-label" for="typePhone">Phone number</label>
                            </div>

                            <div class="form-outline mb-5">
                                <input type="number" name="nrc_number" class="form-control form-control-lg" />
                                <label class="form-label" for="typeNumber">NRC Number</label>
                            </div>

                            <div class="form-outline mb-5">
                                <input type="text" name="birthday" class="form-control form-control-lg birthday"
                                    value="" />
                                <label class="form-label" for="typeNumber">Birthday</label>
                            </div>

                            <div class="form-outline mb-5">
                                <input type="number" name="passoword" class="form-control form-control-lg" />
                                <label class="form-label" for="typePhone">Password</label>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-group mb-5">
                                <select class="form-control" name="gender">
                                    <option hidden>Please Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="form-group mb-5">
                                <select class="form-control">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-5">
                                <select class="form-control" name="is_present">
                                    <option hidden>Please Select Still Company</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-outline mb-5">
                                <input type="text" name="date_of_join" class="form-control form-control-lg date_of_join"
                                    value="" />
                                <label class="form-label" for="typeNumber">Date of join</label>
                            </div>

                            <div class="form-outline mb-5">
                                <textarea class="form-control form-control-lg" name="address" rows="3"></textarea>
                                <label class="form-label" for="textAreaExample">Address</label>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- {!! JsValidator::formRequest('App\Http\Requests\Employee\storeRequest', '#create-form') !!} --}}
    <script>
        $(function() {
            $('.birthday').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "autoApply": true,
                "maxDate": moment(),
                "startDate": "10/26/2023",
                "endDate": "11/01/2023",
                "drops": "up",
                "format": "YYY-MM-DD",
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            }, function(start, end, label) {
                console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format(
                    'YYYY-MM-DD') + ' (predefined range: ' + label + ')');
            });

            $('.birthday').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD'));
            });
        });

        $(function() {
            $('.date_of_join').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "autoApply": true,
                "maxDate": moment(),
                "startDate": "10/26/2023",
                "endDate": "11/01/2023",
                "drops": "up",
                "format": "YYY-MM-DD",
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            }, function(start, end, label) {
                console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format(
                    'YYYY-MM-DD') + ' (predefined range: ' + label + ')');
            });

            $('.date_of_join').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD'));
            });
        });
    </script>
@endpush
