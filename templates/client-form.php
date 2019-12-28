<?php if ( is_user_logged_in() ) { ?>

<form id="clientInvestmentFormPlugin" class="sunset-contact-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
    <input type="hidden" name="name" id="name" value="<?php echo get_user_by('id', get_current_user_id())->display_name; ?>">
    <p><center>Please answer all questions completely</center></p>

	<p>
	<font style="font-size:30px"><b>A. Personal</b></font>
	<ol>
	<li><div class="form-group">
      <label>E-Mail Address </label>
	  <input type="text" name="email" value="" id="email" class="form-control sunset-form-control" placeholder="Your Email">
      <small class="text-danger form-control-msg"><font color="red">*</font>Your Email is Required</small>
    </div><br /></li>
		<li><div class="form-group">
      <div class="row custom-control custom-radio">
        <div class="col-md-3">Do you own a home or rent?</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="appartment[]" value="own">Own</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="appartment[]" value="rent">Rent</div><br />
      </div><br /></li>
	<li><div class="form-group">
      <label>Address of Principal Residence </label>
	  <input type="text" name="addressR" value="" id="addressR" class="form-control sunset-form-control" placeholder="Your Primary Residence Address">
    </div><br /></li>
	<div class="form-group">
      <label style="margin-left: 40px">County of Residence </label>
	  <input type="text" name="country" value="" id="country" class="form-control sunset-form-control" placeholder="County of Residence">
    </div><br />
	<li><div class="form-group">
      <label>Telephone Number</label>
	  <input type="text" name="phone" value="" id="phone" class="form-control sunset-form-control" placeholder="Primary Phone Number">
    </div><br /></li>
	<li><div class="form-group">
      <label>Where are you registered to vote?</label>
	  <input type="text" name="vote" value="" id="vote" class="form-control sunset-form-control" placeholder="Voting Registration State">
    </div><br /></li>
	<li><div class="form-group">
      <label>Your Driver's License is issued by the following state?</label>
	  <input type="text" name="dlState" value="" id="dlState" class="form-control sunset-form-control" placeholder="Driver's License State">
    </div><br /></li>
	<li><div class="form-group">
      <label>Other Residences or Contacts: Please identify any other state where you own a residence, are registered to vote, pay income taxes, hold a driver's license or have any other contact, and describe your connection with such state: </label><br>
	  <textarea name="otherP" rows="6" cols="40" id="otherP" class="form-control sunset-form-control" placeholder="Your Comments"></textarea>
    </div><br /></li>
	<li><div class="form-group">
	 <label for="birthdate">Birthdate:</label>
	 <input type="date" id="birthdate" name="birthdate" class="form-control sunset-form-control"
       value="2002-12-20"
       min="1901-01-01" max="2002-12-31">
	</div><br /></li>
	<li><div class="form-group">
      <label>Country of Citizenship</label>
	  <input type="text" name="citizen" value="" id="citizen" class="form-control sunset-form-control" placeholder="Country of citizenship">
    </div><br /></li>
	</ol>
	</p>
	<p><font style="font-size: 30px"><b>B. Occupations and Income</b></font>
	<ol>
	<li><div class="form-group">
      <label>Occupation</label>
	  <input type="text" name="occupation" value="" id="occupation" class="form-control sunset-form-control" placeholder="Occupation">
    </div><br /></li>
	<div class="form-group">
      <label style="margin-left: 40px">Business Address</label>
	  <input type="text" name="addressB" value="" id="addressB" class="form-control sunset-form-control" placeholder="Business Address">
    </div><br />
	<div class="form-group">
      <label style="margin-left: 40px">Business Phone Number</label>
	  <input type="text" name="phoneB" value="" id="phoneB" class="form-control sunset-form-control" placeholder="Business Phone Number">
    </div><br />
	<li><div class="row custom-control custom-radio">
        <div class="col-md-3">Gross income during each of the last two years exceeded:</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="grossIncome[]" value="1">$25,000</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="grossIncome[]" value="2">$50,000</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="grossIncome[]" value="3">$100,000</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="grossIncome[]" value="4">$200,000</div><br />
      </div><br /></li>
	<li><div class="form-group">
		<label>Are you married?</label><br />
		<input type="radio" name="marryStatus[]" value="1" class="form-control sunset-form-control">
		<label for="marriedY">Yes</label><br />
		<input type="radio" name="marryStatus[]" value="2" class="form-control sunset-form-control">
		<label for="marriedN">No</label><br /></li>
	<li><div class="form-group">
      <label>What is your spouses Occupation?</label>
	  <input type="text" name="sOccupation" value="" id="sOccupation" class="form-control sunset-form-control" placeholder="Occupation">
    </div><br /></li>
	<div class="form-group">
      <label style="margin-left: 40px">Business Address</label>
	  <input type="text" name="sAddressB" value="" id="sAddressB" class="form-control sunset-form-control" placeholder="Business Address">
    </div><br />
	<div class="form-group">
      <label style="margin-left: 40px">Business Phone Number</label>
	  <input type="text" name="sPhoneB" value="" id="sPhoneB" class="form-control sunset-form-control" placeholder="Business Phone Number">
    </div><br />
	<li><div class="row custom-control custom-radio">
        <div class="col-md-3">Spuses Estimated gross income during current year exceeds:</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="spouseIncome[]" value="1">$25,000</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="spouseIncome[]" value="2">$50,000</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="spouseIncome[]" value="3">$100,000</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="spouseIncome[]" value="4">$200,000</div><br />
      </div><br /></li>
	<li><div class="form-group">
		<label>Joint gross income with the spouse during each of the last two years exceeded $300,000?</label><br />
		<input type="radio" name="pJointIncome[]" value="1" class="form-control sunset-form-control">
		<label for="PJointIncomeY">Yes</label><br />
		<input type="radio" name="pJointIncome[]" value="2" class="form-control sunset-form-control">
		<label for="PJointIncomeN">No</label><br /></li>
	<li> <div class="form-group">
      <label>How much are your current monthly expenses?</label>
      <input type="number" name="currentExp" value="" id="currentExp" class="form-control sunset-form-control" style="width: 200px;" placeholder="$Dollar Value">
    </div><br /></li>
	</ol>
	</p>

	<p>
	<font style="font-size: 30px"><b>C. Net Worth</b></font>
	<ol>
	<li><div class="row custom-control custom-radio">
        <div class="col-md-3">Current net worth or joint net worth with spouse (note that "net worth" includes all of the assets owned by you and your spouse in excess of total liabilities, and excluding the value of your primary residence.):</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="networth[]" value="1">$50,000 - $100,000</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="networth[]" value="2">$100,000 - $250,000</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="networth[]" value="3">$250,000 - $500,000</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="networth[]" value="4">$500,000 - $750,000</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="networth[]" value="5">$750,000 - $1,000,000</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="networth[]" value="6">over $1,000,000</div><br />
      </div><br /></li>
	  	<li><div class="form-group">
		<label>Current value of liquid assets (cash, freely marketable securities, cash surrender value of life insurance policies, and other items easily convertible into cash) is sufficient to provide for current needs and possible personal contingincies:</label><br />
		<input type="radio" name="jointAssets[]" value="1" class="form-control sunset-form-control">
		<label for="JointIncomeY">Yes</label><br />
		<input type="radio" name="jointAssets[]" value="2" class="form-control sunset-form-control">
		<label for="JointIncomeN">No</label><br /></li>
		</ol>
		</p>

	<p>	<font style="font-size: 30px"><b>D. Affiliation with the Company</b></font>
		<ol>
		 <li><div class="form-group">
		<label>Are you a director or Executive Officer of the Company?</label><br />
		<input type="radio" name="affiliate[]" value="1" class="form-control sunset-form-control">
		<label for="JointIncomeY">Yes</label><br />
		<input type="radio" name="affiliate[]" value="2" class="form-control sunset-form-control">
		<label for="JointIncomeN">No</label><br /></li>
		</ol>
		<br /></p>

	<p>	<font style="font-size: 30px"><b>E. Investment Percentage of Net Worth</b></font>
		<ol>
		 <li><div class="form-group">
		<label>If you expect to invest at least $150,000 in varying asset classes, does your total purchase price exceed 10% of your net worth at the time of sale, or joint net worth with your spouse?</label><br />
		<input type="radio" name="investPercent[]" value="1" class="form-control sunset-form-control">
		<label for="JointIncomeY">Yes</label><br />
		<input type="radio" name="investPercent[]" value="2" class="form-control sunset-form-control">
		<label for="JointIncomeN">No</label><br /></li>
		</ol>
		<br /></p>

	<p>	<font style="font-size: 30px"><b>F. Investment Experience</b></font>
		<ol>
		<li><div class="row custom-control custom-radio">
        <div class="col-md-3">To what extent do you follow the markets?</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="investExt[]" value="1">Not at all</div>
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="investExt[]" value="2">Somewhat</div>
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="investExt[]" value="3">Very Closely</div><br /></li>
		<li><div class="form-group">
	      <label>Total Investment Asset(s) Portfolio Value</label>
	  <input type="number" id="investmentAsset" name="investmentAsset" class="form-control sunset-form-control" style="width: 200px;" value="" placeholder="Total Asset Portfolio">
      <small class="text-danger form-control-msg"><font color="red">*</font>Your Investment is Required</small>
    </div><br /></li>
    <li><div class="form-group">
      <label>Total Crypto Portfolio Value</label>
	  <input type="number" id="investment" name="investment" class="form-control sunset-form-control" style="width: 200px;" value="" placeholder="Total Crypto Portfolio">
      <small class="text-danger form-control-msg"><font color="red">*</font>Your Investment is Required</small>
    </div><br /></li>
    <li><div class="form-group">
      <label>What are your short, mid, and long term investment goals?  </label><br />
	  <textarea name="comment" rows="5" cols="40" id="comment" class="form-control sunset-form-control" placeholder="Your Comment"></textarea>
    </div><br /></li>
	<li><div class="form-group">
      <div class="row custom-control custom-radio">
        <div class="col-md-3">How long have you been investing?</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="length[]" value="1">less than 1 year</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="length[]" value="2">1-3 years</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="length[]" value="3">3-5 years</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="length[]" value="4">5-10 years</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="length[]" value="5">10+ years</div><br />
      </div><br />
	 </div><br /></li>
	 <li><div class="form-group">
      <div class="row custom-control custom-radio">
        <div class="col-md-3">How long have you been investing in cryptocurrency?</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="lengthC[]" value="1">less than 1 year</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="lengthC[]" value="2">1-3 years</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="lengthC[]" value="3">3-5 years</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="lengthC[]" value="4">5-10 years</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="lengthC[]" value="5">10+ years</div><br />
      </div><br />
	  </div><br /></li>
	<li><div class="form-group">
      <label>Do you have any of the following investment asset classes? If so, what is the value of each?</label>
	  <br /><input type="number" id="otherOne" name="401k" class="form-control sunset-form-control" style="width: 200px;" value="" placeholder="401k Value">
      <br /><input type="number" id="otherTwo" name="IRAR" class="form-control sunset-form-control" style="width: 200px;" value="" placeholder="Roth IRA Value">
	  <br /><input type="number" id="otherThree" name="IRAT" class="form-control sunset-form-control" style="width: 200px;" value="" placeholder="Traditional IRA Value">
	  <br /><input type="number" id="otherFour" name="Stocks" class="form-control sunset-form-control" style="width: 200px;" value="" placeholder="Total Stock Value">
	  <br /><input type="number" id="otherFive" name="Bonds" class="form-control sunset-form-control" style="width: 200px;" value="" placeholder="Total Bonds Value">
	  <br /><input type="number" id="otherSix" name="529 plan" class="form-control sunset-form-control" style="width: 200px;" value="" placeholder="Total 529 plan Value">
	  <br /><input type="text" id="otherSeven" name="othertext" class="form-control sunset-form-control" style="width: 200px;" value="" placeholder="other investment name">
	  <br /><input type="number" id="otherEigth" name="other" class="form-control sunset-form-control" style="width: 200px;" value="" placeholder="other total value">
	</div><br /></li>
    <li><div class="form-group">
      <label>Do you have a plan for retirement? How much should you save annually?</label>
      <input type="text" name="annualSave" value="" id="annualSave" class="form-control sunset-form-control" placeholder="yes, I need double my current monthly income">
    </div><br /></li>
  	</ol>
	</p>

	<p><font style="font-size: 30px"><b>G. Your Investment Objectives</b></font>
	<ol>
	<li><div class="form-group">
      <div class="row custom-control custom-radio">
        <div class="col-md-3">Based on your overall financial goals, which of the following best describes your investment:</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="io[]" value="1">Capital Appreciation: Mazimize long-term returns while accepting the likelihood of short-term losses in my account. Recommended minimum is over five years.</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="io[]" value="2">Capital Appreciation plus some income: Accept some market risk but cushion losses in market declines. Recommended minimum investment period is over five years.</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="io[]" value="3">Current Income: Generate current income while limiting losses to principal. Recommended minimum investment period is three to five years.</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="io[]" value="4">Capital Preservation: Preserve capital while seeking growth at a rate equal to inflation. Recommended minimum investment period is three to five years.</div><br />
      </div><br />
	  </div><br /></li>
	</ol></p>

	<p><font style="font-size: 30px"><b>H. Risk Tolerance</b></font>
	<ol>
	<li><div class="form-group">
      <div class="row custom-control custom-radio">
        <div class="col-md-3">What is your allowable level of risk tolerance?</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" id="risk" name="chk[]" value="low">Low</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" id="risk1" name="chk[]" value="moderate">Moderate</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" id="risk2" name="chk[]" value="high">High</div><br />
      </div><br />
    </div><br /></li>
	<li><div class="form-group">
      <div class="row custom-control custom-radio">
        <div class="col-md-3">Given your tolerance for risk and understanding that investments fluctuate in value, which of the following statements would best describe your reaction if the value of your portfolio were to decline by 5% - 10% over a short period of time:</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="ra[]" value="1">Extremely Concerned: I cannot accept even temporary loss of principal. But I recognize the need for my investments to grow. I am willing to sacrifice higher returns and liquidity in exchange for safety of principal.</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="ra[]" value="2">Concerned: But I recognize that short-term losses are a normal investment risk, and I can tolerate one or two quarters of negative returns.</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="ra[]" value="3">Somewhat Concerned: But I am more interested in my total return over a three to five year period.</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="ra[]" value="4">Not Concerned: I am primarily interested in achieving my long-term investment goals.</div><br />
      </div><br />
	  </div><br /></li>
	  <li><div class="form-group">
      <div class="row custom-control custom-radio">
        <div class="col-md-3">Where would you rate yourself on thi scale?</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="rc[]" value="1">1 - Minimize losses and I am willing to take less return</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="rc[]" value="2">5 - A balanced investment mix with fluctuations and growth of assets</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="rc[]" value="3">10 - Maximum accumulation of assets regardless of short term fluctuations</div><br />
      </div><br />
	  </div><br /></li>
	   <li><div class="form-group">
      <div class="row custom-control custom-radio">
        <div class="col-md-3">Check the box that you feel best describes you:</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="rd[]" value="1">I would rather accept a lower rate of return than subject my investment to short-term volatility</div><br />
        <div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="rd[]" value="2">I invest for long-term growth, but would be concerned about a temporary decline</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="rd[]" value="3">I invest for long-term growth and understand that there are changes due to market fluctuations</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="rd[]" value="4">I am willing to accept some day-t-day fluctuations in the value of my investment in exchange for a higher potential return over the long run</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="rd[]" value="5">I am a growth oriented long-term investor seeking a maximum return on my investments</div><br />
		<div class="col-md-3"><input type="radio" class="custom-control-input sunset-form-control" name="rd[]" value="6">If the amount of my income I received were unaffected, it would not bother me to see fluctuations</div><br />
      </div><br />
	  </div><br /></li>
	  </ol></p>

	<p><font style="font-size: 30px"><b>I. Portfolio Restrictions</b></font>
		<ol>
		 <li><div class="form-group">
		<label>Are there any restrictions for your portfolio?</label><br />
		<input type="radio" name="porfolioOption[]" value="1" class="form-control sunset-form-control">
		<label for="JointIncomeY">Yes</label><br />
		<input type="radio" name="porfolioOption[]" value="2" class="form-control sunset-form-control">
		<label for="JointIncomeN">No</label><br /></li>
		 <textarea name="PortRest" rows="6" cols="40" id="portRest" class="form-control sunset-form-control" placeholder="Your Restrictions"></textarea>
		</ol>
		</p>

    <div class="text-center">
  		<button type="stubmit" class="btn btn-default btn-lg btn-sunset-form">Submit</button>
      <small class="text-info form-control-msg js-form-submission">Submission in process, please wait..</small>
      <small class="text-success form-control-msg js-form-success">Message Successfully submitted, thank you!</small>
      <small class="text-danger form-control-msg js-form-error">There was a problem with the Inquiry Form, please try again!</small>
    </div><br />
  </form>
<?php } else { ?>
    <p>
      This form is reserved for logged in users only. Please click <a href="<?php echo get_site_url(); ?>/wp-login.php" title="Login Page" rel="home">here</a> to login in order to  to access the form
    </p>
<?php } ?>
