<div class="tab-pane fade show active" id="profile-about">
    <!-- begin table -->
    <div class="table-responsive form-inline">
        <table class="table table-profile">
            <thead>
                <tr>
                    <th></th>
                    <th>
                        <h4>Micheal	Meyer <small>Lorraine Stokes</small></h4>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="highlight">
                    <td class="field">Mood</td>
                    <td>
                        <a href="javascript:;" id="add-motto">Add Mood Messagesad</a>
                    </td>
                </tr>
                <tr class="divider">
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td class="field">Mobile</td>
                    <td><i class="fa fa-mobile fa-lg m-r-5"></i> +1-(847)- 367-8924 <a href="javascript:;" class="m-l-5">Edit</a></td>
                </tr>
                <tr>
                    <td class="field">Home</td>
                    <td><a href="javascript:;">Add Number</a></td>
                </tr>
                <tr>
                    <td class="field">Office</td>
                    <td><a href="javascript:;">Add Number</a></td>
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
        const profile = "{{$profile}}";
        let frm = {
            inputan:function(el,attr){
                el.on('click',function(){
                    $(this).hide();
                    $(this).parent().append(`<div class="form-group col-lg-12"><input
                                            class="form-control form-control-sm" 
                                            name="${attr.name}"
                                            id="${attr.id}"
                                            type="text" 
                                            /></div`)
                    })
                }
            }
        jQuery(function(){
            
            if(!profile)
            {
                frm.inputan($('#add-motto'),{
                                                'name':'motto',
                                                'id':'input-motto'
                                            })
            }
        })
        
    </script>
@endpush