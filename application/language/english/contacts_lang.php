<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Users Language File
 */

// Titles 
$lang['contacts title client_add']                 = "Add Contact";
$lang['contacts title client_delete']              = "Confirm Delete Contact";
$lang['contacts title client_edit']                = "Edit Contact";
$lang['contacts title client_list']                = "Contact List";



// Buttons
$lang['contacts button add_new_user']            = "Add New Contact";
$lang['contacts button register']                = "Create Account";
$lang['contacts button reset_password']          = "Reset Password";
$lang['contacts button login_try_again']         = "Try Again";

// Tooltips
$lang['contacts tooltip add_new_user']           = "Create a brand new user.";

// Links
$lang['contacts link forgot_password']           = "Forgot your password?";
$lang['contacts link register_account']          = "Register for an account.";

// Table Columns
$lang['contacts col city']                 = "City";
$lang['contacts col is_admin']                   = "Admin";
$lang['contacts col state']                  = "State";
$lang['contacts col company_id']                    = "ID";
$lang['contacts col name']                   = "Company Name";

// Form Inputs 

$lang['contacts col client_id']                = "Client Name";
$lang['contacts col first_name']                = "First name";
$lang['contacts col last_name']                = "Last name";
$lang['contacts input title']                = "Title";

$lang['contacts input email_work']       	= "Email work";
$lang['contacts input email']     			= "Email";

$lang['contacts input phone_work']       	= "Phone work";
$lang['contacts input phone']     			= "Phone";
 
$lang['contacts input address']          = "Address";
$lang['contacts input address1']          = "Address1";
$lang['contacts input city']          = "City";
$lang['contacts input zip']          = "Zip";
$lang['contacts input country']          = "Country";
$lang['contacts input state']          = "State";
$lang['contacts input postal code']          = "Postal Code";
$lang['contacts input url']          = "Web Site";
$lang['contacts input departments']          = "Departments";
$lang['contacts input hot company']          = "Hot Company";

$lang['contacts input is_hot']          = "Is hot";
$lang['contacts input misc. notes']          = "Misc. Notes";
$lang['contacts input date created']          = "Created";
$lang['contacts input is_active']          = "Is Active";
$lang['contacts input enter_by']          = "Enter by";
$lang['contacts input owner']          = "Owner";
$lang['contacts input report_to']          = "Report to";
$lang['contacts input left_company']          = "Left company ";


// Help
$lang['contacts help passwords']                 = "Only enter passwords if you want to change it.";

// Messages
$lang['contacts msg add_client_success']           = "%s was successfully added!";
$lang['contacts msg delete_confirm']             = "Are you sure you want to delete <strong>%s</strong>? This can not be undone.";
$lang['contacts msg delete_client']                = "You have succesfully deleted <strong>%s</strong>!";
$lang['contacts msg edit_profile_success']       = "Your profile was successfully modified!";
$lang['contacts msg edit_client_success']          = "%s was successfully modified!";
$lang['contacts msg register_success']           = "Thanks for registering, %s! Check your email for a confirmation message. Once
                                                 your account has been verified, you will be able to log in with the credentials
                                                 you provided.";
$lang['contacts msg password_reset_success']     = "Your password has been reset, %s! Please check your email for your new temporary password.";
$lang['contacts msg validate_success']           = "Your account has been verified. You may now log in to your account.";
$lang['contacts msg email_new_account']          = "<p>Thank you for creating an account at %s. Click the link below to validate your
                                                 email address and activate your account.<br /><br /><a href=\"%s\">%s</a></p>";
$lang['contacts msg email_new_account_title']    = "New Account for %s";
$lang['contacts msg email_password_reset']       = "<p>Your password at %s has been reset. Click the link below to log in with your
                                                 new password:<br /><br /><strong>%s</strong><br /><br /><a href=\"%s\">%s</a>
                                                 Once logged in, be sure to change your password to something you can
                                                 remember.</p>";
$lang['contacts msg email_password_reset_title'] = "Password Reset for %s";

// Errors
$lang['contacts error add_client_failed']          = "%s could not be added!";
$lang['contacts error delete_client']              = "<strong>%s</strong> could not be deleted!";
$lang['contacts error edit_profile_failed']      = "Your profile could not be modified!";
$lang['contacts error edit_client_failed']         = "%s could not be modified!";
$lang['contacts error email_exists']             = "The email <strong>%s</strong> already exists!";
$lang['contacts error email_not_exists']         = "That email does not exists!";
$lang['contacts error invalid_login']            = "Invalid name or password";
$lang['contacts error password_reset_failed']    = "There was a problem resetting your password. Please try again.";
$lang['contacts error register_failed']          = "Your account could not be created at this time. Please try again.";
$lang['contacts error company_id_required']         = "A numeric Contact ID is required!";
$lang['contacts error client_not_exist']           = "That Contact does not exist!";
$lang['contacts error username_exists']          = "The name <strong>%s</strong> already exists!";
$lang['contacts error validate_failed']          = "There was a problem validating your account. Please try again.";
$lang['contacts error too_many_login_attempts']  = "You've made too many attempts to log in too quickly. Please wait %s seconds and try again.";
