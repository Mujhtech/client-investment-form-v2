$('#clientInvestmentFormPlugin').on('submit', function(e){

  e.preventDefault();

  var form = $(this);
  var ajaxurl = form.data('url');
  var name = form.find('#name').val();
  var email = form.find('#email').val();
  var addressR = form.find('#addressR').val();


  var country = form.find('#country').val();
  var phone = form.find('#phone').val();
  var vote = form.find('#vote').val();
  var dlState = form.find('#dlState').val();
  var otherP = form.find('#otherP').val();
  var birthdate = form.find('#birthdate').val();
  var occupation = form.find('#occupation').val();
  var addressB = form.find('#addressB').val();
  var phoneB = form.find('#phoneB').val();
  var sOccupation = form.find('#sOccupation').val();
  var sAddressB = form.find('#sAddressB').val();
  var sPhoneB = form.find('#sPhoneB').val();
  var citizen = form.find('#citizen').val();

  var otherOne = form.find('#otherOne').val();
  var otherTwo = form.find('#otherTwo').val();
  var otherThree = form.find('#otherThree').val();
  var otherFour = form.find('#otherFour').val();
  var otherFive = form.find('#otherFive').val();
  var otherSix = form.find('#otherSix').val();
  var otherSeven = form.find('#otherSeven').val();
  var otherEigth = form.find('#otherEigth').val();


  var grossIncome = form.find('input[name="grossIncome[]"]:checked').val();
  var marryStatus = form.find('input[name="marryStatus[]"]:checked').val();
  var spouseIncome = form.find('input[name="spouseIncome[]"]:checked').val();
  var pJointIncome = form.find('input[name="pJointIncome[]"]:checked').val();
  var networth = form.find('input[name="networth[]"]:checked').val();
  var jointAssets = form.find('input[name="jointAssets[]"]:checked').val();
  var affiliate = form.find('input[name="affiliate[]"]:checked').val();
  var investPercent = form.find('input[name="investPercent[]"]:checked').val();
  var io = form.find('input[name="io[]"]:checked').val();
  var ra = form.find('input[name="ra[]"]:checked').val();
  var rc = form.find('input[name="rc[]"]:checked').val();
  var porfolioOption = form.find('input[name="porfolioOption[]"]:checked').val();
  var rd = form.find('input[name="rd[]"]:checked').val();
  var portRest = form.find('#portRest').val();




  var investmentAsset = form.find('#investmentAsset').val();
  var investment = form.find('#investment').val();
  var risk = form.find('input[name="chk[]"]:checked').val();
  var comment = form.find('#comment').val();
  var appartment = form.find('input[name="appartment[]"]:checked').val();
  var currentExp = form.find('input[name="length[]"]:checked').val();
  var moneyExp = form.find('#moneyExp').val();
  var cryptoExp = form.find('input[name="lengthC[]"]:checked').val();
  var acctType = form.find('#acctType').val();
  var annualSave = form.find('#annualSave').val();
  var investExp = form.find('input[name="investExt[]"]:checked').val();


  form.find('input, button, textarea').attr('disabled','disabled');
  $('.js-form-submission').addClass('js-show-feedback');


  $.ajax({

    url : ajaxurl,
    type : 'post',
    dataType: 'json',
    data : {

      email : email,
      name : name,
      portRest : portRest,
      addressR : addressR,
      phone : phone,
      country : country,
      dlState : dlState,
      occupation : occupation,
      otherP : otherP,
      birthdate : birthdate,
      addressB : addressB,
      phoneB : phoneB,
      sOccupation : sOccupation,
      sAddressB : sAddressB,
      sPhoneB : sPhoneB,
      marryStatus : marryStatus,
      grossIncome : grossIncome,
      pJointIncome : pJointIncome,
      spouseIncome : spouseIncome,
      pJointIncome : pJointIncome,
      jointAssets : jointAssets,
      networth : networth,
      affiliate : affiliate,
      investPercent : investPercent,
      porfolioOption : porfolioOption,
      io : io,
      ra : ra,
      rc : rc,
      rd : rd,
      citizen : citizen,
      investmentAsset : investmentAsset,
      otherOne : otherOne,
      otherTwo : otherTwo,
      otherThree : otherThree,
      otherFour : otherFour,
      otherFive : otherFive,
      otherSix : otherSix,
      otherSeven : otherSeven,
      otherEigth : otherEigth,
      investment : investment,
      risk : risk,
      vote : vote,
      comment : comment,
      appartment : appartment,
      currentExp : currentExp,
      investExp : investExp,
      cryptoExp : cryptoExp,
      annualSave : annualSave,
      moneyExp : moneyExp,
      acctType : acctType,
      action: 'client_save_investment_form'

    },
    error : function( response ){
      $('.js-form-submission').removeClass('js-show-feedback');
      $('.js-form-error').addClass('js-show-feedback');
      form.find('input, button, textarea').removeAttr('disabled');
    },
    success : function( response ){
      console.log(response);
    //   if( response.success ){
    //     console.log(response);
    //     setTimeout(function(){
    //       $('.js-form-submission').removeClass('js-show-feedback');
    //       $('.js-form-success').addClass('js-show-feedback');
    //       form.find('input, button, textarea').removeAttr('disabled');
    //     },1500);
    //     setTimeout(function(){
    //       window.location.href = 'https://blocksociety.net';
    //     },3000);

    //   } else {

    //     setTimeout(function(){
    //       $('.js-form-submission').removeClass('js-show-feedback');
    //       $('.js-form-error').addClass('js-show-feedback');
    //       form.find('input, button, textarea').removeAttr('disabled').val('');
    //     },1500);

    //   }
    }

  });

});
