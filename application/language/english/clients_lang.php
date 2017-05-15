<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Users Language File
 */

// Titles 
$lang['clients title client_add']                 = "Add Client";
$lang['clients title client_delete']              = "Confirm Delete Client";
$lang['clients title client_edit']                = "Edit Client";
$lang['clients title client_list']                = "Client List";



// Buttons
$lang['clients button add_new_user']            = "Add New Client";
$lang['clients button register']                = "Create Account";
$lang['clients button reset_password']          = "Reset Password";
$lang['clients button login_try_again']         = "Try Again";

// Tooltips
$lang['clients tooltip add_new_user']           = "Create a brand new user.";

// Links
$lang['clients link forgot_password']           = "Forgot your password?";
$lang['clients link register_account']          = "Register for an account.";

// Table Columns  
$lang['clients col company_id']                    = "ID";
$lang['clients col name']                   		= "Company Name";
$lang['clients col created_on']                   		= "Created on";

// Form Inputs 
$lang['clients input client name']                = "Name"; 
$lang['clients input client no_of_employee']     = "No of employee";
$lang['clients input client industries']          = "Industries";
$lang['clients input client about_company']          = "About client";
$lang['clients input facebook']          = "Facebook";

$lang['clients input linkedin']          = "linkedin";
$lang['clients input client google_plus']          = "Google plus";
$lang['clients input client url']          = "Web Site";
$lang['clients input client default_company']          = "Default client";
$lang['clients input client hot client']          = "Hot Company";

$lang['clients input client key technologies']          = "Key Technologies";
$lang['clients input client misc. notes']          = "Misc. Notes";
$lang['clients input client client_logo']          = "Client Logo";
$lang['clients input is_active']                   = "Status";
$lang['clients input client skills']                   = "Skills";
 

// Help
$lang['clients help passwords']                 = "Only enter passwords if you want to change it.";

// Messages
$lang['clients msg add_client_success']           = "%s was successfully added!";
$lang['clients msg delete_confirm']             = "Are you sure you want to delete <strong>%s</strong>? This can not be undone.";
$lang['clients msg delete_client']                = "You have succesfully deleted <strong>%s</strong>!";
$lang['clients msg edit_profile_success']       = "Your profile was successfully modified!";
$lang['clients msg edit_client_success']          = "%s was successfully modified!";
$lang['clients msg register_success']           = "Thanks for registering, %s! Check your email for a confirmation message. Once
                                                 your account has been verified, you will be able to log in with the credentials
                                                 you provided.";
$lang['clients msg password_reset_success']     = "Your password has been reset, %s! Please check your email for your new temporary password.";
$lang['clients msg validate_success']           = "Your account has been verified. You may now log in to your account.";
$lang['clients msg email_new_account']          = "<p>Thank you for creating an account at %s. Click the link below to validate your
                                                 email address and activate your account.<br /><br /><a href=\"%s\">%s</a></p>";
$lang['clients msg email_new_account_title']    = "New Account for %s";
$lang['clients msg email_password_reset']       = "<p>Your password at %s has been reset. Click the link below to log in with your
                                                 new password:<br /><br /><strong>%s</strong><br /><br /><a href=\"%s\">%s</a>
                                                 Once logged in, be sure to change your password to something you can
                                                 remember.</p>";
$lang['clients msg email_password_reset_title'] = "Password Reset for %s";

// Errors
$lang['clients error add_client_failed']          = "%s could not be added!";
$lang['clients error delete_client']              = "<strong>%s</strong> could not be deleted!";
$lang['clients error edit_profile_failed']      = "Your profile could not be modified!";
$lang['clients error edit_client_failed']         = "%s could not be modified!";
$lang['clients error email_exists']             = "The email <strong>%s</strong> already exists!";
$lang['clients error email_not_exists']         = "That email does not exists!";
$lang['clients error invalid_login']            = "Invalid name or password";
$lang['clients error password_reset_failed']    = "There was a problem resetting your password. Please try again.";
$lang['clients error register_failed']          = "Your account could not be created at this time. Please try again.";
$lang['clients error company_id_required']         = "A numeric Client ID is required!";
$lang['clients error client_not_exist']           = "That Client does not exist!";
$lang['clients error username_exists']          = "The name <strong>%s</strong> already exists!";
$lang['clients error validate_failed']          = "There was a problem validating your account. Please try again.";
$lang['clients error too_many_login_attempts']  = "You've made too many attempts to log in too quickly. Please wait %s seconds and try again.";
