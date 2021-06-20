@extends('layouts.default', array_merge($tpl_option,['contentFullWidth' => true]))

@section('title', 'Profile Page')

@push('css')
	<link href="/assets/plugins/superbox/superbox.min.css" rel="stylesheet" />
	<link href="/assets/plugins/lity/dist/lity.min.css" rel="stylesheet" />
    <link href="/assets/plugins/x-editable-bs4/dist/bootstrap4-editable/css/bootstrap-editable.css" rel="stylesheet" />
	<link href="/assets/plugins/x-editable-bs4/dist/inputs-ext/address/address.css" rel="stylesheet" />
	<link href="/assets/plugins/x-editable-bs4/dist/inputs-ext/typeaheadjs/lib/typeahead.js-bootstrap.css" rel="stylesheet" />
	<link href="/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
	<link href="/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" />
	<link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet" />
	<link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" />
	<link href="/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin profile -->
	<div class="profile">
		<div class="profile-header">
			<!-- BEGIN profile-header-cover -->
			<div class="profile-header-cover"></div>
			<!-- END profile-header-cover -->
			<!-- BEGIN profile-header-content -->
			<div class="profile-header-content">
				<!-- BEGIN profile-header-img -->
				<div class="profile-header-img">
					<img src="/assets/img/user/no_image.png" alt="">
				</div>
				<!-- END profile-header-img -->
				<!-- BEGIN profile-header-info -->
				<div class="profile-header-info">
					<h4 class="mt-0 mb-1">{{Str::of($user->name)->title()}}</h4>
					<p class="mb-2">{{$user->email}}</p>
					{{-- <a href="/user/profile/edit/{{$user->id}}" class="btn btn-xs btn-purple">Edit Profile</a> --}}
					<a href="/user" class="btn btn-xs btn-yellow">Back to Users</a>
				</div>
				<!-- END profile-header-info -->
			</div>
			<!-- END profile-header-content -->
			<!-- BEGIN profile-header-tab -->
			<ul class="profile-header-tab nav nav-tabs">
				<li class="nav-item"><a href="#profile-post" class="nav-link" data-toggle="tab">POSTS</a></li>
				<li class="nav-item"><a href="#profile-about" class="nav-link" data-toggle="tab">ABOUT</a></li>
				<li class="nav-item"><a href="#profile-photos" class="nav-link" data-toggle="tab">PHOTOS</a></li>
				<li class="nav-item"><a href="#profile-videos" class="nav-link" data-toggle="tab">VIDEOS</a></li>
				{{-- <li class="nav-item"><a href="#profile-friends" class="nav-link" data-toggle="tab">FRIENDS</a></li> --}}
			</ul>
			<!-- END profile-header-tab -->
		</div>
	</div>
	<!-- end profile -->
	<!-- begin profile-content -->
	<div class="profile-content">
		<!-- begin tab-content -->
		<div class="tab-content p-0">
			<!-- begin #profile-post tab -->
			<x-profile.post />
			<!-- end #profile-post tab -->
			<!-- begin #profile-about tab -->
			<x-profile.about :profile="$user->profile"/>
			<!-- end #profile-about tab -->
			<!-- begin #profile-photos tab -->
			<x-profile.photos />
			<!-- end #profile-photos tab -->
			<!-- begin #profile-videos tab -->
			<x-profile.videos />
			<!-- end #profile-videos tab -->
			<!-- begin #profile-friends tab -->
			{{-- <x-profile.friends /> --}}
			<!-- end #profile-friends tab -->
		</div>
		<!-- end tab-content -->
	</div>
	<!-- end profile-content -->
@endsection

@push('scripts')
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
	<script src="/assets/plugins/superbox/jquery.superbox.min.js"></script>
	<script src="/assets/plugins/lity/dist/lity.min.js"></script>
	<script src="/assets/plugins/jquery-migrate/dist/jquery-migrate.min.js"></script>
	<script src="/assets/plugins/x-editable-bs4/dist/bootstrap4-editable/js/bootstrap-editable.min.js"></script>
	<script src="/assets/plugins/x-editable-bs4/dist/inputs-ext/address/address.js"></script>
	<script src="/assets/plugins/x-editable-bs4/dist/inputs-ext/typeaheadjs/lib/typeahead.js"></script>
	<script src="/assets/plugins/x-editable-bs4/dist/inputs-ext/typeaheadjs/typeaheadjs.js"></script>
	<script src="/assets/plugins/x-editable-bs4/dist/inputs-ext/wysihtml5/wysihtml5.js"></script>
	<script src="/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script src="/assets/plugins/select2/dist/js/select2.full.min.js"></script>
	<script src="/assets/plugins/jquery-mockjax/dist/jquery.mockjax.min.js"></script>
	<script src="/assets/plugins/moment/moment.js"></script>
  <script>

    /// Profile About
    var handleGoogleMapSetting = function() {
        "use strict";
        var mapOptions = {
            zoom: 4,
            center: new google.maps.LatLng(37.09024, -95.712891),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true,
            };
            var mapDefault = new google.maps.Map(document.getElementById('google-map'), mapOptions);
    };

    var handleSuperboxSetting = function() {
        $('[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            if ($(e.target).attr('href') == '#profile-photos') {
                $('#profile-photos').attr('data-init', true);
                $('.superbox').SuperBox({
                    background : '#242a30',
                    border : 'rgba(0,0,0,0.1)',
                    xColor : '#a8acb1',
                    xShadow : 'embed'
                });
            }
        });
    };

    var Profile = function () {
        "use strict";
        return {
            //main function
            init: function () {
                handleGoogleMapSetting();
                handleSuperboxSetting();
            }
        };
    }();

var handleAjaxConsoleLog = function(settings, response) {
	var s = [], str;
	s.push(settings.type.toUpperCase() + ' url = "' + settings.url + '"');
	for (var a in settings.data) {
		if (settings.data[a] && typeof settings.data[a] === 'object') {
			str = [];
			for (var j in settings.data[a]) {
				str.push(j+': "'+settings.data[a][j]+'"');
			}
			str = '{ '+str.join(', ')+' }';
		} else {
			str = '"'+settings.data[a]+'"';
		}
		s.push(a + ' = ' + str);
	}
	s.push('RESPONSE: status = ' + response.status);

	if(response.responseText) {
		if($.isArray(response.responseText)) {
			s.push('[');
			$.each(response.responseText, function(i, v){
				s.push('{value: ' + v.value+', text: "'+v.text+'"}');
			});
			s.push(']');
		} else {
			s.push($.trim(response.responseText));
		}
	}
	s.push('--------------------------------------\n');
	$('#console').val(s.join('\n') + $('#console').val());
};

// edit table
var handleEditableFormAjaxCall = function() {

	// mockjax used to create a fake ajax call without a host
	$.mockjaxSettings.responseTime = 500;

	$.mockjax({
		url: '/post',
		response: function(settings) {
			handleAjaxConsoleLog(settings, this);
		}
	});

	// for groups field respond
	$.mockjax({
		url: '/groups',
		response: function(settings) {
			this.responseText = [
				{value: 0, text: 'Guest'},
				{value: 1, text: 'Service'},
				{value: 2, text: 'Customer'},
				{value: 3, text: 'Operator'},
				{value: 4, text: 'Support'},
				{value: 5, text: 'Admin'}
			];
			handleAjaxConsoleLog(settings, this);
		}
	});

	$.mockjax({
		url: '/status',
		status: 500,
		response: function(settings) {
			this.responseText = 'Internal Server Error';
			handleAjaxConsoleLog(settings, this);
		}
	});
};

var handleEditableFieldConstruct = function() {
	$.fn.editable.defaults.mode = 'inline';
	$.fn.editable.defaults.inputclass = 'form-control input-sm';
	$.fn.editable.defaults.url = '/post';
	$('#username').editable();
	$('#firstname').editable({
		validate: function(value) {
			if($.trim(value) === '') {
				return 'This field is requiCOLOR_RED';
			}
		}
	});
	$('#sex').editable({
		prepend: 'not selected',
		source: [
			{value: 1, text: 'Male'},
			{value: 2, text: 'Female'}
		],
		display: function(value, sourceData) {
			var icons = {'': '', 1: '<i class="fa fa-male m-r-5"></i>', 2: '<i class="fa fa-female m-r-5"></i>'},
			elem = $.grep(sourceData, function(o){return o.value == value;});

			if (elem.length) {
				$(this).text(elem[0].text).prepend(icons[value]);
			} else {
				$(this).empty();
			}
		}
	});
	$('#group').editable({
		showbuttons: false
	});
	$('#status').editable();
	$('#vacation').editable({
		datepicker: {
			todayBtn: 'linked'
		}
	});
	$('#dob').editable();
	$('#event').editable({
		placement: 'right',
		combodate: {
			firstItem: 'name'
		}
	});
	$('#meeting_start').editable({
		format: 'yyyy-mm-dd hh:ii',
		viewformat: 'dd/mm/yyyy hh:ii',
		validate: function(v) {
			if(v && v.getDate() == 10) return 'Day cant be 10!';
		},
		datetimepicker: {
			todayBtn: 'linked',
			weekStart: 1
		}
	});
	$('#comments').editable({
		showbuttons: 'bottom'
	});
	$('#state').editable({
		value: 'California',
		typeahead: {
			name: 'state',
			local: ["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]
		}
	});
	$('#fruits').editable({
		pk: 1,
		limit: 3,
		source: [
			{value: 1, text: 'banana'},
			{value: 2, text: 'peach'},
			{value: 3, text: 'apple'},
			{value: 4, text: 'watermelon'},
			{value: 5, text: 'COLOR_ORANGE'}
		]
	});
	$('#tags').editable({
		inputclass: 'form-control',
		select2: {
			tags: ['html', 'javascript', 'css', 'ajax'],
			tokenSeparators: [",", " "]
		}
	});
	var countries = [];
	$.each({"BD": "Bangladesh", "BE": "Belgium", "BF": "Burkina Faso", "BG": "Bulgaria", "BA": "Bosnia and Herzegovina", "BB": "Barbados", "WF": "Wallis and Futuna", "BL": "Saint Bartelemey", "BM": "Bermuda", "BN": "Brunei Darussalam", "BO": "Bolivia", "BH": "Bahrain", "BI": "Burundi", "BJ": "Benin", "BT": "Bhutan", "JM": "Jamaica", "BV": "Bouvet Island", "BW": "Botswana", "WS": "Samoa", "BR": "Brazil", "BS": "Bahamas", "JE": "Jersey", "BY": "Belarus", "O1": "Other Country", "LV": "Latvia", "RW": "Rwanda", "RS": "Serbia", "TL": "Timor-Leste", "RE": "Reunion", "LU": "Luxembourg", "TJ": "Tajikistan", "RO": "Romania", "PG": "Papua New Guinea", "GW": "Guinea-Bissau", "GU": "Guam", "GT": "Guatemala", "GS": "South Georgia and the South Sandwich Islands", "GR": "Greece", "GQ": "Equatorial Guinea", "GP": "Guadeloupe", "JP": "Japan", "GY": "Guyana", "GG": "Guernsey", "GF": "French Guiana", "GE": "Georgia", "GD": "Grenada", "GB": "United Kingdom", "GA": "Gabon", "SV": "El Salvador", "GN": "Guinea", "GM": "Gambia", "GL": "Greenland", "GI": "Gibraltar", "GH": "Ghana", "OM": "Oman", "TN": "Tunisia", "JO": "Jordan", "HR": "Croatia", "HT": "Haiti", "HU": "Hungary", "HK": "Hong Kong", "HN": "Honduras", "HM": "Heard Island and McDonald Islands", "VE": "Venezuela", "PR": "Puerto Rico", "PS": "Palestinian Territory", "PW": "Palau", "PT": "Portugal", "SJ": "Svalbard and Jan Mayen", "PY": "Paraguay", "IQ": "Iraq", "PA": "Panama", "PF": "French Polynesia", "BZ": "Belize", "PE": "Peru", "PK": "Pakistan", "PH": "Philippines", "PN": "Pitcairn", "TM": "Turkmenistan", "PL": "Poland", "PM": "Saint Pierre and Miquelon", "ZM": "Zambia", "EH": "Western Sahara", "RU": "Russian Federation", "EE": "Estonia", "EG": "Egypt", "TK": "Tokelau", "ZA": "South Africa", "EC": "Ecuador", "IT": "Italy", "VN": "Vietnam", "SB": "Solomon Islands", "EU": "Europe", "ET": "Ethiopia", "SO": "Somalia", "ZW": "Zimbabwe", "SA": "Saudi Arabia", "ES": "Spain", "ER": "Eritrea", "ME": "Montenegro", "MD": "Moldova, Republic of", "MG": "Madagascar", "MF": "Saint Martin", "MA": "Morocco", "MC": "Monaco", "UZ": "Uzbekistan", "MM": "Myanmar", "ML": "Mali", "MO": "Macao", "MN": "Mongolia", "MH": "Marshall Islands", "MK": "Macedonia", "MU": "Mauritius", "MT": "Malta", "MW": "Malawi", "MV": "Maldives", "MQ": "Martinique", "MP": "Northern Mariana Islands", "MS": "Montserrat", "MR": "Mauritania", "IM": "Isle of Man", "UG": "Uganda", "TZ": "Tanzania, United Republic of", "MY": "Malaysia", "MX": "Mexico", "IL": "Israel", "FR": "France", "IO": "British Indian Ocean Territory", "FX": "France, Metropolitan", "SH": "Saint Helena", "FI": "Finland", "FJ": "Fiji", "FK": "Falkland Islands (Malvinas)", "FM": "Micronesia, Federated States of", "FO": "Faroe Islands", "NI": "Nicaragua", "NL": "Netherlands", "NO": "Norway", "NA": "Namibia", "VU": "Vanuatu", "NC": "New Caledonia", "NE": "Niger", "NF": "Norfolk Island", "NG": "Nigeria", "NZ": "New Zealand", "NP": "Nepal", "NR": "Nauru", "NU": "Niue", "CK": "Cook Islands", "CI": "Cote d'Ivoire", "CH": "Switzerland", "CO": "Colombia", "CN": "China", "CM": "Cameroon", "CL": "Chile", "CC": "Cocos (Keeling) Islands", "CA": "Canada", "CG": "Congo", "CF": "Central African Republic", "CD": "Congo, The Democratic Republic of the", "CZ": "Czech Republic", "CY": "Cyprus", "CX": "Christmas Island", "CR": "Costa Rica", "CV": "Cape Verde", "CU": "Cuba", "SZ": "Swaziland", "SY": "Syrian Arab Republic", "KG": "Kyrgyzstan", "KE": "Kenya", "SR": "Suriname", "KI": "Kiribati", "KH": "Cambodia", "KN": "Saint Kitts and Nevis", "KM": "Comoros", "ST": "Sao Tome and Principe", "SK": "Slovakia", "KR": "Korea, Republic of", "SI": "Slovenia", "KP": "Korea, Democratic People's Republic of", "KW": "Kuwait", "SN": "Senegal", "SM": "San Marino", "SL": "Sierra Leone", "SC": "Seychelles", "KZ": "Kazakhstan", "KY": "Cayman Islands", "SG": "Singapore", "SE": "Sweden", "SD": "Sudan", "DO": "Dominican Republic", "DM": "Dominica", "DJ": "Djibouti", "DK": "Denmark", "VG": "Virgin Islands, British", "DE": "Germany", "YE": "Yemen", "DZ": "Algeria", "US": "United States", "UY": "Uruguay", "YT": "Mayotte", "UM": "United States Minor Outlying Islands", "LB": "Lebanon", "LC": "Saint Lucia", "LA": "Lao People's Democratic Republic", "TV": "Tuvalu", "TW": "Taiwan", "TT": "Trinidad and Tobago", "TR": "Turkey", "LK": "Sri Lanka", "LI": "Liechtenstein", "A1": "Anonymous Proxy", "TO": "Tonga", "LT": "Lithuania", "A2": "Satellite Provider", "LR": "Liberia", "LS": "Lesotho", "TH": "Thailand", "TF": "French Southern Territories", "TG": "Togo", "TD": "Chad", "TC": "Turks and Caicos Islands", "LY": "Libyan Arab Jamahiriya", "VA": "Holy See (Vatican City State)", "VC": "Saint Vincent and the Grenadines", "AE": "United Arab Emirates", "AD": "Andorra", "AG": "Antigua and Barbuda", "AF": "Afghanistan", "AI": "Anguilla", "VI": "Virgin Islands, U.S.", "IS": "Iceland", "IR": "Iran, Islamic Republic of", "AM": "Armenia", "AL": "Albania", "AO": "Angola", "AN": "Netherlands Antilles", "AQ": "Antarctica", "AP": "Asia/Pacific Region", "AS": "American Samoa", "AR": "Argentina", "AU": "Australia", "AT": "Austria", "AW": "Aruba", "IN": "India", "AX": "Aland Islands", "AZ": "Azerbaijan", "IE": "Ireland", "ID": "Indonesia", "UA": "Ukraine", "QA": "Qatar", "MZ": "Mozambique"}, function(k, v) {
		countries.push({id: k, text: v});
	});
	$('#country').editable({
		source: countries,
		select2: {
			width: 200,
			placeholder: 'Select country',
			allowClear: true
		}
	});
	$('#address').editable({
		url: '/post',
		value: {
			city: "Moscow",
			street: "Lenina",
			building: "12"
		},
		validate: function(value) {
			if(value.city === '') return 'city is requiCOLOR_RED!';
		},
		display: function(value) {
			if(!value) {
				$(this).empty();
				return;
			}
			var html = '<b>' + $('<div>').text(value.city).html() + '</b>, ' + $('<div>').text(value.street).html() + ' st., bld. ' + $('<div>').text(value.building).html();
			$(this).html(html);
		}
	});
	$('#pencil').click(function(e) {
		e.stopPropagation();
		e.preventDefault();
		$('#note').editable('toggle');
	});
	$('#note').editable({
		showbuttons : 'left'
	});
};

var FormEditable = function () {
    "use strict";
    return {
        //main function
        init: function () {
            handleEditableFormAjaxCall();
            handleEditableFieldConstruct();
        }
    };
}();

    $(document).ready(function() {
        Profile.init();
        // FormEditable.init();
    });
  </script>
@endpush
