<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'site';

$route['index.html'] = "site/index";

$route['dashboard.html'] = "site/dashboardView";

$route['listings.html'] = "site/listingView";
$route['list.html/(:any)'] = "site/listView/$1";

$route['campaigns.html'] = "site/campaignsView";
$route['add-campaign.html'] = "site/addCampaignView";
$route['edit-campaign.html/(:any)'] = "site/addCampaignView/$1";
$route['send-campaign.html/(:any)'] = "site/sendCampaignView/$1";

$route['countries.html'] = "site/countriesView";
$route['add-countries.html'] = "site/addCountriesView";
$route['edit-countries.html/(:any)'] = "site/addCountriesView/$1";

$route['inbox.html'] = "site/inboxView";

$route['outbox.html'] = "site/outboxView";

$route['users.html'] = "site/usersView";
$route['add-user.html'] = "site/addUsersView";
$route['edit-user.html/(:any)'] = "site/addUsersView/$1";

$route['campaign-numbers.html'] = "site/campaignNumbersView";
$route['add-campaign-number.html'] = "site/addCampaignNumbers";
$route['edit-campaign-number.html/(:any)'] = "site/addCampaignNumbers/$1";
/*form requests*/
$route['req-login'] = 'site/submitLogin';

$route['req-add-users'] = "site/submitUsers";
$route['req-delete-users'] = "site/deleteUsers";

$route['req-submit-listing'] = "site/submitListing";
$route['req-delete-listings'] = "site/deleteListings";

$route['req-submit-campaign'] = "site/submitCampaign";
$route['req-delete-campaign'] = "site/deleteCampaign";
$route['req-submit-send-campaign'] = "site/submitSendCampaign";

$route['req-add-countries'] = "site/submitCountries";
$route['req-delete-countries'] = "site/deleteCountries";

$route['req-add-campaign-numbers'] = "site/submitCampaignNumbers";
$route['req-delete-campaign-numbers'] = "site/deleteCampaignNumbers";

$route['req-get-numbers-campaign-by-listing'] = "site/getNumbersCampaignByListing";

$route['req-logout'] = 'site/logOut';
/*form requests*/

$route['404_override'] = 'site/error404';
$route['translate_uri_dashes'] = FALSE;
