(function(){

    $(document).ready(function(){
        $("#ModalCase").modal('hide');
    });
    var code = document.getElementById('code');
    var customer = document.getElementById('customer');
    var city = document.getElementById('city');
    var address = document.getElementById('address');
    var mobile_customer = document.getElementById('mobile_customer');
    var phone_customer = document.getElementById('phone_customer');
    var email = document.getElementById('email');
    var date_order = document.getElementById('date_order');
    var percentage = document.getElementById('percentage');
    var description = document.getElementById('description');
    var date_accident = document.getElementById('date_accident');
    var location = document.getElementById('location');
    var code_partner = document.getElementById('code_partner');
    var partner = document.getElementById('partner');
    var phone_partner = document.getElementById('phone_partner');
    var date_order = document.getElementById('date_order');
    var percentage = document.getElementById('percentage');

    var kin=document.getElementById('kin');
    var type_accident=document.getElementById('type_accident');
    var country=document.getElementById('country');
    var company=document.getElementById('company');
    var insurance=document.getElementById('insurance');
    var service=document.getElementById('service');
    
    var cbxpartner = document.getElementById('cbxpartner');
    var btnmodal = document.getElementById('btnmodal');
    var btncustomer = document.getElementById('btncustomer');
    var btnaccident = document.getElementById('btnaccident');
    var btnsearch = document.getElementById('btnsearch');

    var statusPartner = function(e) {
        e.preventDefault();
        if(document.getElementById('cbxpartner').checked == true){
            code_partner.value = '';
            partner.value = '';
            phone_partner.value = '';
            code_partner.classList.remove('is-invalid');
            kin.value = 0;
            partner.classList.remove('is-invalid');
            phone_partner.classList.remove('is-invalid');
            kin.classList.remove('is-invalid');
            code_partner.disabled = true;
            partner.disabled = true;
            phone_partner.disabled = true;
            kin.disabled = true;
        }else{
            code_partner.disabled = false;
            partner.disabled = false;
            phone_partner.disabled = false;
            kin.disabled = false;
        }
    }

    var validateCode = function(e){            
        if(!$('#code').val().trim().length){
            e.preventDefault();
            var code = document.getElementById('code');
            code.className += ' is-invalid';
            return 0;                
        }
    };

    var validateCustomer= function(e){            
        if(!$('#customer').val().trim().length){
            e.preventDefault();
            var customer = document.getElementById('customer');
            customer.className += ' is-invalid';
            return 0;                
        }
    };

    var validateMobile = function(e){            
        if(!$('#mobile_customer').val().trim().length){
            e.preventDefault();
            var mobile_customer = document.getElementById('mobile_customer');
            mobile_customer.className += ' is-invalid';
            return 0;                
        }
    };

    var validateCountry = function(e){
        var country=document.getElementById('country');
        if(country.value == 0 || country.value == ""){
            e.preventDefault();
            country.className += ' is-invalid';
            return 0;                
        }
    };

    var validateCity = function(e){            
        if(!$('#city').val().trim().length){
            e.preventDefault();
            var city = document.getElementById('city');
            city.className += ' is-invalid';
            return 0;                
        }
    };

    var validateAddress = function(e){            
        if(!$('#address').val().trim().length){
            e.preventDefault();
            var address = document.getElementById('address');
            address.className += ' is-invalid';
            return 0;                
        }
    };

    var validateCodeP = function(e){            
        if(!$('#code_partner').val().trim().length){
            e.preventDefault();
            var code_partner = document.getElementById('code_partner');
            code_partner.className += ' is-invalid';
            return 0;                
        }
    };

    var validateNameP = function(e){            
        if(!$('#partner').val().trim().length){
            e.preventDefault();
            var partner = document.getElementById('partner');
            partner.className += ' is-invalid';
            return 0;                
        }
    };

    var validatePhoneP = function(e){            
        if(!$('#phone_partner').val().trim().length){
            e.preventDefault();
            var phone_partner = document.getElementById('phone_partner');
            phone_partner.className += ' is-invalid';
            return 0;                
        }
    };

    var validateKin = function(e){
        var kin = document.getElementById('kin');
        if(kin.value == 0 || kin.value == ""){
            e.preventDefault();
            kin.className += ' is-invalid';
            return 0;                
        }
    };

    var validateAccident = function(e){            
        if(!$('#date_accident').val().trim().length){
            e.preventDefault();
            var date_accident = document.getElementById('date_accident');
            date_accident.className += ' is-invalid';
            return 0;                
        }
    };

    var validateType = function(e){            
        if(!$('#type_accident').val().trim().length){
            e.preventDefault();
            var type_accident = document.getElementById('type_accident');
            type_accident.className += ' is-invalid';
            return 0;                
        }
    };

    var validateLocation = function(e){            
        if(!$('#location').val().trim().length){
            e.preventDefault();
            var location = document.getElementById('location');
            location.className += ' is-invalid';
            return 0;                
        }
    };

    var validateCompany = function(e){
        var company = document.getElementById('company');
        if(company.value == 0 || company.value == ""){
            e.preventDefault();
            company.className += ' is-invalid';
            return 0;                
        }
    };

    var validateInsurance = function(e){
        var insurance = document.getElementById('insurance');
        if(insurance.value == 0 || insurance.value == ""){
            e.preventDefault();
            insurance.className += ' is-invalid';
            return 0;                
        }
    };

    var validateService = function(e){
        var service = document.getElementById('service');
        if(service.value == 0 || service.value == ""){
            e.preventDefault();
            service.className += ' is-invalid';
            return 0;                
        }
    };

    var validateDate = function(e){            
        if(!$('#date_order').val().trim().length){
            e.preventDefault();
            var date_order = document.getElementById('date_order');
            date_order.className += ' is-invalid';
            return 0;                
        }
    };

    var validatePercentage = function(e){            
        if(!$('#percentage').val().trim().length){
            e.preventDefault();
            var percentage = document.getElementById('percentage');
            percentage.className += ' is-invalid';
            return 0;                
        }
    };

    var validateF = function(e){
        validateCode(e);
        validateCustomer(e);
        validateCountry(e);
        validateCity(e);
        validateAddress(e);
        validateMobile(e);
        if (validateCode(e) != 0 && 
            validateCustomer(e) != 0 && 
            validateCountry(e) != 0 && 
            validateCity(e) != 0 && 
            validateAddress(e) != 0 && 
            validateMobile(e) != 0 ){

            stepper.next();
        }
    };

    var validateS = function(e){
        if(document.getElementById('cbxpartner').checked == true){
            validateAccident(e);
            validateCompany(e);
            validateInsurance(e);
            validateType(e);
            validateLocation(e);
            if (validateAccident(e) != 0 && 
                validateCompany(e) != 0 && 
                validateInsurance(e) != 0 && 
                validateType(e) != 0 && 
                validateLocation(e) != 0){
    
                stepper.next();
            }
        }else{
            validateCodeP(e);
            validateNameP(e);
            validatePhoneP(e);
            validateKin(e);
            validateAccident(e);
            validateCompany(e);
            validateInsurance(e);
            validateType(e);
            validateLocation(e);
            if (validateCodeP(e) != 0 && 
                validateNameP(e) != 0 && 
                validatePhoneP(e) != 0 && 
                validateKin(e) != 0 && 
                validateAccident(e) != 0 && 
                validateCompany(e) != 0 && 
                validateInsurance(e) != 0 && 
                validateType(e) != 0 && 
                validateLocation(e) != 0){
    
                stepper.next();
            }
        }
    };

    var validateT = function(e){
        validateDate(e);
        validatePercentage(e);
        validateService(e);
        if (validateDate(e) != 0 && 
            validatePercentage(e) != 0 && 
            validateService(e) != 0){

            addModal(e);
            $("#ModalCase").modal('show');
        }
    };

    var validateID = function(e){
        validateCode(e);
        if (validateCode(e) != 0 ){

            search(e);
            
        }
    };

    var addModal = function(e){
        
        document.getElementById("dd_code").innerText = "";
        document.getElementById('dd_customer').innerText = "";
        document.getElementById('dd_phone').innerText = "";
        document.getElementById('dd_address').innerText = "";
        document.getElementById('dd_email').innerText = "";

        document.getElementById('dd_cpartner').innerText = "";
        document.getElementById('dd_partner').innerText = "";
        document.getElementById('dd_mpartner').innerText = "";

        var ddCode = document.getElementById('dd_code');
        var ddCustomer = document.getElementById('dd_customer');
        var ddPhone = document.getElementById('dd_phone');
        var ddAddress = document.getElementById('dd_address');
        var ddEmail = document.getElementById('dd_email');

        var ddCP = document.getElementById('dd_cpartner');
        var ddPartner = document.getElementById('dd_partner');
        var ddMPartner = document.getElementById('dd_mpartner');

        var country_id = document.getElementById('country').selectedIndex;
        var option_country = document.getElementById('country').options[country_id].text;
        var company_id = document.getElementById('company').selectedIndex;
        var option_company = document.getElementById('company').options[company_id].text;
        var insurance_id = document.getElementById('insurance').selectedIndex;
        var option_insurance = document.getElementById('insurance').options[insurance_id].text;
        var service_id = document.getElementById('service').selectedIndex;
        var option_service = document.getElementById('service').options[service_id].text;

        phone_c = document.getElementById('mobile_customer').value + " " + document.getElementById('phone_customer').value;
        address = document.getElementById('address').value + ", " + document.getElementById('city').value + " - " + option_country;

        var txtCode = document.createTextNode(document.getElementById('code').value);
        var txtCutomer = document.createTextNode(document.getElementById('customer').value);
        var txtPhone = document.createTextNode(phone_c);
        var txtAddress = document.createTextNode(address);
        var txtEmail = document.createTextNode(document.getElementById('email').value);

        var txtCP = document.createTextNode(document.getElementById('code_partner').value);
        var txtPartner = document.createTextNode(document.getElementById('partner').value);
        var txtMPartner = document.createTextNode(document.getElementById('phone_partner').value);

        ddCode.appendChild(txtCode);
        ddCustomer.appendChild(txtCutomer);
        ddAddress.appendChild(txtAddress);
        ddPhone.appendChild(txtPhone);
        ddEmail.appendChild(txtEmail);

        ddCP.appendChild(txtCP);
        ddPartner.appendChild(txtPartner);
        ddMPartner.appendChild(txtMPartner);

        
        
        var html = '<thead><tr class="text-sm text-secondary">';
            html += '<th>ACCIDENTE</td>';
            html += '<th>ATENCIÓN</td>';
            html += '<th>SEGURO</td>';
            html += '<th>CONTRATO</td>';
            html += '<th>SERVICIO</td>';
            html += '<th>PORCENTAJE</td>';
            html += '</tr></thead>';
            html += '<tbody><tr class="text-sm">';
            html += '<td>  ' + document.getElementById('date_accident').value + ' </td>';
            html += '<td>  ' + option_company + ' </td>';
            html += '<td>  ' + option_insurance + ' </td>';
            html += '<td>  ' + document.getElementById('date_order').value + ' </td>';
            html += '<td>  ' + option_service + ' </td>';
            html += '<td>  ' + document.getElementById('percentage').value + '% </td>';
            html += '</tr></tbody>';
        $("#tblmodal").html(html);
    }

    var search = function(e){
        e.preventDefault();
        
        var code = document.getElementById('code').value;
        var customer = document.getElementById('customer');
        var city = document.getElementById('city');
        var address = document.getElementById('address');
        var mobile_customer = document.getElementById('mobile_customer');
        var phone_customer = document.getElementById('phone_customer');
        var email = document.getElementById('email');

        var json = {
            data: code
        }

        $.ajaxSetup({
            headers:{'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
        });

        $.ajax({
            type:'post',
            url: 'case/valid',
            data: json,
            dataType: 'json',
            success:function(response){
                
                if (Object.keys(response).length == 0) {
                    Swal.fire(
                        '¡Oops!',
                        'Registo no encontrado.',
                        'error'
                        );
                }else{
                    
                    customer.value = response.name_customer;
                    $("#country option[value="+response.country_customer+"]").attr("selected",true);
                    city.value = response.city_customer;
                    address.value = response.address_customer;
                    mobile_customer.value = response.mobile_customer;
                    phone_customer.value = response.phone_customer;
                    email.value = response.email_customer;
                }
            },error:function(response) {                
                console.log(response);
            }
        });    
    }
    
    code.onchange = function(){document.getElementById("code").classList.remove('is-invalid');};
    customer.onchange = function(){document.getElementById("customer").classList.remove('is-invalid');};
    country.onchange = function(){document.getElementById("country").classList.remove('is-invalid');};
    city.onchange = function(){document.getElementById("city").classList.remove('is-invalid');};
    address.onchange = function(){document.getElementById("address").classList.remove('is-invalid');};
    mobile_customer.onchange = function(){document.getElementById("mobile_customer").classList.remove('is-invalid');};

    date_accident.onchange = function(){document.getElementById("date_accident").classList.remove('is-invalid');};
    kin.onchange = function(){document.getElementById("kin").classList.remove('is-invalid');};
    type_accident.onchange = function(){document.getElementById("type_accident").classList.remove('is-invalid');};
    company.onchange = function(){document.getElementById("company").classList.remove('is-invalid');};
    insurance.onchange = function(){document.getElementById("insurance").classList.remove('is-invalid');};
    location.onchange = function(){document.getElementById("location").classList.remove('is-invalid');};
    
    date_order.onchange = function(){document.getElementById("date_order").classList.remove('is-invalid');};
    percentage.onchange = function(){document.getElementById("percentage").classList.remove('is-invalid');};
    service.onchange = function(){document.getElementById("service").classList.remove('is-invalid');};
    
    cbxpartner.addEventListener('change', statusPartner);

    btncustomer.addEventListener('click', validateF);
    btnaccident.addEventListener('click', validateS);
    btnmodal.addEventListener('click', validateT);
    btnsearch.addEventListener('click', validateID);

}())
