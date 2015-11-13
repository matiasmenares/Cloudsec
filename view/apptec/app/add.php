
<link rel="stylesheet" href ="<?php echo TEMPLATE; ?>plugins/autocomplete/content/styles.css" />

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="<?php if($_SESSION['menu_side'] == 0){ echo "page-sidebar-closed page-sidebar-closed-hide-logo"; }elseif($_SESSION['menu_side'] == 1){ echo ""; } ?>">
<?php require(TEMPLATE.'comun/header.php'); ?>
<?php require(TEMPLATE.'comun/menu.php'); ?>

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
	            <li>
	                <a href="home/">
	                    <i class="fa fa-home"></i>
	                    Home
	                </a>
                </li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>
	                <a href="app/list/">
	                    <i class="fa fa-rocket"></i>
	                    Aplicaciones
	                </a>
                </li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>
                    <i class="fa fa-plus-circle"></i>
                    Agregar Aplicacion
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-fit-height red-thunderbird dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Configuración <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                       
                        <li>
                            <a href="#" data-toggle="modal" data-target=".modal">Configurar Impuesto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER-->
         <!-- TAB -->
<div class="portlet light bordered" id="form_wizard_1">
		<div class="portlet-title">
		    <div class="caption">
		        <i class=" icon-layers font-red"></i>
		        <span class="caption-subject font-red bold uppercase"> Agregar App -
		            <span class="step-title"> Paso 1 de 4 </span>
		        </span>
		    </div>
		    <div class="actions">
		        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
		            <i class="icon-cloud-upload"></i>
		        </a>
		        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
		            <i class="icon-wrench"></i>
		        </a>
		        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
		            <i class="icon-trash"></i>
		        </a>
		    </div>
		</div>
		<div class="portlet-body form">
		    <form action="#" class="form-horizontal" id="submit_form" method="POST" novalidate="novalidate">
		        <div class="form-wizard">
		            <div class="form-body">
		                <ul class="nav nav-pills nav-justified steps">
		                    <li class="active">
		                        <a href="#tab1" data-toggle="tab" class="step" aria-expanded="true">
		                            <span class="number"> 1 </span>
		                            <span class="desc">
		                                <i class="fa fa-check"></i> Configurar Applicación </span>
		                        </a>
		                    </li>
		                    <li>
		                        <a href="#tab2" data-toggle="tab" class="step">
		                            <span class="number"> 2 </span>
		                            <span class="desc">
		                                <i class="fa fa-check"></i> Servicios </span>
		                        </a>
		                    </li>
		                    <li>
		                        <a href="#tab3" data-toggle="tab" class="step active">
		                            <span class="number"> 3 </span>
		                            <span class="desc">
		                                <i class="fa fa-check"></i> Codigo </span>
		                        </a>
		                    </li>
		                    <li>
		                        <a href="#tab4" data-toggle="tab" class="step">
		                            <span class="number"> 4 </span>
		                            <span class="desc">
		                                <i class="fa fa-check"></i> Confirmar </span>
		                        </a>
		                    </li>
		                </ul>
		                <div id="bar" class="progress progress-striped" role="progressbar">
		                    <div class="progress-bar progress-bar-success" style="width: 25%;"> </div>
		                </div>
		                <div class="tab-content">
		                    <div class="alert alert-danger display-none">
		                        <button class="close" data-dismiss="alert"></button> Tienes algunos errores en el formulario! </div>
		                    <div class="alert alert-success display-none">
		                        <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
		                    <div class="tab-pane active" id="tab1">
		                        <h3 class="block">Detalles de la aplicacion</h3>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Nombre
		                                <span class="required" aria-required="true"> * </span>
		                            </label>
		                            <div class="col-md-4">
		                                <input type="text" class="form-control" name="username">
		                                <span class="help-block"> Nombre de tu Aplicación </span>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Password
		                                <span class="required" aria-required="true"> * </span>
		                            </label>
		                            <div class="col-md-4">
		                                <input type="password" class="form-control" name="password" id="submit_form_password">
		                                <span class="help-block"> Password. </span>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Confirmar Password
		                                <span class="required" aria-required="true"> * </span>
		                            </label>
		                            <div class="col-md-4">
		                                <input type="password" class="form-control" name="rpassword">
		                                <span class="help-block"> Confirma tu Password </span>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Email
		                                <span class="required" aria-required="true"> * </span>
		                            </label>
		                            <div class="col-md-4">
		                                <input type="text" class="form-control" name="email">
		                                <span class="help-block"> Email </span>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="tab-pane" id="tab2">
		                        <h3 class="block">Provide your profile details</h3>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Fullname
		                                <span class="required" aria-required="true"> * </span>
		                            </label>
		                            <div class="col-md-4">
		                                <input type="text" class="form-control" name="fullname">
		                                <span class="help-block"> Provide your fullname </span>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Phone Number
		                                <span class="required" aria-required="true"> * </span>
		                            </label>
		                            <div class="col-md-4">
		                                <input type="text" class="form-control" name="phone">
		                                <span class="help-block"> Provide your phone number </span>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Gender
		                                <span class="required" aria-required="true"> * </span>
		                            </label>
		                            <div class="col-md-4">
		                                <div class="radio-list">
		                                    <label>
		                                        <div class="radio"><span><input type="radio" name="gender" value="M" data-title="Male"></span></div> Male </label>
		                                    <label>
		                                        <div class="radio"><span><input type="radio" name="gender" value="F" data-title="Female"></span></div> Female </label>
		                                </div>
		                                <div id="form_gender_error"> </div>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Address
		                                <span class="required" aria-required="true"> * </span>
		                            </label>
		                            <div class="col-md-4">
		                                <input type="text" class="form-control" name="address">
		                                <span class="help-block"> Provide your street address </span>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">City/Town
		                                <span class="required" aria-required="true"> * </span>
		                            </label>
		                            <div class="col-md-4">
		                                <input type="text" class="form-control" name="city">
		                                <span class="help-block"> Provide your city or town </span>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Country</label>
		                            <div class="col-md-4">
		                                <select name="country" id="country_list" class="form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
		                                    <option value=""></option>
		                                    <option value="AF">Afghanistan</option>
		                                    <option value="AL">Albania</option>
		                                    <option value="DZ">Algeria</option>
		                                    <option value="AS">American Samoa</option>
		                                    <option value="AD">Andorra</option>
		                                    <option value="AO">Angola</option>
		                                    <option value="AI">Anguilla</option>
		                                    <option value="AR">Argentina</option>
		                                    <option value="AM">Armenia</option>
		                                    <option value="AW">Aruba</option>
		                                    <option value="AU">Australia</option>
		                                    <option value="AT">Austria</option>
		                                    <option value="AZ">Azerbaijan</option>
		                                    <option value="BS">Bahamas</option>
		                                    <option value="BH">Bahrain</option>
		                                    <option value="BD">Bangladesh</option>
		                                    <option value="BB">Barbados</option>
		                                    <option value="BY">Belarus</option>
		                                    <option value="BE">Belgium</option>
		                                    <option value="BZ">Belize</option>
		                                    <option value="BJ">Benin</option>
		                                    <option value="BM">Bermuda</option>
		                                    <option value="BT">Bhutan</option>
		                                    <option value="BO">Bolivia</option>
		                                    <option value="BA">Bosnia and Herzegowina</option>
		                                    <option value="BW">Botswana</option>
		                                    <option value="BV">Bouvet Island</option>
		                                    <option value="BR">Brazil</option>
		                                    <option value="IO">British Indian Ocean Territory</option>
		                                    <option value="BN">Brunei Darussalam</option>
		                                    <option value="BG">Bulgaria</option>
		                                    <option value="BF">Burkina Faso</option>
		                                    <option value="BI">Burundi</option>
		                                    <option value="KH">Cambodia</option>
		                                    <option value="CM">Cameroon</option>
		                                    <option value="CA">Canada</option>
		                                    <option value="CV">Cape Verde</option>
		                                    <option value="KY">Cayman Islands</option>
		                                    <option value="CF">Central African Republic</option>
		                                    <option value="TD">Chad</option>
		                                    <option value="CL">Chile</option>
		                                    <option value="CN">China</option>
		                                    <option value="CX">Christmas Island</option>
		                                    <option value="CC">Cocos (Keeling) Islands</option>
		                                    <option value="CO">Colombia</option>
		                                    <option value="KM">Comoros</option>
		                                    <option value="CG">Congo</option>
		                                    <option value="CD">Congo, the Democratic Republic of the</option>
		                                    <option value="CK">Cook Islands</option>
		                                    <option value="CR">Costa Rica</option>
		                                    <option value="CI">Cote d'Ivoire</option>
		                                    <option value="HR">Croatia (Hrvatska)</option>
		                                    <option value="CU">Cuba</option>
		                                    <option value="CY">Cyprus</option>
		                                    <option value="CZ">Czech Republic</option>
		                                    <option value="DK">Denmark</option>
		                                    <option value="DJ">Djibouti</option>
		                                    <option value="DM">Dominica</option>
		                                    <option value="DO">Dominican Republic</option>
		                                    <option value="EC">Ecuador</option>
		                                    <option value="EG">Egypt</option>
		                                    <option value="SV">El Salvador</option>
		                                    <option value="GQ">Equatorial Guinea</option>
		                                    <option value="ER">Eritrea</option>
		                                    <option value="EE">Estonia</option>
		                                    <option value="ET">Ethiopia</option>
		                                    <option value="FK">Falkland Islands (Malvinas)</option>
		                                    <option value="FO">Faroe Islands</option>
		                                    <option value="FJ">Fiji</option>
		                                    <option value="FI">Finland</option>
		                                    <option value="FR">France</option>
		                                    <option value="GF">French Guiana</option>
		                                    <option value="PF">French Polynesia</option>
		                                    <option value="TF">French Southern Territories</option>
		                                    <option value="GA">Gabon</option>
		                                    <option value="GM">Gambia</option>
		                                    <option value="GE">Georgia</option>
		                                    <option value="DE">Germany</option>
		                                    <option value="GH">Ghana</option>
		                                    <option value="GI">Gibraltar</option>
		                                    <option value="GR">Greece</option>
		                                    <option value="GL">Greenland</option>
		                                    <option value="GD">Grenada</option>
		                                    <option value="GP">Guadeloupe</option>
		                                    <option value="GU">Guam</option>
		                                    <option value="GT">Guatemala</option>
		                                    <option value="GN">Guinea</option>
		                                    <option value="GW">Guinea-Bissau</option>
		                                    <option value="GY">Guyana</option>
		                                    <option value="HT">Haiti</option>
		                                    <option value="HM">Heard and Mc Donald Islands</option>
		                                    <option value="VA">Holy See (Vatican City State)</option>
		                                    <option value="HN">Honduras</option>
		                                    <option value="HK">Hong Kong</option>
		                                    <option value="HU">Hungary</option>
		                                    <option value="IS">Iceland</option>
		                                    <option value="IN">India</option>
		                                    <option value="ID">Indonesia</option>
		                                    <option value="IR">Iran (Islamic Republic of)</option>
		                                    <option value="IQ">Iraq</option>
		                                    <option value="IE">Ireland</option>
		                                    <option value="IL">Israel</option>
		                                    <option value="IT">Italy</option>
		                                    <option value="JM">Jamaica</option>
		                                    <option value="JP">Japan</option>
		                                    <option value="JO">Jordan</option>
		                                    <option value="KZ">Kazakhstan</option>
		                                    <option value="KE">Kenya</option>
		                                    <option value="KI">Kiribati</option>
		                                    <option value="KP">Korea, Democratic People's Republic of</option>
		                                    <option value="KR">Korea, Republic of</option>
		                                    <option value="KW">Kuwait</option>
		                                    <option value="KG">Kyrgyzstan</option>
		                                    <option value="LA">Lao People's Democratic Republic</option>
		                                    <option value="LV">Latvia</option>
		                                    <option value="LB">Lebanon</option>
		                                    <option value="LS">Lesotho</option>
		                                    <option value="LR">Liberia</option>
		                                    <option value="LY">Libyan Arab Jamahiriya</option>
		                                    <option value="LI">Liechtenstein</option>
		                                    <option value="LT">Lithuania</option>
		                                    <option value="LU">Luxembourg</option>
		                                    <option value="MO">Macau</option>
		                                    <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
		                                    <option value="MG">Madagascar</option>
		                                    <option value="MW">Malawi</option>
		                                    <option value="MY">Malaysia</option>
		                                    <option value="MV">Maldives</option>
		                                    <option value="ML">Mali</option>
		                                    <option value="MT">Malta</option>
		                                    <option value="MH">Marshall Islands</option>
		                                    <option value="MQ">Martinique</option>
		                                    <option value="MR">Mauritania</option>
		                                    <option value="MU">Mauritius</option>
		                                    <option value="YT">Mayotte</option>
		                                    <option value="MX">Mexico</option>
		                                    <option value="FM">Micronesia, Federated States of</option>
		                                    <option value="MD">Moldova, Republic of</option>
		                                    <option value="MC">Monaco</option>
		                                    <option value="MN">Mongolia</option>
		                                    <option value="MS">Montserrat</option>
		                                    <option value="MA">Morocco</option>
		                                    <option value="MZ">Mozambique</option>
		                                    <option value="MM">Myanmar</option>
		                                    <option value="NA">Namibia</option>
		                                    <option value="NR">Nauru</option>
		                                    <option value="NP">Nepal</option>
		                                    <option value="NL">Netherlands</option>
		                                    <option value="AN">Netherlands Antilles</option>
		                                    <option value="NC">New Caledonia</option>
		                                    <option value="NZ">New Zealand</option>
		                                    <option value="NI">Nicaragua</option>
		                                    <option value="NE">Niger</option>
		                                    <option value="NG">Nigeria</option>
		                                    <option value="NU">Niue</option>
		                                    <option value="NF">Norfolk Island</option>
		                                    <option value="MP">Northern Mariana Islands</option>
		                                    <option value="NO">Norway</option>
		                                    <option value="OM">Oman</option>
		                                    <option value="PK">Pakistan</option>
		                                    <option value="PW">Palau</option>
		                                    <option value="PA">Panama</option>
		                                    <option value="PG">Papua New Guinea</option>
		                                    <option value="PY">Paraguay</option>
		                                    <option value="PE">Peru</option>
		                                    <option value="PH">Philippines</option>
		                                    <option value="PN">Pitcairn</option>
		                                    <option value="PL">Poland</option>
		                                    <option value="PT">Portugal</option>
		                                    <option value="PR">Puerto Rico</option>
		                                    <option value="QA">Qatar</option>
		                                    <option value="RE">Reunion</option>
		                                    <option value="RO">Romania</option>
		                                    <option value="RU">Russian Federation</option>
		                                    <option value="RW">Rwanda</option>
		                                    <option value="KN">Saint Kitts and Nevis</option>
		                                    <option value="LC">Saint LUCIA</option>
		                                    <option value="VC">Saint Vincent and the Grenadines</option>
		                                    <option value="WS">Samoa</option>
		                                    <option value="SM">San Marino</option>
		                                    <option value="ST">Sao Tome and Principe</option>
		                                    <option value="SA">Saudi Arabia</option>
		                                    <option value="SN">Senegal</option>
		                                    <option value="SC">Seychelles</option>
		                                    <option value="SL">Sierra Leone</option>
		                                    <option value="SG">Singapore</option>
		                                    <option value="SK">Slovakia (Slovak Republic)</option>
		                                    <option value="SI">Slovenia</option>
		                                    <option value="SB">Solomon Islands</option>
		                                    <option value="SO">Somalia</option>
		                                    <option value="ZA">South Africa</option>
		                                    <option value="GS">South Georgia and the South Sandwich Islands</option>
		                                    <option value="ES">Spain</option>
		                                    <option value="LK">Sri Lanka</option>
		                                    <option value="SH">St. Helena</option>
		                                    <option value="PM">St. Pierre and Miquelon</option>
		                                    <option value="SD">Sudan</option>
		                                    <option value="SR">Suriname</option>
		                                    <option value="SJ">Svalbard and Jan Mayen Islands</option>
		                                    <option value="SZ">Swaziland</option>
		                                    <option value="SE">Sweden</option>
		                                    <option value="CH">Switzerland</option>
		                                    <option value="SY">Syrian Arab Republic</option>
		                                    <option value="TW">Taiwan, Province of China</option>
		                                    <option value="TJ">Tajikistan</option>
		                                    <option value="TZ">Tanzania, United Republic of</option>
		                                    <option value="TH">Thailand</option>
		                                    <option value="TG">Togo</option>
		                                    <option value="TK">Tokelau</option>
		                                    <option value="TO">Tonga</option>
		                                    <option value="TT">Trinidad and Tobago</option>
		                                    <option value="TN">Tunisia</option>
		                                    <option value="TR">Turkey</option>
		                                    <option value="TM">Turkmenistan</option>
		                                    <option value="TC">Turks and Caicos Islands</option>
		                                    <option value="TV">Tuvalu</option>
		                                    <option value="UG">Uganda</option>
		                                    <option value="UA">Ukraine</option>
		                                    <option value="AE">United Arab Emirates</option>
		                                    <option value="GB">United Kingdom</option>
		                                    <option value="US">United States</option>
		                                    <option value="UM">United States Minor Outlying Islands</option>
		                                    <option value="UY">Uruguay</option>
		                                    <option value="UZ">Uzbekistan</option>
		                                    <option value="VU">Vanuatu</option>
		                                    <option value="VE">Venezuela</option>
		                                    <option value="VN">Viet Nam</option>
		                                    <option value="VG">Virgin Islands (British)</option>
		                                    <option value="VI">Virgin Islands (U.S.)</option>
		                                    <option value="WF">Wallis and Futuna Islands</option>
		                                    <option value="EH">Western Sahara</option>
		                                    <option value="YE">Yemen</option>
		                                    <option value="ZM">Zambia</option>
		                                    <option value="ZW">Zimbabwe</option>
		                                </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-country_list-container"><span class="select2-selection__rendered" id="select2-country_list-container"><span class="select2-selection__placeholder">Select</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Remarks</label>
		                            <div class="col-md-4">
		                                <textarea class="form-control" rows="3" name="remarks"></textarea>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="tab-pane" id="tab3">
		                        <h3 class="block">Provide your billing and credit card details</h3>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Card Holder Name
		                                <span class="required" aria-required="true"> * </span>
		                            </label>
		                            <div class="col-md-4">
		                                <input type="text" class="form-control" name="card_name">
		                                <span class="help-block"> </span>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Card Number
		                                <span class="required" aria-required="true"> * </span>
		                            </label>
		                            <div class="col-md-4">
		                                <input type="text" class="form-control" name="card_number">
		                                <span class="help-block"> </span>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">CVC
		                                <span class="required" aria-required="true"> * </span>
		                            </label>
		                            <div class="col-md-4">
		                                <input type="text" placeholder="" class="form-control" name="card_cvc">
		                                <span class="help-block"> </span>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Expiration(MM/YYYY)
		                                <span class="required" aria-required="true"> * </span>
		                            </label>
		                            <div class="col-md-4">
		                                <input type="text" placeholder="MM/YYYY" maxlength="7" class="form-control" name="card_expiry_date">
		                                <span class="help-block"> e.g 11/2020 </span>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Payment Options
		                                <span class="required" aria-required="true"> * </span>
		                            </label>
		                            <div class="col-md-4">
		                                <div class="checkbox-list">
		                                    <label>
		                                        <div class="checker"><span><input type="checkbox" name="payment[]" value="1" data-title="Auto-Pay with this Credit Card."></span></div> Auto-Pay with this Credit Card </label>
		                                    <label>
		                                        <div class="checker"><span><input type="checkbox" name="payment[]" value="2" data-title="Email me monthly billing."></span></div> Email me monthly billing </label>
		                                </div>
		                                <div id="form_payment_error"> </div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="tab-pane" id="tab4">
		                        <h3 class="block">Confirm your account</h3>
		                        <h4 class="form-section">Account</h4>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Username:</label>
		                            <div class="col-md-4">
		                                <p class="form-control-static" data-display="username"> </p>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Email:</label>
		                            <div class="col-md-4">
		                                <p class="form-control-static" data-display="email"> </p>
		                            </div>
		                        </div>
		                        <h4 class="form-section">Profile</h4>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Fullname:</label>
		                            <div class="col-md-4">
		                                <p class="form-control-static" data-display="fullname"> </p>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Gender:</label>
		                            <div class="col-md-4">
		                                <p class="form-control-static" data-display="gender"> </p>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Phone:</label>
		                            <div class="col-md-4">
		                                <p class="form-control-static" data-display="phone"> </p>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Address:</label>
		                            <div class="col-md-4">
		                                <p class="form-control-static" data-display="address"> </p>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">City/Town:</label>
		                            <div class="col-md-4">
		                                <p class="form-control-static" data-display="city"> </p>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Country:</label>
		                            <div class="col-md-4">
		                                <p class="form-control-static" data-display="country"> </p>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Remarks:</label>
		                            <div class="col-md-4">
		                                <p class="form-control-static" data-display="remarks"> </p>
		                            </div>
		                        </div>
		                        <h4 class="form-section">Billing</h4>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Card Holder Name:</label>
		                            <div class="col-md-4">
		                                <p class="form-control-static" data-display="card_name"> </p>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Card Number:</label>
		                            <div class="col-md-4">
		                                <p class="form-control-static" data-display="card_number"> </p>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">CVC:</label>
		                            <div class="col-md-4">
		                                <p class="form-control-static" data-display="card_cvc"> </p>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Expiration:</label>
		                            <div class="col-md-4">
		                                <p class="form-control-static" data-display="card_expiry_date"> </p>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-3">Payment Options:</label>
		                            <div class="col-md-4">
		                                <p class="form-control-static" data-display="payment[]"> </p>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <div class="form-actions">
		                <div class="row">
		                    <div class="col-md-offset-3 col-md-9">
		                        <a href="javascript:;" class="btn default button-previous disabled" style="display: none;">
		                            <i class="fa fa-angle-left"></i> Back </a>
		                        <a href="javascript:;" class="btn btn-outline green button-next"> Continue
		                            <i class="fa fa-angle-right"></i>
		                        </a>
		                        <a href="javascript:;" class="btn green button-submit" style="display: none;"> Submit
		                            <i class="fa fa-check"></i>
		                        </a>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </form>
		</div>
	</div>
</div>
<!--MODAL -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Seleccionar Impuesto</h4>
            </div>
            <div class="modal-body">
               <input type="hidden" name="medida_producto" value="1">
						    	<div class="form-group">
							    	<label class="control-label">Impuesto</label>
							    	<div class="input-group">
							    		<span class="input-group-addon">
											<i class="fa fa-truck"></i>			
										</span>
										<select class="form-control select2me" name="impuesto" data-placeholder="Selecciona Impuesto...">
										</select>
									</div>
						    	</div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-actualizar-stock" class="btn blue">Guardar</button>
                <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</form>

    <!-- /.modal-dialog -->
</div>
</body>

<?php require(TEMPLATE.'comun/footer.php'); ?>
<?php require(TEMPLATE.'comun/js.php'); ?>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/summernote/summernote.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>plugins/autocomplete/dist/jquery.autocomplete.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/jquery.bootstrap.wizard.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/select2.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/app.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/ingresar-producto.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/form-wizard.min.js"></script>

</body>
<!-- END BODY -->


<!-- END BODY -->

</html>