<?php

/*
@package mujhtechtheme


	CUSTOM POST TYPE
*/
	@ob_start();
	$option = get_option( 'activate_client_form' );
	if ( @$option == 1 ) {
		add_action( 'init', 'client_investment_form_custom_post_type' );
		add_filter( 'manage_client-form_posts_columns', 'client_entry_set_contact_columns' );
		add_action( 'manage_client-form_posts_custom_column', 'client_entry_custom_columns', 10, 2 );
		add_action( 'add_meta_boxes', 'client_entry_add_meta_box' );
		add_action( 'save_post', 'client_entry_save_email_data' );
		add_action( 'save_post', 'client_entry_save_website_data' );
		add_action( 'save_post', 'client_entry_save_asset_data' );
		add_action( 'save_post', 'client_entry_save_risk_data' );
		add_action( 'save_post', 'client_entry_save_appartment_data' );
		add_action( 'save_post', 'client_entry_save_crypto_exp_data' );
		add_action( 'save_post', 'client_entry_save_invest_exp_data' );
		add_action( 'save_post', 'client_entry_save_money_exp_data' );
		add_action( 'save_post', 'client_entry_save_annual_save_data' );
		add_action( 'save_post', 'client_entry_save_acct_type_data' );
		add_action( 'save_post', 'client_entry_save_current_exp_data' );
		add_action( 'save_post', 'client_entry_save_net_worth_data' );
	  	add_action( 'save_post', 'client_entry_save_net_worth_option_data' );
	  	add_action( 'save_post', 'client_entry_save_invest_percent_data' );
	  	add_action( 'save_post', 'client_entry_save_affiliat_company_data' );
	  	add_action( 'save_post', 'client_entry_save_portfolio_option_data' );
		add_action( 'save_post', 'client_entry_save_portfolio_restrict_data' );
		add_action( 'save_post', 'client_entry_save_risk_rate_data' );
		add_action( 'save_post', 'client_entry_save_risk_reaction_data' );
		add_action( 'save_post', 'client_entry_save_risk_describe_restrict_data' );
		add_action( 'save_post', 'client_entry_save_invest_objective_data' );
		add_action( 'save_post', 'client_entry_save_other_one_data' );
	  add_action( 'save_post', 'client_entry_save_other_two_data' );
	  add_action( 'save_post', 'client_entry_save_other_three_data' );
	  add_action( 'save_post', 'client_entry_save_other_four_data' );
	  add_action( 'save_post', 'client_entry_save_other_five_data' );
	  add_action( 'save_post', 'client_entry_save_other_six_data' );
	  add_action( 'save_post', 'client_entry_save_other_seven_data' );
	  add_action( 'save_post', 'client_entry_save_other_eight_data' );
	  add_action( 'save_post', 'client_entry_save_investment_asset_data' );
  add_action( 'save_post', 'client_entry_save_business_name_data' );
  add_action( 'save_post', 'client_entry_save_business_number_data' );
  add_action( 'save_post', 'client_entry_save_gross_income_data' );
  add_action( 'save_post', 'client_entry_save_spouse_status_data' );
  add_action( 'save_post', 'client_entry_save_spouse_business_name_data' );
  add_action( 'save_post', 'client_entry_save_spouse_occupation_data' );
  add_action( 'save_post', 'client_entry_save_spouse_number_data' );
  add_action( 'save_post', 'client_entry_save_spouse_income_data' );
  add_action( 'save_post', 'client_entry_save_last_two_income_data' );
  add_action( 'save_post', 'client_entry_save_contact_address_data' );
  add_action( 'save_post', 'client_entry_save_country_data' );
  add_action( 'save_post', 'client_entry_save_telephone_data' );
  add_action( 'save_post', 'client_entry_save_vote_area_data' );
  add_action( 'save_post', 'client_entry_save_citizen_country_data' );
  add_action( 'save_post', 'client_entry_save_driver_licence_data' );
  add_action( 'save_post', 'client_entry_save_birthdate_data' );

	}


	function client_investment_form_custom_post_type(){
		$labels = array(
				'name'				=>	'Client Investments',
				'singular_name'		=>	'Client Investment',
				'menu_name'			=>	'Client Investments',
				'name_admin_bar'	=>	'Client Investment'
		);

		$args = array(
				'labels'				=>	$labels,
				'show_ui'		=>	true,
				'show_ui_menu'			=>	true,
				'capability_type'	=>	'post',
				'hierarchical'	=>	false,
				'menu_position'	=>	200,
				'publicly_queryable' => true,
				'menu_icon'	=>	'dashicons-email-alt',
				'supports'	=>	array( 'title', 'editor' )
		);

		register_post_type( 'client-form', $args );
	}

	function client_entry_set_contact_columns( $columns ) {
		$clientColumns = array();
		$clientColumns['cb'] = "<input type=\"checkbox\" />";
		$clientColumns['title'] = 'Full Name';
		$clientColumns['email'] = 'Email';
		$clientColumns['website'] = 'Occupation';
		$clientColumns['investment'] = 'Total Investment Asset';
		$clientColumns['message'] = 'Comment';
		$clientColumns['risk'] = 'Risk';
		return $clientColumns;

	}


	function client_entry_custom_columns( $columns, $post_id ) {

		switch ( $columns ) {
			case 'email':
				$value = get_post_meta( $post_id, '_client_contact_email_value_key', true );
				echo '<a href="mailto:'.$value.'">'.$value.'</a>';
				break;

				case 'website':
					$value = get_post_meta( $post_id, '_client_website_value_key', true );
					echo '<a href="http://'.$value.'" target="_blank">'.$value.'</a>';
					break;

				case 'investment':
					$value = get_post_meta( $post_id, '_client_asset_value_key', true );
					echo '<strong>$'.$value.'</strong>';
					break;

				case 'message':
					echo get_the_excerpt();
					break;

				case 'risk':
					$value = get_post_meta( $post_id, '_client_risk_value_key', true );
					echo '<strong>'.strtoupper($value).'</strong>';
					break;
		}

	}

	function client_entry_add_meta_box(){
		add_meta_box( 'client_contact_email', 'Email Address', 'client_entry_email_callback', 'client-form', 'side' );
		add_meta_box( 'client_website', 'Occupation', 'client_entry_website_callback', 'client-form', 'side' );
		add_meta_box( 'client_asset', 'Total Investment Asset in $', 'client_entry_asset_callback', 'client-form', 'side' );
		add_meta_box( 'client_risk', 'Risk', 'client_entry_risk_callback', 'client-form', 'side' );
		add_meta_box( 'client_apartment', 'Apartment type', 'client_entry_appartment_callback', 'client-form', 'normal' );
		add_meta_box( 'client_current_exp', 'Current monthly expense', 'client_entry_current_exp_callback', 'client-form', 'normal' );
		add_meta_box( 'client_money_exp', 'What are your short, mid, and long term investment goals?', 'client_entry_money_exp_callback', 'client-form', 'normal' );
		add_meta_box( 'client_crypto_exp', 'Cryptocurrency Experience', 'client_entry_crypto_exp_callback', 'client-form', 'normal' );
		add_meta_box( 'client_invest_exp', 'Investment Experience', 'client_entry_invest_exp_callback', 'client-form', 'normal' );
		add_meta_box( 'client_annual_exp', 'Annual Savings', 'client_entry_annual_save_callback', 'client-form', 'normal' );
		add_meta_box( 'client_account_type', 'To what extent do you follow the markets?', 'client_entry_acct_type_callback', 'client-form', 'normal' );
		add_meta_box( 'client_invest_percent', 'Investment Percentage of Net Worth', 'client_entry_invest_percent_callback', 'client-form', 'side' );
	  	add_meta_box( 'client_affiliat_company', 'Affiliation with the Company', 'client_entry_affiliat_company_callback', 'client-form', 'side' );
	  	add_meta_box( 'client_net_worth', 'Current net worth or joint net worth with spouse (note that "net worth" includes all of the assets owned by you and your spouse in excess of total liabilities, and excluding the value of your primary residence.):', 'client_entry_net_worth_callback', 'client-form', 'side' );
	  	add_meta_box( 'client_net_worth_option', 'Current value of liquid assets (cash, freely marketable securities, cash surrender value of life insurance policies, and other items easily convertible into cash) is sufficient to provide for current needs and possible personal contingincies:', 'client_entry_net_worth_option_callback', 'client-form', 'side' );

	  	add_meta_box( 'client_portfolio_option', 'Are there any restrictions for your portfolio?', 'client_entry_portfolio_option_callback', 'client-form', 'side' );
	    add_meta_box( 'client_portfolio_restrict', 'Your restriction', 'client_entry_portfolio_restrict_callback', 'client-form', 'side' );
	    add_meta_box( 'client_risk_reaction', 'Given your tolerance for risk and understanding that investments fluctuate in value, which of the following statements would best describe your reaction if the value of your portfolio were to decline by 5% - 10% over a short period of time:', 'client_entry_risk_reaction_callback', 'client-form', 'side' );
	    add_meta_box( 'client_risk_rate', 'Where would you rate yourself on thi scale?', 'client_entry_risk_rate_callback', 'client-form', 'side' );
	    add_meta_box( 'client_risk_describe', 'Check the box that you feel best describes you:', 'client_entry_risk_describe_restrict_callback', 'client-form', 'side' );
	    add_meta_box( 'client_invest_objective', 'Based on your overall financial goals, which of the following best describes your investment:', 'client_entry_invest_objective_callback', 'client-form', 'side' );

	    add_meta_box( 'client_other_one', '401K Value', 'client_entry_other_one_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_other_two', 'Roth ira value', 'client_entry_other_two_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_other_three', 'Traditional ira value', 'client_entry_other_three_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_other_four', 'Total Stock Value', 'client_entry_other_four_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_other_five', 'Total Bonds Value', 'client_entry_other_five_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_other_six', 'Total 529 Plan Value', 'client_entry_other_six_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_other_seven', 'other Investment Name', 'client_entry_other_seven_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_other_eight', 'Other Total Value', 'client_entry_other_eight_callback', 'client-form', 'normal' );

	  add_meta_box( 'client_investment_asset', 'Total Crypto Portfolio Value', 'client_entry_investment_asset_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_business_name', 'Business Name', 'client_entry_business_name_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_business_number', 'Business Phone Number', 'client_entry_business_phone_number_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_gross_income', 'Gross income during each of the last two years exceeded:', 'client_entry_gross_income_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_spouse_status', 'Are you married?', 'client_entry_spouse_status_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_spouse_business_name', 'Spouse Business Name', 'client_entry_spouse_business_name_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_spouse_business_number', 'Spouse Business Phone Number', 'client_entry_spouse_business_phone_number_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_spouse_occupation', 'Spouse Occupation', 'client_entry_spouse_occupation_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_spouse_income', 'Spouses Estimated gross income during current year exceeds', 'client_entry_spouse_income_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_last_two_income', 'Joint gross income with the spouse during each of the last two years exceeded $300,000', 'client_entry_last_two_income_callback', 'client-form', 'normal' );
	  add_meta_box( 'client_contact_address', 'Address', 'client_entry_contact_address_callback', 'client-form', 'normal' );
  add_meta_box( 'client_country', 'Country', 'client_entry_country_callback', 'client-form', 'normal' );
  add_meta_box( 'client_phone', 'Telephone Number', 'client_entry_telephone_callback', 'client-form', 'normal' );
  add_meta_box( 'client_registered_vote', 'Where are you registered to vote?', 'client_entry_vote_area_callback', 'client-form', 'normal' );
  add_meta_box( 'client_driver_license', 'Your Drivers License is issued by the following state?', 'client_entry_driver_licence_callback', 'client-form', 'normal' );
  add_meta_box( 'client_citizen_country', 'Country of Citizenship ', 'client_entry_citizen_country_callback', 'client-form', 'normal' );
  add_meta_box( 'client_date_birth', 'Datebirth', 'client_entry_birthdate_callback', 'client-form', 'normal' );
	}

	function client_entry_portfolio_option_callback( $post ){
	  wp_nonce_field( 'client_entry_save_portfolio_option_data', 'client_entry_portfolio_option_meta_box_nonce' );
	  $value = get_post_meta( $post->ID, '_client_portfolio_option_value_key', true );
	  $yes = '';
	  $no = '';
	  if ($value == '1') {
	    $yes = 'checked';
	  } elseif ($value == '2') {
	    $no = 'checked';
	  } else {
	    $yes = '';
	    $no = '';
	  }

	  echo '<label for="client_entry_portfolio_option_field"></label><br/>';
	  echo '<input type="radio" id="client_entry_portfolio_option_field" name="client_entry_portfolio_option_field" value="1"  '.$yes.'>Yes ';
	  echo '<input type="radio" id="client_entry_portfolio_option_field" name="client_entry_portfolio_option_field" value="2"  '.$no.'>No ';
	}

	function client_entry_portfolio_restrict_callback( $post ){
	  wp_nonce_field( 'client_entry_save_portfolio_restrict_data', 'client_entry_portfolio_restrict_meta_box_nonce' );
	  $value = get_post_meta( $post->ID, '_client_portfolio_restrict_value_key', true );

	  echo '<label for="client_entry_portfolio_restrict_field"> Your restriction </label> ';
	  echo '<textarea name="client_entry_portfolio_restrict_field" id="client_entry_portfolio_restrict_field" placeholder="Your restriction">'. esc_attr( $value ).'</textarea>';
	}

	function client_entry_risk_rate_callback( $post ){
	  wp_nonce_field( 'client_entry_save_risk_rate_data', 'client_entry_risk_rate_meta_box_nonce' );
	  $value = get_post_meta( $post->ID, '_client_risk_rate_value_key', true );
	  $one = '';
	  $two = '';
	  $three = '';
	  if ($value == '1') {
	    $one = 'checked';
	  } elseif ($value == '2') {
	    $two = 'checked';
	  } elseif ($value == '3') {
	    $three = 'checked';
	  } else {
	    $one = '';
	    $two = '';
	    $three = '';
	  }

	  echo '<label for="client_entry_risk_rate_field"></label><br/>';
	  echo '<input type="radio" id="client_entry_risk_rate_field" name="client_entry_risk_rate_field" value="1"  '.$one.'>1 - Minimize losses and I am willing to take less return <br>';
	  echo '<input type="radio" id="client_entry_risk_rate_field" name="client_entry_risk_rate_field" value="2"  '.$two.'>5 - A balanced investment mix with fluctuations and growth of assets <br>';
	  echo '<input type="radio" id="client_entry_risk_rate_field" name="client_entry_risk_rate_field" value="3"  '.$three.'>10 - Maximum accumulation of assets regardless of short term fluctuations <br>';
	}

	function client_entry_risk_describe_restrict_callback( $post ){
	  wp_nonce_field( 'client_entry_save_risk_describe_restrict_data', 'client_entry_risk_describe_restrict_meta_box_nonce' );
	  $value = get_post_meta( $post->ID, '_client_risk_describe_value_key', true );
	  $one = '';
	  $two = '';
	  $three = '';
	  $four = '';
	  $five = '';
	  $six = '';
	  if ($value == '1') {
	    $one = 'checked';
	  } elseif ($value == '2') {
	    $two = 'checked';
	  } elseif ($value == '3') {
	    $three = 'checked';
	  } elseif ($value == '4') {
	    $four = 'checked';
	  } elseif ($value == '5') {
	    $five = 'checked';
	  } elseif ($value == '6') {
	    $six = 'checked';
	  }  else {
	    $one = '';
	    $two = '';
	    $three = '';
	    $four = '';
	    $five = '';
	    $six = '';
	  }

	  echo '<label for="client_entry_risk_describe_field"></label><br/>';
	  echo '<input type="radio" id="client_entry_risk_describe_field" name="client_entry_risk_describe_field" value="1"  '.$one.'>I would rather accept a lower rate of return than subject my investment to short-term volatility <br>';
	  echo '<input type="radio" id="client_entry_risk_describe_field" name="client_entry_risk_describe_field" value="2"  '.$two.'>I invest for long-term growth, but would be concerned about a temporary decline <br>';
	  echo '<input type="radio" id="client_entry_risk_describe_field" name="client_entry_risk_describe_field" value="3"  '.$three.'>I invest for long-term growth and understand that there are changes due to market fluctuations <br>';
	  echo '<input type="radio" id="client_entry_risk_describe_field" name="client_entry_risk_describe_field" value="4"  '.$four.'>I am willing to accept some day-t-day fluctuations in the value of my investment in exchange for a higher potential return over the long run <br>';
	  echo '<input type="radio" id="client_entry_risk_describe_field" name="client_entry_risk_describe_field" value="5"  '.$five.'>I am a growth oriented long-term investor seeking a maximum return on my investments <br>';
	  echo '<input type="radio" id="client_entry_risk_describe_field" name="client_entry_risk_describe_field" value="6"  '.$six.'>If the amount of my income I received were unaffected, it would not bother me to see fluctuations <br>';
	}

	function client_entry_risk_reaction_callback( $post ){
	  wp_nonce_field( 'client_entry_save_risk_reaction_data', 'client_entry_risk_reaction_meta_box_nonce' );
	  $value = get_post_meta( $post->ID, '_client_risk_reaction_value_key', true );
	  $one = '';
	  $two = '';
	  $three = '';
	  $four = '';
	  if ($value == '1') {
	    $one = 'checked';
	  } elseif ($value == '2') {
	    $two = 'checked';
	  } elseif ($value == '3') {
	    $three = 'checked';
	  } elseif ($value == '4') {
	    $four = 'checked';
	  } else {
	    $one = '';
	    $two = '';
	    $three = '';
	    $four = '';
	  }

	  echo '<label for="client_entry_risk_reaction_field"></label><br/>';
	  echo '<input type="radio" id="client_entry_risk_reaction_field" name="client_entry_risk_reaction_field" value="1"  '.$one.'>Extremely Concerned: I cannot accept even temporary loss of principal. But I recognize the need for my investments to grow. I am willing to sacrifice higher returns and liquidity in exchange for safety of principal. <br>';
	  echo '<input type="radio" id="client_entry_risk_reaction_field" name="client_entry_risk_reaction_field" value="2"  '.$two.'>Concerned: But I recognize that short-term losses are a normal investment risk, and I can tolerate one or two quarters of negative returns. <br>';
	  echo '<input type="radio" id="client_entry_risk_reaction_field" name="client_entry_risk_reaction_field" value="3"  '.$three.'>Somewhat Concerned: But I am more interested in my total return over a three to five year period. <br>';
	  echo '<input type="radio" id="client_entry_risk_reaction_field" name="client_entry_risk_reaction_field" value="4"  '.$four.'>Not Concerned: I am primarily interested in achieving my long-term investment goals. <br>';
	}

	function client_entry_invest_objective_callback( $post ){
	  wp_nonce_field( 'client_entry_save_invest_objective_data', 'client_entry_invest_objective_meta_box_nonce' );
	  $value = get_post_meta( $post->ID, '_client_invest_objective_value_key', true );
	  $one = '';
	  $two = '';
	  $three = '';
	  $four = '';
	  if ($value == '1') {
	    $one = 'checked';
	  } elseif ($value == '2') {
	    $two = 'checked';
	  } elseif ($value == '3') {
	    $three = 'checked';
	  } elseif ($value == '4') {
	    $four = 'checked';
	  } else {
	    $one = '';
	    $two = '';
	    $three = '';
	    $four = '';
	  }

	  echo '<label for="client_entry_invest_objective_field"></label><br/>';
	  echo '<input type="radio" id="client_entry_invest_objective_field" name="client_entry_invest_objective_field" value="1"  '.$one.'>Capital Appreciation: Mazimize long-term returns while accepting the likelihood of short-term losses in my account. Recommended minimum is over five years. <br>';
	  echo '<input type="radio" id="client_entry_invest_objective_field" name="client_entry_invest_objective_field" value="2"  '.$two.'>Capital Appreciation plus some income: Accept some market risk but cushion losses in market declines. Recommended minimum investment period is over five years. <br>';
	  echo '<input type="radio" id="client_entry_invest_objective_field" name="client_entry_invest_objective_field" value="3"  '.$three.'>Current Income: Generate current income while limiting losses to principal. Recommended minimum investment period is three to five years. <br>';
	  echo '<input type="radio" id="client_entry_invest_objective_field" name="client_entry_invest_objective_field" value="4"  '.$four.'>Capital Preservation: Preserve capital while seeking growth at a rate equal to inflation. Recommended minimum investment period is three to five years. <br>';
	}

	function client_entry_affiliat_company_callback( $post ){
	  wp_nonce_field( 'client_entry_save_affiliat_company_data', 'client_entry_affiliat_company_meta_box_nonce' );
	  $value = get_post_meta( $post->ID, '_client_affiliat_company_value_key', true );
	  $yes = '';
	  $no = '';
	  if ($value == '1') {
	    $yes = 'checked';
	  } elseif ($value == '2') {
	    $no = 'checked';
	  } else {
	    $yes = '';
	    $no = '';
	  }

	  echo '<label for="client_entry_affiliat_compnay_field">Are you a director or Executive Officer of the Company?</label><br/>';
	  echo '<input type="radio" id="client_entry_affiliat_compnay_field" name="client_entry_affiliat_compnay_field" value="1"  '.$yes.'>Yes ';
	  echo '<input type="radio" id="client_entry_affiliat_compnay_field" name="client_entry_affiliat_compnay_field" value="2"  '.$no.'>No ';
	}

	function client_entry_invest_percent_callback( $post ){
	  wp_nonce_field( 'client_entry_save_invest_percent_data', 'client_entry_invest_percent_meta_box_nonce' );
	  $value = get_post_meta( $post->ID, '_client_invest_percent_value_key', true );
	  $one = '';
	  $two = '';
	  if ($value == '1') {
	    $one = 'checked';
	  } elseif ($value == '2') {
	    $two = 'checked';
	  } else {
	    $one = '';
	    $two = '';
	  }

	  echo '<label for="client_entry_invest_percent_field">If you expect to invest at least $150,000 in varying asset classes, does your total purchase price exceed 10% of your net worth at the time of sale, or joint net worth with your spouse?</label><br/>';
	  echo '<input type="radio" id="client_entry_invest_percent_field" name="client_entry_invest_percent_field" value="1"  '.$one.'>No <br>';
	  echo '<input type="radio" id="client_entry_invest_percent_field" name="client_entry_invest_percent_field" value="2"  '.$two.'>Yes <br>';
	}

	function client_entry_net_worth_option_callback( $post ){
	  wp_nonce_field( 'client_entry_save_net_worth_option_data', 'client_entry_net_worth_option_meta_box_nonce' );
	  $value = get_post_meta( $post->ID, '_client_net_worth_option_value_key', true );
	  $one = '';
	  $two = '';
	  if ($value == '1') {
	    $one = 'checked';
	  } elseif ($value == '2') {
	    $two = 'checked';
	  } else {
	    $one = '';
	    $two = '';
	  }

	  echo '<label for="client_entry_net_worth_option_field"></label><br/>';
	  echo '<input type="radio" id="client_entry_net_worth_option_field" name="client_entry_net_worth_option_field" value="2"  '.$two.'>No <br>';
	  echo '<input type="radio" id="client_entry_net_worth_option_field" name="client_entry_net_worth_option_field" value="1"  '.$one.'>Yes <br>';
	}

	function client_entry_net_worth_callback( $post ){
	  wp_nonce_field( 'client_entry_save_net_worth_data', 'client_entry_net_worth_meta_box_nonce' );
	  $value = get_post_meta( $post->ID, '_client_net_worth_value_key', true );
	  $one = '';
	  $two = '';
	  $three = '';
	  if ($value == '1') {
	    $one = 'checked';
	  } elseif ($value == '2') {
	    $two = 'checked';
	  } elseif ($value == '3') {
	    $three = 'checked';
	  }  else {
	    $one = '';
	    $two = '';
	    $three = '';
	  }

	  echo '<label for="client_entry_net_worth_field"></label><br/>';
	  echo '<input type="radio" id="client_entry_net_worth_field" name="client_entry_net_worth_field" value="1"  '.$one.'>$500,000 - $750,000<br>';
	  echo '<input type="radio" id="client_entry_net_worth_field" name="client_entry_net_worth_field" value="2"  '.$two.'>$750,000 - $1,000,000<br>';
	  echo '<input type="radio" id="client_entry_net_worth_field" name="client_entry_net_worth_field" value="3"  '.$three.'>over $1,000,000 <br>';
	}

	function client_entry_email_callback( $post ){
		wp_nonce_field( 'client_entry_save_email_data', 'client_entry_email_meta_box_nonce' );
		$value = get_post_meta( $post->ID, '_client_contact_email_value_key', true );

		echo '<label for="client_entry_email_field"> User Email </label> ';
		echo '<input type="text" name="client_entry_email_field" id="client_entry_email_field" value="'. esc_attr( $value ).'" size="25"/>';
	}

	function client_entry_acct_type_callback( $post ){
		wp_nonce_field( 'client_entry_save_acct_type_data', 'client_entry_acct_type_meta_box_nonce' );
		$value = get_post_meta( $post->ID, '_client_acct_type_value_key', true );

		$one = '';
	  $two = '';
	  $three = '';
	  if ($value == '1') {
	    $one = 'checked';
	  } elseif ($value == '2') {
	    $two = 'checked';
	  } elseif ($value == '3') {
	    $three = 'checked';
	  } else {
	    $one = '';
	    $two = '';
	    $three = '';
	  }

	  echo '<input type="radio" id="client_entry_acct_type_field" name="client_entry_acct_type_field" value="1"  '.$one.'>Not at all <br>';
	  echo '<input type="radio" id="client_entry_acct_type_field" name="client_entry_acct_type_field" value="2"  '.$two.'>Some what<br>';
	  echo '<input type="radio" id="client_entry_acct_type_field" name="client_entry_acct_type_field" value="3"  '.$three.'>Closely <br>';
	}

	function client_entry_annual_save_callback( $post ){
		wp_nonce_field( 'client_entry_save_annual_save_data', 'client_entry_annual_save_meta_box_nonce' );
		$value = get_post_meta( $post->ID, '_client_annual_save_value_key', true );

		echo '<label for="client_entry_annual_save_field"> Do you have a plan for retirement? How much should you save annually </label> ';
		echo '<input type="text" name="client_entry_annual_save_field" id="client_entry_annual_save_field" value="'. esc_attr( $value ).'" size="25"/>';
	}

	function client_entry_crypto_exp_callback( $post ){
		wp_nonce_field( 'client_entry_save_crypto_exp_data', 'client_entry_crypto_exp_meta_box_nonce' );
		$value = get_post_meta( $post->ID, '_client_crypto_exp_value_key', true );

		$one = '';
	  $two = '';
	  $three = '';
	  $four = '';
		$five = '';
	  if ($value == '1') {
	    $one = 'checked';
	  } elseif ($value == '2') {
	    $two = 'checked';
	  } elseif ($value == '3') {
	    $three = 'checked';
	  } elseif ($value == '4') {
	    $four = 'checked';
	  } elseif ($value == '5') {
	    $five = 'checked';
	  } else {
	    $one = '';
	    $two = '';
	    $three = '';
	    $four = '';
			$five = '';
	  }

	  echo '<label for="client_entry_crypto_exp_field">Whats your experience with Cryptocurrency</label><br/>';
	  echo '<input type="radio" id="client_entry_crypto_exp_field" name="client_entry_crypto_exp_field" value="1"  '.$one.'>Less than 1 year <br>';
	  echo '<input type="radio" id="client_entry_crypto_exp_field" name="client_entry_crypto_exp_field" value="2"  '.$two.'>1-3 years<br>';
		echo '<input type="radio" id="client_entry_crypto_exp_field" name="client_entry_crypto_exp_field" value="3"  '.$three.'>3-5 years<br>';
	  echo '<input type="radio" id="client_entry_crypto_exp_field" name="client_entry_crypto_exp_field" value="4"  '.$four.'>5-10 years. <br>';
	  echo '<input type="radio" id="client_entry_crypto_exp_field" name="client_entry_crypto_exp_field" value="5"  '.$five.'>10+ years. <br>';
	}

	function client_entry_invest_exp_callback( $post ){
		wp_nonce_field( 'client_entry_save_invest_exp_data', 'client_entry_invest_exp_meta_box_nonce' );
		$value = get_post_meta( $post->ID, '_client_invest_exp_value_key', true );

		$one = '';
	  $two = '';
	  $three = '';
	  $four = '';
		$five = '';
	  if ($value == '1') {
	    $one = 'checked';
	  } elseif ($value == '2') {
	    $two = 'checked';
	  } elseif ($value == '3') {
	    $three = 'checked';
	  } elseif ($value == '4') {
	    $four = 'checked';
	  } elseif ($value == '5') {
	    $five = 'checked';
	  } else {
	    $one = '';
	    $two = '';
	    $three = '';
	    $four = '';
			$five = '';
	  }

	  echo '<label for="client_entry_invest_exp_field">Whats your experience with Cryptocurrency</label><br/>';
	  echo '<input type="radio" id="client_entry_invest_exp_field" name="client_entry_invest_exp_field" value="1"  '.$one.'>Less than 1 year <br>';
	  echo '<input type="radio" id="client_entry_invest_exp_field" name="client_entry_invest_exp_field" value="2"  '.$two.'>1-3 years<br>';
		echo '<input type="radio" id="client_entry_invest_exp_field" name="client_entry_invest_exp_field" value="3"  '.$three.'>3-5 years<br>';
	  echo '<input type="radio" id="client_entry_invest_exp_field" name="client_entry_invest_exp_field" value="4"  '.$four.'>5-10 years. <br>';
	  echo '<input type="radio" id="client_entry_invest_exp_field" name="client_entry_invest_exp_field" value="5"  '.$five.'>10+ years. <br>';
	}

	function client_entry_money_exp_callback( $post ){
		wp_nonce_field( 'client_entry_save_money_exp_data', 'client_entry_money_exp_meta_box_nonce' );
		$value = get_post_meta( $post->ID, '_client_money_exp_value_key', true );

		echo '<label for="client_entry_money_exp_field"> What are your short, mid, and long term investment goals? </label> ';
		echo '<input type="text" name="client_entry_money_exp_field" id="client_entry_money_exp_field" value="'. esc_attr( $value ).'" size="25"/>';
	}

	function client_entry_current_exp_callback( $post ){
		wp_nonce_field( 'client_entry_save_current_exp_data', 'client_entry_current_exp_meta_box_nonce' );
		$value = get_post_meta( $post->ID, '_client_current_exp_value_key', true );

		echo '<label for="client_entry_current_exp_field"> How much are your current monthly expense: </label> ';
		echo '<input type="text" name="client_entry_current_exp_field" id="client_entry_current_exp_field" value="'. esc_attr( $value ).'" size="25"/>';
	}

	function client_entry_appartment_callback( $post ){
		wp_nonce_field( 'client_entry_save_appartment_data', 'client_entry_appartment_meta_box_nonce' );

		$value = get_post_meta( $post->ID, '_client_appartment_value_key', true );
		$checkedOwn = '';
		$checkedRent = '';
		if ($value == 'own') {
			$checkedOwn = 'checked';
		} elseif ($value == 'rent') {
			$checkedRent = 'checked';
		}  else {
			$checkedOwn = '';
			$checkedRent = '';
		}

		echo '<label for="client_entry_appartment_field"></label><br/>';
		echo '<input type="radio" id="client_entry_appartment_field" name="client_entry_appartment_field" value="own"  '.$checkedOwn.'>Own ';
		echo '<input type="radio" id="client_entry_appartment_field" name="client_entry_appartment_field" value="rent"  '.$checkedRent.'>Rent ';
	}

	function client_entry_website_callback( $post ){
		wp_nonce_field( 'client_entry_save_website_data', 'client_entry_website_meta_box_nonce' );
		$value = get_post_meta( $post->ID, '_client_website_value_key', true );

		echo '<label for="client_entry_website_field">Occupation</label> ';
		echo '<input type="text" name="client_entry_website_field" id="client_entry_website_field" value="'. esc_attr( $value ).'" size="25"/>';
	}

	function client_entry_asset_callback( $post ){
		wp_nonce_field( 'client_entry_save_asset_data', 'client_entry_asset_meta_box_nonce' );
		$value = get_post_meta( $post->ID, '_client_asset_value_key', true );

		echo '<label for="client_entry_asset_field">Total Investment Asset in $</label> ';
		echo '<input type="text" name="client_entry_asset_field" id="client_entry_asset_field" value="'. esc_attr( $value ).'" size="25"/>';
	}

	function client_entry_risk_callback( $post ){
		wp_nonce_field( 'client_entry_save_risk_data', 'client_entry_risk_meta_box_nonce' );

		$value = get_post_meta( $post->ID, '_client_risk_value_key', true );
		$checkedHig = '';
		$checkedLow = '';
		$checkedMod = '';
		if ($value == 'high') {
			$checkedHig = 'checked';
		} elseif ($value == 'moderate') {
			$checkedMod = 'checked';
		} elseif ($value == 'low') {
			$checkedLow = 'checked';
		} else {
			$checkedHig = '';
			$checkedLow = '';
			$checkedMod = '';
		}

		echo '<label for="client_entry_risk_field"></label><br/>';
		echo '<input type="radio" id="client_entry_risk_field" name="client_entry_risk_field" value="high"  '.$checkedHig.'>High ';
		echo '<input type="radio" id="client_entry_risk_field" name="client_entry_risk_field" value="moderate"  '.$checkedMod.'>Moderate ';
		echo '<input type="radio" id="client_entry_risk_field" name="client_entry_risk_field" value="low" '.$checkedLow.'>Low';
	}


	function client_entry_save_email_data( $post_id ){

		if (! isset( $_POST['client_entry_email_meta_box_nonce'] ) ) {
			 		return;
	 	}
		if (! wp_verify_nonce( $_POST['client_entry_email_meta_box_nonce'], 'client_entry_save_email_data' ) ) {
		 		return;
		}
		if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
			return;
		}
		if (! current_user_can( 'edit_post', $post_id )) {
			return;
		}
		if (! isset( $_POST['client_entry_email_field'] )) {
			return;
		}

	 	$my_data = sanitize_text_field( $_POST['client_entry_email_field'] );

	 	update_post_meta( $post_id , '_client_contact_email_value_key' , $my_data );

 	}

 function client_entry_save_website_data( $post_id ){

	 if (! isset( $_POST['client_entry_website_meta_box_nonce'] ) ) {
				 return;
	 }
	 if (! wp_verify_nonce( $_POST['client_entry_website_meta_box_nonce'], 'client_entry_save_website_data' ) ) {
			 return;
	 }
	 if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		 return;
	 }
	 if (! current_user_can( 'edit_post', $post_id )) {
		 return;
	 }
	 if (! isset( $_POST['client_entry_website_field'] )) {
		 return;
	 }

	 $my_data = sanitize_text_field( $_POST['client_entry_website_field'] );

	 update_post_meta( $post_id , '_client_website_value_key' , $my_data );

}

function client_entry_save_asset_data( $post_id ){

	if (! isset( $_POST['client_entry_asset_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_asset_meta_box_nonce'], 'client_entry_save_asset_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_asset_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_asset_field'] );

	update_post_meta( $post_id , '_client_asset_value_key' , $my_data );

}

function client_entry_save_risk_data( $post_id ){

	if (! isset( $_POST['client_entry_risk_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_risk_meta_box_nonce'], 'client_entry_save_risk_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_risk_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_risk_field'] );

	update_post_meta( $post_id , '_client_risk_value_key' , $my_data );

}

function client_entry_save_appartment_data( $post_id ){

	if (! isset( $_POST['client_entry_appartment_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_appartment_meta_box_nonce'], 'client_entry_save_appartment_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_appartment_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_appartment_field'] );

	update_post_meta( $post_id , '_client_appartment_value_key' , $my_data );

}

function client_entry_save_current_exp_data( $post_id ){

	if (! isset( $_POST['client_entry_current_exp_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_current_exp_meta_box_nonce'], 'client_entry_save_current_exp_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_current_exp_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_current_exp_field'] );

	update_post_meta( $post_id , '_client_current_exp_value_key' , $my_data );

}

function client_entry_save_invest_exp_data( $post_id ){

	if (! isset( $_POST['client_entry_invest_exp_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_invest_exp_meta_box_nonce'], 'client_entry_save_invest_exp_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_invest_exp_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_invest_exp_field'] );

	update_post_meta( $post_id , '_client_invest_exp_value_key' , $my_data );

}

function client_entry_save_crypto_exp_data( $post_id ){

	if (! isset( $_POST['client_entry_crypto_exp_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_crypto_exp_meta_box_nonce'], 'client_entry_save_crypto_exp_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_crypto_exp_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_crypto_exp_field'] );

	update_post_meta( $post_id , '_client_crypto_exp_value_key' , $my_data );

}

function client_entry_save_money_exp_data( $post_id ){

	if (! isset( $_POST['client_entry_money_exp_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_money_exp_meta_box_nonce'], 'client_entry_save_money_exp_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_money_exp_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_money_exp_field'] );

	update_post_meta( $post_id , '_client_money_exp_value_key' , $my_data );

}

function client_entry_save_annual_save_data( $post_id ){

	if (! isset( $_POST['client_entry_annual_save_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_annual_save_meta_box_nonce'], 'client_entry_save_annual_save_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_annual_save_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_annual_save_field'] );

	update_post_meta( $post_id , '_client_annual_save_value_key' , $my_data );

}

function client_entry_save_acct_type_data( $post_id ){

	if (! isset( $_POST['client_entry_acct_type_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_acct_type_meta_box_nonce'], 'client_entry_save_acct_type_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_acct_type_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_acct_type_field'] );

	update_post_meta( $post_id , '_client_acct_type_value_key' , $my_data );

}

function client_entry_save_affiliat_company_data( $post_id ){

	if (! isset( $_POST['client_entry_affiliat_company_meta_box_nonce'] ) ) {
		return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_affiliat_company_meta_box_nonce'], 'client_entry_save_affiliat_company_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_affiliat_compnay_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_affiliat_compnay_field'] );

	update_post_meta( $post_id , '_client_affiliat_company_value_key' , $my_data );

}

function client_entry_save_invest_percent_data( $post_id ){

	if (! isset( $_POST['client_entry_invest_percent_meta_box_nonce'] ) ) {
		return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_invest_percent_meta_box_nonce'], 'client_entry_save_invest_percent_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_invest_percent_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_invest_percent_field'] );

	update_post_meta( $post_id , '_client_invest_percent_value_key' , $my_data );

}

function client_entry_save_net_worth_option_data( $post_id ){

	if (! isset( $_POST['client_entry_net_worth_option_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_net_worth_option_meta_box_nonce'], 'client_entry_save_net_worth_option_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_net_worth_option_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_net_worth_option_field'] );

	update_post_meta( $post_id , '_client_net_worth_option_value_key' , $my_data );

}

function client_entry_save_net_worth_data( $post_id ){

	if (! isset( $_POST['client_entry_net_worth_meta_box_nonce'] ) ) {
		return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_net_worth_meta_box_nonce'], 'client_entry_save_net_worth_data' ) ) {
		return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_net_worth_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_net_worth_field'] );

	update_post_meta( $post_id , '_client_net_worth_value_key' , $my_data );

}

function client_entry_save_portfolio_option_data( $post_id ){

	if (! isset( $_POST['client_entry_portfolio_option_meta_box_nonce'] ) ) {
		return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_portfolio_option_meta_box_nonce'], 'client_entry_save_portfolio_option_data' ) ) {
		return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_portfolio_option_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_portfolio_option_field'] );

	update_post_meta( $post_id , '_client_portfolio_option_value_key' , $my_data );

}

function client_entry_save_portfolio_restrict_data( $post_id ){

  if (! isset( $_POST['client_entry_portfolio_restrict_meta_box_nonce'] ) ) {
    return;
  }
  if (! wp_verify_nonce( $_POST['client_entry_portfolio_restrict_meta_box_nonce'], 'client_entry_save_portfolio_restrict_data' ) ) {
    return;
  }
  if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    return;
  }
  if (! current_user_can( 'edit_post', $post_id )) {
    return;
  }
  if (! isset( $_POST['client_entry_portfolio_restrict_field'] )) {
    return;
  }

  $my_data = sanitize_text_field( $_POST['client_entry_portfolio_restrict_field'] );

  update_post_meta( $post_id , '_client_portfolio_restrict_value_key' , $my_data );

}

function client_entry_save_risk_rate_data( $post_id ){

  if (! isset( $_POST['client_entry_risk_rate_meta_box_nonce'] ) ) {
    return;
  }
  if (! wp_verify_nonce( $_POST['client_entry_risk_rate_meta_box_nonce'], 'client_entry_save_risk_rate_data' ) ) {
    return;
  }
  if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    return;
  }
  if (! current_user_can( 'edit_post', $post_id )) {
    return;
  }
  if (! isset( $_POST['client_entry_risk_rate_field'] )) {
    return;
  }

  $my_data = sanitize_text_field( $_POST['client_entry_risk_rate_field'] );

  update_post_meta( $post_id , '_client_risk_rate_value_key' , $my_data );

}

function client_entry_save_risk_describe_restrict_data( $post_id ){

  if (! isset( $_POST['client_entry_risk_describe_restrict_meta_box_nonce'] ) ) {
    return;
  }
  if (! wp_verify_nonce( $_POST['client_entry_risk_describe_restrict_meta_box_nonce'], 'client_entry_save_risk_describe_restrict_data' ) ) {
      return;
  }
  if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    return;
  }
  if (! current_user_can( 'edit_post', $post_id )) {
    return;
  }
  if (! isset( $_POST['client_entry_risk_describe_field'] )) {
    return;
  }

  $my_data = sanitize_text_field( $_POST['client_entry_risk_describe_field'] );

  update_post_meta( $post_id , '_client_risk_describe_value_key' , $my_data );

}

function client_entry_save_risk_reaction_data( $post_id ){

  if (! isset( $_POST['client_entry_risk_reaction_meta_box_nonce'] ) ) {
    return;
  }
  if (! wp_verify_nonce( $_POST['client_entry_risk_reaction_meta_box_nonce'], 'client_entry_save_risk_reaction_data' ) ) {
      return;
  }
  if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    return;
  }
  if (! current_user_can( 'edit_post', $post_id )) {
    return;
  }
  if (! isset( $_POST['client_entry_risk_reaction_field'] )) {
    return;
  }

  $my_data = sanitize_text_field( $_POST['client_entry_risk_reaction_field'] );

  update_post_meta( $post_id , '_client_risk_reaction_value_key' , $my_data );

}

function client_entry_save_invest_objective_data( $post_id ){

  if (! isset( $_POST['client_entry_invest_objective_meta_box_nonce'] ) ) {
    return;
  }
  if (! wp_verify_nonce( $_POST['client_entry_invest_objective_meta_box_nonce'], 'client_entry_save_invest_objective_data' ) ) {
      return;
  }
  if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    return;
  }
  if (! current_user_can( 'edit_post', $post_id )) {
    return;
  }
  if (! isset( $_POST['client_entry_invest_objective_field'] )) {
    return;
  }

  $my_data = sanitize_text_field( $_POST['client_entry_invest_objective_field'] );

  update_post_meta( $post_id , '_client_invest_objective_value_key' , $my_data );

}

function client_entry_other_one_callback( $post ){
  wp_nonce_field( 'client_entry_save_other_one_data', 'client_entry_other_one_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_other_one_value_key', true );

  echo '<input type="text" name="client_entry_other_one_field" id="client_entry_other_one_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_other_one_data( $post_id ){

	if (! isset( $_POST['client_entry_other_one_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_other_one_meta_box_nonce'], 'client_entry_save_other_one_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_other_one_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_other_one_field'] );

	update_post_meta( $post_id , '_client_other_one_value_key' , $my_data );

}

function client_entry_other_two_callback( $post ){
  wp_nonce_field( 'client_entry_save_other_two_data', 'client_entry_other_two_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_other_two_value_key', true );

  echo '<input type="text" name="client_entry_other_two_field" id="client_entry_other_two_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_other_two_data( $post_id ){

	if (! isset( $_POST['client_entry_other_two_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_other_two_meta_box_nonce'], 'client_entry_save_other_two_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_other_two_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_other_two_field'] );

	update_post_meta( $post_id , '_client_other_two_value_key' , $my_data );

}

function client_entry_other_three_callback( $post ){
  wp_nonce_field( 'client_entry_save_other_three_data', 'client_entry_other_three_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_other_three_value_key', true );

  echo '<input type="text" name="client_entry_other_three_field" id="client_entry_other_three_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_other_three_data( $post_id ){

	if (! isset( $_POST['client_entry_other_three_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_other_three_meta_box_nonce'], 'client_entry_save_other_three_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_other_three_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_other_three_field'] );

	update_post_meta( $post_id , '_client_other_three_value_key' , $my_data );

}

function client_entry_other_four_callback( $post ){
  wp_nonce_field( 'client_entry_save_other_four_data', 'client_entry_other_four_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_other_four_value_key', true );

  echo '<input type="text" name="client_entry_other_four_field" id="client_entry_other_four_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_other_four_data( $post_id ){

	if (! isset( $_POST['client_entry_other_four_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_other_four_meta_box_nonce'], 'client_entry_save_other_four_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_other_four_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_other_four_field'] );

	update_post_meta( $post_id , '_client_other_four_value_key' , $my_data );

}

function client_entry_other_five_callback( $post ){
  wp_nonce_field( 'client_entry_save_other_five_data', 'client_entry_other_five_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_other_five_value_key', true );

  echo '<input type="text" name="client_entry_other_five_field" id="client_entry_other_five_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_other_five_data( $post_id ){

	if (! isset( $_POST['client_entry_other_five_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_other_five_meta_box_nonce'], 'client_entry_save_other_five_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_other_five_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_other_five_field'] );

	update_post_meta( $post_id , '_client_other_five_value_key' , $my_data );

}

function client_entry_other_six_callback( $post ){
  wp_nonce_field( 'client_entry_save_other_six_data', 'client_entry_other_six_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_other_six_value_key', true );

  echo '<input type="text" name="client_entry_other_six_field" id="client_entry_other_six_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_other_six_data( $post_id ){

	if (! isset( $_POST['client_entry_other_six_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_other_six_meta_box_nonce'], 'client_entry_save_other_six_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_other_six_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_other_six_field'] );

	update_post_meta( $post_id , '_client_other_six_value_key' , $my_data );

}

function client_entry_other_seven_callback( $post ){
  wp_nonce_field( 'client_entry_save_other_seven_data', 'client_entry_other_seven_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_other_seven_value_key', true );

  echo '<input type="text" name="client_entry_other_seven_field" id="client_entry_other_seven_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_other_seven_data( $post_id ){

	if (! isset( $_POST['client_entry_other_seven_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_other_seven_meta_box_nonce'], 'client_entry_save_other_seven_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_other_seven_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_other_seven_field'] );

	update_post_meta( $post_id , '_client_other_seven_value_key' , $my_data );

}

function client_entry_other_eight_callback( $post ){
  wp_nonce_field( 'client_entry_save_other_eight_data', 'client_entry_other_eight_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_other_eight_value_key', true );

  echo '<input type="text" name="client_entry_other_eight_field" id="client_entry_other_eight_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_other_eight_data( $post_id ){

	if (! isset( $_POST['client_entry_other_eight_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_other_eight_meta_box_nonce'], 'client_entry_save_other_eight_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_other_eight_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_other_eight_field'] );

	update_post_meta( $post_id , '_client_other_eight_value_key' , $my_data );

}

function client_entry_investment_asset_callback( $post ){
  wp_nonce_field( 'client_entry_save_investment_asset_data', 'client_entry_investment_asset_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_investment_asset_value_key', true );

  echo '<input type="text" name="client_entry_investment_asset_field" id="client_entry_investment_asset_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_investment_asset_data( $post_id ){

	if (! isset( $_POST['client_entry_investment_asset_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_investment_asset_meta_box_nonce'], 'client_entry_save_investment_asset_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_investment_asset_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_investment_asset_field'] );

	update_post_meta( $post_id , '_client_investment_asset_value_key' , $my_data );

}

function client_entry_business_name_callback( $post ){
  wp_nonce_field( 'client_entry_save_business_name_data', 'client_entry_business_name_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_business_name_value_key', true );

  echo '<input type="text" name="client_entry_business_name_field" id="client_entry_business_name_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_business_name_data( $post_id ){

	if (! isset( $_POST['client_entry_business_name_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_business_name_meta_box_nonce'], 'client_entry_save_business_name_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_business_name_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_business_name_field'] );

	update_post_meta( $post_id , '_client_business_name_value_key' , $my_data );

}

function client_entry_business_phone_number_callback( $post ){
  wp_nonce_field( 'client_entry_save_business_number_data', 'client_entry_business_number_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_business_number_value_key', true );

  echo '<input type="text" name="client_entry_business_number_field" id="client_entry_business_number_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_business_number_data( $post_id ){

	if (! isset( $_POST['client_entry_business_number_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_business_number_meta_box_nonce'], 'client_entry_save_business_number_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_business_number_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_business_number_field'] );

	update_post_meta( $post_id , '_client_business_number_value_key' , $my_data );

}

function client_entry_spouse_business_name_callback( $post ){
  wp_nonce_field( 'client_entry_save_spouse_business_name_data', 'client_entry_spouse_business_name_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_spouse_business_name_value_key', true );

  echo '<input type="text" name="client_entry_spouse_business_name_field" id="client_entry_spouse_business_name_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_spouse_business_name_data( $post_id ){

	if (! isset( $_POST['client_entry_spouse_business_name_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_spouse_business_name_meta_box_nonce'], 'client_entry_save_spouse_business_name_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_spouse_business_name_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_spouse_business_name_field'] );

	update_post_meta( $post_id , '_client_spouse_business_name_value_key' , $my_data );

}

function client_entry_spouse_business_phone_number_callback( $post ){
  wp_nonce_field( 'client_entry_save_spouse_number_data', 'client_entry_spouse_number_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_spouse_number_value_key', true );

  echo '<input type="text" name="client_entry_spouse_number_field" id="client_entry_spouse_number_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_spouse_number_data( $post_id ){

	if (! isset( $_POST['client_entry_business_name_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_spouse_number_meta_box_nonce'], 'client_entry_save_spouse_number_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_spouse_number_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_spouse_number_field'] );

	update_post_meta( $post_id , '_client_spouse_number_value_key' , $my_data );

}

function client_entry_spouse_occupation_callback( $post ){
  wp_nonce_field( 'client_entry_save_spouse_occupation_data', 'client_entry_spouse_occupation_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_spouse_occupation_value_key', true );

  echo '<input type="text" name="client_entry_spouse_occupation_field" id="client_entry_spouse_occupation_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_spouse_occupation_data( $post_id ){

	if (! isset( $_POST['client_entry_spouse_occupation_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_spouse_occupation_meta_box_nonce'], 'client_entry_save_spouse_occupation_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_spouse_occupation_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_spouse_occupation_field'] );

	update_post_meta( $post_id , '_client_spouse_occupation_value_key' , $my_data );

}

function client_entry_spouse_status_callback( $post ){
  wp_nonce_field( 'client_entry_save_spouse_status_data', 'client_entry_spouse_status_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_spouse_status_value_key', true );
  $yes = '';
  $no = '';
  if ($value == '1') {
    $yes = 'checked';
  } elseif ($value == '2') {
    $no = 'checked';
  } else {
    $yes = '';
    $no = '';
  }

  echo '<input type="radio" id="client_entry_spouse_status_field" name="client_entry_spouse_status_field" value="1"  '.$yes.'>Yes ';
  echo '<input type="radio" id="client_entry_spouse_status_field" name="client_entry_spouse_status_field" value="2"  '.$no.'>No ';
}

function client_entry_save_spouse_status_data( $post_id ){

	if (! isset( $_POST['client_entry_spouse_status_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_spouse_status_meta_box_nonce'], 'client_entry_save_spouse_status_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_spouse_status_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_spouse_status_field'] );

	update_post_meta( $post_id , '_client_spouse_status_value_key' , $my_data );

}

function client_entry_last_two_income_callback( $post ){
  wp_nonce_field( 'client_entry_save_last_two_income_data', 'client_entry_last_two_income_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_last_two_income_value_key', true );
  $yes = '';
  $no = '';
  if ($value == '1') {
    $yes = 'checked';
  } elseif ($value == '2') {
    $no = 'checked';
  } else {
    $yes = '';
    $no = '';
  }

  echo '<input type="radio" id="client_entry_last_two_income_field" name="client_entry_last_two_income_field" value="1"  '.$yes.'>Yes ';
  echo '<input type="radio" id="client_entry_last_two_income_field" name="client_entry_last_two_income_field" value="2"  '.$no.'>No ';
}

function client_entry_save_last_two_income_data( $post_id ){

	if (! isset( $_POST['client_entry_last_two_income_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_last_two_income_meta_box_nonce'], 'client_entry_save_last_two_income_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_last_two_income_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_last_two_income_field'] );

	update_post_meta( $post_id , '_client_last_two_income_value_key' , $my_data );

}



function client_entry_gross_income_callback( $post ){
  wp_nonce_field( 'client_entry_save_gross_income_data', 'client_entry_gross_income_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_gross_income_value_key', true );
  $one = '';
  $two = '';
  $three = '';
  $four = '';
  if ($value == '1') {
    $one = 'checked';
  } elseif ($value == '2') {
    $two = 'checked';
  } elseif ($value == '3') {
    $three = 'checked';
  } elseif ($value == '4') {
    $four = 'checked';
  }  else {
    $one = '';
    $two = '';
    $three = '';
    $four = '';
  }

  echo '<input type="radio" id="client_entry_gross_income_field" name="client_entry_gross_income_field" value="1"  '.$one.'>$25,000<br>';
  echo '<input type="radio" id="client_entry_gross_income_field" name="client_entry_gross_income_field" value="2"  '.$two.'>$50,000<br>';
  echo '<input type="radio" id="client_entry_gross_income_field" name="client_entry_gross_income_field" value="3"  '.$three.'>$100,000<br>';
  echo '<input type="radio" id="client_entry_gross_income_field" name="client_entry_gross_income_field" value="4"  '.$four.'>$200,000<br>';
}

function client_entry_save_gross_income_data( $post_id ){

	if (! isset( $_POST['client_entry_gross_income_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_gross_income_meta_box_nonce'], 'client_entry_save_gross_income_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_gross_income_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_gross_income_field'] );

	update_post_meta( $post_id , '_client_gross_income_value_key' , $my_data );

}

function client_entry_spouse_income_callback( $post ){
  wp_nonce_field( 'client_entry_save_spouse_income_data', 'client_entry_spouse_income_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_spouse_income_value_key', true );
  $one = '';
  $two = '';
  $three = '';
  $four = '';
  if ($value == '1') {
    $one = 'checked';
  } elseif ($value == '2') {
    $two = 'checked';
  } elseif ($value == '3') {
    $three = 'checked';
  } elseif ($value == '4') {
    $four = 'checked';
  }  else {
    $one = '';
    $two = '';
    $three = '';
    $four = '';
  }

  echo '<input type="radio" id="client_entry_spouse_income_field" name="client_entry_spouse_income_field" value="1"  '.$one.'>$25,000<br>';
  echo '<input type="radio" id="client_entry_spouse_income_field" name="client_entry_spouse_income_field" value="2"  '.$two.'>$50,000<br>';
  echo '<input type="radio" id="client_entry_spouse_income_field" name="client_entry_spouse_income_field" value="3"  '.$three.'>$100,000<br>';
  echo '<input type="radio" id="client_entry_spouse_income_field" name="client_entry_spouse_income_field" value="4"  '.$four.'>$200,000<br>';
}

function client_entry_save_spouse_income_data( $post_id ){

	if (! isset( $_POST['client_entry_spouse_income_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_spouse_income_meta_box_nonce'], 'client_entry_save_spouse_income_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_spouse_income_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_spouse_income_field'] );

	update_post_meta( $post_id , '_client_spouse_income_value_key' , $my_data );

}


function client_entry_contact_address_callback( $post ){
  wp_nonce_field( 'client_entry_save_contact_address_data', 'client_entry_contact_address_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_contact_address_value_key', true );

  echo '<label for="client_entry_contact_address_field"> Contact Address </label> ';
  echo '<input type="text" name="client_entry_contact_address_field" id="client_entry_contact_address_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_contact_address_data( $post_id ){

	if (! isset( $_POST['client_entry_contact_address_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_contact_address_meta_box_nonce'], 'client_entry_save_contact_address_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_contact_address_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_contact_address_field'] );

	update_post_meta( $post_id , '_client_contact_address_value_key' , $my_data );

}

function client_entry_country_callback( $post ){
  wp_nonce_field( 'client_entry_save_country_data', 'client_entry_country_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_country_value_key', true );

  echo '<label for="client_entry_country_field"> Country </label> ';
  echo '<input type="text" name="client_entry_country_field" id="client_entry_country_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_country_data( $post_id ){

	if (! isset( $_POST['client_entry_country_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_country_meta_box_nonce'], 'client_entry_save_country_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_country_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_country_field'] );

	update_post_meta( $post_id , '_client_country_value_key' , $my_data );

}

function client_entry_telephone_callback( $post ){
  wp_nonce_field( 'client_entry_save_telephone_data', 'client_entry_telephone_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_telephone_value_key', true );

  echo '<label for="client_entry_telephone_field"> Telephone Number </label> ';
  echo '<input type="text" name="client_entry_telephone_field" id="client_entry_telephone_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_telephone_data( $post_id ){

	if (! isset( $_POST['client_entry_telephone_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_telephone_meta_box_nonce'], 'client_entry_save_telephone_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_telephone_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_telephone_field'] );

	update_post_meta( $post_id , '_client_telephone_value_key' , $my_data );

}

function client_entry_vote_area_callback( $post ){
  wp_nonce_field( 'client_entry_save_vote_area_data', 'client_entry_vote_area_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_vote_area_value_key', true );

  echo '<label for="client_entry_vote_area_field"> Residential Voters Address </label> ';
  echo '<input type="text" name="client_entry_vote_area_field" id="client_entry_vote_area_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_vote_area_data( $post_id ){

	if (! isset( $_POST['client_entry_vote_area_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_vote_area_meta_box_nonce'], 'client_entry_save_vote_area_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_vote_area_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_vote_area_field'] );

	update_post_meta( $post_id , '_client_vote_area_value_key' , $my_data );

}

function client_entry_driver_licence_callback( $post ){
  wp_nonce_field( 'client_entry_save_driver_licence_data', 'client_entry_driver_licence_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_driver_licence_value_key', true );

  echo '<label for="client_entry_driver_licence_field"> Driver License </label> ';
  echo '<input type="text" name="client_entry_driver_licence_field" id="client_entry_driver_licence_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_driver_licence_data( $post_id ){

	if (! isset( $_POST['client_entry_driver_licence_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_driver_licence_meta_box_nonce'], 'client_entry_save_driver_licence_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_driver_licence_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_driver_licence_field'] );

	update_post_meta( $post_id , '_client_driver_licence_value_key' , $my_data );

}

function client_entry_citizen_country_callback( $post ){
  wp_nonce_field( 'client_entry_save_citizen_country_data', 'client_entry_citizen_country_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_citizen_country_value_key', true );

  echo '<label for="client_entry_citizen_country_field"> Citizenship Country </label> ';
  echo '<input type="text" name="client_entry_citizen_country_field" id="client_entry_citizen_country_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_citizen_country_data( $post_id ){

	if (! isset( $_POST['client_entry_citizen_country_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_citizen_country_meta_box_nonce'], 'client_entry_save_citizen_country_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_citizen_country_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_citizen_country_field'] );

	update_post_meta( $post_id , '_client_citizen_country_value_key' , $my_data );

}

function client_entry_birthdate_callback( $post ){
  wp_nonce_field( 'client_entry_save_birthdate_data', 'client_entry_birthdate_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_client_birthdate_value_key', true );

  echo '<label for="client_entry_birthdate_field"> Birthdate </label> ';
  echo '<input type="date" name="client_entry_birthdate_field" id="client_entry_birthdate_field" value="'. esc_attr( $value ).'" size="25"/>';
}

function client_entry_save_birthdate_data( $post_id ){

	if (! isset( $_POST['client_entry_birthdate_meta_box_nonce'] ) ) {
				return;
	}
	if (! wp_verify_nonce( $_POST['client_entry_birthdate_meta_box_nonce'], 'client_entry_save_birthdate_data' ) ) {
			return;
	}
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}
	if (! isset( $_POST['client_entry_birthdate_field'] )) {
		return;
	}

	$my_data = sanitize_text_field( $_POST['client_entry_birthdate_field'] );

	update_post_meta( $post_id , '_client_birthdate_value_key' , $my_data );

}


