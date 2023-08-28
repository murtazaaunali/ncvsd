<?php 

use App\Configuration;
use Illuminate\Support\Facades\DB;

if (! function_exists('recept_volunteers_emails')) {
    function recept_volunteers_emails()
    {
        $emails = Configuration::first();
        return $emails->volunteer_emails;
    }
}


if (! function_exists('recept_veterans_emails')) {
    function recept_veterans_emails()
    {
        $emails = Configuration::first();
        return $emails->veteran_emails;
    }
}

if (! function_exists('volunteer_email_sender')) {
    function volunteer_email_sender()
    {
        $emails = Configuration::first();
        return $emails->volunteer_email_sender;
    }
}

if (! function_exists('	veteran_email_sender')) {
    function veteran_email_sender()
    {
        $emails = Configuration::first();
        return $emails->veteran_email_sender;
    }
}

//subjects
if (! function_exists('volunteer_email_subject')) {
    function volunteer_email_subject()
    {
        $emails = Configuration::first();
        return $emails->volunteer_email_subject;
    }
}

if (! function_exists('veteran_email_subject')) {
    function veteran_email_subject()
    {
        $emails = Configuration::first();
        return $emails->veteran_email_subject;
    }
}
//subjects

if (! function_exists('system_email_sender_name')) {
    function system_email_sender_name()
    {
        $emails = Configuration::first();
        return $emails->system_email_sender_name;
    }
}

if (! function_exists('system_email_sender')) {
    function system_email_sender()
    {
        $emails = Configuration::first();
        return $emails->system_email_sender;
    }
}

if (! function_exists('analytics')) {
    function analytics()
    {
        $emails = Configuration::first();
        return $emails->analytics;
    }
}
?>