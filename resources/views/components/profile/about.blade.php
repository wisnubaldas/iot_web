<div class="tab-pane fade show active" id="profile-about">
    <!-- begin table -->
    @dump($profile)
    <div class="table-responsive">
        <table class="table table-profile">
            <thead>
                <tr>
                    <th>
                    <th></th>
                        <h4>
                            <a href="javascript:;" id="first_name" data-type="text" class="edit-table text-black"
                                    data-pk="{{request()->segment(2)}}" data-placement="right"
                                    data-placeholder="First Name Required"
                                    data-title="Enter your Firstname">{{Str::of($profile->first_name)->title()}} </a>
                            <a href="javascript:;" id="last_name" data-type="text" class="edit-table text-black"
                                    data-pk="{{request()->segment(2)}}" data-placement="right"
                                    data-placeholder="Last Name Required"
                                    data-title="Enter your Firstname">{{Str::of($profile->last_name)->title()}} </a>
                            <small id="updated_at">
                                Last Updated : {{$profile->updated_at}}
                            </small>
                        </h4>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="highlight">
                    <td class="field">Mood</td>
                    <td>
                        <a href="javascript:;" id="mood"
                            data-type="textarea"
                            data-rows="5"
                            data-cols="100"
                            data-pk="{{request()->segment(2)}}"
                            class="edit-table text-black"
                            data-placeholder="Your comments here..."
                            data-original-title="Enter comments">{{$profile->mood??'Add Mood Messagesad'}}</a>
                    </td>
                </tr>
                <tr class="divider">
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td class="field">Mobile</td>
                    <td>
                        <i class="fa fa-mobile fa-lg m-r-5"></i>
                        <a href="javascript:;" id="phone_mobile"
                            data-pk="{{request()->segment(2)}}"
                            class="edit-table text-black"
                            data-placeholder="Add Mobile Phone Here..."
                        >{{$profile->phone_mobile??'Add Number'}}</a>
                        </td>
                </tr>
                <tr>
                    <td class="field">Home</td>
                    <td>
                        <i class="fa fa-home fa-lg m-r-5"></i>
                        <a href="javascript:;" id="phone_home"
                            data-pk="{{request()->segment(2)}}"
                            class="edit-table text-black"
                            data-placeholder="Add Home Phone Here..."
                        >{{$profile->phone_home??'Add Number'}}</a>
                    </td>
                </tr>
                <tr>
                    <td class="field">Office</td>
                    <td>
                        <i class="fa fa-briefcase fa-lg m-r-5"></i>
                        <a href="javascript:;" id="phone_office"
                            data-pk="{{request()->segment(2)}}"
                            class="edit-table text-black"
                            data-placeholder="Add Office Phone Here..."
                        >{{$profile->phone_office??'Add Number'}}</a>
                    </td>
                </tr>
                <tr class="divider">
                    <td colspan="2"></td>
                </tr>
                <tr class="highlight">
                    <td class="field">About Me</td>
                    <td><a href="javascript:;">Add Description</a></td>
                </tr>
                <tr class="divider">
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td class="field valign-middle">Country/Region</td>
                    <td class="with-form-control">
                        <select class="form-control form-control-sm" name="region">
                            <option value="US" selected>United State</option>
                            <option value="AF">Afghanistan</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="field">City</td>
                    <td>Los Angeles</td>
                </tr>
                <tr>
                    <td class="field">State</td>
                    <td><a href="javascript:;">Add State</a></td>
                </tr>
                <tr>
                    <td class="field">Website</td>
                    <td><a href="javascript:;">Add Webpage</a></td>
                </tr>
                <tr>
                    <td class="field valign-middle">Gender</td>
                    <td class="with-form-control">
                        <select class="form-control form-control-sm" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="field valign-middle">Birthdate</td>
                    <td class="with-form-control">
                        <select class="form-control form-control-sm" name="day">
                            <option value="04" selected>04</option>
                        </select>
                        -
                        <select class="form-control form-control-sm" name="month">
                            <option value="11" selected>11</option>
                        </select>
                        -
                        <select class="form-control form-control-sm" name="year">
                            <option value="1989" selected>1989</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="field valign-middle">Language</td>
                    <td class="with-form-control">
                        <select class="form-control form-control-sm" name="language">
                            <option value="" selected>English</option>
                        </select>
                    </td>
                </tr>
                <tr class="divider">
                    <td colspan="2"></td>
                </tr>
                <tr class="highlight">
                    <td class="field">&nbsp;</td>
                    <td class="p-t-10 p-b-10">
                        <button type="submit" class="btn btn-primary width-150">Update</button>
                        <button type="submit" class="btn btn-white btn-white-without-border width-150 m-l-5">Cancel</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- end table -->
</div>

@push('scripts')
    <script>
        const user_id = "{{request()->segment(2)}}";
        let updated_at = function(date,newValue)
        {
            $('#updated_at').html('Last Updated : '+date);
        }
        let error_response = function(a,newValue)
        {
            if(a.status == 500)
            {
                return newValue = a.responseText;
            }
            return newValue = a.statusText;
        }
        let about = function(){
            $.fn.editable.defaults.mode = 'inline';
            $.fn.editable.defaults.inputclass = 'form-control input-sm col-md-12';
            $.fn.editable.defaults.url = '/user-profile/update/';
            $('.edit-table').editable({
                validate: function(value) {
                    if($.trim(value) === '') {
                        return 'Wajib di isi....';
                    }
                },
                success: updated_at,
                error:error_response
            });
        }
        var bootAbout = function () {
                "use strict";
                return {
                    //main function
                    init: function () {
                        about()
                    }
                };
            }();

            $(document).ready(function() {
                    bootAbout.init();
            });

    </script>
@endpush
@push('css')
    <style>
        .editableform {
            width:50em;
        }

    </style>
@endpush
